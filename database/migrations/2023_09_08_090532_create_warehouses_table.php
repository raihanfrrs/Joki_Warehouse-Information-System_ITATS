<?php

use App\Models\Admin;
use App\Models\WarehouseCategory;
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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Admin::class);
            $table->foreignIdFor(WarehouseCategory::class);
            $table->string('name');
            $table->string('capacity');
            $table->string('facility');
            $table->integer('surface_area');
            $table->integer('building_area');
            $table->string('city');
            $table->longText('address');
            $table->longText('description');
            $table->enum('status', ['available', 'rented', 'maintenance', 'damaged', 'unavailable'])->default('available');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
