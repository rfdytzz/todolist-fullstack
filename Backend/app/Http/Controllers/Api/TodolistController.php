<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index() {
        $data = Todolist::all();

        return response()->json([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $data = Todolist::create($validated);

        return response()->json([
            'message' => 'Create Successfully',
            'data' => $data
        ], 201);
    }

    public function show($id) {
        $data = Todolist::findOrFail($id);
        
        return response()->json([
            'data' => $data
        ]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $data = Todolist::findOrFail($id);
        $data->update($validated);

        return response()->json([
            'message' => 'Updated Successfully',
            'data' => $data
        ], 200);
    }

    public function destroy($id) {
        $data = Todolist::findOrFail($id);
        $data->delete();

        return response()->json([
            'message' => 'Deleted Successfully',
        ]);
    }
}
