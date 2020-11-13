<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    public function index(){
        $accessory = Accessory::all();
        return view('computer.index', compact('accessory'));
    }
    public function store(Request $request){
        $acc = new Accessory();
        $acc->name = $request->input('name');
        $acc->vendor = $request->input('vendor');
        $acc->price = $request->input('price');
        if ($request->hasFile('image')){
            $images = $request->file('image');
            $path = $images->store('images','public');
            $acc->image = $path;
        }
        $acc->save();
        return response()->json($acc);
    }

    public function create(){
        return view('accessory.accessory');
    }
}
