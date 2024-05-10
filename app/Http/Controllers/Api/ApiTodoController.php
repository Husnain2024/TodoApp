<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;


class ApiTodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return response()->json($todos);
    }

public function store(Request $request){
        $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->content = $request->input('content');
        $todo->save();
        return response()->json($todo, 201);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->title = $request->input('title');
        $todo->content = $request->input('content');
        $todo->save();
        return response()->json($todo);
    }
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return response()->json($todo);
    }
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return response()->json(['message' => 'Todo deleted successfully']);
    }
    
}
