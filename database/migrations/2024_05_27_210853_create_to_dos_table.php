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
            $table->string("description")->nullable();
            $table->boolean("important")->default(false);
            $table->datetime("remind_date")->nullable();
            $table->datetime("due_date")->nullable();
            $table->boolean("completed")->default(false);
            $table->foreignIdFor(User::class, "assigned_id")->nullable();
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
