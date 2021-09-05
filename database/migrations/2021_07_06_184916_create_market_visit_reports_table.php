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
            $table->string('visit_with')->nullable();
            $table->enum('visit_with_designation', ['AM','TM','VM'])->nullable();
            $table->string('channel');
            $table->string('retailer');
            $table->string('retailer_code');
            $table->string('bar_code');
            $table->enum('retailer_type',['Economy', 'Standard', 'Premium']);
            $table->string('stock_level');
            $table->string('cabinet_type');
            $table->string('cabinet_condition');
            $table->string('cotc_availability');
            $table->string('new_innovation_status');
            $table->string('house_keeping');
            $table->string('price_card_condition')->nullable();
            $table->string('new_innovation_posm')->nullable();
            $table->string('walls_visibility');
            $table->string('cabinet_placement');
            $table->string('cabinet_position_change')->nullable();
            $table->string('competition_visibility');
            $table->string('competition_visibility_type');
            $table->string('verification');
            $table->string('images')->nullable();
            $table->text('remarks')->nullable();
            $table->string('retailer_contact')->nullable();
            $table->text('retailer_feedback')->nullable();
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
