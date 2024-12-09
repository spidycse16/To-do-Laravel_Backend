<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
 

    public function index(Request $request)
    {
        $todos = Todo::where('user_id', $request->user()->id)->get();
        return response()->json($todos);
    }

    // Create a new todo
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $todo = Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user()->id,
        ]);

        return response()->json($todo, 201);
    }

    // Update a todo
    public function update(Request $request, $id)
    {
        $todo = Todo::where('user_id', $request->user()->id)->findOrFail($id);

        $todo->update([
            'status' => $request->status,
            'title' => $request->title ?? $todo->title,
            'description' => $request->description ?? $todo->description,
        ]);

        return response()->json($todo);
    }

    // Delete a todo
    public function destroy(Request $request, $id)
    {
        $todo = Todo::where('user_id', $request->user()->id)->findOrFail($id);
        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }
}

