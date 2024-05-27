<?php

use App\Models\ToDoList;
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
        Schema::create('to_dos', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->boolean("important");
            $table->datetime("remind_date");
            $table->datetime("due_date");
            $table->boolean("completed");
            $table->foreignIdFor(User::class, "assigned_id")->constrained();
            $table->foreignIdFor(ToDoList::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_dos');
    }
};
