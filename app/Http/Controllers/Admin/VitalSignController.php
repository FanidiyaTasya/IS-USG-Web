<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InitialAssessment;
use App\Models\VitalSign;
use Illuminate\Http\Request;

class VitalSignController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('pages.vital-sign.vital', [
            'title' => 'Tanda Vital'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('pages.vital-sign.create', [
            'title' => 'Tambah Data Tanda Vital',
            'assessments' => InitialAssessment::with('sheep')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VitalSign $vitalSign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VitalSign $vitalSign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VitalSign $vitalSign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VitalSign $vitalSign)
    {
        //
    }
}
