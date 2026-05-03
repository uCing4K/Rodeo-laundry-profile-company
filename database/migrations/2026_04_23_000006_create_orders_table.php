<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('order_number', 30)->unique()->comment('Format: RODEO-YYYYMMDD-XXXX');
            $table->string('tracking_token', 64)->unique()->comment('Token unik untuk tracking publik');
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('customer_name', 150)->comment('Nama pelanggan (snapshot)');
            $table->string('customer_phone', 20)->nullable();
            $table->unsignedInteger('service_type_id')->nullable();
            $table->enum('status', ['pending', 'processing', 'done', 'picked_up', 'cancelled'])->default('pending');
            $table->string('status_note', 255)->nullable()->comment('Catatan status (opsional)');
            $table->unsignedInteger('total_items')->default(0);
            $table->decimal('total_weight', 8, 2)->nullable()->comment('Total berat (kg) jika relevan');
            $table->decimal('subtotal', 12, 2)->default(0.00);
            $table->decimal('additional_cost', 12, 2)->default(0.00)->comment('Biaya tambahan (express, dll)');
            $table->decimal('discount', 12, 2)->default(0.00);
            $table->decimal('total_price', 12, 2)->default(0.00);
            $table->enum('payment_status', ['unpaid', 'partial', 'paid'])->default('unpaid');
            $table->string('payment_method', 50)->nullable()->comment('Metode bayar: cash, transfer, dll');
            $table->text('notes')->nullable()->comment('Catatan order');
            $table->dateTime('estimated_done_at')->nullable()->comment('Estimasi selesai');
            $table->dateTime('completed_at')->nullable()->comment('Tanggal selesai aktual');
            $table->dateTime('picked_up_at')->nullable()->comment('Tanggal diambil');
            $table->timestamps();

            $table->foreign('customer_id', 'fk_orders_customer')
                  ->references('id')->on('customers')
                  ->onDelete('set null')->onUpdate('cascade');

            $table->foreign('service_type_id', 'fk_orders_service_type')
                  ->references('id')->on('service_types')
                  ->onDelete('set null')->onUpdate('cascade');

            $table->index('order_number', 'idx_order_number');
            $table->index('tracking_token', 'idx_tracking_token');
            $table->index('customer_id', 'idx_customer');
            $table->index('status', 'idx_status');
            $table->index('payment_status', 'idx_payment_status');
            $table->index('created_at', 'idx_created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};


