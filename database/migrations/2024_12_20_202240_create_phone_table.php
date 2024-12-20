<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phone', function (Blueprint $table) {
            $table->id(); // Автоинкрементный ID
            $table->string('phone_number'); // Номер телефона
            $table->string('phone_type')->nullable(); // Тип телефона (мобильный, домашний и т.д.)
            $table->unsignedBigInteger('user_id'); // Ссылка на пользователя (если связываем с таблицей users)
            $table->timestamps(); // Created_at, Updated_at
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Внешний ключ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone');
    }
};
