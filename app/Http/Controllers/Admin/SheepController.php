<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SheepRequest;
use App\Models\Sheep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function store(SheepRequest $request) {
        $validatedData = $request->validated();
        
        if ($request->hasFile('sheep_photo')) {
            $validatedData['sheep_photo'] = $request->file('sheep_photo')->store('sheep_photos', 'public');
        }

        Sheep::create($validatedData);
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
    public function update(SheepRequest $request, Sheep $sheep) {
        $validatedData = $request->validated();

        if ($request->hasFile('sheep_photo')) {          
            if ($sheep->sheep_photo) {
                Storage::disk('public')->delete($sheep->sheep_photo);
            }
            $validatedData['sheep_photo'] = $request->file('sheep_photo')->store('sheep_photos', 'public');
        }
    
        $sheep->update($validatedData);
        Alert::success('Berhasil!', 'Data Domba berhasil diubah.');
        return redirect('/sheep');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sheep $sheep) {
        if ($sheep->sheep_photo) {
            Storage::disk('public')->delete($sheep->sheep_photo);
        }    
        $sheep->delete();

        Alert::success('Berhasil!', 'Data Domba berhasil dihapus.');
        return redirect('/sheep');
    }
}
