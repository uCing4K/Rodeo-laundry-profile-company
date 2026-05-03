<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('statistics_cache', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('stat_key', 100)->unique()->comment('Key statistik (cth: total_orders, total_customers)');
            $table->string('stat_value', 100)->default('0');
            $table->string('stat_label', 150)->comment('Label tampilan (cth: Total Pesanan Selesai)');
            $table->string('stat_icon', 100)->nullable()->comment('FontAwesome icon');
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('last_calculated_at')->nullable()->comment('Terakhir dihitung');
            $table->timestamps();

            $table->index('is_active', 'idx_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistics_cache');
    }
};


