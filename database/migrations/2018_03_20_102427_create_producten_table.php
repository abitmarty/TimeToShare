<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateProductenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producten', function (Blueprint $table) {
            //$table->increments('id');
            $table->uuid('id')->unique();
            $table->primary('id');
            //$table->primary('id');
            $table->string('id_eigenaar');
            $table->string('product_naam');
            $table->string('uitgeleend_aan')->nullable($value = true);
            $table->boolean('uitgeleend')->nullable($value = true);//Was default false
            $table->boolean('geacepteerd')->nullable($value = true);
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
        Schema::dropIfExists('producten');
    }
}
