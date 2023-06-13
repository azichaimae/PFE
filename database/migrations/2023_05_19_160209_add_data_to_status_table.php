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
        Schema::table('status', function (Blueprint $table) {
            DB::table('status')->insert([
                ['name' => 'in stock'],
                ['name' => 'shipping'],
                ['name' => 'validated'],
                ['name' => 'cancelled'],
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('status')->truncate();
    }
};
