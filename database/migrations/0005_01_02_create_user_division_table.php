<?php

use App\Models\Division;
use App\Models\User;
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
        Schema::create('user_to_division', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(User::getTableName())->cascadeOnDelete();
            $table->foreignId('division_id')->constrained(Division::getTableName())->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_to_division');
    }
};
