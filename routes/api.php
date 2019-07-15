<?php

use Illuminate\Http\Request;

Route::post('v1/devices/login', 'Api\DeviceLoginController@loginDevice');
Route::post('v1/devices', 'Api\DeviceLoginController@postDevice');
Route::get('v1/devices', 'Api\DeviceLoginController@getDevices');