<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->char('code', 5)->unique();
            $table->string('name');
            $table->string('region', 16);
            $table->enum('element', ['pyro', 'hydro', 'cryo', 'electro', 'dendro', 'anemo', 'geo']);
            $table->string('constellation');
            $table->enum('weapon', ['sword', 'bow', 'catalyst', 'claymore', 'polearm']);
            $table->date('birth_date');
            $table->decimal('base_atk')->default(1.00);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('characters');
    }
};
