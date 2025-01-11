<?php

namespace App\Http\Controllers\Admin;

use session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login() {
        return view("user/entry");
        
    }
    public function authenticate(Request $request){
        $validator = validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->passes()){
            
        
            if(Auth::guard('user')->attempt(['email'=>$request->email,
            'password' => $request->password],$request->get('remember'))){
                $admin = Auth::guard('user')->user();
                session()->put('userid',$admin->id);
                $access= DB::table('roles')->where('id',$admin->role)->get('access_level');
              
                $access=$access[0]->access_level;
     
               
                if($access==1){
                    return redirect()->route('admin.dashboard');
                    // return 
                    
                }
                if($access==8){
                    return redirect()->route('manager.index');
                    // return 
                    
                }
                else{
                   Auth::guard('user')->logout();
                    return redirect()->route('UserLogin')->with(
                        'error','Email/Password is not authorize'
                    );   
                }
                
            }   else{
                return redirect()->route('UserLogin')->with(
                    'error','Email/Password is incorrect'
                );
           
            }

        }
        else{
             return redirect()->route('UserLogin')
             ->withErrors($validator)
             ->withInput($request->only('email'));
            // return "error";
        }
    
    }
   
}
