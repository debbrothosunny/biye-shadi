@extends('frontend.layouts.app')

@section('content')

    <!-- ====================== hero section =========================== -->
    @foreach ($CommonBanner->where('sec', 'Happy_Client_sec_1') as $postData)
    <main
      class="hero-section hero-section-other"
      style="background: url('{!! asset('assets/img/uploaded/home/img/' . $postData->img ?? '') !!}')"
    >
      <div class="container">
      @foreach ($CommonBanner->where('sec', 'Happy_Client_sec_1') as $postData)
        <h2>{{ $postData->title }}</h2>
      @endforeach
      </div>
    </main>
    @endforeach

    <!-- ====================== hero section emd =========================== -->

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
        <div class="home-review-box-img video-play-btn"
          data-video="{!! $postData->video !!}">
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
  </div>
</section>>

    <!-- ====================== home review end ========================= -->
    @endsection

