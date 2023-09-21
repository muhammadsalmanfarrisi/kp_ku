<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Kategori;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;


class BeritaController extends Controller
{
    public function index(): View
    {
        $data_berita = Berita::latest()->get();
        return view('berita.index', compact('data_berita'));
    }
    public function create(): View
    {
        return view('berita.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,svg,ico,pdf',
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = 'gambar' . date('Ymdhis') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $path = $gambar->storeAs('gambar',$nama_gambar);
        
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $path,
        ]);

        return redirect()->route('berita.index')->with(['success' => 'data berhasil disimpan!']);
    }
    public function edit(string $id): View
    {
        $data_berita = Berita::findOrFail($id);
        return view('berita.edit', compact('data_berita'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,svg,ico,pdf',
        ]);

        $data_berita = Berita::findOrFail($id);

       if($request->file('gambar')){
        $gambar = $request->file('gambar');
        $nama_gambar = 'KLAIM' . date('Ymdhis') . '.' . $request->file('gambar')->getClientOriginalExtension();
        $path = $gambar->storeAs('gambar',$nama_gambar);

        $old = $data_berita->gambar;
        Storage::delete($old);
    }else{
        $path = $data_berita->gambar;
    }
        $data_berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $path,
        ]);

        return redirect()->route('berita.index')->with(['success' => 'data berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        $data_berita = Berita::findOrFail($id);
        Storage::delete($data_berita->gambar);
        $data_berita->delete();
        return redirect()->route('berita.index')->with(['success' => 'data berhasil dihapus!']);
    }
    public function show(string $id): View
    {
        $data_lain = Berita::latest()->get();
        $data_berita = Berita::findOrFail($id);
        return view('berita.show', compact('data_berita', 'data_lain'));
    }
}
