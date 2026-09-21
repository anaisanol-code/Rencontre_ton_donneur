<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->decimal('price', 10, 2);
                $table->string('image')->nullable();
                $table->string('gender');
                $table->unsignedInteger('age');
                $table->decimal('height', 4, 2);
                $table->decimal('weight', 5, 2);
                $table->string('blood_type');
                $table->string('region');
                $table->string('status')->default('available');
                $table->boolean('available')->default(true);
                $table->boolean('premium')->default(false);
                $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
