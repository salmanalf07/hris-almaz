<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class employeeController extends Controller
{
    public function json()
    {
        $data = employee::with('details.levels')->get();

        return DataTables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<button id="edit" data-id="' . $data->id . '" type="button" class="btn btn-warning btn-border-radius waves-effect"><i class="far fa-edit"></i></button>
                    <button id="delete" data-id="' . $data->id . '" type="button" class="btn btn-danger btn-border-radius waves-effect"><i class="far fa-edit"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }
}
