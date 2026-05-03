<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('service_types', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 100)->comment('Nama jenis layanan');
            $table->string('slug', 120)->unique();
            $table->text('description')->nullable();
            $table->string('estimated_duration', 50)->nullable()->comment('Estimasi waktu (cth: ~24 jam)');
            $table->decimal('additional_cost', 10, 2)->default(0.00)->comment('Biaya tambahan');
            $table->string('additional_cost_note', 255)->nullable()->comment('Catatan biaya tambahan');
            $table->string('icon', 100)->nullable();
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->index('is_active', 'idx_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_types');
    }
};


