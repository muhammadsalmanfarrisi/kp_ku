<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;


class DokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index(): View
    {
        $data_dokumen = Dokumen::latest()->get();

        return view('dokumen.index', compact('data_dokumen'));
    }
    public function create(): View
    {

        return view('dokumen.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nomor_nasabah' => 'required',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
        ]);

        $dokumen = $request->file('dokumen');
        $nama_dokumen = 'KLAIM' . date('Ymdhis') . '.' . $request->file('dokumen')->getClientOriginalExtension();
        $path = $dokumen->storeAs('dokumen',$nama_dokumen);
        
        Dokumen::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_nasabah' => $request->nomor_nasabah,
            'dokumen' => $path,
            'kategori_id' => session('kategori_id'),
        ]);

        return redirect()->route('katadmin.show', session('kategori_id'))->with(['success' => 'data berhasil disimpan!']);
    }
    public function show(string $id): View
    {
        $data_dokumen = Dokumen::findOrFail($id);
        return view('dokumen.show', compact('data_dokumen'));
    }


    public function edit(string $id): View
    {
        $data_dokumen = Dokumen::findOrFail($id);
        return view('dokumen.edit', compact('data_dokumen'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nomor_nasabah' => 'required',
            'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
        ]);

        $data_dokumen = Dokumen::findOrFail($id);

        if($request->file('dokumen')){
        $dokumen = $request->file('dokumen');
        $nama_dokumen = 'KLAIM' . date('Ymdhis') . '.' . $request->file('dokumen')->getClientOriginalExtension();
        $path = $dokumen->storeAs('dokumen',$nama_dokumen);

        $old = $data_dokumen->dokumen;
        Storage::delete($old);
    }else{
        $path = $data_dokumen->dokumen;
    }
        $data_dokumen->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_nasabah' => $request->nomor_nasabah,
            'kategori_id' => session('kategori_id'),
            'dokumen' => $path,
        ]);

        return redirect()->route('katadmin.show', session('kategori_id'))->with(['success' => 'data berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {

        $data_dokumen = Dokumen::findOrFail($id);
        Storage::delete($data_dokumen->dokumen);
        $data_dokumen->delete();
        return redirect()->route('katadmin.show', session('kategori_id'))->with(['success' => 'data berhasil dihapus!']);
    }
}
