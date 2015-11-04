<?php

namespace Cellar\CellarTracker;

use Goutte\Client;

use Auth;
use Cellar\User;

class Downloader
{
	protected $client;
	protected $user;
	
	public function __construct()
	{
		$this->client = new Client;
		$this->user = User::find(2); //FIXME Auth::user();
	}
	
	public function getClient()
	{
		return $this->client;
	}
	
	public function setClient(Client $client)
	{
		$this->client = $client;
	}
	
	public function get($table)
	{
		$table = studly_case($table);

		$url = sprintf('https://www.cellartracker.com/xlquery.asp?table=%s&User=%s&Password=%s', $table, $this->user->ct_username, $this->user->ct_password);
		
		$crawler = $this->client->request('GET', $url);
		
		$headers = [];
		
		$crawler->filter('table tr:first-child th')->each(function ($th) use (&$headers) {
			$headers[] = static::columnHeading($th->text());
		});
		
		$rows = [];
		
		$crawler->filter('table tr:not(:first-child)')->each(function ($tr) use (&$rows, $headers) {
			$row = $tr->filter('td')->each(function ($td) {
				return trim($td->text());
			});
			
			$rows[] = array_combine($headers, array_pad($row, count($headers), ''));
			
		});
		
		$keys = static::findIndexes($headers);
		
		$keys[] = 'user_id';
		
		$model = $table == 'List' ? 'WineList' : $table;
		
		$model = 'Cellar\\CellarTracker\\'.$model;
		$model = new $model;

		$model->where('user_id', $this->user->id)->delete();

		$model = $model->newInstance();

		foreach ($rows as $row) {
			$row['user_id'] = $this->user->id;
			$item = $model->withTrashed()->where(array_only($row, $keys))->first();
			if (!$item) {
				$item = $model->newInstance();
			}
			$item->fill($row)->save();
			$item->restore();
		}
		
	}

	public static function columnHeading($string)
	{
		return strtolower(preg_replace(['/([a-z])([A-Z])/', '/^([A-Z]+)([A-Z][a-z]+)/'], '$1_$2', $string));
	}

	public static function findIndexes($headers)
	{
		return array_filter($headers, function($key) {
			return stripos($key, 'i_') === 0;
		});
	}
}