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
        Schema::create('flavors', function (Blueprint $table) {
            $table->id();
            $table->string('sabor');
            $table->decimal('preco', 8, 2);
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
        Schema::dropIfExists('flavors');
    }
};
