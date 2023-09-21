<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Dokumen;
use App\Models\Instansi;
use DataTables;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KatadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index(): View
    {
        $data_kategori = Kategori::latest()->get();

        return view('katadmin.index', compact('data_kategori'));
        return DataTables::of($data_kategori)->toJson();
    }
    public function create(): View
    {
        return view('katadmin.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'keputusan' => 'required',
            'instansi' => 'required',
            'produk' => 'required',
            'nomor_surat' => 'required',
            'cabang' => 'required',
            'unit' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        $instansi = Instansi::find($request->instansi);
        $cabang = Cabang::find($request->cabang);
        $unit = Unit::find($request->unit);
        $produk = Produk::find($request->produk);

        Kategori::create([
            'ruang' => $request->ruang,
            'keputusan' => $request->keputusan,
            'instansi' => $instansi->nama,
            'program' => $produk->nama,
            'nomor_surat' => $request->nomor_surat,
            'cabang' => $cabang->nama,
            'unit' => $unit->nama,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('katadmin.index')->with(['success' => 'data berhasil disimpan!']);
    }
    public function show(string $id): View
    {
        session_start();
        session(['kategori_id' => $id]);
        $data_dokumen = Dokumen::where('kategori_id', $id)->get();
        return view('katadmin.show', compact('data_dokumen', 'id'));
    }

    public function edit(string $id): View
    {
        $data_kategori = Kategori::findOrFail($id);
        return view('katadmin.edit', compact('data_kategori'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'keputusan' => 'required',
            'instansi' => 'required',
            'program' => 'required',
            'nomor_surat' => 'required',
            'cabang' => 'required',
            'unit' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        $data_kategori = Kategori::findOrFail($id);

        $data_kategori->update([
            'ruang' => $request->ruang,
            'keputusan' => $request->keputusan,
            'instansi' => $request->instansi,
            'program' => $request->program,
            'nomor_surat' => $request->nomor_surat,
            'cabang' => $request->cabang,
            'unit' => $request->unit,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('katadmin.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {

        $data_kategori = Kategori::findOrFail($id);

        $data_kategori->delete();

        return redirect()->route('katadmin.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
