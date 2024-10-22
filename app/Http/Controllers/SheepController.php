<?php

namespace App\Http\Controllers;

use App\Models\Sheep;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SheepController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $title = 'Hapus!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('pages.sheep.sheep',
        [
            'title' => 'Data Domba',
            'sheep' => Sheep::orderBy('created_at', 'desc')->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('pages.sheep.create', [
            'title' => 'Tambah Data Domba'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        Sheep::create([
            'sheep_name' => $request->sheep_name,
            'sheep_birth' => $request->sheep_birth,
            'sheep_gender' => $request->sheep_gender,
        ]);
        Alert::success('Berhasil!', 'Data Domba berhasil disimpan.');
        return redirect('/sheep');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sheep $sheep) {
        return view('pages.sheep.show', [
            'title' => 'Detail Data Domba',
            'sheep' => Sheep::findOrFail($sheep->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sheep $sheep) {
        return view('pages.sheep.edit', [
            'title' => 'Ubah Data Domba',
            'sheep' => $sheep
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sheep $sheep) {
        $sheep->update([
            'sheep_name' => $request->sheep_name,
            'sheep_birth' => $request->sheep_birth,
            'sheep_type' => $request->sheep_type,
        ]);
        Alert::success('Berhasil!', 'Data Domba berhasil diubah.');
        return redirect('/sheep');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sheep $sheep) {
        Sheep::destroy($sheep->id);
        Alert::success('Berhasil!', 'Data Domba berhasil dihapus.');
        return redirect('/sheep');
    }
}
