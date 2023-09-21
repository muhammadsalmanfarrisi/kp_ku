<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class ChangePasswordController extends Controller
{
    public function show()
{
    return view('auth.password');
}

public function update(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        'password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();
    if (!Hash::check($request->old_password, $user->password)) {
        return redirect()->back()->with('error', 'Password lama tidak cocok.');
    }

    $user->update([
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('home')->with('success', 'Password berhasil diubah.');
}

}
