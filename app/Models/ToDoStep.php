<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoStep extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function toDo(){
        return $this->belongsTo(ToDo::class);
    }
}
