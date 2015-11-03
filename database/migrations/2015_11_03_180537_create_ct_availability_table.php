<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtAvailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_availability', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('i_wine')->nullable();
            $table->string('type')->nullable();
            $table->string('color')->nullable();
            $table->string('category')->nullable();
            $table->string('available')->nullable();
            $table->string('linear')->nullable();
            $table->string('bell')->nullable();
            $table->string('early')->nullable();
            $table->string('late')->nullable();
            $table->string('fast')->nullable();
            $table->string('twin_peak')->nullable();
            $table->string('simple')->nullable();
            $table->unsignedInteger('purchases')->nullable();
            $table->unsignedInteger('actual_purchases')->nullable();
            $table->unsignedInteger('pending')->nullable();
            $table->unsignedInteger('actual_pending')->nullable();
            $table->unsignedInteger('local_quantity_actual')->nullable();
            $table->unsignedInteger('local_quantity')->nullable();
            $table->unsignedInteger('consumed')->nullable();
            $table->unsignedInteger('actual_consumed')->nullable();
            $table->unsignedInteger('inventory')->nullable();
            $table->unsignedInteger('actual_inventory')->nullable();
            $table->string('vintage')->nullable();
            $table->string('wine')->nullable();
            $table->string('sort_wine')->nullable();
            $table->string('locale')->nullable();
            $table->string('producer')->nullable();
            $table->string('varietal')->nullable();
            $table->string('master_varietal')->nullable();
            $table->string('designation')->nullable();
            $table->string('vineyard')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('sub_region')->nullable();
            $table->string('appellation')->nullable();
            $table->string('ag_begin')->nullable();
            $table->string('ag_end')->nullable();
            $table->string('jg_begin')->nullable();
            $table->string('jg_end')->nullable();
            $table->date('begin')->nullable();
            $table->date('end')->nullable();
            $table->string('source')->nullable();
            $table->string('wa', 20)->nullable();
            $table->string('ws', 20)->nullable();
            $table->string('bg', 20)->nullable();
            $table->string('iwc', 20)->nullable();
            $table->string('ag', 20)->nullable();
            $table->string('ag_web')->nullable();
            $table->string('ag_sort', 20)->nullable();
            $table->string('rh', 20)->nullable();
            $table->string('br', 20)->nullable();
            $table->string('br_web')->nullable();
            $table->string('br_sort', 20)->nullable();
            $table->string('gv', 20)->nullable();
            $table->string('gv_web')->nullable();
            $table->string('gv_sort', 20)->nullable();
            $table->string('lf', 20)->nullable();
            $table->string('lf_web')->nullable();
            $table->string('lf_sort', 20)->nullable();
            $table->string('jk', 20)->nullable();
            $table->string('jk_web')->nullable();
            $table->string('jk_sort', 20)->nullable();
            $table->string('jg', 20)->nullable();
            $table->string('jg_web')->nullable();
            $table->string('jg_sort', 20)->nullable();
            $table->string('ld', 20)->nullable();
            $table->string('ld_web')->nullable();
            $table->string('ld_sort', 20)->nullable();
            $table->string('cw', 20)->nullable();
            $table->string('cw_web')->nullable();
            $table->string('cw_sort', 20)->nullable();
            $table->string('we', 20)->nullable();
            $table->string('jr', 20)->nullable();
            $table->string('wfw', 20)->nullable();
            $table->string('wfw_web')->nullable();
            $table->string('wfw_sort', 20)->nullable();
            $table->string('pr', 20)->nullable();
            $table->string('pr_web')->nullable();
            $table->string('pr_sort', 20)->nullable();
            $table->string('sj', 20)->nullable();
            $table->string('sj_web')->nullable();
            $table->string('sj_sort', 20)->nullable();
            $table->string('wd', 20)->nullable();
            $table->string('wd_web')->nullable();
            $table->string('wd_sort', 20)->nullable();
            $table->string('ga', 20)->nullable();
            $table->string('ga_web')->nullable();
            $table->string('ga_sort', 20)->nullable();
            $table->string('rr', 20)->nullable();
            $table->string('rr_web')->nullable();
            $table->string('rr_sort', 20)->nullable();
            $table->string('jh', 20)->nullable();
            $table->string('jh_web')->nullable();
            $table->string('jh_sort', 20)->nullable();
            $table->string('mfw', 20)->nullable();
            $table->string('mfw_web')->nullable();
            $table->string('mfw_sort', 20)->nullable();
            $table->string('wwr', 20)->nullable();
            $table->string('wwr_web')->nullable();
            $table->string('wwr_sort', 20)->nullable();
            $table->string('iwr', 20)->nullable();
            $table->string('iwr_web')->nullable();
            $table->string('iwr_sort', 20)->nullable();
            $table->string('chg', 20)->nullable();
            $table->string('chg_web')->nullable();
            $table->string('chg_sort', 20)->nullable();
            $table->string('tt', 20)->nullable();
            $table->string('tt_web')->nullable();
            $table->string('tt_sort', 20)->nullable();
            $table->string('p_notes')->nullable();
            $table->string('p_score')->nullable();
            $table->unsignedInteger('c_notes')->nullable();
            $table->decimal('c_score', 19, 16)->nullable();
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
        Schema::drop('ct_availability');
    }
}
