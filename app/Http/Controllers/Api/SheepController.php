<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SheepRequest;
use App\Models\Sheep;

class SheepController extends Controller {
    
    public function index() {
        $sheep = Sheep::all();
        return response()->json([
            'success' => true,
            'data' => $sheep,
        ], 200);
    }

    public function show($id) {
        $sheep = Sheep::find($id);
        return response()->json([
            'success' => true,
            'data' => $sheep,
        ], 200);
    }

    public function store(SheepRequest $request) {
        $validatedData = $request->validated();
        
        if ($request->hasFile('sheep_photo')) {
            $validatedData['sheep_photo'] = $request->file('sheep_photo')->store('sheep_photos', 'public');
        }

        $sheep = Sheep::create($validatedData);
        return response()->json([
            'success' => true,
            'data' => $sheep,
        ], 201);
    }
}
