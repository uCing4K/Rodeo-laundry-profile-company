<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->string('image_path', 255);
            $table->string('image_alt', 255)->nullable()->comment('Alt text untuk SEO');
            $table->enum('category', ['outlet', 'before_after', 'process', 'team', 'other'])->default('other');
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->index('category', 'idx_category');
            $table->index('is_active', 'idx_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery');
    }
};


