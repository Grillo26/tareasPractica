<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'title'=>'required|min:3' /* Valida el campo: required=que sea obligatorio, min=minimo 3 caracteres*/
        ]);


        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea creada correctamente');

    }

    public function index(){
        $todos = Todo::all();
        return view('todos.index' , ['todos' => $todos]);
    }

    public function show($id){
        $todos = Todo::find($id);
        return view('todos.show' , ['todos' => $todos]);
    }

    public function update(Request $request, $id){
        $todos = Todo::find($id);
        $todos-> title = $request -> title;
        $todos->save();
        //dd($request); Debugin rapido como el console.log

       // return view('todos.index' , ['success' => 'Trea actualizada!']);
       return redirect()->route('todos')->with('success', 'Tarea actualizada!');
    }

    public function destroy($id){
        $todos = Todo::find($id);
        $todos->delete();
        return redirect()->route('todos')->with('success', 'La Tarea fue eliminada');

    }
}
