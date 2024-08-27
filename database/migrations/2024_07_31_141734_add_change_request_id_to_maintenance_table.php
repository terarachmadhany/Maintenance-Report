<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('maintenance', function (Blueprint $table) {
            $table->unsignedBigInteger('change_request_id')->nullable()->after('id');
            $table->foreign('change_request_id')->references('id')->on('maintenance')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('maintenance', function (Blueprint $table) {
            $table->dropForeign(['change_request_id']);
            $table->dropColumn('change_request_id');
        });
    }

};
