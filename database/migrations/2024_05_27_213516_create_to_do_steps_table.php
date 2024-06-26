<?php

use App\Models\ToDo;
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
        Schema::create('to_do_steps', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("completed");
            $table->foreignIdFor(ToDo::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_do_steps');
    }
};
