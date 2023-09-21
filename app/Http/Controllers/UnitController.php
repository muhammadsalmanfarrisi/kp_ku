<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;


class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index(): View
    {
        $data_unit = Unit::latest()->get();

        return view('unit.index', compact('data_unit'));
    }
    public function create(): View
    {

        return view('unit.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        Unit::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'cabang_id' => session('cabang_id'),
        ]);

        return redirect()->route('cabang.show', session('cabang_id'))->with(['success' => 'data berhasil disimpan!']);
    }
    public function show(string $id): View
    {
        session_start();
        session(['unit_id' => $id]);
        $data_unit = Unit::where('unit_id', $id)->get();
        return view('unit.show', compact('data_unit', 'id'));
    }


    public function edit(string $id): View
    {
        $data_unit = Unit::findOrFail($id);
        return view('unit.edit', compact('data_unit'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $data_unit = Unit::findOrFail($id);

       
        $data_unit->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'cabang_id' => session('cabang_id'),
        ]);

        return redirect()->route('cabang.show', session('cabang_id'))->with(['success' => 'data berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {

        $data_unit = Unit::findOrFail($id);
       $data_unit->delete();
        return redirect()->route('cabang.show', session('cabang_id'))->with(['success' => 'data berhasil dihapus!']);
    }
}
