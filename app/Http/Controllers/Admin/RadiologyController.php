<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RadiologyRequest;
use App\Models\InitialAssessment;
use App\Models\Radiology;
use RealRashid\SweetAlert\Facades\Alert;

class RadiologyController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $title = 'Hapus!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('pages.radiology.radiology', [
            'radiologies' => Radiology::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('pages.radiology.create', [
            'title' => 'Tambah Data Radiologi',
            'assessments' => InitialAssessment::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RadiologyRequest $request) {
        // dd($request->all());
        $validatedData = $request->validated();
        
        if ($request->hasFile('ultrasound_image')) {
            $validatedData['ultrasound_image'] = $request->file('ultrasound_image')->store('ultrasound_images', 'public');
        }
        Radiology::create($validatedData);
        Alert::success('Berhasil!', 'Data Radiologi berhasil disimpan.');
        return redirect('/radiology');
    }

    /**
     * Display the specified resource.
     */
    public function show(Radiology $radiology) {
        return view('pages.radiology.show', [
            'title' => 'Detail Tanda Vital',
            'rad' => Radiology::findOrFail($radiology->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Radiology $radiology) {
        return view('pages.radiology.edit', [
            'title' => 'Ubah Data Radiologi',
            'radiology' => $radiology,
            'assessment' => InitialAssessment::find($radiology),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RadiologyRequest $request, Radiology $radiology) {
        $radiology = Radiology::find($radiology->id);
        $radiology->update($request->validated());

        Alert::success('Berhasil!', 'Data Radiologi berhasil diubah.');
        return redirect('/radiology');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Radiology $radiology) {
        Radiology::destroy($radiology->id);
        Alert::success('Berhasil!', 'Data Radiologi berhasil dihapus.');
        return redirect('/radiology');
    }
}
