<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Instansi;
use App\Models\Produk;
use App\Models\Unit;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function instansi(){
        $data = Instansi::where('nama','LIKE','%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }
    public function produk(){
        $data = Produk::where('nama','LIKE','%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }
    public function cabang($id){
        $data = Cabang::where('instansi_id', $id)->where('nama','LIKE','%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }
    public function unit($id){
        $data = Unit::where('cabang_id', $id)->where('nama','LIKE','%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }
    
}
