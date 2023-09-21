<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;
use App\Models\Instansi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class PilihinstansiController extends Controller
{
    public function index(): View
    {
        $data_instansi = Instansi::latest()->get();
        return view('katadmin.create', compact('data_instansi'));
    }
}
