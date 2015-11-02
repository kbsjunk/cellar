<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtConsumedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_consumed', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('i_consumed')->nullable();
            $table->unsignedInteger('i_wine')->nullable();
            $table->string('type')->nullable();
            $table->date('consumed')->nullable();
            $table->unsignedInteger('consumed_year')->nullable();
            $table->string('consumed_quarter')->nullable();
            $table->unsignedInteger('consumed_month')->nullable();
            $table->unsignedInteger('consumed_day')->nullable();
            $table->unsignedInteger('consumed_weekday')->nullable();
            $table->string('size')->nullable();
            $table->string('short_type')->nullable();
            $table->decimal('value', 8, 2)->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('revenue', 8, 2)->nullable();
            $table->string('note')->nullable();
            $table->string('vintage')->nullable();
            $table->string('wine')->nullable();
            $table->string('sort_wine')->nullable();
            $table->string('locale')->nullable();
            $table->string('color')->nullable();
            $table->string('category')->nullable();
            $table->string('varietal')->nullable();
            $table->string('master_varietal')->nullable();
            $table->string('designation')->nullable();
            $table->string('vineyard')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('sub_region')->nullable();
            $table->string('appellation')->nullable();
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
        Schema::drop('ct_consumed');
    }
}
