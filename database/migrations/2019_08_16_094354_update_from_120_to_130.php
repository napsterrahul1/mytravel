<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFrom120To130 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_wishlist')) {
            Schema::create('user_wishlist', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('object_id')->nullable();
                $table->string('object_model', 255)->nullable();
                $table->integer('user_id')->nullable();
                $table->integer('create_user')->nullable();
                $table->integer('update_user')->nullable();
                $table->timestamps();
            });
        }

        Schema::table('bc_bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_bookings', 'buyer_fees')) {
                $table->text('buyer_fees')->nullable();
                $table->decimal('total_before_fees',10,2)->nullable();
            }
            if (!Schema::hasColumn('bc_bookings', 'paid_vendor')) {
                $table->tinyInteger('paid_vendor')->nullable();
            }
        });
        Schema::table('bc_review', function (Blueprint $table) {
            if (!Schema::hasColumn('bc_review', 'vendor_id')) {
                $table->bigInteger('vendor_id')->nullable();
            }
        });

        Schema::table('bc_locations', function (Blueprint $table) {
            $table->integer('banner_image_id')->nullable();
            $table->text('trip_ideas')->nullable();
        });
        Schema::table('bc_location_translations', function (Blueprint $table) {
            $table->string('sub_title',255)->nullable();
            $table->text('trip_ideas')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_wishlist');
    }
}
