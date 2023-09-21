<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use App\Models\Instansi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InstansiController extends Controller
{
    public function index(): View
    {
        $data_instansi = Instansi::latest()->get();
        return view('instansi.index', compact('data_instansi'));
    }
    public function create(): View
    {
        return view('instansi.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama'  => 'required|min:3',
            'alamat' => 'required|min:3'
        ]);

        Instansi::create([
            'nama'  => $request->nama,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('instansi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        $data_instansi = Instansi::findOrFail($id);
        return view('instansi.edit', compact('data_instansi'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama'  => 'required|min:3',
            'alamat' => 'required|min:3'
        ]);

        $data_instansi = Instansi::findOrFail($id);

        $data_instansi->update([
            'nama'  => $request->nama,
            'alamat'    => $request->alamat
        ]);

        return redirect()->route('instansi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        $data_instansi = Instansi::findOrFail($id);
        $data_instansi->delete();
        return redirect()->route('instansi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function show(string $id): View
    {
        session_start();
        session(['instansi_id' => $id]);
        $data_cabang = Cabang::where('instansi_id', $id)->get();
        return view('instansi.show', compact('data_cabang', 'id'));
    }
}
