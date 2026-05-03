<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 150);
            $table->string('phone', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('subject', 255)->nullable();
            $table->text('message');
            $table->enum('message_type', ['general', 'order', 'complaint', 'b2b_inquiry'])->default('general');
            $table->tinyInteger('is_read')->default(0);
            $table->tinyInteger('is_replied')->default(0);
            $table->dateTime('replied_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->index('message_type', 'idx_type');
            $table->index('is_read', 'idx_read');
            $table->index('created_at', 'idx_created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};


