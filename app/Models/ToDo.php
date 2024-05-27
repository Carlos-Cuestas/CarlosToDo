<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;

    public function list(){
        return $this->belongsTo(ToDoList::class);
    }

    public function user(){
        return $this->hasOneThrough(User::class, ToDoList::class);
    }

    public function steps(){
        return $this->hasMany(ToDoStep::class);
    }

    public function files(){
        return $this->hasMany(ToDoFile::class);
    }
}
