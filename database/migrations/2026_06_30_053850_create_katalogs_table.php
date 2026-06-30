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
    Schema::create('katalogs', function (Blueprint $table) {
        $table->id();
        $table->string('kode_item')->unique();      
        $table->string('nama_item');               
        $table->string('kategori');                
        $table->string('satuan');                  
        $table->integer('harga');                  
        $table->integer('stok');                    
        $table->text('deskripsi')->nullable();    
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalogs');
    }
};
