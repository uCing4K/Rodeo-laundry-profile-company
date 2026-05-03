<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 100)->comment('Nama kategori (cth: Setrika, Cuci Kering)');
            $table->string('slug', 120)->unique()->comment('URL-friendly name');
            $table->text('description')->nullable()->comment('Deskripsi kategori');
            $table->string('icon', 100)->nullable()->comment('FontAwesome icon class (cth: fa-tshirt)');
            $table->string('image', 255)->nullable()->comment('Path gambar kategori');
            $table->enum('type', ['reguler', 'premium'])->default('reguler')->comment('Tipe layanan');
            $table->integer('sort_order')->default(0)->comment('Urutan tampil');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->index('type', 'idx_type');
            $table->index('sort_order', 'idx_sort_order');
            $table->index('is_active', 'idx_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_categories');
    }
};


