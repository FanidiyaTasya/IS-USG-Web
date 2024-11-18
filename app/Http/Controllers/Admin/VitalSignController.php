<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VitalSignRequest;
use App\Models\InitialAssessment;
use App\Models\VitalSign;
use RealRashid\SweetAlert\Facades\Alert;

class VitalSignController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $title = 'Hapus!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('pages.vital-sign.vital', [
            'title' => 'Data Tanda Vital',
            'vitalsign' => VitalSign::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('pages.vital-sign.create', [
            'title' => 'Tambah Data Tanda Vital',
            'ass' => InitialAssessment::latest()->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VitalSignRequest $request) {
        // dd($request->all());
        VitalSign::create($request->validated());
        Alert::success('Berhasil!', 'Data Tanda Vital berhasil disimpan.');
        return redirect('/vital-sign');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return view('pages.vital-sign.show', [
            'title' => 'Detail Tanda Vital',
            'vitalSign' => VitalSign::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        // dd($id);
        return view('pages.vital-sign.edit', [
            'title' => 'Ubah Tanda Vital',
            'vs' => VitalSign::find($id),
            'assessment' => InitialAssessment::with('sheep')->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VitalSignRequest $request, $id) {
        $vitalSign = VitalSign::find($id);
        $vitalSign->update($request->validated());

        Alert::success('Berhasil!', 'Data Domba berhasil diubah.');
        return redirect('/vital-sign');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        VitalSign::destroy($id);
        Alert::success('Berhasil!', 'Data Tanda Vital berhasil dihapus.');
        return redirect('/vital-sign');
    }
}
