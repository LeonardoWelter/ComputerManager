<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * device_id = ID do equipamento no qual foi feito a manutenção;
     * type = Tipo de manutenção
     * subtype = Subtipo de manutenção
     * description = Descrição do que foi feito
     * comments = Comentários sobre o que foi feito
     * user_id = ID do usuário que realizou a manutenção
     * date = Data da manutenção;
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('device_id');
            $table->string('type');
            $table->string('subtype');
            $table->text('description');
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('device_id')->references('id')->on('devices');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
}
