@extends('frontend.layouts.app')
@if($seo)
@section('title', "$seo->meta_title ")
@section('description', "$seo->meta_description")
@section('keywords', "$seo->meta_keyword")
@endif
@section('content')

<!-- ====================== hero section =========================== -->

@foreach ($CommonBanner->where('sec', 'About_us_sec_1') as $postData)
<main class="hero-section hero-section-other"
  style="background: url('{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}')">
  <div class="container">
    <h2>{{ $postData->title }}</h2>
  </div>
</main>
@endforeach

<!-- ====================== hero section emd =========================== -->

<!-- ============================== home work =================== -->

<section class="home-work home-aboutus">
  <div class="container">
    <div class="home-work-content grid-2">
      @foreach ($cw_img->where('sec', 'about_us_sec_2') as $postData)
      <div class="home-work-img">
        <img src="{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}"
          alt="{{ $postData->alt_img }}" />
      </div>
      <div class="home-work-text">
        <h6>{{ $postData->title }}</h6>
        <h3>
          {{ $postData->sub_title }}
        </h3>

        <p>
          {!!$postData->des !!}
        </p>
        <ul class="d-flex gap-4 align-items-center">
          <li><a href="{{route('register')}}" class="main-btn">{{ $postData->button_name_one }}</a></li>
          <li class="d-flex gap-2 align-items-center video-play-btn" data-video="{!! $postData->video !!}">
            <i class="fa-solid fa-play"></i> <u>{{ $postData->button_name_two }}</u>
          </li>
        </ul>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ============================== home work end =================== -->

<!--================================= User Statistics================= -->

<section class="User-Statistics mt-5">
  <div class="container">

    <div class="section-header text-center">
      @foreach ($all_title->where('sec', 'about_us_sec_3') as $postData)
      <h2>{!!$postData->title !!}</h2>
      @endforeach
    </div>

    <div class="User-Statistics-content grid-4">
      <div class="User-Statistics-box">
      <i class="fa-solid fa-person-dress"></i>
          <h6>Grooms</h6>
          <h4>{{ $totalGrooms }}</h4>
      </div>

      <div class="User-Statistics-box">
      <i class="fa-solid fa-person"></i>
          <h6>Brides</h6>
          <h4>{{ $totalBrides }}</h4>
      </div>

      <div class="User-Statistics-box">
      <i class="fa-solid fa-users"></i>
          <h6>Registered Users</h6>
          <h4>{{ $totalRegisteredUsers }}</h4>
      </div>

      <div class="User-Statistics-box">
      <i class="fa-solid fa-users"></i>
          <h6>Free Users</h6>
          <h4>{{ $totalFreeUsers }}</h4>
      </div>
      
      <div class="User-Statistics-box">
          <i class="fa-solid fa-chart-simple"></i>
          <h6>Paid Users</h6>
          <h4>{{ $totalPaidUsers }}</h4>
      </div>
      
      <div class="User-Statistics-box">
          <i class="fa-solid fa-chart-simple"></i>
          <h6>Deshi Users </h6>
          <h4> {{ $totalDeshiUsers }}</h4>
      </div>

      <div class="User-Statistics-box">
          <i class="fa-solid fa-chart-simple"></i>.
          <h6>Foreigner Users </h6>
          <h4> {{ $totalForeignerUsers }} </h4>
      </div>
      <div class="User-Statistics-box">
          <i class="fa-solid fa-chart-simple"></i>.
          <h6>Hindu Religion </h6>
          <h4> {{ $totalHinduUsers }} </h4>
      </div>
      <div class="User-Statistics-box">
          <i class="fa-solid fa-chart-simple"></i>.
          <h6>Muslim Religion </h6>
          <h4> {{ $totalMuslimUsers }} </h4>
      </div>
    </div>

  </div>
</section>

<!--================================= User Statistics end ================= -->

<!-- ============================== home work =================== -->

<section class="home-about">
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
          <a href="{{ $postData->button_link_two }}" class="main-btn">{{ $postData->button_name_two }}</a>
        </div>
      </div>
      <div class="home-about-content-right">
        <img src="{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}" alt="img" />
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ============================== home work end =================== -->

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

<!-- Message Box -->
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
          timer: 3000,
          dangerMode: true,
        });
      </script>
      @endif
    </div>
  </div>
</section>
@endsection