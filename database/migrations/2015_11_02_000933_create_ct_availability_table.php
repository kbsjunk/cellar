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
            $table->string('agbegin')->nullable();
            $table->string('agend')->nullable();
            $table->string('jgbegin')->nullable();
            $table->string('jgend')->nullable();
            $table->date('begin')->nullable();
            $table->date('end')->nullable();
            $table->string('source')->nullable();
            $table->string('wa', 20)->nullable();
            $table->string('ws', 20)->nullable();
            $table->string('bg', 20)->nullable();
            $table->string('iwc', 20)->nullable();
            $table->string('ag', 20)->nullable();
            $table->string('agweb')->nullable();
            $table->string('agsort', 20)->nullable();
            $table->string('rh', 20)->nullable();
            $table->string('br', 20)->nullable();
            $table->string('brweb')->nullable();
            $table->string('brsort', 20)->nullable();
            $table->string('gv', 20)->nullable();
            $table->string('gvweb')->nullable();
            $table->string('gvsort', 20)->nullable();
            $table->string('lf', 20)->nullable();
            $table->string('lfweb')->nullable();
            $table->string('lfsort', 20)->nullable();
            $table->string('jk', 20)->nullable();
            $table->string('jkweb')->nullable();
            $table->string('jksort', 20)->nullable();
            $table->string('jg', 20)->nullable();
            $table->string('jgweb')->nullable();
            $table->string('jgsort', 20)->nullable();
            $table->string('ld', 20)->nullable();
            $table->string('ldweb')->nullable();
            $table->string('ldsort', 20)->nullable();
            $table->string('cw', 20)->nullable();
            $table->string('cwweb')->nullable();
            $table->string('cwsort', 20)->nullable();
            $table->string('we', 20)->nullable();
            $table->string('jr', 20)->nullable();
            $table->string('wfw', 20)->nullable();
            $table->string('wfwweb')->nullable();
            $table->string('wfwsort', 20)->nullable();
            $table->string('pr', 20)->nullable();
            $table->string('prweb')->nullable();
            $table->string('prsort', 20)->nullable();
            $table->string('sj', 20)->nullable();
            $table->string('sjweb')->nullable();
            $table->string('sjsort', 20)->nullable();
            $table->string('wd', 20)->nullable();
            $table->string('wdweb')->nullable();
            $table->string('wdsort', 20)->nullable();
            $table->string('ga', 20)->nullable();
            $table->string('gaweb')->nullable();
            $table->string('gasort', 20)->nullable();
            $table->string('rr', 20)->nullable();
            $table->string('rrweb')->nullable();
            $table->string('rrsort', 20)->nullable();
            $table->string('jh', 20)->nullable();
            $table->string('jhweb')->nullable();
            $table->string('jhsort', 20)->nullable();
            $table->string('mfw', 20)->nullable();
            $table->string('mfwweb')->nullable();
            $table->string('mfwsort', 20)->nullable();
            $table->string('wwr', 20)->nullable();
            $table->string('wwrweb')->nullable();
            $table->string('wwrsort', 20)->nullable();
            $table->string('iwr', 20)->nullable();
            $table->string('iwrweb')->nullable();
            $table->string('iwrsort', 20)->nullable();
            $table->string('chg', 20)->nullable();
            $table->string('chgweb')->nullable();
            $table->string('chgsort', 20)->nullable();
            $table->string('tt', 20)->nullable();
            $table->string('ttweb')->nullable();
            $table->string('ttsort', 20)->nullable();
            $table->string('pnotes')->nullable();
            $table->string('pscore')->nullable();
            $table->unsignedInteger('cnotes')->nullable();
            $table->decimal('cscore', 19, 16)->nullable();
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
