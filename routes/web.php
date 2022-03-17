<?php

use App\Http\Docker;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

    $docker = new Docker('/var/run/docker.sock');

    return $docker->dispatchCommand('/v1.41/nodes');

    //return view('welcome');
});
