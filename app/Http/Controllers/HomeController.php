<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Cabang;
use App\Models\Dokumen;
use App\Models\Instansi;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Role;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.page');
        } else {
            return redirect()->route('user.page');
        }
    }
    public function indexUser()
    {
                // Menghitung jumlah user yang memiliki peran 'admin'
                $adminRole = Role::where('name', 'admin')->first();
                $userRole = Role::where('name','user')->first();
                $dokumen = Dokumen::count();
                $kategori = Kategori::count();
                $instansi = Instansi::count();
                $cabang = Cabang::count();
                $unit = Unit::count();
                $program = Produk::count();
                $produk = Produk::all();
                $program_arsip = Kategori::all();
                $instansi_kat = Instansi::all();
                $data_berita = Berita::all();
                // $programCount = Kategori::where('program');
                
                
                // Count the number of users with the "admin" role
                $adminUserCount = $adminRole->users()->count();
                $userCount = $userRole->users()->count();
                return view('indexUser', compact('adminUserCount','userCount','dokumen','kategori','instansi','cabang','unit','program','produk','program_arsip','instansi_kat','data_berita'));
        
    }
    public function indexAdmin()
    {
        // Menghitung jumlah user yang memiliki peran 'admin'
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name','user')->first();
        $dokumen = Dokumen::count();
        $kategori = Kategori::count();
        $instansi = Instansi::count();
        $cabang = Cabang::count();
        $unit = Unit::count();
        $program = Produk::count();
        $produk = Produk::all();
        $program_arsip = Kategori::all();
        $instansi_kat = Instansi::all();
        $data_berita = Berita::all();
        // $programCount = Kategori::where('program');
        
        
        // Count the number of users with the "admin" role
        $adminUserCount = $adminRole->users()->count();
        $userCount = $userRole->users()->count();
        return view('indexAdmin', compact('adminUserCount','userCount','dokumen','kategori','instansi','cabang','unit','program','produk','program_arsip','instansi_kat','data_berita'));
        
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
}
