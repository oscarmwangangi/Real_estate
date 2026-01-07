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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('bed');
            $table->unsignedBigInteger('bath');
            $table->unsignedBigInteger('area');
            $table->string('city');
            $table->string('street');
            $table->string('code');
            $table->string('street_nr');
            $table->unsignedBigInteger('price');
    });
}
    
   /**
     * Reverse the migrations.
     */
   public function down(): void
    {
         Schema::dropIfExists('listings');
    }
};
