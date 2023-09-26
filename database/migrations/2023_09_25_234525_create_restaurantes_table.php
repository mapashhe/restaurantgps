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
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->string("id");
            $table->integer("rating"); //0-4
            $table->string("name");
            $table->string("site");
            $table->string("email");
            $table->string("phone");
            $table->string("street");
            $table->string("city");
            $table->string("state");
            $table->decimal("lat", 8, 6);
            $table->decimal("lng", 9, 6);
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurantes');
    }
};
