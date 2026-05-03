<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('page', 50)->comment('Halaman: home, about, services, contact, faq');
            $table->string('section', 100)->comment('Section dalam halaman (cth: hero_title, hero_subtitle)');
            $table->string('content_key', 100)->unique()->comment('Key unik untuk akses programatis');
            $table->text('content_value')->nullable()->comment('Isi konten (bisa HTML)');
            $table->enum('content_type', ['text', 'html', 'image', 'json'])->default('text');
            $table->string('description', 255)->nullable()->comment('Deskripsi untuk admin');
            $table->timestamps();

            $table->index('page', 'idx_page');
            $table->index('section', 'idx_section');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};


