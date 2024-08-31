<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\{User, YourPersonalData, EducationalQualifications, FamilyInformation, OccupationalInformation, MarriageRelated, LifePartner, Payment};

use File;
use Hash;
use Mail;

class UserAuthController extends Controller
{

    ////////////////////Creating Your Account/////////////////

    public function UserDashboard()
    {

        $user_id = Auth::user()->id;
        $personal_data = YourPersonalData::where('user_id', $user_id)->first();
        $edu_data = EducationalQualifications::where('user_id', $user_id)->first();
        $family_data = FamilyInformation::where('user_id', $user_id)->first();
        $ocu_data = OccupationalInformation::where('user_id', $user_id)->first();
        $marriage_data = MarriageRelated::where('user_id', $user_id)->first();
        $life_partner_data = LifePartner::where('user_id', $user_id)->first();   

        return view('backend.user.user_dashboard', compact('personal_data', 'edu_data', 'family_data', 'ocu_data', 'marriage_data', 'life_partner_data'));

    }
    
    // Register

    public function user_register_page(Request $request)
    {
        $reg_user = User::where('user_id', 'like', "%$request->search%")->where('status', 'like', "%$request->status%")
            ->paginate(50);

        return view('backend.user.user_register_page', compact('reg_user'));
    }

    public function user_Register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            // 'user_id'=>'required|max:255',
            'email' => 'required|email|unique:users',
            'number' => 'required|digits:11',
            'password' => 'required|min:6|confirmed',
        ]);

        $characters = '0123456789';
        $charactersNumber = strlen($characters);
        $codeLength = 8;
        $user_id = 'U' . '';

        while (strlen($user_id) < 8) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $user_id = $user_id . $character;
        }

        if (User::where('user_id', $user_id)->exists()) {
            $this->generateUniqueCode();
        }

        $User = new User;
        $User->name = $request->name;
        $User->user_id = $user_id;
        $User->email = $request->email;
        $User->number = $request->number;
        $User->password =  $request->password;
        $User->save();
       
        return back()->with('Message', 'Welcome Abroad You Can Now Login And Create Your Profile');


        // $success = [
        //     'message' => 'Account Create Successfully',
        //     'alert-type' => 'success',
        // ];

        // $fail = [
        //     'message' => 'Something  Wrong',
        //     'alert-type' => 'error',
        // ];
    }
    
    // Update
    public function user_Register_page_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            // 'user_id'=>'required|max:255',
            'email' => 'nullable|email|unique:users',
            'number' => 'required',
            'password' => 'required|min:6',
        ]);


        $User = User::find($id);
        $User->name = $request->name;
        if($request->email){
            $User->email = $request->email;
        }
        $User->number = $request->number;
        $User->password = $request->password;
        $User->show_password = $request->password;
                
        $User->save();

        $success = [
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }
    }
    
    // Delete
    public function user_Register_delete(Request $request, $id)
    {
       $data = User::find($id); 
       if($data){
        $personal_data = YourPersonalData::where('user_id', $id)->first(); 
            if($personal_data){
                $p_img = YourPersonalData::find($personal_data->id); 
                if($p_img->img){
                    if (File::exists('assets/img/uploaded/profile/'.$p_img->img)) {
                        File::delete('assets/img/uploaded/profile/'.$p_img->img);
                    }
                }
                $p_img->delete();
            }

            Payment::where('user_id', $data->user_id)->delete(); 
            EducationalQualifications::where('user_id', $id)->delete(); 
            FamilyInformation::where('user_id', $id)->delete(); 
            OccupationalInformation::where('user_id', $id)->delete(); 
            MarriageRelated::where('user_id', $id)->delete(); 
            LifePartner::where('user_id', $id)->delete(); 
        }  
        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }
    }

    // Method to change user status to free
    public function changeToFree($userId)
    {
        $user = User::where('id', $userId)->first(); // Retrieve the user

        if ($user) {
            $user->status = 0; // Change status to paid
            $user->save(); // Save changes
        
            // Deactivate free accounts (where status is 1)
            $freeUsersDeactivated = User::where('status', 1)->update(['status' => 0]);
        }

        return view('backend.user.user_register_page', compact('reg_user','freeUsersDeactivated'));
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = 1; // Change status to Free
        $user->save();
    
        return back()->with('success', 'User status updated successfully.');
    }


}
