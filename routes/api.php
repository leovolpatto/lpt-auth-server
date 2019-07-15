<?php

use Illuminate\Http\Request;

Route::post('v1/devices/login', 'Api\DeviceLoginController@loginDevice');