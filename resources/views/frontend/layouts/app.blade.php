@php
use App\Models\SiteSetting;

$site_setting = SiteSetting::where('status', '0')->first();

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>

  <meta name="title" content="@yield('title')">
  <meta name="description" content="@yield('description')">
  <meta name="keywords" content="@yield('keywords')">

  <link rel="icon" type="image/x-icon" href="assets/frontend/img/capture.png">


  <link rel="stylesheet" href="{{asset('/assets/frontend/css/bootstrap.min.css')}}" />
  <!-- pop font  -->
  <link rel="stylesheet" href="{{asset('/assets/frontend/font/pop-font.css')}}" />
  <!-- asap font  -->
  <link href="{{asset('/assets/frontend/font/asap-font.css')}}" rel="stylesheet" />

  
  <!-- css link  -->

  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/assets/frontend/icon/css/all.min.css')}}" />

  <link href="{{asset('/assets/frontend/login/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/frontend/login/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/frontend/login/css/style.css')}}" rel="stylesheet">

  <!-- sweetAlert -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <link rel="stylesheet" href="{{asset('/assets/frontend/css/style.css')}}" />

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

  <!-- ================== video modal ========================== -->

  <div class="video-modal">
    <div class="video-modal-box">
      <i class="fa-solid fa-xmark"></i>
      <iframe src="" title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen></iframe>
    </div>
  </div>

  <!-- ================== video modal end ========================== -->

  <!-- ======================== header ================================ -->
  
  <header>
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
            <li><a href="{!! route('user_dashboard') !!}">Dashboard </a></li>
            @endif
            @if (Auth::guest())
            <li><a class="lispan" href="{{route('login')}}"><span class=""></span> Login</a>
            </li>
            @else
            <!-- <li><a class="lispan" href="{{ route('User.LogOut')}}" method="POST"><span ></span>Logout</a></li> -->
            <li><a href="{{ route('logout') }}"
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

  @yield('content')

  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-content-left">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57903.025838138165!2d91.81983561384499!3d24.900058347511834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054d3d270329f%3A0xf58ef93431f67382!2sSylhet!5e0!3m2!1sen!2sbd!4v1705297870069!5m2!1sen!2sbd"
            style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="footer-content-right">
          <form action="{!! route('create.subs') !!}"" method="post">
            @csrf
              <div class="main-input">
                <input type="email" name="email" placeholder="Your Email" required />
                <span class="text-danger">
                  @error('email')
                  {{ $message }}
                  @enderror
                </span>
                <button type="submit" class="main-btn">Subscribe Now</button>
              </div>
            </form>

            @if (Session::has('message'))
          <script>
            swal("Message", "{{Session::get('message')}}", 'success', {
              button: true,
              button: 'ok',
              timer: 3000,
              dangerMode: true,
            });
          </script>
          @endif

          <div class="grid-3">
            <ul>
              <h4>Quick Link</h4>
              <li><a href="{!! route('about') !!}">About Us</a></li>
              <li><a href="{!! route('profile') !!}">Profile</a></li>
              <!-- <li><a href="#">Our Plan</a></li> -->
              <li><a href="{!! route('client') !!}">Happy Client</a></li>
              <!-- <li><a href="#">Blog</a></li> -->
            </ul>
            <ul>
              <h4>Support</h4>
              @if (Auth::guest())
              <li><a href="{{route('login')}}">Login</a></li>
              <li><a href="{{route('register')}}">Free Registration</a></li>
               @else
               @endif
            </ul>
            <ul>
              <h4>About us</h4>
              <li><a href="{!! route('about') !!}">About Us</a></li>
              <li><a href="{!! route('client') !!}">Happy Client</a></li>
              <!-- <li><a href="#">Blog</a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <h6>
        <a href="https://www.opstelit.com/">{{ $site_setting->copy_right ?? ''}}Total Visitors: {{ session('website_visit_count', 0) }}</a>
      </h6>
    </div>
  </footer>

  <!-- ======================== footer end ==================================== -->
  <!-- js link js  -->

  <script src="{{asset('/assets/frontend/js/jq.js')}}"></script>
  <script src="{{asset('/assets/frontend/js/bootstrap.min.js')}}"></script>

  <script src="{{asset('/assets/frontend/js/script.js')}}"></script>


  
  <script>
    // Alert Hiden
    document.addEventListener("DOMContentLoaded", function (event) {
      var scrollpos = localStorage.getItem('scrollpos');
      if (scrollpos) window.scrollTo(0, scrollpos);
    });

    // Scroll 
    window.onbeforeunload = function (e) {
      localStorage.setItem('scrollpos', window.scrollY);
    };
  </script>


  <script>
    /** @format */

    const preloader = document.querySelector(".preloader");

    window.addEventListener("load", () => {
      preloader.classList.add("active");
    });

    window.addEventListener("scroll", function () {
      const header = document.querySelector("header");
      if (this.scrollY >= 1) {
        header.classList.add("active");
      } else {
        header.classList.remove("active");
      }
    });

    // menu

    const navBtn = document.querySelector("#menu-btn");
    const navContent = document.querySelector(".nav-bar");

    navBtn.addEventListener("click", () => {
      navContent.classList.toggle("active");
      navBtn.classList.toggle("fa-xmark");
    });

    // menu end

    //  video play

    const videoBtn = document.querySelectorAll(".video-play-btn");
    const videoContent = document.querySelector(".video-modal");

    videoBtn.forEach((btn) => {
      let btnUrl = btn.getAttribute("data-video");
      let videoCon = videoContent.querySelector("iframe");

      btn.addEventListener("click", () => {
        videoContent.classList.add("active");

        videoCon.setAttribute("src", btnUrl);
      });

      videoContent.querySelector("i").onclick = () => {
        videoContent.classList.remove("active");
        videoCon.setAttribute("src", "");
      };
    });

    //  video play  end

    // ===============

    function filter(filterBtn, items) {
      $(filterBtn).on("change", function () {
        var selected = $(this).find(":selected").attr("data-target");
        var item = items;
        $(item).hide();
        $(item + "." + selected).fadeIn();
        if (selected == "all") {
          $(item).fadeIn();
        }
      });
    }

    filter(".study-select", ".sort-box");
    filter(".flive", ".father-filter");
    filter(".mlive", ".mother-filter");
    filter(".filter-edu", ".filter-edu-items");
    filter(".filter-mar", ".filter-mar-item");

    // end  ===============
  </script>
</body>

</html>