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
        Schema::create('to_do_list_user', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(ToDoList::class);
            $table->primary([(new User())->getForeignKey(), (new ToDoList())->getForeignKey()]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_do_list_user');
    }
};
