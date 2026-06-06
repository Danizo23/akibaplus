<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staff_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('users')->cascadeOnDelete();
            $table->date('report_date');
            $table->text('work_summary');
            $table->json('customer_snapshot');
            $table->unsignedInteger('new_customers_count')->default(0);
            $table->decimal('new_customers_total_deposit', 16, 2)->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff_reports');
    }
};
