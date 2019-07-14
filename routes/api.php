<?php

use Illuminate\Http\Request;

Route::get('v1/device-login', 'Api\DeviceLoginController@loginDevice');