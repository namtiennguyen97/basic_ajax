<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index()
    {
        $computer = Computer::all();
        return view('computer.index', compact('computer'));
    }

    public function store(Request $request)
    {
        $computer = Computer::create($request->all());
        return response()->json($computer);
    }

    public function delete($id)
    {
        Computer::destroy($id);
    }

    public function show($id)
    {
        $computer = Computer::findOrFail($id);
        return response()->json($computer);
    }

    public function update(Request $request, $id)
    {
        Computer::findOrFail($id)->update($request->all());
    }
}
