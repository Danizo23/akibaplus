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
        Schema::table('savings_transactions', function (Blueprint $table) {
            $table->dateTime('maturity_date')->nullable()->after('plan_months');
            $table->string('status')->default('active')->after('maturity_date'); // active, withdrawn, pending
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('savings_transactions', function (Blueprint $table) {
            $table->dropColumn('maturity_date');
            $table->dropColumn('status');
        });
    }
};
