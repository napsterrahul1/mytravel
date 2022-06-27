<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMyTravel100 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bc_tours', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_tours', 'date_form_to')) {
                $table->string('date_form_to')->nullable();
            }
            if (!Schema::hasColumn('bc_tours', 'min_age')) {
                $table->string('min_age')->nullable();
            }
            if (!Schema::hasColumn('bc_tours', 'pickup')) {
                $table->string('pickup')->nullable();
            }
            if (!Schema::hasColumn('bc_tours', 'wifi_available')) {
                $table->tinyInteger('wifi_available')->nullable();
            }
        });

        Schema::table('bc_hotels', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_hotels', 'badge_tags')) {
                $table->text('badge_tags')->nullable();
            }
        });

        Schema::table('bc_hotel_translations', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_hotel_translations', 'badge_tags')) {
                $table->text('badge_tags')->nullable();
            }
        });
    }


    public function down()
    {
        //
    }
}
