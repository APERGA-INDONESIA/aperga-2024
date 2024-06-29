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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string("generated_id");
            $table->integer("talent_id");
            $table->integer("customer_id");
            $table->string("name")->nullable();
            $table->string("address")->nullable();
            $table->tinyInteger("outside_address")->default(0);
            $table->integer("plan_number")->nullable();
            $table->string("plan_type")->nullable();
            $table->string("payment_type")->nullable();
            $table->decimal("dp_amount", 20, 0)->default(0);
            $table->decimal("amount", 20, 0)->default(0);
            $table->text("note")->nullable();
            $table->string("status")->default("created"); // created, onreview, approved, rejected
            $table->text("document")->nullable();
            $table->tinyInteger("document_signed")->default(0);
            $table->date("document_signed_at")->nullable();
            $table->integer("document_signed_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
