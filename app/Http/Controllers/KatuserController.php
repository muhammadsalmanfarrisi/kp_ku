<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Dokumen;
use Illuminate\View\View;
use DataTables;

class KatuserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }
    public function index(): View
    {
        $data_kategori = Kategori::latest()->get();

        return view('katuser.index', compact('data_kategori'));
        return DataTables::of($data_kategori)->toJson();
    }

    public function show(string $id): View
    {
        
        $data_dokumen = Dokumen::where('kategori_id', $id)->get();
        return view('katuser.show', compact('data_dokumen', 'id'));
    }
    public function dokumen(): View
    {
        $data_dokumen = Dokumen::latest()->get();

        return view('dokumen.index', compact('data_dokumen'));
    }
}
