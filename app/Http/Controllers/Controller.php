<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function view(){
        return view('login');
    }

    public function check(Request $request){
//  for validation
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
            );
//  set session value
        $request->session()->put('email',$request['email']);
        $request->session()->put('password',$request['password']);
// get session value 
        $session = session()->get('email');
        $session2 = session()->get('password');
// checker
        if($session == 'admin@admin.com' && $session2 == 'password'){
        return redirect('employees');
        }else{
            return redirect('/');
        }
        
    }

    public function main(){
        return view('employees');
    }
}
