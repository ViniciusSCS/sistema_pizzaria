<?php

use App\Http\Enums\TamanhoEnum;
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
        Schema::create('sabores', function (Blueprint $table) {
            $table->id();
            $table->string('sabor');
            $table->float('valor');
            $table->enum('tamanho', [
                TamanhoEnum::grande->value,
                TamanhoEnum::media->value,
                TamanhoEnum::pequena->value
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sabores');
    }
};
