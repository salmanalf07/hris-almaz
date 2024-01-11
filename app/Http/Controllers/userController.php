<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class userController extends Controller
{
    public function json()
    {
        $data = User::with('roles')->orderBy('created_at', 'DESC');

        return DataTables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<button id="edit" data-id="' . $data->id . '" type="button" class="btn btn-warning btn-border-radius waves-effect"><i class="far fa-edit"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'not_equal_to:#'],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'password' => ['required', 'min:8'],
                'role.*' => ['required', 'string'],
                'role' => ['required', 'array'],
            ]);

            $post = new User();
            $post->name = $request->name;
            $post->username = str_replace(' ', '', $request->username);
            $post->password = Hash::make($request->password);
            $post->status = "ACTIVE";

            $post->save();

            $user = User::find($post->id);
            // Ambil peran-peran dari input role[]
            $selectedRoles = $request->input('role', []);
            // Sync peran-peran baru ke pengguna
            $user->syncRoles($selectedRoles);

            $data = [$post];
            return response()->json($data);
        } catch (ValidationException $error) {
            $data = [$error->errors(), "error"];
            return response($data);
        }
    }

    public function edit(Request $request)
    {
        $get = User::with("roles")->find($request->id);
        //->first() = hanya menampilkan satu saja dari hasil query
        //->get() = returnnya berbentuk array atau harus banyak data
        return response()->json($get);
    }

    public function update(Request $request)
    {
        try {

            $request->validate([
                'name' => ['required', 'string', 'max:255', 'not_equal_to:#'],
                'username' => ['required', 'string', 'max:255'],
                'role.*' => ['required', 'string'],
            ]);

            $post = User::find($request->id);
            $post->name = $request->name;
            $post->username = str_replace(' ', '', $request->username);
            if ($request->password != null && $post->password != Hash::make($request->password)) {
                $post->password = Hash::make($request->password);
            }
            $post->status = $request->status;

            $post->save();
            // Ambil peran-peran dari input role[]
            $selectedRoles = $request->input('role', []);
            // Sync peran-peran baru ke pengguna
            $post->syncRoles($selectedRoles);

            $data = [$post];
            return response()->json($data);
        } catch (ValidationException $error) {
            $data = [$error->errors(), "error"];
            return response($data);
        }
    }
}
