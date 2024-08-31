<!-- @format -->
@extends('frontend.layouts.app')
@if($seo)
@section('title', "$seo->meta_title ")
@section('description', "$seo->meta_description")
@section('keywords', "$seo->meta_keyword")
@endif
@section('content')

<!-- preloader  -->
<!-- <div class="preloader">
      <img src="icon/loader.gif" alt="loader" />
    </div> -->

<!-- preloader end -->

<!-- ====================== hero section =========================== -->


@foreach ($cw_img->where('sec', 'home_sec_1') as $postData)
<main class="hero-section"
  style="background: url('{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}')">
  <div class="container">
    <div class="hero-section-content">
      <h2>{{ $postData->title }}</h2>
      <p>
        {!! $postData->des !!}
      </p>
      <ul class="d-flex gap-4 align-items-center">
        <li><a href="{{route('register')}}" class="main-btn">{{ $postData->button_name_one }}</a></li>
        <li class="d-flex gap-2 align-items-center video-play-btn" data-video="{!! $postData->video !!}">
          <i class="fa-solid fa-play"></i> <u>How To Create Bio Data</u>
        </li>
      </ul>
    </div>
  </div>
</main>
@endforeach

<!-- ====================== hero section emd =========================== -->

<!--========================== find form ==============================  -->
<form action="" method="get">
<section class="find-form">
  <div class="container">
    <div class="find-form-content">
      <div class="find-form-input">
        <i class="fa-solid fa-venus-mars"></i>
        <select required name="gender" class="form-control" >
          <option  disabled  selected>Select Gender...</option> 
          <option  value="Male">Male</option>
          <option  value="Female">Female</option>
          <option  value="Other">Other</option>
        </select>
      </div>

      <div class="find-form-input">
        <i class="fa-regular fa-calendar-days"></i>
        <select name="age" class="form-control" required>
          <option  disabled   selected>Select Age...</option>
          @for($n = 16; $n <= 60; $n++)
          <option value="{{$n}}">{{$n}}</option>
          @endfor
        </select>
      </div>

      <div class="find-form-input">
        <i class="fa-solid fa-star-and-crescent"></i>
        <select name="religion" class="form-control" >
          <option  disabled  selected>Select Religion...</option>
          <option  value="Hindu">Hindu</option>
          <option  value="Muslim">Muslim</option>
          <option  value="Other">Other</option>
        </select>
      </div>

      <div class="find-form-input">
        <i class="fa-solid fa-location-dot"></i>
        <select name="country_id" class="form-control" id="exampleInputUsername1" name="country_id" >
          <option  disabled  selected>Select Location...</option>
          @forelse($country as $postData)
          <option value="{{$postData->id}}">{{$postData->country}}</option>
          @empty
          <option>Country Not Found</option>
          @endforelse
        </select>
      </div>

      <div class="find-form-input">
        <i class="fa-solid fa-heart"></i>
        <select name="marital" class="form-control" >
          <option  disabled  selected>Select Marital Status...</option>
          <option  value="Single">Single</option>
          <option  value="Married">Married</option>
          <option  value="Divorce">Divorce</option>
        </select>
      </div>

      <div class="find-form-input">
        <i class="fa-solid fa-user-graduate"></i>
        <select class="form-control" id="exampleInputUsername1" name="education">
        <option  disabled  selected>Select EQ...</option>
          @forelse($education as $postData)
          <option value="{{$postData->id}}" >{{$postData->education}}</option>
          @empty
          <option>Education Not Found</option>
          @endforelse
        </select>
      </div>

      <div class="find-form-input">
        <i class="fa-solid fa-briefcase"></i>
        <select class="form-control" id="exampleInputUsername1" name="proffession">
          <option disabled  selected>Select Profession...</option>
          @forelse($profession as $postData)
          <option value="{{$postData->id}}">{{$postData->profession}}</option>
          @empty
          <option>Profession Not Avilable</option>
          @endforelse
        </select>
      </div>

      <div class="submit-form">
        <button type="submit" class="main-btn">Find Now</button>
      </div>
    </div>
  </div>
</section>
</form>
<!--========================== find form  end ==============================  -->

<!-- ========================== home bio ===================================== -->

<section class="home-bio">
  <div class="container">
    <div class="section-header">
      @foreach ($all_title->where('sec', 'home_sec_3') as $postData)
      <h2>{!! $postData->title !!}</h2>
      @endforeach
    </div>

    <div class="home-bio-content grid-5">
      @foreach($user->take(20) as $postData)
      <div class="home-bio-box">

        <div class="home-bio-box-img">
          @foreach($postData->personal_info as $personal_data)
            @if(Auth::check() && Auth::user()->status === 0)
              <img src="{!! asset('assets/img/uploaded/profile/' . $personal_data->img ?? '') !!}" alt="profile"/>
              @else
              <img src="{{asset('/assets/frontend/img/d_1.jpg')}}" alt="Dummy-Image" />
            @endif
          @endforeach
        </div>
        <div class="home-bio-box-text">
          @foreach($postData->personal_info as $personal_data)
          <h4>{{ $personal_data->name ?? '' }}</h4>
          @endforeach
          <ul>
            @foreach($postData->personal_info as $personal_data)
            <li><span>Age</span>:<span>{{ $personal_data->age }} </span></li>
            <li><span>Religion</span>:<span>{{ $personal_data->religion }}</span></li>
            <li><span>Height</span>:<span>{{ $personal_data->height }}</span></li>
            @endforeach
          </ul>

          @if (Auth::check())
              <a href="{!! route('profile_page', $postData->id) !!}">View Details <i class="fa-solid fa-arrow-right-long"></i></a>
          @else
           <a href=""data-bs-toggle="modal" data-bs-target="#myModal">View Details<i class="fa-solid fa-arrow-right-long"></i></a>
          @endif
          
        </div>
      </div>
      @endforeach
    </div>
    <div class="row justify-content-center pt-5 {{count($user) < 20 ? 'd-none':''}}">
      <a href="{{ route('more_bio') }}"><button type="button" class="btn btn-success mx-auto d-block">View
          More ({{count($user)}})</button></a>
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

<!-- ========================== home bio end ===================================== -->

<!-- ========================= home about ======================= -->

<section class="home-about py-5">
  <div class="container">
    <div class="home-about-content grid-2">
      @foreach ($cw_img->where('sec', 'home_sec_4') as $postData)
      <div class="home-about-content-left">
        <h2>{{ $postData->title }}</h2>
        <h3>
          {{ $postData->sub_title }}
        </h3>
        <p>
          {!! $postData->des !!}
        </p>
        <div class="d-flex gap-3">
          <a href="{!! route('about') !!}" class="main-btn">{{ $postData->button_name_one }}</a>
        </div>
      </div>
      <div class="home-about-content-right">
        <img src="{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}" alt="img" />
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ========================= home about end ======================= -->

<!-- ============================== home work =================== -->

<section class="home-work">
  <div class="container">
    <div class="home-work-content grid-2">
      @foreach ($SylhetiBiye as $postData)
      <div class="home-work-img">
        <img src="{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}"
          alt="{{ $postData->alt_img }}" />
      </div>
      <div class="home-work-text">
        <h3>
          {!! $postData->title !!}
        </h3>
        <ul>
          <li>
            <div class="home-work-icon">
              <i class="{{ $postData->icon_1 }}"></i>
            </div>
            <div class="home-work-text">
              <h5>{{ $postData->title_1 }}</h5>
              <p>
                {!! $postData->des_1 !!}
              </p>
            </div>
          </li>
          <li>
            <div class="home-work-icon">
              <i class="{{ $postData->icon_2 }}"></i>
            </div>
            <div class="home-work-text">
              <h5>{{ $postData->title_2 }}</h5>
              <p>
                {!! $postData->des_2 !!}
              </p>
            </div>
          </li>
          <li>
            <div class="home-work-icon">
              <i class="{{ $postData->icon_3 }}"></i>
            </div>
            <div class="home-work-text">
              <h5>{{ $postData->title_3 }}</h5>
              <p>
                {!! $postData->des_3 !!}
              </p>
            </div>
          </li>
        </ul>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ============================== home work end =================== -->

<!-- ====================== home review ========================= -->

<section class="home-review">
  <div class="container">
    <div class="section-header text-center">
      @foreach ($OurClientReview as $postData)
      <h2 class="mb-2">{{ $postData->title }}</h2>
      <p>
        {!! $postData->des !!}
      </p>
      @endforeach
    </div>

    <div class="grid-3">
      @foreach ($clint_review->where('sec', 'home_sec_6') as $postData)
      <div class="home-review-box">
        <div class="home-review-box-img video-play-btn" data-video="{!! $postData->video !!}">
          <i class="fa-solid fa-play"></i>
          <img src="{!! asset('assets/img/uploaded/home/img/' . $postData->thumb ?? '') !!}" alt="img" />
        </div>
        <div class="home-review-box-text">
          <div class="home-review-profile">
            <img src="{!! asset('assets/img/uploaded/home/img/' . $postData->thumb ?? '') !!}" alt="img" />
            <div>
              <h5>{{ $postData->title }}</h5>
              <small>{{ $postData->date }}</small>
            </div>
          </div>
          <div>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="text-center mt-5">
      <a href="{!! route('client') !!}" class="main-btn">See All Review</a>
    </div>
  </div>
</section>



<!-- ====================== home review end ========================= -->

<!-- ==================== home blog ================================ -->

<!-- <section class="home-blog">
      <div class="container">
        <div class="section-header">
          <h2>Our Blog</h2>
        </div>

        <div class="home-blog-single grid-2">
          <div class="home-blog-single-img">
            <img src="img/Rectangle 20.png" alt="image" />
          </div>
          <div class="home-blog-single-text">
            <h3>
              Lorem ipsum is placeholder text commonly used in the Consent.
            </h3>
            <ul>
              <li>
                <i class="fa-regular fa-clock"></i> <span>21-01-2024</span>
              </li>
              <li><i class="fa-regular fa-user"></i> <span>Marriage</span></li>
            </ul>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
              enim ad minim veniam, quis nostrud exercitation ullamco.
            </p>
            <a href="#">View Details <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <div class="grid-3">
          <div class="home-blog-box">
            <div class="home-blog-single-img">
              <img src="img/Rectangle 20.png" alt="image" />
            </div>
            <div class="home-blog-single-text">
              <h3>
                Lorem ipsum is placeholder text commonly used in the Consent.
              </h3>
              <ul>
                <li>
                  <i class="fa-regular fa-clock"></i> <span>21-01-2024</span>
                </li>
                <li>
                  <i class="fa-regular fa-user"></i> <span>Marriage</span>
                </li>
              </ul>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco.
              </p>
              <a href="#"
                >View Details <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
          <div class="home-blog-box">
            <div class="home-blog-single-img">
              <img src="img/Rectangle 20.png" alt="image" />
            </div>
            <div class="home-blog-single-text">
              <h3>
                Lorem ipsum is placeholder text commonly used in the Consent.
              </h3>
              <ul>
                <li>
                  <i class="fa-regular fa-clock"></i> <span>21-01-2024</span>
                </li>
                <li>
                  <i class="fa-regular fa-user"></i> <span>Marriage</span>
                </li>
              </ul>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco.
              </p>
              <a href="#"
                >View Details <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
          <div class="home-blog-box">
            <div class="home-blog-single-img">
              <img src="img/Rectangle 20.png" alt="image" />
            </div>
            <div class="home-blog-single-text">
              <h3>
                Lorem ipsum is placeholder text commonly used in the Consent.
              </h3>
              <ul>
                <li>
                  <i class="fa-regular fa-clock"></i> <span>21-01-2024</span>
                </li>
                <li>
                  <i class="fa-regular fa-user"></i> <span>Marriage</span>
                </li>
              </ul>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco.
              </p>
              <a href="#"
                >View Details <i class="fa-solid fa-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="text-center mt-5 btn-center">
          <a href="blog.html" class="main-btn">See All Blog</a>
        </div>
      </div>
    </section> -->

<!-- ==================== home blog end ================================ -->

<!-- ===================== home create = ============================= -->

<section class="home-create" style="
        background: linear-gradient(#ff578715, #d400ff2c),
          url('{{asset('/assets/frontend/img/form2.png')}}');
      ">
  <div class="container">
    <div class="home-create-content bg-blur">
      <h3>Contact Us</h3>
      <form method="post" action="{!! route('create.Message') !!}">
        @csrf
        @if (Session::has('success'))
        <div id="alert" style="background: #71e1c247;border-radius: 7px;font-size: 17px;"
          class="alert-success p-3 mb-3">Message Submit Successfully</div>
        @endif
        @csrf
        <div class="form-grid-2">
          <div class="main-input">
            <input type="text" name="name" id="name" placeholder="Your Name* " required />
            <span class="text-danger">
              @error('name')
              {{ $message }}
              @enderror
            </span>
          </div>

          <div class="main-input">
            <input type="email" name="email" placeholder="Your Email* " required />
            <span class="text-danger">
              @error('email')
              {{ $message }}
              @enderror
            </span>
          </div>
          <div class="main-input">
            <input type="tel" name="number" id="tel" placeholder="Phone Number*" />
          </div>

          <div class="main-input">
            <select name="gender" id="">
              <option value="" selected="true" disabled="disabled">Select Your Gender</option>
              <option value="male">male</option>
              <option value="female">female</option>
            </select>
          </div>
        </div>

        <div class="main-input mt-4 mb-4">
          <textarea name="message" placeholder="Write Your Message"></textarea>
          <span class="text-danger">
            @error('message')
            {{ $message }}
            @enderror
          </span>
        </div>
        <button type="submit" class="px-5">Submit</button>
      </form>
      @if (Session::has('message'))
      <script>
        swal("Message", "{{Session::get('message')}}", 'success', {
          button: true,
          button: 'ok',
          timer: 5000,
          dangerMode: true,
        });
      </script>
      @endif
    </div>
  </div>
</section>
<!-- ===================== home create end  = ============================= -->
<!-- ======================== footer ==================================== -->

@endsection