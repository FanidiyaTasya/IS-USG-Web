<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InitialAssessment;
use Illuminate\Http\Request;

class InitialAssessmentController extends Controller {
    
    public function index() {
        $assessment = InitialAssessment::all();
        return response()->json([
            'success' => true,
            'data' => $assessment,
        ], 200);
    }

    public function show($id) {
        $assessment = InitialAssessment::find($id);
        return response()->json([
            'success' => true,
            'data' => $assessment,
        ], 200);
    }
}
