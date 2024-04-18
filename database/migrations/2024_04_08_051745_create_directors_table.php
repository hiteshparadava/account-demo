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
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('company_id');
            $table->enum('type', ['Director', 'Shareholder', 'Employee', 'Agent']);
            $table->string('full_name');
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->bigInteger('postal_code')->nullable();
            $table->string('nric_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('passport_expiration_date')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('nationality')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->integer('share_holdings')->nullable();
            $table->string('nric_file')->nullable();
            $table->string('notarised_id_card_file')->nullable();
            $table->string('notarised_passport_file')->nullable();
            $table->string('address_proof_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directors');
    }
};
