<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VitalSignResource;
use App\Models\VitalSign;
use Illuminate\Http\Request;

class VitalSignController extends Controller {
    
    public function index() {
        $vital = VitalSign::orderBy('created_at', 'desc');
        return response()->json([
            'success' => true,
            'data' => VitalSignResource::collection($vital),
        ], 200);
    }

    public function show($id) {
        $vital = VitalSign::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new VitalSignResource($vital),
        ], 200);
    }
}
