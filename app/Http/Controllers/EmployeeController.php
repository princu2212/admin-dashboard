<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function index()
    {
        $users = Employee::get();
        return view('users.table', compact('users'));
    }


    public function store(Request $request)
    {
        $user = new Employee();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->password = $request->password;
        $user->gender = $request->gender;

        if ($request->profile_photo) {
            $file_name = time() . '.' . $request->profile_photo->extension();
            $user->profile_photo = $file_name;
        }

        $user->class = $request->class;
        $user->status = $request->status;
        $user->created_by = $request->created_by;
        $user->created_at = $request->created_at;
        $user->modified_by = $request->modified_by;
        $user->modified_at = $request->modified_at;
        $user->save();

        if ($request->profile_photo) {
            $file_path = public_path('user-uploads/users');
            $request->profile_photo->move($file_path, $file_name);
        }

        return redirect('table');
    }

    public function edit($id)
    {
        $user = Employee::find($id);
        return view('users.edit', ['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $user = Employee::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->class = $request->class;
        $user->status = $request->status;
        $user->created_by = $request->created_by;
        $user->modified_by = $request->modified_by;
        $user->save();

        return redirect('table');
    }

    public function destroy($id)
    {
        $user = Employee::find($id);
        $user->delete();

        return redirect('table');
    }
}
