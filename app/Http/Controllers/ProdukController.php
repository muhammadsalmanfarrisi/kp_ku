<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\Instansi;
use DataTables;
use App\Models\Kategori;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProdukController extends Controller
{
    public function index(): View
    {
        $data_produk = Produk::latest()->get();
        return view('produk.index', compact('data_produk'));
    }
    public function create(): View
    {
        return view('produk.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama'  => 'required',
            'deskripsi' => 'required|min:3'
        ]);

        Produk::create([
            'nama'  => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        $data_produk = Produk::findOrFail($id);
        return view('produk.edit', compact('data_produk'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama'  => 'required',
            'deskripsi' => 'required|min:3'
        ]);

        $data_produk = Produk::findOrFail($id);

        $data_produk->update([
            'nama'  => $request->nama,
            'deskripsi'   => $request->deskripsi
        ]);

        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        $data_produk = Produk::findOrFail($id);
        $data_produk->delete();
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function show(string $id): View
    {
        $data_produk = Produk::findOrFail($id);
        return view('produk.show', compact('data_produk'));
    }
}
