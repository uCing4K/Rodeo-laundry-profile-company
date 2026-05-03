<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 150);
            $table->string('position', 100)->comment('Jabatan (cth: Owner, Manager, Staff)');
            $table->string('photo', 255)->nullable()->comment('Path foto');
            $table->text('bio')->nullable()->comment('Bio singkat');
            $table->string('phone', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->index('is_active', 'idx_active');
            $table->index('sort_order', 'idx_sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};


