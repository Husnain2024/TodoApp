<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Todo;



class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $todos = Todo::select('id','title','content')->get();

        return view('manage-todoes.view',compact('todos'));

    }

 
    /**
     * Show the form for creating a new resource.
     */
    public function editTodo(string $id = null)
    {
        $todo = $id ? Todo::find($id) : null;
    
        return view('manage-todoes.edit', compact('todo'));
    }



    public function createOrUpdateTodo(Request $request, $id = null)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
    
        $params = $request->all();
        unset($params['_token']);
    
        if ($id) {
            Todo::where('id', $id)->update($params);
            $message = "Todo updated successfully";
        } else {
            Todo::create($params);
            $message = "Todo created successfully";
        }
    
        return redirect()->route('view-todo')->withStatus($message);
    }
    

    public function DeleteTodo(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('view-todo')->withStatus("Todo deleted succesfully"); 
    }

}
