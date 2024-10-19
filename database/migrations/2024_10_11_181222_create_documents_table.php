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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('format');
            $table->string('version')->default('1.0');
            $table->bigInteger('size'); // Tamaño en bytes
            $table->integer('year');
            $table->text('description');
            $table->unsignedBigInteger('modified_by'); // ID del usuario que modifica
            $table->timestamps();

            // Relación con el usuario que modificó el documento
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
