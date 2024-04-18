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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name');
            $table->bigInteger('number');
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->bigInteger('postal_code')->nullable();
            $table->string('principal_address_1')->nullable();
            $table->string('principal_address_2')->nullable();
            $table->string('principal_address_3')->nullable();
            $table->bigInteger('principal_postal_code')->nullable();
            $table->string('currency')->nullable();
            $table->bigInteger('number_of_shares_issued_by_the_company')->nullable();
            $table->string('principal_SSIC_activity')->nullable();
            $table->string('description_of_principal_SSIC_activity')->nullable();
            $table->string('secondary_SSIC_activity')->nullable();
            $table->string('description_of_secondary_SSIC_activity')->nullable();
            $table->bigInteger('issued_capital_of_company')->nullable();
            $table->bigInteger('paid_up_capital_of_company')->nullable();
            $table->date('financial_year_end_date')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
