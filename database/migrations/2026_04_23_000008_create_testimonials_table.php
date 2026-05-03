<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('customer_name', 150);
            $table->string('customer_title', 100)->nullable()->comment('Jabatan/deskripsi (cth: Pemilik Villa Aster)');
            $table->text('content')->comment('Isi testimonial');
            $table->unsignedTinyInteger('rating')->default(5)->comment('Rating 1-5 bintang');
            $table->string('avatar', 255)->nullable()->comment('Path foto pelanggan');
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->index('is_active', 'idx_active');
            $table->index('rating', 'idx_rating');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};


