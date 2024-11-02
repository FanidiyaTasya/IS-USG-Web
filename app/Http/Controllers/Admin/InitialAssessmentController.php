<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InitialAssessment;
use App\Models\Sheep;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InitialAssessmentController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $title = 'Hapus!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        
        return view('pages.assessment.assessment', [
            'title' => 'Pemeriksaan Awal',
            'assessments' => InitialAssessment::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('pages.assessment.create', [
            'title' => 'Tambah Data Pemeriksaan Awal',
            'sheep' => Sheep::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        InitialAssessment::create([
            'sheep_id' => $request->sheep_id,
            'user_id' => $request->user_id,
            'symptom_1' => $request->symptom_1,
            'symptom_2' => $request->symptom_2,
            'symptom_3' => $request->symptom_3,
            'check_date' => $request->check_date,
            'desc' => $request->desc,
        ]);
        Alert::success('Berhasil!', 'Data Pemeriksaan Awal berhasil disimpan.');
        return redirect('/assessment');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return view('pages.assessment.show', [
            'title' => 'Detail Pemeriksaan Awal',
            'assessment' => InitialAssessment::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        return view('pages.assessment.edit', [
            'title' => 'Ubah Pemeriksaan Awal',
            'assessment' => InitialAssessment::find($id),
            'sheep' => Sheep::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'sheep_id' => 'required|exists:sheep,id',
            'symptom_1' => 'required|string|max:255',
            'symptom_2' => 'nullable|string|max:255',
            'symptom_3' => 'nullable|string|max:255',
            'check_date' => 'required|date',
            'desc' => 'nullable|string',
        ]);    
        $initialAssessment = InitialAssessment::find($id);
        $initialAssessment->update($validated);
    
        Alert::success('Success!', 'Assessment updated successfully');
        return redirect()->route('assessment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $initialAssessment = InitialAssessment::find($id);
        $initialAssessment->delete();

        Alert::success('Berhasil!', 'Data pemeriksaan awal berhasil dihapus.');
        return redirect()->route('assessment.index')->with('success', 'Data pemeriksaan awal berhasil dihapus.');
    }
}
