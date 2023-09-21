<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        // Menghitung jumlah user yang memiliki peran 'admin'
        $adminRole = Role::where('name', 'admin')->first();

        if (!$adminRole) {
            return response()->json(['message' => 'Admin role not found'], 404);
        }

        // Count the number of users with the "admin" role
        $adminUserCount = $adminRole->users()->count();
        return view('indexAdmin', compact('adminUserCount'));
    }
}
