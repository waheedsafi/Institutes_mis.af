<?php

namespace App\Http\Controllers\Admin;


use view;
use session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Controllers\Admin\AdminController;






class logoutController extends Controller
{
    //

    public function logout(Request $request): RedirectResponse{
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        
        return redirect('/');
     

    }

}
