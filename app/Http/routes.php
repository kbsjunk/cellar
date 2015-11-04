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

// Route::group(['middleware' => 'cache'], function () {

	Route::get('/barcode/{code}', function ($code) {

		$path = storage_path('barcodes/'.$code.'.png');

		if (File::exists($path)) {
			$barcode = File::get($path);
		}
		else {
			$barcode = new TCPDFBarcode($code, 'I25');
			$barcode = $barcode->getBarcodePngData(2, 80);
			File::put($path, $barcode);
		}

		return response($barcode)->header('Content-type', 'image/png');

		die;

		if (Cache::has('barcode.'.$code)) {
			$barcode = Cache::get('barcode.'.$code);
			// $barcode = $code;
			// $lastModified = Cache::get('barcode.'.$code.'.modified', gmdate('D, d M Y H:i:s T'));
		}
		else {
			$barcode = new TCPDFBarcode($code, 'I25');
			$barcode = $barcode->getBarcodePngData(2, 80);
			Cache::put('barcode.'.$code, $barcode, 1000);
			// $lastModified = gmdate('D, d M Y H:i:s T');
			// Cache::put('barcode.'.$code.'.modified', $lastModified, 1000);
		}
//->header('Last-Modified', $lastModified)
		return response($barcode)->header('Content-type', 'image/png');
		// ->header('ETag', md5($barcode));
		//->setTtl(1000);
	});
// });
