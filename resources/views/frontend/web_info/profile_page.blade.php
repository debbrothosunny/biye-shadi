<!-- @format -->
@extends('frontend.layouts.app')

@section('content')

@php
use App\Models\SiteSetting;
$site_setting = SiteSetting::where('status', '0')->first();
@endphp

<style>
  .design{

    text-align:center;
    font-size:20px;
  }
</style>

<!-- ======================== header ================================ -->
<header class="white-bg">
  <div class="container">
    <div class="header-content">
      <h1>
        <a href="{!! route('index') !!}"><img
            src="{!! asset('assets/img/uploaded/home/img/') !!}/{{ $site_setting->w_img ?? ''}}" alt="logo" /></a>
        <a href="{!! route('index') !!}"><img
            src="{!! asset('assets/img/uploaded/home/img/') !!}/{{ $site_setting->d_img ?? ''}}" alt="logo-dark" /></a>
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
          <li><a href="{!! route('user_dashboard') !!}">Dashboard </a></li>
          @endif
          @if (Auth::guest())
          <li><a class="lispan" href="{{route('login')}}"><span class=""></span> Login</a>
          </li>
          @else
          <!-- <li><a class="lispan" href="{{ route('User.LogOut')}}" method="POST"><span ></span>Logout</a></li> -->
          <li><a class="lispan" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
            </a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

<!-- ==================== profile section ============================= -->
<section class="profile-section">
  <div class="container">
    <div class="grid-aside-left">
      <aside>
        <div class="profile-aside">
          @foreach($personal_datas as $postData)
          <div class="profile-aside-profile">
          @if (Auth::check() && Auth::user()->status === 0)
            <img src="{!! asset('assets/img/uploaded/profile/' . $postData->img ?? '') !!}" alt="profile"/>
            @else
             <p>After Payment <br> Profile Is Show</p>
          @endif
            <div>
              <h5>{{ $postData->name }}</h5>
            </div>
          </div>
          <h4 class="mt-3">ID No : {{ Auth::user()->user_id ?? '' }}</h4>
          <ul>
            <li><span>Age</span> : <span>{{ $postData->age ?? '' }}</span></li>
            <li><span>Religion</span> : <span>{{ $postData->religion ?? '' }}</span></li>
            <li><span>Height</span> : <span>{{ $postData->height ?? '' }}</span></li>
            <li><span>Marital Status</span> : <span>{{ $postData->marital ?? '' }}</span></li>
            <li><span>Have Children?</span> : <span>{{ $postData->children ?? '' }}</span></li>
            <li><span>Date Of Birth</span> : <span>{{ $postData->date_of_birth ?? '' }}</span></li>
            <li><span>Complexion</span> : <span>{{ $postData->complexion ?? '' }}</span></li>
            <li><span>Weight</span> : <span>{{ $postData->weight ?? '' }}</span></li>
            <li><span>Blood Group</span> : <span>{{ $postData->blood_group ?? '' }}</span></li>
            <li><span>Nationality</span> : <span>{{ $postData->nationality ?? '' }}</span></li>
            <li><span>Profession</span> : <span>{{ $postData->proffession ?? '' }}</span></li>
            <li><span>Education</span> : <span>{{ $postData->education ?? '' }}</span></li>
          </ul>
          <a href="tel:01615338863">Call for Meeting</a>
          @endforeach
          <div>
          <p>Your profile has been visited {{ $profile->visits }} times.</p>
         </div>
        </div>
        <div class="contact-aside">
          <!-- <h4>Contact</h4>
          <h6>
            chosen biodata locally and directly before taking the decision
            of marriage.
          </h6>
          <p>
            Viewing contact information of the parent of this biodata will
            cost you 1 connection.
          </p> -->
          <!-- <div class="px-4"><a href="#">Contact Us</a></div> -->
        </div>
      </aside>


      <div class="profile-page-section-content">
         @if (Auth::check() && Auth::user()->status === 0)
          <p class="design">Welcome to the paid section of our site!</p>

        <div class="profile-section-page-box">
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
                @foreach($edu_data as $postData)
                <tr>
                  <td>Your Education Method</td>
                  <td>{{ $postData->education_method ?? '' }}</td>
                </tr>
                <tr>
                  <td>SSC / Dakhil / Equivalent Passing year</td>
                  <td>{{ $postData->passing_year ?? '' }}</td>
                </tr>
                <td>Result</td>
                <td>{{ $postData->result ?? '' }}</td>
                </tr>
                <tr>
                  <td>
                    Which year are you reading in HSC / Alim / Equivalent ?
                  </td>
                  <td>{{ $postData->equivalent ?? '' }}</td>
                </tr>
                <tr>
                  <td>Other educational qualifications</td>
                  <td>{{ $postData->qualification ?? '' }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        
        <div class="profile-section-page-box">

          <div class="profile-section-page-box-header">
            <h3>Family Information</h3>
          </div>
          <div class="table-bar-res">
            @foreach($family_data as $postData)
            <table>
              <thead>
                <tr>
                  <th>Family Information</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Your Father Alive?</td>
                  <td>{{ $postData->father_alive ?? '' }}</td>
                </tr>
                <tr>
                  <td>Description of Father's Profession</td>
                  <td>
                    {{ $postData->father_profession ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>Your Mother Alive?</td>
                  <td>{{ $postData->mother_alive ?? '' }}</td>
                </tr>
                <tr>
                  <td>Description of Mother's Profession</td>
                  <td>{{ $postData->mother_profession ?? '' }}</td>
                </tr>
                <tr>
                  <td>How many brothers do you have?</td>
                  <td>{{ $postData->how_many_brother ?? '' }}</td>
                </tr>
                <tr>
                  <td>Brother Information</td>
                  <td>
                    {{ $postData->brother_information ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>Family Financial Status</td>
                  <td>{{ $postData->financial_status ?? '' }}</td>
                </tr>
                <tr>
                  <td>Description of Financial Condition</td>
                  <td>
                    {{ $postData->financial_condition ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>How is your family's religious condition?</td>
                  <td>
                    {{ $postData->religious_condition ?? '' }}
                  </td>
                </tr>
              </tbody>
            </table>
            @endforeach
          </div>

        </div>
        <div class="profile-section-page-box">
          <div class="profile-section-page-box-header">
            <h3>Occupational information</h3>
          </div>
          <div class="table-bar-res">
            @foreach($ocu_data as $postData)
            <table>
              <thead>
                <tr>
                  <th>Occupational information</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Occupation</td>
                  <td>{{ $postData->occupation ?? '' }}</td>
                </tr>
                <tr>
                  <td>Description of Profession</td>
                  <td>{{ $postData->description_of_profession ?? '' }}</td>
                </tr>
              </tbody>
            </table>
            @endforeach
          </div>
        </div>
        <div class="profile-section-page-box">
          <div class="profile-section-page-box-header">
            <h3>Marriage Related Information</h3>
          </div>
          <div class="table-bar-res">
            @foreach($marriage_data as $postData)
            <table>
              <thead>
                <tr>
                  <th>Marriage Related Information</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    Write down the reasons for divorce mentioning the date
                    of your previous marriage and divorce
                  </td>
                  <td>
                    {{ $postData->marriage_status ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>Do your guardians agree to your marriage?</td>
                  <td>{{ $postData->agree_to_marriage ?? '' }}</td>
                </tr>
                <tr>
                  <td>Are you willing to do any job after marriage?</td>
                  <td>{{ $postData->after_marriage ?? '' }}</td>
                </tr>
                <tr>
                  <td>
                    Would you like to continue your studies after marriage?
                  </td>
                  <td>{{ $postData->studies_after_marriage ?? '' }}</td>
                </tr>
                <tr>
                  <td>
                    Why are you getting married? What are your thoughts on
                    marriage?
                  </td>
                  <td>
                    {{ $postData->getting_married ?? '' }}
                  </td>
                </tr>
              </tbody>
            </table>
            @endforeach
          </div>
        </div>
        <div class="profile-section-page-box">
          <div class="profile-section-page-box-header">
            <h3>Expected Life Partner</h3>
          </div>
          <div class="table-bar-res">
            @foreach($life_partner_data as $postData)
            <table>
              <thead>
                <tr>
                  <th>Expected Life Partner</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Age</td>
                  <td>{{ $postData->age ?? '' }}</td>
                </tr>
                <tr>
                  <td>Complexion</td>
                  <td>{{ $postData->complexion ?? '' }}</td>
                </tr>
                <tr>
                  <td>Height</td>
                  <td>{{ $postData->height ?? '' }}</td>
                </tr>
                <tr>
                  <td>Educational Qualification</td>
                  <td>{{ $postData->educational_qualification ?? '' }}</td>
                </tr>
                <tr>
                  <td>District</td>
                  <td>{{ $postData->district ?? '' }}</td>
                </tr>
                <tr>
                  <td>Financial Condition</td>
                  <td>{{ $postData->financial_condition ?? '' }}</td>
                </tr>
                <tr>
                  <td>
                    Expected Qualities or Attributes of Your Life Partner
                  </td>
                  <td>
                    {{ $postData->life_partner ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Why Are You Getting Married?
                  </td>
                  <td>
                    {{ $postData->getting_married ?? '' }}
                  </td>
                </tr>
              </tbody>
            </table>
            @endforeach
          </div>
        </div>

        @else
        <div class="py-4 text-center ">
          <p class=" text-dark mt-2 fs-3 mb-4 ">Please complete your payment to access this content.</p>
           <!-- You can add a button or link to initiate the payment process -->
          <a class="btn main-btn " href="{{ route('user_dashboard', $postData->id) }}">Make Payment</a>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>

<style>
  .design{
    margin-top: 10px;
    color:#777;
    font-size:30px;
    margin-bottom:10px;
    margin-right: 30px;
  }
</style>
<!-- ==================== profile section end ============================= -->
@endsection