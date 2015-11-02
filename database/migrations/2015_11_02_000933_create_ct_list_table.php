<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_list', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('i_wine')->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('pending')->nullable();
            $table->string('size')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('valuation', 8, 2)->nullable();
            $table->string('my_value')->nullable();
            $table->string('wbvalue')->nullable();
            $table->string('ctvalue')->nullable();
            $table->string('vintage')->nullable();
            $table->string('wine')->nullable();
            $table->string('locale')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('sub_region')->nullable();
            $table->string('appellation')->nullable();
            $table->string('producer')->nullable();
            $table->string('sort_producer')->nullable();
            $table->string('type')->nullable();
            $table->string('varietal')->nullable();
            $table->string('master_varietal')->nullable();
            $table->string('designation')->nullable();
            $table->string('vineyard')->nullable();
            $table->string('wa')->nullable();
            $table->string('ws')->nullable();
            $table->string('iwc')->nullable();
            $table->string('bh')->nullable();
            $table->string('ag')->nullable();
            $table->string('we')->nullable();
            $table->string('jr')->nullable();
            $table->string('rh')->nullable();
            $table->string('jg')->nullable();
            $table->string('gv')->nullable();
            $table->string('jk')->nullable();
            $table->string('ld')->nullable();
            $table->string('cw')->nullable();
            $table->string('wfw')->nullable();
            $table->string('pr')->nullable();
            $table->string('sj')->nullable();
            $table->string('wd')->nullable();
            $table->string('rr')->nullable();
            $table->string('jh')->nullable();
            $table->string('mfw')->nullable();
            $table->string('wwr')->nullable();
            $table->string('iwr')->nullable();
            $table->string('chg')->nullable();
            $table->string('tt')->nullable();
            $table->decimal('ct', 5, 2)->nullable();
            $table->string('my')->nullable();
            $table->unsignedInteger('begin')->nullable();
            $table->unsignedInteger('end')->nullable();
            $table->string('upc')->nullable();
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
        Schema::drop('ct_list');
    }
}
