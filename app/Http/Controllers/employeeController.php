<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\employee;
use App\Models\employee_bank;
use App\Models\employee_detail;
use App\Models\employee_document;
use App\Models\level;
use App\Models\typeEmployee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class employeeController extends Controller
{
    public function json()
    {
        $data = employee::with('details.levels', 'details.departments')->get();

        return DataTables::of($data)
            ->addColumn('aksi', function ($data) {
                return
                    '<a href="' . route("editEmployee", ["id" => $data->id]) . '" class="btn btn-warning btn-border-radius waves-effect"><i class="far fa-edit"></i></a>
                <button id="delete" data-id="' . $data->id . '" type="button" class="btn btn-danger btn-border-radius waves-effect"><i class="fas fa-trash-alt"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validate the form data
            $request->validate([
                'name' => 'required|string',
                'birth' => 'required',
                'gander' => 'required|in:M,F',
                'phone' => 'nullable|string',
                'address' => 'nullable|string',
                'username' => 'nullable|string',
                'password' => 'nullable|string',
                'role.*' => ['nullable', 'string'],
                'role' => ['nullable', 'array'],
                'levelId' => 'required|exists:levels,id',
                'deptId' => 'required|exists:departments,id',
                'jointDate' => 'required',
                'typeEmployee' => 'required|exists:type_employees,id',
                'contractNo' => 'nullable|string',
                'contractSt' => 'nullable',
                'contractEd' => 'nullable',
                'status' => 'required|in:Active,Resign',
                'photo' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
                'ktpNumber' => 'nullable|string|min:3|max:16',
                'ktp' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
                'kkNumber' => 'nullable|string|min:3|max:16',
                'kk' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
                'npwpNumber' => 'nullable|string|min:3|max:16',
                'npwp' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
                'ijazah' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
                'bankName' => 'nullable|string',
                'accNumber' => 'nullable|string',
                'accName' => 'nullable|string',
                'acclocation' => 'nullable|string',
            ]);


            if ($request->username != null && $request->password != null) {
                //ADD USER
                $post = new User();
                $post->name = $request->name;
                $post->username = str_replace(' ', '', $request->username);
                $post->password = Hash::make($request->password);
                $post->status = "NONACTIVE";

                $post->save();

                $user = User::find($post->id);
                // Ambil peran-peran dari input role[]
                $selectedRoles = $request->input('role', []);
                // Sync peran-peran baru ke pengguna
                $user->syncRoles($selectedRoles);
                //END USER
            }


            //ADD EMPLOYEE
            $record = Employee::latest()->first();
            if ($record === null) {
                $EmpId = 1;
            } else {
                $EmpId = $record->empId + 1;
            }
            $employee = new Employee();
            $employee->empId = $EmpId;
            $employee->name = $request->name;
            $employee->birth = date('Y-m-d', strtotime(str_replace('/', '-', $request->birth)));
            $employee->gander = $request->gander;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->UserId = isset($post->id) ? $post->id : null;
            $employee->save();
            //END EMPLOYEE

            //ADD EMPLOYEE DETAILS
            $employeeDetail = new employee_detail();
            $employeeDetail->empId = $employee->id;
            $employeeDetail->levelId = $request->levelId;
            $employeeDetail->deptId = $request->deptId;
            $employeeDetail->joinDate = date('Y-m-d', strtotime(str_replace('/', '-', $request->jointDate)));
            $employeeDetail->typeEmployeeId = $request->typeEmployee;
            $employeeDetail->contractNo = $request->contractNo;
            $employeeDetail->contractSt = date('Y-m-d', strtotime(str_replace('/', '-', $request->contractSt)));
            $employeeDetail->contractEd = date('Y-m-d', strtotime(str_replace('/', '-', $request->contractEd)));
            $employeeDetail->status = $request->status;
            $employeeDetail->save();
            //END EMPLOYEE DETAILS

            //ADD EMPLOYEE FILE

            $employeeDocument = new employee_document();
            $employeeDocument->empId = $employee->id;
            $employeeDocument->photo = $this->storeFile($request->file('photo'), 'documents/photos', $employee->name, null);
            $employeeDocument->ktpNumber = $request->ktpNumber;
            $employeeDocument->ktp = $this->storeFile($request->file('ktp'), 'documents/ktp', $employee->name, null);
            $employeeDocument->kkNumber = $request->kkNumber;
            $employeeDocument->kk =  $this->storeFile($request->file('kk'), 'documents/kk', $employee->name, null);
            $employeeDocument->npwpNumber = $request->npwpNumber;
            $employeeDocument->npwp = $this->storeFile($request->file('npwp'), 'documents/npwp', $employee->name, null);
            $employeeDocument->ijazah = $this->storeFile($request->file('ijazah'), 'documents/ijazah', $employee->name, null);

            $employeeDocument->save();

            //END EMPLOYEE FILE

            //ADD EMPLOYEE BANK
            $employeeBank = new employee_bank();
            $employeeBank->empId = $employee->id;
            $employeeBank->bankName = $request->bankName;
            $employeeBank->accNumber = $request->accNumber;
            $employeeBank->accName = $request->accName;
            $employeeBank->acclocation = $request->acclocation;
            $employeeBank->save();
            //END EMPLOYEE BANK

            DB::commit(); // Commit transaksi jika semua proses berhasil

            // Redirect ke halaman sukses atau lakukan hal lainnya

            return response()->json($employee);
        } catch (ValidationException $error) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            $data = [$error->errors(), "error"];
            return response($data);
        }
    }

    protected function storeFile($file, $directory, $fileNamePrefix, $currentFile)
    {
        if (!$file) {
            return null;
        }
        if ($currentFile != null) {
            Storage::disk('public')->delete($currentFile);
        }
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileNamePrefix . '_' . Str::uuid() . '.' . $extension;

        // Simpan file ke penyimpanan yang telah dikonfigurasi di Laravel
        $path = $directory . '/' . $fileName;
        Storage::disk('public')->put($path,  File::get($file));

        return $path;
    }

    public function edit(Request $request, $id)
    {
        $get = employee::with('users.roles', 'details', 'files', 'banks')->find($id);
        //->first() = hanya menampilkan satu saja dari hasil query
        //->get() = returnnya berbentuk array atau harus banyak data
        $typeEmployee = typeEmployee::get();
        $level = level::get();
        $department = department::get();
        $role = Role::all();
        //return $get;
        return view('employee/editorEmployee', ['judul' => "Employee", 'subJudul' => "Add", 'typeEmployee' => $typeEmployee, 'level' => $level, 'department' => $department, 'role' => $role, 'aksi' => 'editData', 'data' => $get]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validate the form data
            $request->validate([
                'name' => 'required|string',
                'birth' => 'required',
                'gander' => 'required|in:M,F',
                'phone' => 'nullable|string',
                'address' => 'nullable|string',
                'username' => 'nullable|string',
                'password' => 'nullable|string',
                'role.*' => ['nullable', 'string'],
                'role' => ['nullable', 'array'],
                'levelId' => 'required|exists:levels,id',
                'deptId' => 'required|exists:departments,id',
                'jointDate' => 'required',
                'typeEmployee' => 'required|exists:type_employees,id',
                'contractNo' => 'nullable|string',
                'contractSt' => 'nullable',
                'contractEd' => 'nullable',
                'status' => 'required|in:Active,Resign',
                'photo' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
                'ktpNumber' => 'nullable|string|min:3|max:16',
                'ktp' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
                'kkNumber' => 'nullable|string|min:3|max:16',
                'kk' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
                'npwpNumber' => 'nullable|string|min:3|max:16',
                'npwp' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
                'ijazah' => 'nullable|file|mimes:jpeg,png,jpg|max:1024',
                'bankName' => 'nullable|string',
                'accNumber' => 'nullable|string',
                'accName' => 'nullable|string',
                'accLocation' => 'nullable|string',
            ]);
            $employee = employee::find($request->id);

            if ($request->username != null) {
                //ADD USER
                $post = User::findOrNew($employee->userId);
                $post->name = $request->name;
                $post->username = str_replace(' ', '', $request->username);
                if ($request->password != null && $post->password != Hash::make($request->password)) {
                    $post->password = Hash::make($request->password);
                }
                $post->save();

                $user = User::find($post->id);
                // Ambil peran-peran dari input role[]
                $selectedRoles = $request->input('role', []);
                // Sync peran-peran baru ke pengguna
                $user->syncRoles($selectedRoles);
                //END USER
            }

            //ADD EMPLOYEE

            $employee->name = $request->name;
            $employee->birth = date('Y-m-d', strtotime(str_replace('/', '-', $request->birth)));
            $employee->gander = $request->gander;
            $employee->phone = $request->phone;
            $employee->address = $request->address;
            $employee->UserId = $post->id;
            $employee->save();
            //END EMPLOYEE

            //ADD EMPLOYEE DETAILS
            $employeeDetail = employee_detail::where('empId', $employee->id)->first();
            $employeeDetail->empId = $employee->id;
            $employeeDetail->levelId = $request->levelId;
            $employeeDetail->deptId = $request->deptId;
            $employeeDetail->joinDate = date('Y-m-d', strtotime(str_replace('/', '-', $request->jointDate)));
            $employeeDetail->typeEmployeeId = $request->typeEmployee;
            $employeeDetail->contractNo = $request->contractNo;
            $employeeDetail->contractSt = date('Y-m-d', strtotime(str_replace('/', '-', $request->contractSt)));
            $employeeDetail->contractEd = date('Y-m-d', strtotime(str_replace('/', '-', $request->contractEd)));
            $employeeDetail->status = $request->status;
            $employeeDetail->save();
            //END EMPLOYEE DETAILS

            //ADD EMPLOYEE FILE

            $employeeDocument = employee_document::where('empId', $employee->id)->first();
            $employeeDocument->empId = $employee->id;
            if ($request->file('photo') != null) {
                $employeeDocument->photo = $this->storeFile($request->file('photo'), 'documents/photos', $employee->name, $employeeDocument->photo);
            }
            $employeeDocument->ktpNumber = $request->ktpNumber;
            if ($request->file('ktp') != null) {
                $employeeDocument->ktp = $this->storeFile($request->file('ktp'), 'documents/ktp', $employee->name, $employeeDocument->ktp);
            }
            $employeeDocument->kkNumber = $request->kkNumber;
            if ($request->file('kk') != null) {
                $employeeDocument->kk =  $this->storeFile($request->file('kk'), 'documents/kk', $employee->name, $employeeDocument->kk);
            }
            $employeeDocument->npwpNumber = $request->npwpNumber;
            if ($request->file('npwp') != null) {
                $employeeDocument->npwp = $this->storeFile($request->file('npwp'), 'documents/npwp', $employee->name, $employeeDocument->npwp);
            }
            if ($request->file('ijazah') != null) {
                $employeeDocument->ijazah = $this->storeFile($request->file('ijazah'), 'documents/ijazah', $employee->name, $employeeDocument->ijazah);
            }

            $employeeDocument->save();

            //END EMPLOYEE FILE

            //ADD EMPLOYEE BANK
            $employeeBank = employee_bank::where('empId', $employee->id)->first();
            $employeeBank->empId = $employee->id;
            $employeeBank->bankName = $request->bankName;
            $employeeBank->accNumber = $request->accNumber;
            $employeeBank->accName = $request->accName;
            $employeeBank->acclocation = $request->acclocation;
            $employeeBank->save();
            //END EMPLOYEE BANK

            DB::commit(); // Commit transaksi jika semua proses berhasil

            // Redirect ke halaman sukses atau lakukan hal lainnya

            return response()->json($employee);
        } catch (ValidationException $error) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            $data = [$error->errors(), "error"];
            return response($data);
        }
    }

    public function delete(Request $request)
    {
        $employee = employee::find($request->id);
        $employee->delete();

        $employeeDetail = employee_detail::where('empId', $request->id);
        $employeeDetail->delete();

        $employeeFile = employee_document::where('empId', $request->id);
        $employeeFile->delete();

        $employeeBank = employee_bank::where('empId', $request->id);
        $employeeBank->delete();

        return response()->json($employee);
    }
}
