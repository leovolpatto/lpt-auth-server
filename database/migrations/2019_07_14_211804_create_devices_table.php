<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
        });
        
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->unique('code', 10); //AuthServer generated code
            $table->unique('mac_address');
            $table->unique('device_id'); //ESP.getID()
        });
        
        Schema::create('company_devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('device_id');
            $table->string('name', 100);
            $table->string('base_topic', 100);
            $table->boolean('is_registered')->default(false);
            $table->boolean('is_enabled')->default(false);
        });
                
        Schema::create('device_login_attempt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('device_id');
            $table->string('last_token', 10);
            $table->string('last_error');
            $table->dateTime('last_login');
            $table->string('last_ip');
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('device_login_attempt');
        Schema::dropIfExists('company_devices');
        Schema::dropIfExists('devices');
        Schema::dropIfExists('companies');
    }
}
