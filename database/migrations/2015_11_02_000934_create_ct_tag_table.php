<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('list_name')->nullable();
            $table->string('list_notes')->nullable();
            $table->string('private')->nullable();
            $table->string('wines_notes')->nullable();
            $table->string('max_price')->nullable();
            $table->string('size')->nullable();
            $table->string('vintage')->nullable();
            $table->string('wine')->nullable();
            $table->string('locale')->nullable();
            $table->string('sort_wine')->nullable();
            $table->string('i_wine')->nullable();
            $table->string('type')->nullable();
            $table->string('color')->nullable();
            $table->string('category')->nullable();
            $table->string('producer')->nullable();
            $table->string('sort_producer')->nullable();
            $table->string('varietal')->nullable();
            $table->string('master_varietal')->nullable();
            $table->string('designation')->nullable();
            $table->string('vineyard')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('sub_region')->nullable();
            $table->string('appellation')->nullable();
            $table->string('upccode')->nullable();
            $table->softDeletes();
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
        Schema::drop('ct_tag');
    }
}
