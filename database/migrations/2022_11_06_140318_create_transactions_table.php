<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->float('paid_amount');
            $table->string('currency');
            $table->tinyInteger('status_code');
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
