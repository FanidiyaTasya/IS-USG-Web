<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Radiology;
use Illuminate\Http\Request;

class RadiologyController extends Controller {
    
    public function index() {
        $radiology = Radiology::all();
        return response()->json([
            'success' => true,
            'data' => $radiology,
        ], 200);
    }

    public function show($id) {
        $radiology = Radiology::find($id);
        return response()->json([
            'success' => true,
            'data' => $radiology,
        ], 200);
    }
}
