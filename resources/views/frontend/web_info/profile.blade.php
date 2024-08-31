@extends('frontend.layouts.app')
@section('content')

@php
use App\Models\SiteSetting;

$site_setting = SiteSetting::where('status', '0')->first();

@endphp

<style>
  button, input {
    overflow: hidden;
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
          <li><a class="lispan" href="{{route('register')}}"><span class=""></span>Free Registration</a>
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
      <form action="" method="get">
      <aside>
        <div class="filter-box card-bg-shadow">
          <h4>Filter</h4>
          <div class="filter-input">
            <h5>Select Age</h5>
            <div class="d-flex gap-2 align-items-center">
              <input type="number" name="min_age" id="age" placeholder="Minimum" style="text-align: center;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"/>
              <span>To</span>
              <input type="number" name="max_age" id="age" placeholder="Maximum" style="text-align: center;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"/>
            </div>
          </div>

          <div class="filter-input">
            <h5>Location</h5>
            <select name="country_id" class="form-control" id="exampleInputUsername1" name="country_id" required>
              <option  disabled  selected>Select Location...</option>
              @forelse($country as $postData)
              <option value="{{$postData->id}}" >{{$postData->country}}</option>
              @empty
              <option>Country Not Found</option>
              @endforelse
            </select>
          </div>

          <div class="filter-input">
            <h5>Select Gender</h5>
            <select name="gender" id="gender">
             <option  disabled  selected>Select Gender...</option>
              <option  value="Male">Male</option>
              <option  value="Female">Female</option>
              <option  value="Other">Other</option>
            </select>
          </div>

          <div class="filter-input">
            <h5>Select Religion</h5>
              <select name="religion" class="form-control">
              <option  disabled  selected>Select Religion...</option>
              <option  value="Hindu">Hindu</option>
              <option  value="Muslim">Muslim</option>
              <option  value="Other">Other</option>
            </select>
          </div>
          <div class="submit-form">
            <button type="submit" class="btn btn-info">Find Now</button>
          </div>
        </div>
      </aside>
      </form>

      <div>
        @foreach($user as $postData)
        <div class="profile-box">
          <div class="profile-box-left">
            <div class="profile-box-img">
              @foreach($postData->personal_info as $personal_data)

              @if (Auth::check() && Auth::user()->status === 0)
              <img src="{!! asset('assets/img/uploaded/profile/' . $personal_data->img ?? '') !!}"
                alt="{{ $postData->alt_img }}" />
                @else
                <img src="{{asset('/assets/frontend/img/d_1.jpg')}}" alt="Dummy-Image" />
               @endif
              @endforeach
            </div>
            <div class="profile-box-text">
              @foreach($postData->personal_info as $personal_data)
              <h6>{{ $personal_data->name ?? '' }}</h6>
              @endforeach
              <ul>
                @foreach($postData->personal_info as $personal_data)
                <li><span>Age</span>:<span>{{ $personal_data->age }} </span></li>
                <li><span>Religion</span>:<span>{{ $personal_data->religion }}</span></li>
                <li><span>Height</span>:<span>{{ $personal_data->height }}</span></li>
                <li><span>Nationality</span> : <span>{{ $personal_data->nationality ?? '' }}</span></li>
                @endforeach
              </ul>
            </div>
          </div>

          <div class="profile-box-right">
            <a href="#" class="main-btn">ID No : {{ $postData->user_id ?? '' }}</a>
            @if (Auth::check())
              <a href="{!! route('profile_page', $postData->id) !!}">View Details <i class="fa-solid fa-arrow-right-long"></i></a>
            @else
            <a href=""data-bs-toggle="modal" data-bs-target="#myModal">View Details<i class="fa-solid fa-arrow-right-long"></i></a>
            @endif
          </div>

        </div>
        @endforeach

        {{$user->links('pagination::bootstrap-5')}}
      </div>
    </div>
  </div>

      <!-- Modal Start -->
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="border:none !important;">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Centered content goes here -->
         <div class="text-center mb-4">
            <p class="fs-4 text-dark " style="font-weight: 500;"> Hello User Please Login OR Register First</p> 
         </div>
          <ul class="d-flex align-items-center justify-content-center gap-3 mb-3 mt-2">
             <li><a class="btn btn-sm main-btn" href="{{route('login')}}">Login</a></li>
              <li><a class="btn btn-sm main-btn" href="{{route('register')}}">Register</a></li>
          </ul>
          </div>
          <!-- <div class="modal-footer" style="border:none !important;">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
 
          </div> -->
        </div>
      </div>
    </div>
</section>
<!-- ==================== profile section end ============================= -->
@endsection