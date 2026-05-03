<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('operating_hours', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedTinyInteger('day_of_week')->comment('1=Senin, 2=Selasa, ..., 7=Minggu');
            $table->string('day_name', 20)->comment('Nama hari');
            $table->time('open_time')->nullable()->comment('Jam buka (NULL = tutup)');
            $table->time('close_time')->nullable()->comment('Jam tutup (NULL = tutup)');
            $table->tinyInteger('is_closed')->default(0)->comment('1 = hari libur');
            $table->string('note', 255)->nullable()->comment('Catatan tambahan');
            $table->timestamps();

            $table->unique('day_of_week', 'uk_day');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('operating_hours');
    }
};


