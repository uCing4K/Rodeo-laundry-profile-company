<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('category_id');
            $table->string('name', 150)->comment('Nama produk (cth: Selimut Ukuran L)');
            $table->string('slug', 170)->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->comment('Harga per satuan');
            $table->string('unit', 30)->default('/pcs')->comment('Satuan: /kg, /pcs, /meter');
            $table->string('estimated_duration', 50)->nullable()->comment('Estimasi waktu pengerjaan');
            $table->string('size_variant', 50)->nullable()->comment('Varian ukuran (S, M, L, XL, XXL)');
            $table->string('icon', 100)->nullable()->comment('FontAwesome icon class');
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->foreign('category_id', 'fk_products_category')
                  ->references('id')->on('service_categories')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->index('category_id', 'idx_category');
            $table->index('is_active', 'idx_active');
            $table->index('sort_order', 'idx_sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};


