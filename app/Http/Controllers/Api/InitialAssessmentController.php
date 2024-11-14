<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InitialAssessmentResource;
use App\Models\InitialAssessment;
use Illuminate\Http\Request;

class InitialAssessmentController extends Controller {
    
    public function index() {
        $assessment = InitialAssessment::orderBy('created_at', 'desc');
        return response()->json([
            'success' => true,
            'data' => InitialAssessmentResource::collection($assessment),
        ], 200);
    }

    public function show($id) {
        $assessment = InitialAssessment::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => new InitialAssessmentResource($assessment),
        ], 200);
    }
}
