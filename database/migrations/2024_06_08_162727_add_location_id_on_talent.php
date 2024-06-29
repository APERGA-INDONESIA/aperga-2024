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
        Schema::table('talent', function (Blueprint $table) {
            $table->integer('location_id')->nullable()->after('location');
            $table->decimal('rating', 10, 2)->nullable()->after('location_id');
            $table->integer('experience_year')->default(0)->after('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('talent', function (Blueprint $table) {
            $table->dropColumn('location_id');
            $table->dropColumn('rating');
            $table->dropColumn('experience_year');
        });
    }
};
