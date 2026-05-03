<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 150);
            $table->string('phone', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('address')->nullable();
            $table->enum('customer_type', ['personal', 'business'])->default('personal')->comment('Tipe: personal atau B2B');
            $table->string('business_name', 200)->nullable()->comment('Nama bisnis (untuk pelanggan B2B)');
            $table->text('notes')->nullable();
            $table->unsignedInteger('total_orders')->default(0)->comment('Counter total pesanan');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->index('phone', 'idx_phone');
            $table->index('customer_type', 'idx_customer_type');
            $table->index('is_active', 'idx_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};


