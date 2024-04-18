<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("phone_number")->nullable()->after('remember_token');
            $table->string("company_name")->nullable()->after('phone_number');
            $table->string("company_no")->nullable()->after('company_name');
            $table->string("director")->nullable()->after('company_no');
            $table->string("address")->nullable()->after('director');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
