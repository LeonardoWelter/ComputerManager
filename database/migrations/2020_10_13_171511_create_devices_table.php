<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * serial = Identificador único do computador
     * oem = Marca/Fabricante;
     * model = Modelo;
     * cpu = Processador;
     * ram = Memória RAM;
     * storage = Armazenamento (HDD ou SSD);
     * psu = Fonte de alimentação
     * mac = Endereço MAC;
     * name = Nome NetBIOS;
     * os = Sistema Operacional;
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('serial')->unique();
            $table->string('oem');
            $table->string('model');
            $table->string('cpu');
            $table->string('ram');
            $table->string('storage');
            $table->string('psu');
            $table->string('mac')->unique();
            $table->string('name');
            $table->string('os');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
