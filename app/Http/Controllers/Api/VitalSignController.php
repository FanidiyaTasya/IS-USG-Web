<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VitalSign;
use Illuminate\Http\Request;

class VitalSignController extends Controller {
    
    public function index() {
        $vital = VitalSign::all();
        return response()->json([
            'success' => true,
            'data' => $vital,
        ], 200);
    }

    public function show($id) {
        $vital = VitalSign::find($id);
        return response()->json([
            'success' => true,
            'data' => $vital,
        ], 200);
    }
}
