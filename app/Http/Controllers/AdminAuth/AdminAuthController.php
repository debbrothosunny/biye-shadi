<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use File;
use App\Models\User;
use App\Models\Admin;
use Auth;
use Hash;

class AdminAuthController extends Controller
{
    
    public function UserProfile(){
       // dd(Auth::guard('admin')->user()->id);
        $profileData = Admin::find(Auth::guard('admin')->user()->id); 
        return view('backend.admin.admin_profile_view',compact('profileData'));
    
        }// End Method


        public function ChangePassword(){
            $profileData = Admin::find(Auth::guard('admin')->user()->id); 
            return view('backend.admin.admin_change_password',compact('profileData'));
        
            }// End Method

            
    public function UpdatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required', 
            'new_password' => 'required|confirmed',
        ]);// End Method

        if (!Hash::check ($request->old_password, auth::guard('admin')->user()->password)) {
        
        $notification = array(
        'message' => 'Old Password Does not Match!',
        'alert-type' => 'error'
      );

        return back ()->with($notification); 
    }
        
    // End Method
    
    
    Admin::whereId (auth::guard('admin')->user()->id)->update([ 'password' => Hash::make($request->new_password)
]);

    return back ()->with('$notification'); // End Method

       
    }

    public function AdminLogOut()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

}

