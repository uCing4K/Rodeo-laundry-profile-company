<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('faq', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('question', 500);
            $table->text('answer');
            $table->string('category', 100)->nullable()->comment('Kategori FAQ (cth: Layanan, Pembayaran, dll)');
            $table->string('icon', 100)->nullable();
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->index('category', 'idx_category');
            $table->index('is_active', 'idx_active');
            $table->index('sort_order', 'idx_sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faq');
    }
};


