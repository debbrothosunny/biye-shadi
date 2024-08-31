<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use File;
use Illuminate\Support\Facades\DB;
use App\Models\{Message,ContentWithImage,ContentWithVideo,ContentWithIcon,Seo,AllTitle,SylhetiBiye,OurClientReview,CommonBanner,SiteSetting,YourPersonalData,EducationalQualifications,FamilyInformation,OccupationalInformation,MarriageRelated,LifePartner,User,Country,City,Profession,Education,Subscribe,Visitor};

class FrontendController extends Controller
{
    public function index(Request $request)
    {
       $data=  $request->validate([
            'gender' => 'nullable|max:200',
            'age' => 'nullable|max:200',
            'religion' => 'nullable|max:200',
            'country_id' => 'nullable|max:200',
            'marital' => 'nullable|max:200',
            'education' => 'nullable|max:200',
            'proffession' => 'nullable|max:200',
        ]);

        $OurClientReview = OurClientReview::get();
        $SylhetiBiye = SylhetiBiye::get();
        $all_title = AllTitle::where('page', 'home')->get();
        $cw_img = ContentWithImage::where('page', 'home')->get();
        $clint_review = ContentWithVideo::where('page', 'home')->get();
        $seo = Seo::where('page', 'home')->first();
        //$user = User::where('status', '0')->with('personal_info')->paginate(20);   
        $site_setting = SiteSetting::first();
        $country = Country::get();
        $education = Education::get();
        $profession = Profession::get();
        if(!empty($data)){
        $user = User::with('personal_info')->where('status', 0)->whereHas('personal_info', function($q)  use($request){
            $q->Where('gender', $request->gender );
            $q->orWhere('age', $request->age );
            $q->orWhere('religion', $request->religion );
            $q->orWhere('country_id', $request->country_id );
            $q->orWhere('marital', $request->marital );
            $q->orWhere('education', $request->education );
            $q->orWhere('proffession', $request->proffession );
        })->get();
        }else{
            $user = User::with('personal_info')->where('status', 0)->get();
        }

        // $totalWebVisits = Visitor::sum('web_visits');

        return view ('frontend.web_info.index',compact('cw_img','clint_review','seo','all_title','SylhetiBiye','OurClientReview','site_setting','country','education','profession','user'));
    }

    public function about()
    {   
        $SylhetiBiye = SylhetiBiye::where('status', 0)->get();
        $icon_sec = ContentWithIcon::where('status', 0)->get();
        $all_title = AllTitle::where('status', 0)->where('page', 'about_us')->get();
        $cw_img = ContentWithImage::where('status', 0)->where('page', 'about_us')->get();
        $CommonBanner = CommonBanner::where('status', 0)->where('page', 'about_us')->get();
        $seo = Seo::where('page', 'about_us')->first();
        $totalGrooms = YourPersonalData::where('gender','male')->count();
        $totalBrides = YourPersonalData::where('gender','female')->count();
        $totalRegisteredUsers = User::count();
        $totalPaidUsers = User::where('status',0)->count();
        $totalFreeUsers = User::where('status',1)->count();
        $totalDeshiUsers = YourPersonalData::where('nationality', 'Bangladeshi')->count();
        $totalForeignerUsers = YourPersonalData::where('nationality','Foreigner')->count();
        $totalHinduUsers = YourPersonalData::where('religion','Hindu')->count();
        $totalMuslimUsers = YourPersonalData::where('religion','Muslim')->count();
        return view('frontend.web_info.about',compact('totalGrooms', 'totalBrides', 'totalRegisteredUsers','totalFreeUsers','totalPaidUsers','totalDeshiUsers', 'totalForeignerUsers','totalHinduUsers','totalMuslimUsers','CommonBanner','cw_img','all_title','icon_sec','SylhetiBiye','seo',));
    }
    
    public function profile_page($id)
    {
        // Fetch personal data
        $personal_datas = YourPersonalData::where('user_id', $id)->get();
    
        $family_data = FamilyInformation::where('user_id', $id)->get();
    
        $ocu_data = OccupationalInformation::where('user_id', $id)->get();
    
        $marriage_data = MarriageRelated::where('user_id', $id)->get();
    
        $life_partner_data = LifePartner::where('user_id', $id)->get();
    
        $edu_data = EducationalQualifications::where('user_id', $id)->get();
    
        $user = User::with('personal_info')->get(); 
    
        $profile = YourPersonalData::where('user_id', $id)->firstOrFail();
        
        $profile->increment('visits');
        
        // Return the view with the fetched data
        return view ('frontend.web_info.profile_page', compact('personal_datas', 'family_data', 'ocu_data', 'marriage_data', 'life_partner_data', 'user', 'edu_data', 'profile'));
    }
    

    public function profile(Request $request)
    {
        $data=  $request->validate([
            'gender' => 'nullable|max:200',
            'max_age' => 'nullable|max:200',
            'min_age' => 'nullable|max:200',
            'religion' => 'nullable|max:200',
            'country_id' => 'nullable|max:200',
        ]);

        $personal_data = YourPersonalData::get();
        $country = Country::get();

        if (!empty($data)) {
            $user = User::with('personal_info')
                        ->where('status', 0)
                        ->whereHas('personal_info', function($q) use ($data) {
                            $q->when(isset($data['min_age']) && isset($data['max_age']), function($query) use ($data) {
                                $query->whereBetween('age', [$data['min_age'], $data['max_age']]);
                            });
                            $q->when(isset($data['gender']), function($query) use ($data) {
                                $query->where('gender', $data['gender']);
                            });
                            $q->when(isset($data['religion']), function($query) use ($data) {
                                $query->where('religion', $data['religion']);
                            });
                            $q->when(isset($data['country_id']), function($query) use ($data) {
                                $query->where('country_id', $data['country_id']);
                            });
                        })
                        ->paginate();
        } else {
            $user = User::with('personal_info')
                        ->where('status', 0)
                        ->paginate(20);
        }

        return view ('frontend.web_info.profile',compact('personal_data','country','user'));
    }

    public function More_Bio()
    {
        $user = User::where('status', '0')->with('personal_info')->paginate(20);  
        $site_setting = SiteSetting::first();
        $seo = Seo::where('page', 'home')->first();

        return view ('frontend.web_info.more_bio',compact('user','seo','site_setting'));
    }

    public function PaymentForm()
    {

        return view('frontend.user_info.payment_form');

    }
 
    public function client()
    {
        $OurClientReview = OurClientReview::get();
        $clint_review = ContentWithVideo::where('page', 'home')->get();
        $CommonBanner = CommonBanner::where('page', 'happy_client')->get();
        $seo = Seo::where('page', 'home')->get();

        return view ('frontend.web_info.client',compact('clint_review','seo','OurClientReview','CommonBanner'));
    }

    public function Message()
    {
        $Message = Message::orderBy('id', 'DESC')->paginate();
        return view('backend.message.message', compact('Message'));
    }

    // Create
    public function Message_create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users',
            'number' => 'required|max:750',
            'gender' => 'required|max:750',
            'message' => 'required|max:750',
        ]);  

        $Message = new Message;

        $Message->name = $request->name;
        $Message->email = $request->email;
        $Message->number = $request->number;
        $Message->gender = $request->gender;
        $Message->message = $request->message;

        $Message->save();
        
        if ($request) {

            return back()->with('message', 'Successfully! Message Send');
        } else {
            return back()->with('fail', 'Something Wrong');
        }

    }

    // Delete
    public function Message_delete(Request $request, $id)
    {
        $Message_delete= Message::find($id);
        $Message_delete->delete();

        if ($request) {
            return back()->with('success', 'Successfully! Message Deleted');
        } else {
            return back()->with('failed', 'Something Wrong');
        }
    }

// Subscriber Crud

public function subs()
{
    $subs = Subscribe::get();

    return view('backend.subscriber.subscriber', compact('subs'));
}

// Create
public function subs_create(Request $request){
    $request->validate([
        'email' => 'required|email',
    ]);

    $data = new Subscribe;
    $data->email = $request->email;

    $data->save();

    if ($request) {

        return back()->with('message', 'Successfully! Subscribe');
    } else {
        return back()->with('fail', 'Something Wrong');
    }
}

// Delete
public function subs_delete(Request $request, $id){
   
    $data= Subscribe::find($id);

    $data->delete();

    if ($request) {
        return back()->with('success', 'Successfully! Subscriber Deleted');
    } else {
        return back()->with('failed', 'Something Wrong');
    }
}

// Personal Data Crud
    public function Personal_Data($id)
    {
        $personal_data = YourPersonalData::where('user_id' , $id)->first();
        $country = Country::get();
        $city = City::get();
        return view('frontend.user_info.personal_data_form', compact('personal_data','country','city'));
    }

    ////////////////////Your Personal Data/////////////////
 
     // Create
     public function personal_data_form_create(Request $request){
        
        $request->validate([
            'user_id' => 'nullable|max:250',
            'country_id' => 'nullable|max:250',
            'city_id' => 'nullable|max:250',
            'name' => 'nullable|max:250',
            'number' => 'nullable|max:250',
            'gender' => 'nullable|max:30000',
            'age' => 'nullable|max:200',
            'education' => 'nullable|max:200',
            'proffession' => 'nullable|max:200',
            'religion' => 'nullable|max:200',
            'view_count' => 'nullable|max:200',
            'height' => 'nullable|max:200',
            'marital' => 'nullable|max:200',
            'children' => 'nullable|max:200',
            'date_of_birth' => 'nullable|max:200',
            'complexion' => 'nullable|max:200',
            'weight' => 'nullable|max:200',
            'blood_group' => 'nullable|max:200',
            'nationality' => 'nullable|max:200',
            'country' => 'nullable|max:200',
            'city' => 'nullable|max:200',
            'address' => 'nullable|max:200',
            'img' => 'nullable|max:5120', 
        ]);

        $data = new YourPersonalData;
        $data->name = $request->name;
        $data->user_id = Auth::user()->id;
        $data->country_id = $request->country_id;
        $data->city_id = $request->city_id;
        $data->number = $request->number;
        $data->gender = $request->gender;
        $data->age = $request->age;
        $data->education = $request->education;
        $data->proffession = $request->proffession;
        $data->religion = $request->religion;
        $data->height = $request->height;
        $data->marital = $request->marital;
        $data->children = $request->children;
        $data->date_of_birth = $request->date_of_birth;
        $data->complexion = $request->complexion;
        $data->weight = $request->weight;
        $data->blood_group = $request->blood_group;
        $data->nationality = $request->nationality;
        $data->country = $request->country;
        $data->city = $request->city;
        $data->address = $request->address;
    
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(575, 361, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/profile/'.$filename));
            $data['img']= $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Created Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return redirect()->route('user_dashboard')->with($success);
           }
        else{
            return back()->with($fail);
        }
    }

     // Update
     public function personal_data_form_update(Request $request, $id) {
        $request->validate([
            'user_id' => 'nullable|max:250',
            'country_id' => 'nullable|max:250',
            'city_id' => 'nullable|max:250',
            'name' => 'nullable|max:250',
            'number' => 'nullable|max:250',
            'gender' => 'nullable|max:30000',
            'age' => 'nullable|max:200',
            'education' => 'nullable|max:200',
            'proffession' => 'nullable|max:200',
            'religion' => 'nullable|max:200',
            'height' => 'nullable|max:200',
            'marital' => 'nullable|max:200',
            'children' => 'nullable|max:200',
            'date_of_birth' => 'nullable|max:200',
            'complexion' => 'nullable|max:200',
            'weight' => 'nullable|max:200',
            'blood_group' => 'nullable|max:200',
            'nationality' => 'nullable|max:200',
            'country' => 'nullable|max:200',
            'city' => 'nullable|max:200',
            'address' => 'nullable|max:200',
            'img' => 'nullable|mimes:jpg,png,jpeg|max:5120',
            'show_profile_picture' => 'nullable|boolean',// 5 MB // 5 MB
           
        ]);

        $data = YourPersonalData::find($id);
        $data->name = $request->name;
        $data->country_id = $request->country_id;
        $data->city_id = $request->city_id;
        $data->number = $request->number;
        $data->gender = $request->gender;
        $data->age = $request->age;
        $data->education = $request->education;
        $data->proffession = $request->proffession;
        $data->religion = $request->religion;
        $data->height = $request->height;
        $data->marital = $request->marital;
        $data->children = $request->children;
        $data->date_of_birth = $request->date_of_birth;
        $data->complexion = $request->complexion;
        $data->weight = $request->weight;
        $data->blood_group = $request->blood_group;
        $data->nationality = $request->nationality;
        $data->country = $request->country;
        $data->city = $request->city;
        $data->address = $request->address;


        
        if($request->file('img')){

            if (File::exists('assets/img/uploaded/profile/'.$data->img)) {
                File::delete('assets/img/uploaded/profile/'.$data->img);
            }

            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $filesize=Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/profile/'.$filename));
            $data['img']= $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return redirect()->route('user_dashboard')->with($success);
           }
        else{
            return back()->with($fail);
        }
    }

    // Delete
    public function personal_data_form_delete(Request $request, $id){
        $data= YourPersonalData::find($id);


        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }
   

    // Edu QualiFication Page
    public function Edu_Quali($id)
    {
        $edu_qualifications = EducationalQualifications::where('user_id' , $id)->first();
        return view('frontend.user_info.edu_quali_form', compact('edu_qualifications'));
    }

     // Create
     public function edu_quali_form_create(Request $request){
        $request->validate([
            'education_method' => 'nullable|max:250',
            'latest_edu' => 'nullable|max:250',
            'passing_year' => 'nullable|max:250',
            'group' => 'nullable|max:250',
            'result' => 'nullable|max:200',
            'equivalent' => 'nullable|max:200',
            'qualification' => 'nullable|max:200',
        ]);

        $data = new EducationalQualifications;
        $data->user_id = Auth::user()->id;
        $data->education_method = $request->education_method;
        $data->latest_edu = $request->latest_edu;
        $data->passing_year = $request->passing_year;
        $data->group = $request->group;
        $data->result = $request->result;
        $data->equivalent = $request->equivalent;
        $data->qualification = $request->qualification;

        $data->save();

        $success = [
            'message' => 'Data Created Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return redirect()->route('user_dashboard')->with($success);
           }
        else{
            return back()->with($fail);
        }
    }

    // Update
    public function edu_quali_form_update(Request $request, $id) {
        $request->validate([
            'education_method' => 'nullable|max:250',
            'latest_edu' => 'nullable|max:250',
            'passing_year' => 'nullable|max:250',
            'group' => 'nullable|max:250',
            'result' => 'nullable|max:200',
            'equivalent' => 'nullable|max:200',
            'qualification' => 'nullable|max:200',
        ]);

        $data = EducationalQualifications::find($id);
        $data->education_method = $request->education_method;
        $data->latest_edu = $request->latest_edu;
        $data->passing_year = $request->passing_year;
        $data->group = $request->group;
        $data->result = $request->result;
        $data->equivalent = $request->equivalent;
        $data->qualification = $request->qualification;

        $data->save();

        $success = [
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return redirect()->route('user_dashboard')->with($success);
           }
        else{
            return back()->with($fail);
        }
    }

    // Delete
    public function edu_quali_form_delete(Request $request, $id){
        $data= EducationalQualifications::find($id);


        $data->delete();

        $success = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];

        $fail = [
            'message' => 'Something Wrong',
            'alert-type' => 'error',
        ];

        if($request){
            return back()->with($success);
           }else{
            return back()->with($fail);
        }
    }


    
////////////////////Family Information/////////////////

public function family_information_form($id)
{
    $family_information = FamilyInformation::where('user_id' , $id)->first();

    return view('frontend.user_info.family_info_form', compact('family_information'));
}


// Create
public function family_information_form_create(Request $request){
    $request->validate([
        'user_id' => 'nullable|max:250',
        'father_alive' => 'nullable|max:250',
        'mother_alive' => 'nullable|max:250',
        'father_profession' => 'nullable|max:30000',
        'mother_profession' => 'nullable|max:200',
        'how_many_brother' => 'nullable|max:200',
        'brother_information' => 'nullable|max:200',
        'financial_status' => 'nullable|max:200',
        'financial_condition' => 'nullable|max:200',
        'religious_condition' => 'nullable|max:200',
    ]);


    $data = new FamilyInformation;
    $data->user_id = Auth::user()->id;
    $data->father_alive = $request->father_alive;
    $data->mother_alive = $request->mother_alive;
    $data->father_profession = $request->father_profession;
    $data->mother_profession = $request->mother_profession;
    $data->how_many_brother = $request->how_many_brother;
    $data->brother_information = $request->brother_information;
    $data->financial_status = $request->financial_status;
    $data->financial_condition = $request->financial_condition;
    $data->religious_condition = $request->religious_condition;

    $data->save();

    $success = [
        'message' => 'Data Created Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return redirect()->route('user_dashboard')->with($success);
       }else{
        return back()->with($fail);
    }
}

// Update
public function family_information_form_update(Request $request, $id) {
    $request->validate([
        'user_id' => 'nullable|max:250',
        'father_alive' => 'nullable|max:250',
        'mother_alive' => 'nullable|max:250',
        'father_profession' => 'nullable|max:30000',
        'mother_profession' => 'nullable|max:200',
        'how_many_brother' => 'nullable|max:200',
        'brother_information' => 'nullable|max:200',
        'financial_status' => 'nullable|max:200',
        'financial_condition' => 'nullable|max:200',
        'religious_condition' => 'nullable|max:200',
    ]);

    $data = FamilyInformation::findorfail($id);
    $data->father_alive = $request->father_alive;
    $data->mother_alive = $request->mother_alive;
    $data->father_profession = $request->father_profession;
    $data->mother_profession = $request->mother_profession;
    $data->how_many_brother = $request->how_many_brother;
    $data->brother_information = $request->brother_information;
    $data->financial_status = $request->financial_status;
    $data->financial_condition = $request->financial_condition;
    $data->religious_condition = $request->religious_condition;

    $data->save();

    $success = [
        'message' => 'Data Updated Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return redirect()->route('user_dashboard')->with($success);
       }else{
        return back()->with($fail);
    }
}

// Delete
public function family_information_form_delete(Request $request, $id){
   
    $data= FamilyInformation::find($id);

    $data->delete();

    $success = [
        'message' => 'Data Deleted Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return back()->with($success);
       }else{
        return back()->with($fail);
    }
}

////////////////////Occupational information/////////////////

public function ocu_info_form($id)
{
    $occupation_info = OccupationalInformation::where('user_id' , $id)->first();

    return view('frontend.user_info.ocu_info_form', compact('occupation_info'));
}


// Create
public function ocu_info_form_create(Request $request){
    $request->validate([
        'user_id' => 'nullable|max:250',
        'occupation' => 'nullable|max:250',
        'description_of_profession' => 'nullable|max:250',
    ]);


    $data = new OccupationalInformation;
    $data->user_id = Auth::user()->id;
    $data->occupation = $request->occupation;
    $data->description_of_profession = $request->description_of_profession;

    $data->save();

    $success = [
        'message' => 'Data Created Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return redirect()->route('user_dashboard')->with($success);
       }else{
        return back()->with($fail);
    }
}

// Update
public function ocu_info_form_update(Request $request, $id) {
    $request->validate([
        'user_id' => 'nullable|max:250',
        'occupation' => 'nullable|max:250',
        'description_of_profession' => 'nullable|max:250',
    ]);

    $data = OccupationalInformation::find($id);
    $data->occupation = $request->occupation;
    $data->description_of_profession = $request->description_of_profession;

    $data->save();

    $success = [
        'message' => 'Data Updated Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return redirect()->route('user_dashboard')->with($success);
       }else{
        return back()->with($fail);
    }
}

// Delete
public function ocu_info_form_delete(Request $request, $id){
   
    $data= OccupationalInformation::find($id);

    $data->delete();

    $success = [
        'message' => 'Data Deleted Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return back()->with($success);
       }else{
        return back()->with($fail);
    }
}


////////////////////Marriage Related Information/////////////////

public function marriage_related_form($id)
{
    $marriage_related = MarriageRelated::where('user_id' , $id)->first();

    return view('frontend.user_info.marriage_related_form', compact('marriage_related'));
}


// Create
public function marriage_related_form_create(Request $request){
    $request->validate([
        'user_id' => 'nullable|max:250',
        'marriage_status' => 'nullable|max:250',
        'agree_to_marriage' => 'nullable|max:250',
        'reason_divorce' => 'nullable|max:250',
        'after_marriage' => 'nullable|max:250',
        'studies_after_marriage' => 'nullable|max:250',
        'getting_married' => 'nullable|max:250',
    ]);

    $data = new MarriageRelated;
    $data->user_id = Auth::user()->id;
    $data->marriage_status = $request->marriage_status;
    $data->agree_to_marriage = $request->agree_to_marriage;
    $data->reason_divorce = $request->reason_divorce;
    $data->after_marriage = $request->after_marriage;
    $data->studies_after_marriage = $request->studies_after_marriage;
    $data->getting_married = $request->getting_married;

    $data->save();

    $success = [
        'message' => 'Data Created Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return redirect()->route('user_dashboard')->with($success);
       }else{
        return back()->with($fail);
    }
}

// Update
public function marriage_related_form_update(Request $request, $id) {
    $request->validate([
        'user_id' => 'nullable|max:250',
        'marriage_status' => 'nullable|max:250',
        'agree_to_marriage' => 'nullable|max:250',
        'reason_divorce' => 'nullable|max:250',
        'after_marriage' => 'nullable|max:250',
        'studies_after_marriage' => 'nullable|max:250',
        'getting_married' => 'nullable|max:250',
    ]);

    $data = MarriageRelated::find($id);
    $data->marriage_status = $request->marriage_status;
    $data->agree_to_marriage = $request->agree_to_marriage;
    $data->reason_divorce = $request->reason_divorce;
    $data->after_marriage = $request->after_marriage;
    $data->studies_after_marriage = $request->studies_after_marriage;
    $data->getting_married = $request->getting_married;

    $data->save();

    $success = [
        'message' => 'Data Updated Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return redirect()->route('user_dashboard')->with($success);
       }else{
        return back()->with($fail);
    }
}

// Delete
public function marriage_related_form_delete(Request $request, $id){
   
    $data= MarriageRelated::find($id);

    $data->delete();

    $success = [
        'message' => 'Data Deleted Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return back()->with($success);
       }else{
        return back()->with($fail);
    }
}

////////////////////Expected Life Partner/////////////////

public function life_partner_form($id)
{
    $life_partner = LifePartner::where('user_id' , $id)->first();

    return view('frontend.user_info.life_partner_form', compact('life_partner'));
}


// Create
public function life_partner_form_create(Request $request){
    $request->validate([
        'user_id' => 'nullable|max:250',
        'age' => 'nullable|max:250',
        'complexion' => 'nullable|max:250',
        'height' => 'nullable|max:250',
        'educational_qualification' => 'nullable|max:250',
        'district' => 'nullable|max:250',
        'getting_married' => 'nullable|max:250',
        'financial_condition' => 'nullable|max:250',
        'life_partner' => 'nullable|max:250',
    ]);

    $data = new LifePartner;
    $data->user_id = Auth::user()->id;
    $data->age = $request->age;
    $data->complexion = $request->complexion;
    $data->height = $request->height;
    $data->educational_qualification = $request->educational_qualification;
    $data->district = $request->district;
    $data->getting_married = $request->getting_married;
    $data->financial_condition = $request->financial_condition;
    $data->life_partner = $request->life_partner;


    $data->save();

    $success = [
        'message' => 'Data Created Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return redirect()->route('user_dashboard')->with($success);
       }else{
        return back()->with($fail);
    }
}

// Update
public function life_partner_form_update(Request $request, $id) {
    $request->validate([
        'user_id' => 'nullable|max:250',
        'age' => 'nullable|max:250',
        'complexion' => 'nullable|max:250',
        'height' => 'nullable|max:250',
        'educational_qualification' => 'nullable|max:250',
        'district' => 'nullable|max:250',
        'getting_married' => 'nullable|max:250',
        'financial_condition' => 'nullable|max:250',
        'life_partner' => 'nullable|max:250',

    ]);

    $data = LifePartner::find($id);
    $data->age = $request->age;
    $data->complexion = $request->complexion;
    $data->height = $request->height;
    $data->educational_qualification = $request->educational_qualification;
    $data->district = $request->district;
    $data->getting_married = $request->getting_married;
    $data->financial_condition = $request->financial_condition;
    $data->life_partner = $request->life_partner;

    $data->save();

    $success = [
        'message' => 'Data Updated Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return redirect()->route('user_dashboard')->with($success);
       }else{
        return back()->with($fail);
    }
}

// Delete
public function life_partner_form_delete(Request $request, $id){
   
    $data= LifePartner::find($id);

    $data->delete();

    $success = [
        'message' => 'Data Deleted Successfully',
        'alert-type' => 'success',
    ];

    $fail = [
        'message' => 'Something Wrong',
        'alert-type' => 'error',
    ];

    if($request){
        return redirect()->route('user_dashboard')->with($success);
       }else{
        return back()->with($fail);
    }
}


public function show($id)
{
    // Find the personal data by ID
    $personalData = YourPersonalData::findOrFail($id);

    // Increment the view count
    $personalData->increment('view_count');

    // Redirect back to the index page
    return redirect()->route('index')->with('success', 'View count updated successfully.');
}

     
}
