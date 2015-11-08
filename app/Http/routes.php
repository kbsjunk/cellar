<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$codes = Cellar\CellarTracker\Inventory::lists('barcode');
	$output = '';

	foreach ($codes as $code) {
		$output.='<div style="padding:40;"><img src="'.url('barcode/'.$code).'"></div>';
	}

	return response($output);
});

Route::get('/barcode/{code}', function ($code) {

	$response = Response::make('', 200, ['Content-Type' => 'image/png']);
	$response->setETag(md5($code));

	$response->setPublic();

	$request = Request::instance();

	if ($response->isNotModified($request)) {
		return $response;
	}

	if (Cache::has('barcode.'.$code)) {
		$barcode = Cache::get('barcode.'.$code);
	}
	else {
		$barcode = new TCPDFBarcode($code, 'I25');
		$barcode = $barcode->getBarcodePngData(2, 80);
		Cache::put('barcode.'.$code, $barcode, 1000);
	}

	return $response->setContent($barcode);

});

Route::get('/racks.json', function () {


	$rows = 8;
	$columns = 12;

	$rack = ['columns' => $columns];

	for ($r=0; $r < $rows; $r++) {
		$row = [];
		for ($c=0; $c < $columns; $c++) { 
			$status = (($c / ($r+1)) % 3) < 2 ? 'open' : 'closed';

			$cell = [
			'status' => $status,
			];

			$row['columns'][] = $cell;
		}
		$rack['rows'][] = $row;
	}

	return response($rack);

});

Route::get('/wines.json', function () {

	$wines = Cellar\CellarTracker\Inventory::get();

	return response($wines);

});


Route::get('/racks', function () {

	return view('racks/rack');

});