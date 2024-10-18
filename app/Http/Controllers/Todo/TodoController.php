<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Todo::orderBy("task","asc")->get();

        return view('to-do.app', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|min:3|max:25'
        ], [
            'task.required' => 'Anda harus wajid mengisi task', 
            'task.min' => 'Anda harus wajib mengisi task minimal 10 character',
            'task.max' => 'Anda harus wajib mengisi task Maksimum 25 character',
        ]);

        $data = [
            "task" => $request-> input("task")
        ];

        Todo::create($data);

        return redirect()->route('to-do')->with("success","Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|min:3|max:50'
        ], [
            'task.required' => 'Anda harus wajid mengisi task', 
            'task.min' => 'Anda harus wajib mengisi task minimal 10 character',
            'task.max' => 'Anda harus wajib mengisi task Maksimum 25 character',
        ]);

        $data = [
            "task" => $request-> input("task"),
            "is_done" => $request->input("is_done")
        ];

        Todo::where("id",$id)->update($data);
        return redirect()->route("to-do")->with("success","Data berhasil diupdate");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
