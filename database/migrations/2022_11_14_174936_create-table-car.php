<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_car', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modelo')->nullable();
            $table->string('marca_fabricante')->nullable();
            $table->string('ano')->nullable();
            $table->text('valor_tabela')->nullable();
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
        Schema::dropIfExists('tb_car');
    }
}
