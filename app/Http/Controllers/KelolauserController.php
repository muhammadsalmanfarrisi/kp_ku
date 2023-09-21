<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;


class KelolauserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index(): View
    {
        $data_user = User::latest()->get();

        return view('kelola-user.index', compact('data_user'));
        return DataTables::of($data_user)->toJson();
    }
    public function create(): View
    {
        return view('kelola-user.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required']
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ])->assignRole($request->role);

        return redirect()->route('kelola-user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $data_dokumen = User::where('kategori_id', $id)->get();
        return view('kelola-user.show', compact('data_dokumen', 'id'));
    }

    public function edit(string $id): View
    {
        $data_user = User::findOrFail($id);
        return view('kelola-user.edit', compact('data_user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $data_user = User::findOrFail($id);

        if ($request->email != $data_user->email) {
            $this->validate($request, [
                'nama' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'role' => ['required']
            ]);
        }else{
            $this->validate($request, [
                'nama' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'role' => ['required']
            ]);
        }

        $data_user->name = $request->nama;
        $data_user->email = $request->email;
        if (!empty($request->password)) {
            if ($request->password != $data_user->password){
            $data_user->password = Hash::make($request->password);
        }
        }
        $data_user->save();

        // Berikan peran kepada pengguna
        $data_user->syncRoles([$request->role]);

        return redirect()->route('kelola-user.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {

        $data_user = User::findOrFail($id);

        $data_user->delete();

        return redirect()->route('kelola-user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
