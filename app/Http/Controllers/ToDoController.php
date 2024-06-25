<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ToDoController extends Controller
{
    public function index(){
        return Inertia::render('Index',[
            'lists' => Auth::user()->toDoLists
        ]);
    }

    public function create(){
        return Inertia::render('Create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Auth::user()->toDoLists()->create([
            'name'=>$request->name,
            'editable' => true,
        ]);

        #return redirect()->route('dashboard');
    }

    public function seelist(Request $request){
        return Inertia::render('Index',[
            'todos' => Auth::user()->toDoLists[$request->id]->toDos
        ]);
    }
}
