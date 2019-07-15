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
            $table->timestamps();
        });
        
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('mac_address')->unique();
            $table->string('device_id')->unique(); //ESP.getID()
            $table->timestamps();
        });
        
        Schema::create('company_devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('device_id');
            $table->string('name', 100);
            $table->string('base_topic', 100);
            $table->boolean('is_enabled')->default(false);
            $table->timestamps();
        });
                
        Schema::create('device_login_attempt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('device_id');
            $table->string('last_token', 10);
            $table->string('last_error');
            $table->dateTime('last_login');
            $table->string('last_ip');
            $table->timestamps();
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
