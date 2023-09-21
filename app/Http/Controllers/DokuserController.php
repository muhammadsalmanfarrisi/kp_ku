<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;


class DokuserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }
    public function index(): View
    {
        $data_dokumen = Dokumen::latest()->get();

        return view('dokuser.index', compact('data_dokumen'));
    }
}
