<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->string('product_name', 150)->comment('Nama produk (snapshot)');
            $table->unsignedInteger('quantity')->default(1);
            $table->string('unit', 30)->default('/pcs');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('subtotal', 12, 2);
            $table->text('notes')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('order_id', 'fk_order_items_order')
                  ->references('id')->on('orders')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('product_id', 'fk_order_items_product')
                  ->references('id')->on('products')
                  ->onDelete('set null')->onUpdate('cascade');

            $table->index('order_id', 'idx_order');
            $table->index('product_id', 'idx_product');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};


