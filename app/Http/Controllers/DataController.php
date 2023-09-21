<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $adminCount = User::where('role_id', '1')->count();

        return response()->json($adminCount);
    }
}
