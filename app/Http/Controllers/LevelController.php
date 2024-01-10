<?php

namespace App\Http\Controllers;

use App\Models\level;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class levelController extends Controller
{
    public function json()
    {
        $data = level::orderBy('created_at', 'DESC');

        return DataTables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<button id="edit" data-id="' . $data->id . '" type="button" class="btn btn-warning btn-border-radius waves-effect"><i class="far fa-edit"></i></button>
                    <button id="delete" data-id="' . $data->id . '" type="button" class="btn btn-danger btn-border-radius waves-effect"><i class="fas fa-trash-alt"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'level' => ['required', 'string', 'max:255'],
            ]);

            $post = new level();
            $post->level = $request->level;
            $post->keterangan = $request->keterangan;
            $post->save();

            $data = [$post];
            return response()->json($data);
        } catch (ValidationException $error) {
            $data = [$error->errors(), "error"];
            return response($data);
        }
    }
    public function edit(Request $request)
    {
        $get = level::find($request->id);
        //->first() = hanya menampilkan satu saja dari hasil query
        //->get() = returnnya berbentuk array atau harus banyak data
        return response()->json($get);
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'level' => ['required', 'string', 'max:255'],
            ]);

            $post = level::find($request->id);
            $post->level = $request->level;
            $post->keterangan = $request->keterangan;
            $post->save();

            $data = [$post];
            return response()->json($data);
        } catch (ValidationException $error) {
            $data = [$error->errors(), "error"];
            return response($data);
        }
    }
    public function delete(Request $request)
    {
        $post = level::find($request->id);
        $post->delete();

        return response()->json($post);
    }
}
