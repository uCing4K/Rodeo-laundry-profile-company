<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('base_price', 10, 2)->default(0);
            $table->unsignedBigInteger('service_type_id')->nullable();
            $table->timestamps();

            $table->foreign('service_type_id')->references('id')->on('service_types')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_categories');
    }
};


