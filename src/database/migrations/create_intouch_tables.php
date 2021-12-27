<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntouchTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intouch_datatype_details', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();

            $table->uuid('client_uuid')->nullable();
            $table->string('club_id');
            $table->string('detail_name');
            $table->uuid('intouch_detail_uuid')->nullable();
            $table->string('detail_value')->nullable();
            $table->longText('misc')->nullable();

            $table->boolean('active')->default(1);

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
        Schema::drop('intouch_datatype_details');
    }
}
