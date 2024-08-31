@extends('frontend.layouts.app')
@section('content')
<style>
  .home-bio{
    padding-top:200px;
  }
</style>
<section class="home-bio">
  <div class="container">
    <div class="home-bio-content grid-5">
      @foreach($user as $postData)
      <div class="home-bio-box">
        <div class="home-bio-box-img">
        @foreach($postData->personal_info as $personal_data)  
          <img src="{!! asset('assets/img/uploaded/profile/' . $personal_data->img ?? '') !!}" alt="{{ $postData->alt_img }}" />
          @endforeach
        </div>
        <div class="home-bio-box-text">
          <h4>{{ $postData->name }}</h4>
          <ul>
            @foreach($postData->personal_info as $personal_data)      
              <li><span>Age</span>:<span>{{ $personal_data->age }} </span></li>
              <li><span>Religion</span>:<span>{{ $personal_data->religion }}</span></li>
              <li><span>Height</span>:<span>{{ $personal_data->height }}</span></li>
            @endforeach
          </ul>
          <a href="{!! route('profile_page', $postData->id) !!}">View Details <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
      </div>
      @endforeach
      {{$user->links('pagination::bootstrap-5')}}
    </div>
  </div>
</section>

@endsection