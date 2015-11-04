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

	//http://laravelsnippets.com/snippets/display-php-loaded-image-with-browser-cache-support

	$request = Request::instance();

	$path = storage_path('barcodes/'.$code.'.png');

	if (File::exists($path)) {
		$barcode = File::get($path);
	}
	else {
		$barcode = new TCPDFBarcode($code, 'I25');
		$barcode = $barcode->getBarcodePngData(2, 80);
		File::put($path, $barcode);
	}

	$mime = 'image/png';
	$size = filesize($path);
	$file = file_get_contents($path);	

	$headers = [
	'Content-Type'   => $mime,
	'Content-Length' => $size
	];

	$response = Response::make( $file, 200, $headers );

	// $response = Response::make();

	// if($response->isNotModified($request)) {
	// 	dd('not');
	// 	$response = Response::make(null, 304, $headers );
	// }
	// else {
	// 	$file = file_get_contents($path);
	// 	$response = Response::make( $file, 200, $headers );
	// }

	$filetime = filemtime($path);
	$etag     = md5($code.$filetime);
	$time     = date('r', $filetime);
	$expires  = date('r', $filetime + 3600);

	$response->setEtag($etag);
	$response->setLastModified(new DateTime($time));
	$response->setExpires(new DateTime($expires));
	$response->setPublic();

	if($response->isNotModified($request)) {
		// dd('not');
		return $response;
	} else {
		// dd('mod');
		$response->prepare($request);
		return $response;
	}


	die;




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
