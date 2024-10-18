<?php

namespace App\Http\Controllers;

use App\Models\radiology;
use Illuminate\Http\Request;

class RadiologyController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('pages.radiology.radiology');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(radiology $radiology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(radiology $radiology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, radiology $radiology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(radiology $radiology)
    {
        //
    }
}
