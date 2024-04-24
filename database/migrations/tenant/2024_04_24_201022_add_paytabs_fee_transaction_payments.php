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
        Schema::table('fee_transaction_payments', function (Blueprint $table) {
            $table->longText('payTabs_details')->nullable();
            $table->enum('method', ['cash','payTabs','card', 'cheque', 'bank_transfer', 'other', 'advance_pay', 'student_advance_amount'])->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
