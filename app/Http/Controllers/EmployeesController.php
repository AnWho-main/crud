<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    public function view(){
        $employees = Employees::all();
        $data = compact('employees');
        return view('employees')->with($data);
    }

    public function add(){
        $employees = Employees::find('10');
        $url = url('/addemp/');
        $title = "Add Employee Details";
        $data = compact('employees','url','title');
        return view('addemp')->with($data); 
        }

    public function store(Request $request){

        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
            ]
        );

         $employees = new Employees;
         $employees->firstname = $request['firstname'];
         $employees->lastname = $request['lastname'];
         $employees->email = $request['email'];
         $employees->phone = $request['phone'];
         $employees->save();
            return redirect('employees');
    }

    public function delete($id){
        $employees = Employees::find($id)->delete();
        return redirect('employees');
    }

    public function edit($id){
        $employees = Employees::find($id);
        if(is_null($employees)){
            return redirect('employees');
        }else{
            $url = url('/employees/update') . "/" . $id; 
            $title = "Update Employee Details"; 
            $data  = compact('employees','url','title');
            return view('addemp')->with($data);
        }
    }

    public function update($id,Request $request){
        $employees = Employees::find($id);
        $employees->firstname = $request['firstname'];
        $employees->lastname = $request['lastname'];
        $employees->email = $request['email'];
        $employees->phone = $request['phone'];
        $employees->save();

        return redirect('employees');
    }
}
