<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('setting_key', 100)->unique();
            $table->text('setting_value')->nullable();
            $table->string('setting_group', 50)->default('general')->comment('Grup: general, contact, social, seo, design');
            $table->string('description', 255)->nullable()->comment('Deskripsi setting untuk admin');
            $table->timestamps();

            $table->index('setting_group', 'idx_setting_group');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_settings');
    }
};


