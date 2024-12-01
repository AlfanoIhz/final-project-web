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
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('remember_token');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the status column if rolling back
            $table->dropColumn('status');
        });
    }
};
