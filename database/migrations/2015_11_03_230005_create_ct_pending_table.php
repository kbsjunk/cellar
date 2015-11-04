<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtPendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_pending', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('i_wine')->nullable();
            $table->unsignedInteger('i_purchase')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('store_name')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('remaining')->nullable();
            $table->string('note')->nullable();
            $table->boolean('delivered')->nullable();
            $table->string('size')->nullable();
            $table->string('vintage')->nullable();
            $table->string('wine')->nullable();
            $table->string('sort_wine')->nullable();
            $table->string('locale')->nullable();
            $table->string('type')->nullable();
            $table->string('color')->nullable();
            $table->string('category')->nullable();
            $table->string('producer')->nullable();
            $table->string('varietal')->nullable();
            $table->string('master_varietal')->nullable();
            $table->string('designation')->nullable();
            $table->string('vineyard')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('sub_region')->nullable();
            $table->string('appellation')->nullable();
            $table->softDeletes();
            $table->unique(['user_id', 'i_wine', 'i_purchase']);
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
        Schema::drop('ct_pending');
    }
}
