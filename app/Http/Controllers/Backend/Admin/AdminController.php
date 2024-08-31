<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\{ContentWithImage, ContentWithVideo, ContentWithIcon, Seo, AllTitle, SylhetiBiye, OurClientReview, CommonBanner, SiteSetting, Admin, Payment,Country,City,Education,Profession,UpGradationFee,YourPersonalData};
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use App\Models\User;
use App\Models\Visitor;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $user = User::get();
        $payment = Payment::where('status', 'Free')->get();
        $totalGrooms = YourPersonalData::where('gender','male')->count();
        $totalBrides = YourPersonalData::where('gender','female')->count(); 
        $totalVisits = YourPersonalData::sum('Visits');
        $totalDeshiUsers = YourPersonalData::where('nationality', 'Bangladeshi')->count();
        $totalForeignerUsers = YourPersonalData::where('nationality','Foreigner')->count();
        $totalHinduUsers = YourPersonalData::where('religion','Hindu')->count();
        $totalMuslimUsers = YourPersonalData::where('religion','Muslim')->count();
        $totalVisitorCount = $this->getTotalVisitorCount();
        return view('backend.dashboard.dashboard', compact('user', 'payment','totalGrooms','totalBrides','totalVisits','totalDeshiUsers','totalForeignerUsers','totalHinduUsers','totalMuslimUsers','totalVisitorCount'));
    }
    public function AdminLoginForm()
    {
        return view('backend.admin.AdminLogin');
    }


    public function AdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('admin/dashboard');

        } else {
            Session::flash('error_msg', 'Invalid Email or Password');
            return redirect()->back();
        }

    }


    public function home()
    {
        $OurClientReview = OurClientReview::get();
        $SylhetiBiye = SylhetiBiye::get();
        $all_title = AllTitle::where('page', 'home')->get();
        $cw_img = ContentWithImage::where('page', 'home')->get();
        $clint_review = ContentWithVideo::where('page', 'home')->get();
        $seo = Seo::where('page', 'home')->get();

        return view('backend.website.home.home', compact('cw_img', 'clint_review', 'seo', 'all_title', 'SylhetiBiye', 'OurClientReview'));
    }

    ////////////////////cw_image/////////////////

    // Create
    public function cw_image_create(Request $request)
    {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'sub_title' => 'nullable|max:250',
            'button_name_one' => 'nullable|max:250',
            'button_name_two' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'video' => 'nullable|mimes:mp4,mov,ogg |max:10240', // 10 MB
            'video_link' => 'nullable|max:250',
            'alt_img' => 'nullable|max:200',
            'status' => 'nullable|max:200',
        ]);

        $data = new ContentWithImage;
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->button_name_one = $request->button_name_one;
        $data->button_name_two = $request->button_name_two;
        $data->des = $request->des;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->video) {
            $file = $request->file('video');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(('assets/img/uploaded/home/video/'), $filename);
            $data['video'] = $filename;
        } else {
            $data->video = $request->video_link;
        }

        if ($request->file('img')) {
            $file = $request->file('img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['img'] = $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function cw_image_update(Request $request, $id)
    {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'sub_title' => 'nullable|max:250',
            'button_name_one' => 'nullable|max:250',
            'button_name_two' => 'nullable|max:250',
            'des' => 'nullable|max:30000',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'video' => 'nullable|mimes:mp4,mov,ogg |max:10240', // 10 MB
            'video_link' => 'nullable|max:250',
            'alt_img' => 'nullable|max:200',
            'status' => 'nullable|max:200',
        ]);

        $data = ContentWithImage::find($id);
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->button_name_one = $request->button_name_one;
        $data->button_name_two = $request->button_name_two;
        $data->des = $request->des;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->video) {
            $file = $request->file('video');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(('assets/img/uploaded/home/video/'), $filename);
            $data['video'] = $filename;
        } else {
            $data->video = $request->video_link;
        }

        if ($request->file('img')) {

            if (File::exists('assets/img/uploaded/home/img/' . $data->img)) {
                File::delete('assets/img/uploaded/home/img/' . $data->img);
            }

            $file = $request->file('img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['img'] = $filename;
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

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }
    }

    // Delete
    public function cw_image_delete(Request $request, $id)
    {
        $data = ContentWithImage::find($id);

        if (File::exists('assets/img/uploaded/home/img/' . $data->img)) {
            File::delete('assets/img/uploaded/home/img/' . $data->img);
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

    ////////////////////All title/////////////////

    // Create
    public function cw_title_create(Request $request)
    {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'status' => 'nullable|max:200',

        ]);

        $data = new AllTitle;
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function cw_title_update(Request $request, $id)
    {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = AllTitle::find($id);
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->status = $request->status;

        $data->save();

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
    public function cw_title_delete(Request $request, $id)
    {
        $data = AllTitle::find($id);


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

    //////////////////image With Video/////////////////

    // Create
    public function cw_video_create(Request $request)
    {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'date' => 'nullable|max:250',
            'video' => 'nullable|mimes:mp4,mov,ogg |max:10240', // 10 MB
            'video_link' => 'nullable|max:250',
            'thumb' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);



        $data = new ContentWithVideo;
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->date = $request->date;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->video) {
            $file = $request->file('video');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(('assets/img/uploaded/home/video/'), $filename);
            $data['video'] = $filename;
        } else {
            $data->video = $request->video_link;
        }

        if ($request->file('thumb')) {
            $file = $request->file('thumb');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['thumb'] = $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function cw_video_update(Request $request, $id)
    {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'date' => 'nullable|max:250',
            'video' => 'nullable|mimes:mp4,mov,ogg |max:10240', // 10 MB
            'video_link' => 'nullable|max:250',
            'thumb' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = ContentWithVideo::find($id);
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->date = $request->date;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->video) {
            if (File::exists('assets/img/uploaded/home/video/' . $data->video)) {
                File::delete('assets/img/uploaded/home/video/' . $data->video);
            }
            $file = $request->file('video');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(('assets/img/uploaded/home/video/'), $filename);
            $data['video'] = $filename;
        } else {
            $data->video = $request->video_link;
        }

        if ($request->file('thumb')) {

            if (File::exists('assets/img/uploaded/home/img/' . $data->img)) {
                File::delete('assets/img/uploaded/home/img/' . $data->img);
            }

            $file = $request->file('thumb');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['thumb'] = $filename;
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

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }
    }

    // Delete
    public function cw_video_delete(Request $request, $id)
    {
        $data = ContentWithVideo::find($id);

        if (File::exists('assets/img/uploaded/home/video/' . $data->video)) {
            File::delete('assets/img/uploaded/home/video/' . $data->video);
        }

        if (File::exists('assets/img/uploaded/home/img/' . $data->img)) {
            File::delete('assets/img/uploaded/home/img/' . $data->img);
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

    //////////////////Sylheti Biye/////////////////

    // Create
    public function Sylheti_Biye_create(Request $request)
    {
        $request->validate([
            'title' => 'nullable|max:250',
            'title_1' => 'nullable|max:250',
            'icon_1' => 'nullable|max:250',
            'des_1' => 'nullable|max:250',
            'title_2' => 'nullable|max:250',
            'icon_2' => 'nullable|max:250',
            'des_2' => 'nullable|max:250',
            'title_3' => 'nullable|max:250',
            'icon_3' => 'nullable|max:250',
            'des_3' => 'nullable|max:250',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);



        $data = new SylhetiBiye;
        $data->title = $request->title;
        $data->title_1 = $request->title_1;
        $data->icon_1 = $request->icon_1;
        $data->des_1 = $request->des_1;
        $data->title_2 = $request->title_2;
        $data->icon_2 = $request->icon_2;
        $data->des_2 = $request->des_2;
        $data->title_3 = $request->title_3;
        $data->icon_3 = $request->icon_3;
        $data->des_3 = $request->des_3;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->file('img')) {
            $file = $request->file('img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['img'] = $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function Sylheti_Biye_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|max:250',
            'title_1' => 'nullable|max:250',
            'icon_1' => 'nullable|max:250',
            'des_1' => 'nullable|max:250',
            'title_2' => 'nullable|max:250',
            'icon_2' => 'nullable|max:250',
            'des_2' => 'nullable|max:250',
            'title_3' => 'nullable|max:250',
            'icon_3' => 'nullable|max:250',
            'des_3' => 'nullable|max:250',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = SylhetiBiye::find($id);
        $data->title = $request->title;
        $data->title_1 = $request->title_1;
        $data->icon_1 = $request->icon_1;
        $data->des_1 = $request->des_1;
        $data->title_2 = $request->title_2;
        $data->icon_2 = $request->icon_2;
        $data->des_2 = $request->des_2;
        $data->title_3 = $request->title_3;
        $data->icon_3 = $request->icon_3;
        $data->des_3 = $request->des_3;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->file('img')) {

            if (File::exists('assets/img/uploaded/home/img/' . $data->img)) {
                File::delete('assets/img/uploaded/home/img/' . $data->img);
            }

            $file = $request->file('img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['img'] = $filename;
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

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }
    }

    // Delete
    public function Sylheti_Biye_delete(Request $request, $id)
    {
        $data = SylhetiBiye::find($id);

        if (File::exists('assets/img/uploaded/home/img/' . $data->img)) {
            File::delete('assets/img/uploaded/home/img/' . $data->img);
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


    //////////////////Review title/////////////////

    // Create
    public function review_title_create(Request $request)
    {
        $request->validate([
            'title' => 'nullable|max:250',
            'des' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = new OurClientReview;
        $data->title = $request->title;
        $data->des = $request->des;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function review_title_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|max:250',
            'des' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = OurClientReview::find($id);
        $data->title = $request->title;
        $data->des = $request->des;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Edited Successfully',
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
    public function review_title_delete(Request $request, $id)
    {
        $data = OurClientReview::find($id);

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



    public function happy_client()
    {
        $CommonBanner = CommonBanner::where('page', 'happy_client')->get();
        $seo = Seo::where('page', 'happy_client')->get();

        return view('backend.website.happy_client.happy_client', compact('CommonBanner'));
    }

    //////////////////Common banner/////////////////

    // Create
    public function common_banner_create(Request $request)
    {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);



        $data = new CommonBanner;
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->file('img')) {
            $file = $request->file('img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['img'] = $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function common_banner_update(Request $request, $id)
    {
        $request->validate([
            'page' => 'required|max:250',
            'sec' => 'required|max:250',
            'title' => 'nullable|max:250',
            'img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = CommonBanner::find($id);
        $data->page = $request->page;
        $data->sec = $request->sec;
        $data->title = $request->title;
        $data->alt_img = $request->alt_img;
        $data->status = $request->status;

        if ($request->file('img')) {

            if (File::exists('assets/img/uploaded/home/img/' . $data->img)) {
                File::delete('assets/img/uploaded/home/img/' . $data->img);
            }

            $file = $request->file('img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['img'] = $filename;
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

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }
    }

    // Delete
    public function common_banner_delete(Request $request, $id)
    {
        $data = CommonBanner::find($id);

        if (File::exists('assets/img/uploaded/home/img/' . $data->img)) {
            File::delete('assets/img/uploaded/home/img/' . $data->img);
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

    public function about_us()
    {
        $icon_sec = ContentWithIcon::get();
        $all_title = AllTitle::where('page', 'about_us')->get();
        $cw_img = ContentWithImage::where('page', 'about_us')->get();
        $CommonBanner = CommonBanner::where('page', 'about_us')->get();
        $seo = Seo::where('page', 'about_us')->get();

        return view('backend.website.about_us.about_us', compact('CommonBanner', 'cw_img', 'all_title', 'icon_sec','seo'));
    }


    ////////////////////User Statistics/////////////////

    // Create
    public function cw_icon_create(Request $request)
    {
        $request->validate([
            'icon' => 'nullable|max:250',
            'user_id' => 'nullable|max:250',
            'des' => 'nullable|max:250',
            'value' => 'nullable|max:30000',
            'status' => 'nullable|max:200',
        ]);
        $data = new ContentWithIcon;
        $data->des = $request->des;
        $data->value = $request->value;
        $data->icon = $request->icon;
        $data->status = $request->status;


        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function cw_icon_update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'nullable|max:250',
            'des' => 'nullable|max:250',
            'value' => 'nullable|max:30000',
            'status' => 'nullable|max:200',
        ]);

        $data = ContentWithIcon::find($id);
        $data->des = $request->des;
        $data->value = $request->value;
        $data->icon = $request->icon;
        $data->status = $request->status;

        $data->save();

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
    public function cw_icon_delete(Request $request, $id)
    {
        $data = ContentWithIcon::find($id);


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

    public function payment(Request $request)
    {
        $payment = Payment::orderBy('status', 'ASC')->where('user_id', 'like', "%$request->search%")->where('status', 'like', "%$request->status%")->get();  
        return view('backend.user.payment', compact('payment'));
    }

    public function payment_accept(Request $request , $id)
    {
        $payment = Payment::find($id);  
        $payment->status = 'Paid';
        $payment->save();

        $user = User::where('user_id', $payment->user_id)->first();  
        $user->status = '0';
        $user->save();

        $success = [
            'message' => 'Payment Accepted Successfully',
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

    public function payment_cancel(Request $request , $id)
    {
        
        $payment = Payment::find($id);  
        $payment->delete();

        $success = [
            'message' => 'Canceled Successfully',
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

    // Payment Create 

    // Create
    public function payment_create(Request $request)
    {
        $request->validate([
            'b_number' => 'nullable|max:250',
            'trans_number' => 'nullable|max:250',
            'amount' => 'nullable|max:250',
        ]);

       //dd(Auth::user()->user_id);
        $data = new Payment;
        $data->user_id = Auth::user()->user_id;
        $data->b_number = $request->b_number;
        $data->trans_number = $request->trans_number;
        $data->amount = $request->amount;
        $data->save();
        if ($request) {
            return back()->with('message', 'Your Payment Successfully Paid');
        } else {
            return back()->with('message', 'Error');
        }
      
    }

    // Delete
    public function payment_delete(Request $request, $id)
    {
        $data = Payment::find($id);

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
    

    ////////////////////SEO/////////////////

    // Create
    public function seo_create(Request $request)
    {
        $request->validate([
            'page' => 'required',
            'meta_title' => 'nullable|max:250',
            'meta_description' => 'nullable|max:30000',
            'meta_keyword' => 'nullable||max:30000',
        ]);

        $data = new Seo;
        $data->page = $request->page;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // update
    public function seo_update(Request $request, $id)
    {

        $request->validate([
            'page' => 'required',
            'meta_title' => 'nullable|max:250',
            'meta_description' => 'nullable|max:30000',
            'meta_keyword' => 'nullable||max:30000',
        ]);

        $data = Seo::find($id);
        $data->page = $request->page;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keyword = $request->meta_keyword;

        $data->save();

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
    public function seo_delete(Request $request, $id)
    {
        $data = Seo::find($id);

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

    // Site Setting Crud

    public function site_setting()
    {
        $site_setting = SiteSetting::get();

        return view('backend.site_setting.site_setting', compact('site_setting'));
    }

    public function site_setting_create(Request $request)
    {
        $request->validate([
            'w_img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'd_img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:200',
            'copy_right' => 'nullable|max:200',
            'number' => 'nullable|max:200',
            'status' => 'nullable|max:200',
        ]);

        $data = new SiteSetting;

        $data->alt_img = $request->alt_img;
        $data->copy_right = $request->copy_right;
        $data->number = $request->number;
        $data->status = $request->status;

        if ($request->file('w_img')) {
            $file = $request->file('w_img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['w_img'] = $filename;
        }

        if ($request->file('d_img')) {
            $file = $request->file('d_img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['d_img'] = $filename;
        }

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function site_setting_update(Request $request, $id)
    {
        $request->validate([
            'w_img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'd_img' => 'mimes:jpg,png,jpeg|max:5120', // 5 MB
            'alt_img' => 'nullable|max:200',
            'copy_right' => 'nullable|max:200',
            'number' => 'nullable|max:200',
            'status' => 'nullable|max:200',
        ]);

        $data = SiteSetting::find($id);
        $data->alt_img = $request->alt_img;
        $data->copy_right = $request->copy_right;
        $data->number = $request->number;
        $data->status = $request->status;

        if ($request->file('w_img')) {

            if (File::exists('assets/img/uploaded/home/img/' . $data->w_img)) {
                File::delete('assets/img/uploaded/home/img/' . $data->w_img);
            }

            $file = $request->file('w_img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['w_img'] = $filename;
        }


        if ($request->file('d_img')) {

            if (File::exists('assets/img/uploaded/home/img/' . $data->d_img)) {
                File::delete('assets/img/uploaded/home/img/' . $data->d_img);
            }

            $file = $request->file('d_img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $filesize = Image::make($file->getRealPath());
            $filesize->resize(700, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $filesize->save(('assets/img/uploaded/home/img/' . $filename));
            $data['d_img'] = $filename;
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

        if ($request) {
            return back()->with($success);
        } else {
            return back()->with($fail);
        }
    }

    // Delete
    public function site_setting_delete(Request $request, $id)
    {
        $data = SiteSetting::find($id);

        if (File::exists('assets/img/uploaded/home/img/' . $data->w_img)) {
            File::delete('assets/img/uploaded/home/img/' . $data->w_img);
        }
        if (File::exists('assets/img/uploaded/home/img/' . $data->d_img)) {
            File::delete('assets/img/uploaded/home/img/' . $data->d_img);
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

    // Country Crud

    public function country()
    {
        $country = Country::get();

        return view('backend.site_setting.country', compact('country'));
    }

    public function country_create(Request $request)
    {
        $request->validate([
            'country' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = new country;

        $data->country = $request->country;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function country_update(Request $request, $id)
    {
        $request->validate([
            'country' => 'nullable|max:200',
            'status' => 'nullable|max:200',
        ]);

        $data = country::find($id);
        $data->country = $request->country;
        $data->status = $request->status;

        $data->save();

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
    public function country_delete(Request $request, $id)
    {
        $data = country::find($id);

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
    // City Crud

    public function city()
    {
        $city = City::get();

        return view('backend.site_setting.city', compact('city'));
    }

    public function city_create(Request $request)
    {
        $request->validate([
            'city' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = new City;

        $data->city = $request->city;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function city_update(Request $request, $id)
    {
        $request->validate([
            'city' => 'nullable|max:250', // 5 MB
            'status' => 'nullable|max:200',
        ]);

        $data = City::find($id);
        $data->city = $request->city;
        $data->status = $request->status;

        $data->save();

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
    public function city_delete(Request $request, $id)
    {
        $data = City::find($id);

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



    // Education Crud

    public function education()
    {
        $education = Education::get();

        return view('backend.site_setting.education', compact('education'));
    }

    public function education_create(Request $request)
    {
        $request->validate([
            'education' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = new Education;

        $data->education = $request->education;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function education_update(Request $request, $id)
    {
        $request->validate([
            'education' => 'nullable|max:200', // 5 MB
            'status' => 'nullable|max:200',
        ]);

        $data = Education::find($id);
        $data->education = $request->education;
        $data->status = $request->status;

        $data->save();

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
    public function education_delete(Request $request, $id)
    {
        $data = Education::find($id);

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


    // Profession Crud

    public function profession()
    {
        $profession = Profession::get();

        return view('backend.site_setting.profession', compact('profession'));
    }

    public function profession_create(Request $request)
    {
        $request->validate([
            'profession' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = new Profession;

        $data->profession = $request->profession;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function profession_update(Request $request, $id)
    {
        $request->validate([
            'profession' => 'nullable|max:200', // 5 MB
            'status' => 'nullable|max:200',
        ]);

        $data = Profession::find($id);
        $data->profession = $request->profession;
        $data->status = $request->status;

        $data->save();

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
    public function profession_delete(Request $request, $id)
    {
        $data = Profession::find($id);

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

    // Upgradition Fee Crud

    public function upgradation()
    {
        $upgradation_fee = UpGradationFee::get();

        return view('backend.upgradation.upgradation_fee', compact('upgradation_fee'));
    }

    public function upgradation_fee_create(Request $request)
    {
        $request->validate([
            'fee' => 'nullable|max:250',
            'title' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = new UpGradationFee;

        $data->fee = $request->fee;
        $data->title = $request->title;
        $data->status = $request->status;

        $data->save();

        $success = [
            'message' => 'Data Added Successfully',
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

    // Update
    public function upgradation_fee_update(Request $request, $id)
    {
        $request->validate([
            'fee' => 'nullable|max:250',
            'title' => 'nullable|max:250',
            'status' => 'nullable|max:200',
        ]);

        $data = UpGradationFee::find($id);
        $data->fee = $request->fee;
        $data->title = $request->title;
        $data->status = $request->status;

        $data->save();

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
    public function upgradation_fee_delete(Request $request, $id)
    {
        $data = UpGradationFee::find($id);

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

    public function getTotalVisitorCount()
{
    return Visitor::count();
}

}
