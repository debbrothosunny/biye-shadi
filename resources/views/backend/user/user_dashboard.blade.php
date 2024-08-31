@extends('frontend.layouts.app')
@section('content')

<style>
  .pending_profile {
    font-size: 15px;
    color: red;
    text-align: center;
    padding-bottom: 30px;
  }
  .color {
    color: black;
  }




  .pro-modal {
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100vh;
        background: #00000050;
        z-index: 999;
        padding: 20px;
      }

      .pro-modal-content {
        background: #fff;
        width: 900px;
        max-width: 100%;
        border-radius: 20px;
        overflow: hidden;
      }

      .pro-modal-content-header {
        padding: 15px 72px;
        background: var(--main-color);
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .pro-modal-content-header i {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
      }
      .pro-modal-content-header h5 {
        color: #fff;
        font-weight: 500;
        font-size: 20px;
        margin-top: 20px;
      }
      .pro-modal-content-header h3 {
        font-weight:400;
        font-size:17px;
        color: #ffffff;
        margin-top: 20px;
      }
      .pro-modal-content-header a {
        padding: 8px 20px;
        background: var(--white);
        color: var(--main-color);
        border-radius: 5px;
        font-size: var(--small-font);
        font-weight: 400;
      }
      .pro-modal-content-body {
        padding: 40px 20px 34px;
      }
      .pro-modal-content-body ul {
        display: grid;
        grid-template-columns: 1fr 1fr;
        justify-items: center;
        gap: 5px 10px;
      }

      .pro-modal-content-body a {
        display: none;
      }

      .pro-modal-content-body ul li {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .pro-modal-content-body ul li i {
        color: #00ad45;
      }
      .pro-modal-content-body ul li span {
        font-size: var(--small-font);
        color: #111;
        font-weight: 400;
      }

      .pro-modal-content-footer {
        height: 30px;
        width: 100%;
        background: var(--main-color);
      }

      @media (max-width: 768px) {
        .pro-modal-content-header {
          padding: 15px 40px;
        }

        .pro-modal-content-body {
          padding: 20px 20px 20px;
        }

        .pro-modal-content-footer {
          height: 20px;
        }
      }

      @media (max-width: 552px) {
        .pro-modal-content-body ul {
          grid-template-columns: 1fr;
        }
        .pro-modal-content-header a {
          display: none;
        }

        .pro-modal-content-body a {
          display: inline-block;
          padding: 6px 10px;
          background: none;
          border: 1px solid var(--main-color);
          color: var(--main-color);
          border-radius: 5px;
          margin-top: 20px;
          font-size: 10px;
        }

        .pro-modal-content-header {
          flex-direction: column-reverse;
        }
      }
</style>

@php
use App\Models\SiteSetting;
use App\Models\UpGradationFee;

$site_setting = SiteSetting::where('status', '0')->first();
$upgradation_fee = UpGradationFee::where('status', '0')->get();
@endphp

    <!-- ======================== header ================================ -->

    <header class="white-bg">
      <div class="container">
      <div class="header-content">
        <h1>
          <a href="{!! route('index') !!}"><img
              src="{!! asset('assets/img/uploaded/home/img/') !!}/{{ $site_setting->w_img ?? ''}}" alt="logo" /></a>
          <a href="{!! route('index') !!}"><img
              src="{!! asset('assets/img/uploaded/home/img/') !!}/{{ $site_setting->d_img ?? ''}}"
              alt="logo-dark" /></a>
        </h1>

        <div class="nav-bar">
          <ul class="nav">
            <li><a href="{!! route('index') !!}" class="active">Home</a></li>
            <li><a href="{!! route('profile')!!}">Profile</a></li>
            <li><a href="{!! route('client') !!}">Happy Client</a></li>
            <li><a href="{!! route('about') !!}">About Us </a></li>
          </ul>
          <ul class="account-nav">
          @if (Auth::guest())
            @else
            <li><a class="lispan" href="{!! route('user_dashboard') !!}"><span class=""></span>Dashboard </a></li>
            @endif

            @if (Auth::guest())
            <li><a class="lispan" href="{{route('login')}}"><span class=""></span> Login</a>
            </li>
            @else
            <!-- <li><a class="lispan" href="{{ route('User.LogOut')}}" method="POST"><span ></span>Logout</a></li> -->
            <li><a class="lispan" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
            </a></li>
            <form  id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            @endif
            @if (Auth::guest())
            <li><a class="lispan" href="{{route('register')}}"><span class=""></span> Register</a>
            </li>
            @else
            @endif
          </ul>
        </div>
        <div class="fa-solid fa-bars-staggered fa-fw" id="menu-btn"></div>
      </div>
      </div>
    </header>
    <!-- ======================== header end  ================================ -->

  <section class="profile-section">
     <!-- pro modal  -->
    <div class="pro-modal {{Auth::user()->status == '0' ? 'd-none':''}}">
      <div class="pro-modal-content">
        <div class="pro-modal-content-header">
          <h3 class="font-size">Your Profile is Show After Payment!!</h3>
          <h3 class="font-size">Payment With Bkash: +8801766325014</h3>
          <a class=" btn btn-success create-new-button hide" data-bs-toggle="modal" data-bs-target=".per_profile" id="">Payment</a>
          <i class="fa-regular fa-circle-xmark" onclick="parentElement.parentElement.parentElement.remove()"></i>
        </div>
        <div class="pro-modal-content-body d-flex justify-content-between">
        @foreach ($upgradation_fee as $postData)
          <div>
            <h5>{{ $postData->fee }} TK</h5>
            <h3>{{ $postData->title }}</h3>
          </div>
        @endforeach
        </div>
        <div class="pro-modal-content-footer"></div>
      </div>
    </div>

    <!-- pro modal  end  -->

  <div class="container">
    <div class="grid-aside-left">
      <aside>
        <div class="profile-aside">
          @if($personal_data->id ?? '')
          <a href="{!! route('personal_data_form', Auth::user()->id) !!}" method="POST" class="profile-edit-btn"
            style="right: 10px; top: 10px ;">+ Edit
          </a>
          @else
          <a href="{!! route('personal_data_form', Auth::user()->id) !!}" method="POST" class="profile-edit-btn"
            style="right: 10px; top: 10px;"><i class="fa-solid fa-pen-to-square"></i>Update
          </a>
          @endif
          <div class="profile-aside-profile">
            @if($personal_data)
            <img src="{!! asset('assets/img/uploaded/profile/' . $personal_data->img ?? '') !!}" alt="profile" />
            @endif
            <div>
              <h5>{{ $personal_data->name ?? ''}}</h5>
            </div>
           
          </div>

          <h6></h6>

          <h4 class="mt-3">ID No : {{ Auth::user()->user_id ?? '' }}</h4>

          <ul>
            <li><span>Age</span> : <span>{{ $personal_data->age ?? '' }}</span></li>
            <li><span>Religion</span> : <span>{{ $personal_data->religion ?? '' }}</span></li>
            <li><span>Height</span> : <span>{{ $personal_data->height ?? '' }}</span></li>
            <li><span>Marital Status</span> : <span>{{ $personal_data->marital ?? '' }}</span></li>
            <li><span>Have Children?</span> : <span>{{ $personal_data->children ?? '' }}</span></li>
            <li><span>Date Of Birth</span> : <span>{{ $personal_data->date_of_birth ?? '' }}</span></li>
            <li><span>Complexion</span> : <span>{{ $personal_data->complexion ?? '' }}</span></li>
            <li><span>Weight</span> : <span>{{ $personal_data->weight ?? '' }}</span></li>
            <li><span>Blood Group</span> : <span>{{ $personal_data->blood_group ?? '' }}</span></li>
            <li><span>Height</span> : <span>{{ $personal_data->height ?? '' }}</span></li>
            <li><span>Profession</span> : <span>{{ $personal_data->proffession ?? '' }}</span></li>
            <li><span>Education</span> : <span>{{ $personal_data->education ?? '' }}</span></li>
            <li><span>Nationality</span> : <span>{{ $personal_data->nationality ?? '' }}</span></li>
            <li><span>Address</span> : <span>{{ $personal_data->address ?? '' }}</span></li>
            <li><span>Number</span> : <span>{{ $personal_data->number ?? '' }}</span></li>
          </ul>

        </div>

        <div class="contact-aside">
          <h4>Contact</h4>
          <h6>
            chosen biodata locally and directly before taking the decision
            of marriage.
          </h6>

          <p>  
            Viewing contact information of the parent of this biodata will
            cost you 1 connection.
          </p>
          <div class="px-4"><a href="tel:01766325014">Contact Us</a></div>
        </div>
      </aside>

      <div class="profile-page-section-content">
        <div class="profile-section-page-box">
          @if($edu_data->id ?? '')
          <a href="{!! route('edu_quali_form', Auth::user()->id) !!}" method="POST" class="profile-edit-btn"
            style="right: 10px; top: 10px ;">+ Edit
          </a>
          @else
          <a href="{!! route('edu_quali_form', Auth::user()->id) !!}" method="POST" class="profile-edit-btn"
            style="right: 10px; top: 10px ;"><i class="fa-solid fa-pen-to-square"></i> Update
          </a>
          @endif

          <div class="profile-section-page-box-header">
            <h3>Educational Qualifications</h3>
          </div>
          <div class="table-bar-res">
            <table>
              <thead>
                <tr>
                  <th>Educational Qualifications</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Your Education Method</td>
                  <td>{{ $edu_data->education_method ?? '' }}</td>
                </tr>
                <tr>
                  <td>Your Latest Education</td>
                  <td>{{ $edu_data->latest_edu ?? '' }}</td>
                </tr>
                <tr>
                  <td>SSC / Dakhil / Equivalent Passing year</td>
                  <td>{{ $edu_data->passing_year ?? '' }}</td>
                </tr>
                <tr>
                  <td>Result</td>
                  <td>{{ $edu_data->result ?? '' }}</td>
                </tr>
                <tr>
                  <td>
                    Which year are you reading in HSC / Alim / Equivalent ?
                  </td>
                  <td>{{ $edu_data->equivalent ?? '' }}</td>
                </tr>
                <tr>
                  <td>Other educational qualifications</td>
                  <td>{{ $edu_data->qualification ?? '' }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="profile-section-page-box">

          @if($family_data->id ?? '')
          <a href="{!! route('family_information_form', Auth::user()->id) !!}" method="POST" class="profile-edit-btn"
            style="right: 10px; top: 10px ;">+ Edit
          </a>
          @else
          <a href="{!! route('family_information_form', Auth::user()->id) !!}" class="profile-edit-btn">
            <i class="fa-solid fa-pen-to-square"></i>Update</a>
          @endif
          <div class="profile-section-page-box-header">
            <h3>Family Information</h3>
          </div>
          <div class="table-bar-res">
            <table>
              <thead>
                <tr>
                  <th>Family Information</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Is your father alive?</td>
                  <td>{{ $family_data->father_alive ?? '' }}</td>
                </tr>
                <tr>
                  <td>Description of Father's Profession</td>
                  <td>
                    {{ $family_data->father_profession ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>Is your mother alive?</td>
                  <td>{{ $family_data->mother_alive ?? '' }}</td>
                </tr>
                <tr>
                  <td>Description of Mother's Profession</td>
                  <td>{{ $family_data->mother_profession ?? '' }}</< /td>
                </tr>
                <tr>
                  <td>How many Brothers/Sister do you have?</td>
                  <td>{{ $family_data->how_many_brother ?? '' }}</td>
                </tr>
                <tr>
                  <td>Brother/Sister Information</td>
                  <td>
                    {{ $family_data->brother_information ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>Family Financial Status</td>
                  <td>{{ $family_data->financial_status ?? '' }}</td>
                </tr>
                <tr>
                  <td>Description of Financial Condition</td>
                  <td>
                    {{ $family_data->financial_condition ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>How is your family's religious condition?</td>
                  <td>
                    {{ $family_data->religious_condition ?? '' }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="profile-section-page-box">
          @if($ocu_data->id ?? '')
          <a href="{!! route('ocu_info_form', Auth::user()->id) !!}" method="POST" class="profile-edit-btn"
            style="right: 10px; top: 10px ;">+ Edit
          </a>
          @else
          <a href="{!! route('ocu_info_form', Auth::user()->id) !!}" class="profile-edit-btn">
            <i class="fa-solid fa-pen-to-square"></i>+ Update</a>
          @endif
          <div class="profile-section-page-box-header">
            <h3>Occupational information</h3>
          </div>
          <div class="table-bar-res">
            <table>
              <thead>
                <tr>
                  <th>Occupational information</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Occupation</td>
                  <td>{{ $ocu_data->occupation ?? '' }}</td>
                </tr>
                <tr>
                  <td>Description of Profession</td>
                  <td>{{ $ocu_data->description_of_profession ?? '' }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="profile-section-page-box">

          @if($marriage_data->id ?? '')
          <a href="{!! route('marriage_related_form', Auth::user()->id) !!}" method="POST" class="profile-edit-btn"
            style="right: 10px; top: 10px ;">+ Edit
          </a>
          @else
          <a href="{!! route('marriage_related_form', Auth::user()->id) !!}" class="profile-edit-btn">
            <i class="fa-solid fa-pen-to-square"></i>+ Update</a>
          @endif
          <div class="profile-section-page-box-header">
            <h3>Marriage Related Information</h3>
          </div>
          <div class="table-bar-res">
            <table>
              <thead>
                <tr>
                  <th>Marriage Related Information</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    Single/Married/Divorce
                  </td>
                  <td>
                    {{ $marriage_data->marriage_status ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>
                  Do your guardians agree to your marriage?
                  </td>
                  <td>
                    {{ $marriage_data->agree_to_marriage ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Write down the reasons for divorce mentioning the date
                    of your previous marriage and divorce
                  </td>
                  <td>
                    {{ $marriage_data->reason_divorce ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>Are you willing to do any job after marriage?</td>
                  <td>{{ $marriage_data->after_marriage ?? '' }}</td>
                </tr>
                <tr>
                  <td>
                    Would you like to continue your studies after marriage?
                  </td>
                  <td>{{ $marriage_data->studies_after_marriage ?? '' }}</td>
                </tr>
                <tr>
                  <td>
                    Why are you getting married? What are your thoughts on
                    marriage?
                  </td>
                  <td>
                    {{ $marriage_data->getting_married ?? '' }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="profile-section-page-box">
          @if($life_partner_data->id ?? '')
          <a href="{!! route('life_partner_form', Auth::user()->id) !!}" method="POST" class="profile-edit-btn"
            style="right: 10px; top: 10px ;">+ Edit
          </a>
          @else
          <a href="{!! route('life_partner_form', Auth::user()->id) !!}" class="profile-edit-btn">
            <i class="fa-solid fa-pen-to-square"></i> Update</a>
          @endif
          <div class="profile-section-page-box-header">
            <h3>Expected Life Partner</h3>
          </div>
          <div class="table-bar-res">
            <table>
              <thead>
                <tr>
                  <th>Expected Life Partner</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Age</td>
                  <td>{{ $life_partner_data->age ?? '' }}</td>
                </tr>
                <tr>
                  <td>Complexion</td>
                  <td>{{ $life_partner_data->complexion ?? '' }}</td>
                </tr>
                <tr>
                  <td>Height</td>
                  <td>{{ $life_partner_data->height ?? '' }}</td>
                </tr>
                <tr>
                  <td>Educational Qualification</td>
                  <td>{{ $life_partner_data->educational_qualification ?? '' }}</td>
                </tr>
                <tr>
                  <td>District</td>
                  <td>{{ $life_partner_data->district ?? '' }}</td>
                </tr>
                <tr>
                  <td>Financial Condition</td>
                  <td>{{ $life_partner_data->financial_condition ?? '' }}</td>
                </tr>
                <tr>
                  <td>
                    Expected Qualities or Attributes of Your Life Partner
                  </td>
                  <td>
                    {{ $life_partner_data->life_partner ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Why Are You Getting Married?
                  </td>
                  <td>
                    {{ $life_partner_data->getting_married ?? '' }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Payment Modal -->
<!-- Add Modal Sylheti Biye Shadi.com works -->
<div class="modal fade per_profile" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true" style="padding-top: 20px;">
  <div class="modal-dialog" style="max-width:800px !important;">
    <div class="modal-content ">
      <div class="modal-body" style="color: #cab562;">
        <form class="forms-sample" action="{{ route('payment.create') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="color">Your Payment Number</label>
            <input type="number" name="b_number" class="form-control" type="text" placeholder="Enter Your Bkash Number"
              aria-required="true" required>
            <span class="text-danger">
              @error('b_number')
              {{ $message }}
              @enderror
            </span>
          </div>
          <div class="form-group">
            <label class="color">Your Transaction Number</label>
            <input type="text" name="trans_number" class="form-control" type="text" placeholder="Transaction Number"
              aria-required="true" required>
            <span class="text-danger">
              @error('trans_number')
              {{ $message }}
              @enderror
            </span>
          </div>
          <div class="form-group">
            <label class="color">Amount</label>
            <input type="number" name="amount" class="form-control" type="text" placeholder="Enter Amount"
              aria-required="true" required>
            <span class="text-danger">
              @error('amount')
              {{ $message }}
              @enderror
            </span>
          </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-12 mb-5">
          <button type="submit" class="btn btn-md btn-primary float-right mr-4 ">Submit</button>
          <a data-bs-dismiss="modal" aria-label="Close" class="btn btn-md btn-danger float-right mr-2">Back</a>
        </div>
      </div>
      </form>
      <div class="sub-01">
        <img src="{{asset('/assets/frontend/login/images/shap-02.png')}}">
      </div>
      @if (Session::has('message'))
      <script>
        swal("Message", "{{Session::get('message')}}", 'success', {
          button: true,
          button: 'ok',
          timer: 8000,
          dangerMode: false,
        });
      </script>
      @endif
    </div>
  </div>
</div>

<script>
  $(".hide").click(function(){
    $(".plan").hide();
  });
</script>
@endsection