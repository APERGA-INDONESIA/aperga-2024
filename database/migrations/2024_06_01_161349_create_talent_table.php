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
        Schema::create('talent', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("type_id");
            $table->string("location")->nullable();
            $table->date("birthday")->nullable();
            $table->decimal("salary_range_start", 20, 0)->default(0);
            $table->decimal("salary_range_end", 20, 0)->default(0);
            $table->string("condition")->default("Sehat");
            $table->string("placement")->nullable();
            $table->decimal("weight", 5, 2)->default(0);
            $table->decimal("height", 5, 2)->default(0);
            $table->string("skin_tone")->nullable();
            $table->enum("education", ["SD", "SMP", "SMA", "SMK", "D1", "D2", "D3", "D4", "S1", "S2", "S3"])->nullable();
            $table->text("experience")->nullable();
            $table->text("image1")->nullable();
            $table->text("image2")->nullable();
            $table->text("image3")->nullable();
            $table->text("image4")->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("deleted_by")->nullable();
            $table->dateTime("deleted_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talent');
    }
};
