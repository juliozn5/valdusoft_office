<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str as Str;
use App\Models\User;

class EmployeesController extends Controller
{ 
    public function index()
    {
        $employees = User::where('profile_id', '=', 3)->paginate(10);

        return view('landing.employees.employees')->with('employees', $employees); 
    }

    public function create(){
        return view('landing.employees.create');
    }

    public function store(Request $request){
        $employee = new User($request->all());
        $employee->slug = Str::slug($request->name."-".$request->last_name);
        $employee->password = Hash::make($request->password);
        $employee->profile_id = 3;
        $employee->save();

        if ($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = $employee->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/users/photos', $name);
            $employee->photo = $name;
        }

        if ($request->hasFile('curriculum')){
            $file2 = $request->file('curriculum');
            $name2 = $employee->id.".".$file2->getClientOriginalExtension();
            $file2->move(public_path().'/uploads/documents/curriculums', $name2);
            $employee->curriculum = $name2;
        }

        $employee->save();

        return redirect()->route('admin.employees')->with('msj-exitoso', 'El empleado ha sido creado con éxito');
    }

    public function show($slug, $id){
        $employee = User::find($id);

        return view('landing.employees.show')->with(compact('employee'));
    }
}
