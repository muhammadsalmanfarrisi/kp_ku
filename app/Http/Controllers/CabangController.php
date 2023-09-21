<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;
use App\Models\Instansi;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class CabangController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index(): View
    {
        $data_cabang = Cabang::latest()->get();

        return view('cabang.index', compact('data_cabang'));
    }
    public function create(): View
    {

        return view('cabang.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        Cabang::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'instansi_id' => session('instansi_id'),
        ]);

        return redirect()->route('instansi.show', session('instansi_id'))->with(['success' => 'data berhasil disimpan!']);
    }
    public function show(string $id): View
    {
        session_start();
        session(['cabang_id' => $id]);
        $data_unit = Unit::where('cabang_id', $id)->get();
        return view('cabang.show', compact('data_unit', 'id'));
    }


    public function edit(string $id): View
    {
        $data_cabang = Cabang::findOrFail($id);
        return view('cabang.edit', compact('data_cabang'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $data_cabang = Cabang::findOrFail($id);

       
        $data_cabang->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'instansi_id' => session('instansi_id'),
        ]);

        return redirect()->route('instansi.show', session('instansi_id'))->with(['success' => 'data berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {

        $data_cabang = Cabang::findOrFail($id);
       $data_cabang->delete();
        return redirect()->route('instansi.show', session('instansi_id'))->with(['success' => 'data berhasil dihapus!']);
    }
}
