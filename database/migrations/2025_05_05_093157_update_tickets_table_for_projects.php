<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Ajout de la colonne project_id
            $table->unsignedBigInteger('project_id')->nullable()->after('id');

            // Ajout de la colonne assigned_to
            $table->unsignedBigInteger('assigned_to')->nullable()->after('project_id');
        });

        // Ajout des contraintes de clés étrangères
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['assigned_to']);
            $table->dropColumn(['project_id', 'assigned_to']);
        });
    }
};
