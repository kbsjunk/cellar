<?php

namespace Cellar\CellarTracker;

use Goutte\Client;

class Downloader
{
	protected $client;
	protected $username;
	protected $password;
	
	public function __construct()
	{
		$this->client = new Client;
		$this->username = env('CT_USERNAME');
		$this->password = env('CT_PASSWORD');
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
		$url = sprintf('https://www.cellartracker.com/xlquery.asp?table=%s&User=%s&Password=%s', $table, $this->username, $this->password);
		
		$crawler = $this->client->request('GET', $url);
		
		$headers = [];
		
		$crawler->filter('table tr:first-child th')->each(function ($th) use (&$headers) {
			$headers[] = strtolower(preg_replace(['/([a-z])([A-Z])/', '/^([A-Z]+)([A-Z][a-z]+)/'], '$1_$2', $th->text()));
		});
		
		$rows = [];
		
		$crawler->filter('table tr:not(:first-child)')->each(function ($tr) use (&$rows, $headers) {
			$row = $tr->filter('td')->each(function ($td) {
				return trim($td->text());
			});
			
			$rows[] = array_combine($headers, array_pad($row, count($headers), ''));
			
		});
		
		$keys = array_filter($headers, function($key) {
			return stripos($key, 'i_') === 0;
		});
		
		$keys[] = 'user_id';
		
		$model = $table == 'List' ? 'WineList' : $model;
		
		$model = 'Cellar\\CellarTracker\\'.$model;
		$model = new $model;
		
		foreach ($rows as $row) {
			$row['user_id'] = 1;
			$findKeys = array_only($row, $keys);
			$model->unguard();
			$item = $model->updateOrCreate($findKeys, $row);
		}
		
	}
}