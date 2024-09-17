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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Location name (city, country, etc.)
            $table->string('type')->nullable(); // Type (country, city, region)
            $table->decimal('latitude', 10, 8)->nullable(); // Latitude
            $table->decimal('longitude', 11, 8)->nullable(); // Longitude
            $table->foreignId('parent_id')->nullable()->constrained('locations')->onDelete('cascade'); // For hierarchical relationships (e.g., a city belonging to a country)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
