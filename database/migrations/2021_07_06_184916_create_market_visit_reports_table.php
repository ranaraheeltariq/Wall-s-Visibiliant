<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketVisitReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_visit_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('territory_id');
            $table->foreign('territory_id')->references('id')->on('territories');
            $table->string('visiting_area');
            $table->string('visiting_route');
            $table->string('tm_market_name');
            $table->string('channel');
            $table->string('retailer');
            $table->string('retailer_code');
            $table->string('stock_level');
            $table->string('cabinet_type');
            $table->string('cabinet_condition');
            $table->string('cotc_availability');
            $table->string('new_innovation_status');
            $table->string('new_innovation_posm');
            $table->string('walls_visibility');
            $table->string('cabinet_placement');
            $table->string('competition_visibility');
            $table->string('competition_visibility_type');
            $table->string('images');
            $table->text('remarks');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_visit_reports');
    }
}
