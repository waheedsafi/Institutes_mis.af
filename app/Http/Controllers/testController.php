<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Permissions\HasPermissionsTrait;

class testController extends Controller
{
    //
    use HasPermissionsTrait;
    public function index(){
        

        
        // $user = User::find($userId);
       $user = Auth::user();

        if ($user->hasPermissionTo('view-student')) {
            // User has permission to edit posts
            return 'hello';

            // Your logic here
        } else {
            // User does not have permission to edit posts
            // Your logic here
        }
    $user = Auth::user(); 
    dd($user->can('view-home'));
dd($user->can('view-studnet'));


    if( $user->can('view-student')){
        return view('home');
    }
    else{
        return 'You have not permission';
    }
    }
}
