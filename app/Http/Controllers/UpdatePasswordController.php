<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;


class UpdatePasswordController extends Controller
{
    public function edit(String $id){
        $data_user = User::findOrFail($id);
        return view('password.edit', compact('data_user'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
             ]);

        $data_user = User::findOrFail($id);

        $data_user->update([
        'password' => $request->password,
           ]);

        return redirect()->route('welcome')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
