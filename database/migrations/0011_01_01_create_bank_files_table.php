<?php

use App\Models\Bank;
use App\Models\File;
use App\Models\PaymentRaport;
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
        Schema::create('bank_files', function (Blueprint $table) {
            $table->id();

            $table->foreignId('file_id')->constrained(File::getTableName());
            $table->foreignId('bank_id')->constrained(Bank::getTableName());
            $table->foreignId('raport_id')->constrained(PaymentRaport::getTableName());

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_files');
    }
};
