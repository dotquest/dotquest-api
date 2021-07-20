<?php

use Illuminate\Support\Facades\Route;
use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;
use Prometheus\Storage\APC;
use Prometheus\Storage\InMemory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/metrics', function () {

    phpinfo();

    $adapter = new InMemory();
    $registry = new CollectorRegistry($adapter);
    $renderer = new RenderTextFormat();

    $counter = $registry->getOrRegisterCounter('test', 'some_counter', 'it increases', ['type']);
    $counter->incBy(3, ['blue']);

    $gauge = $registry->getOrRegisterGauge('test', 'some_gauge', 'it sets', ['type']);
    $gauge->set(2.5, ['blue']);

    $histogram = $registry->getOrRegisterHistogram('test', 'some_histogram', 'it observes', ['type'], [0.1, 1, 2, 3.5, 4, 5, 6, 7, 8, 9]);
    $histogram->observe(3.5, ['blue']);

    $result = $renderer->render($registry->getMetricFamilySamples());

    header('Content-type: ' . RenderTextFormat::MIME_TYPE);
    return $result;
});
