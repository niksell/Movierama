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
        Schema::create('likes', function (Blueprint $table) {
           
            $table->id();
            $table->morphs('userable');
            $table->morphs('likeable');     
            $table->boolean('is_like')->default(true)->index();     
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
    

    
};
