<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateFrom150To151 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bc_tours', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_tours', 'review_score')) {
                $table->decimal('review_score',2,1)->nullable();
            }
            if (!Schema::hasColumn("bc_tours", 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
        });
        Schema::table('bc_spaces', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_spaces', 'review_score')) {
                $table->decimal('review_score',2,1)->nullable();
            }
            if (!Schema::hasColumn("bc_spaces", 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
            DB::statement('ALTER TABLE bc_spaces MODIFY bed integer');
            DB::statement('ALTER TABLE bc_spaces MODIFY bathroom integer');
            DB::statement('ALTER TABLE bc_spaces MODIFY square integer');
        });
        Schema::table('bc_hotels', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_hotels', 'review_score')) {
                $table->decimal('review_score',2,1)->nullable();
            }
            if (!Schema::hasColumn("bc_hotels", 'ical_import_url')) {
                $table->string('ical_import_url')->nullable();
            }
        });
        Schema::table('bc_hotel_rooms', function (Blueprint $table) {
            DB::statement('ALTER TABLE bc_hotel_rooms MODIFY size integer');
        });
        Schema::table('bc_cars', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_cars', 'review_score')) {
                $table->decimal('review_score',2,1)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
