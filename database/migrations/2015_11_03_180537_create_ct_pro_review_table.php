<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtProReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_pro_review', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('i_wine')->nullable();
            $table->string('vintage')->nullable();
            $table->string('wine')->nullable();
            $table->string('locale')->nullable();
            $table->string('i_review')->nullable();
            $table->string('publication')->nullable();
            $table->string('score')->nullable();
            $table->string('review_date')->nullable();
            $table->string('edition')->nullable();
            $table->string('reviewer')->nullable();
            $table->string('review_url')->nullable();
            $table->string('review_text')->nullable();
            $table->string('begin')->nullable();
            $table->string('end')->nullable();
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
        Schema::drop('ct_pro_review');
    }
}
