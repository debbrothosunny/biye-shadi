@extends('frontend.layouts.app')
@section('content')
<!-- ============================ login form ============================= -->

<section class="create-form" style="
        background: linear-gradient(#ff578715, #d400ff2c),
          url('{{asset('/assets/frontend/img/form2.png')}}');   
      ">
  <div class="container">
    <div class="create-content">
      @if($marriage_related->id ?? '')
      <form action="{!! route('marriage_related_form.update',$marriage_related->id)!!}" class="bg-blur" method="POST">
        @else
      <form action="{!! route('marriage_related_form.create')!!}" class="bg-blur" method="POST" method="POST">
      @endif
        @csrf

        <h3>Marriage Related Information</h3>
        <div class="form-grid-2">
            <div class="main-input">
              <label for="" class="color" style="color:#fff">Marriage Status*</label>
                <select name="marriage_status" id="gender">
                  <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff">Select Your Marriage Status*</label>
                  </option>
                <option {{ isset($marriage_related) && $marriage_related->marriage_status == 'Single' ? 'selected' : '' }} value="Single Class">Single</option>
                <option {{ isset($marriage_related) && $marriage_related->marriage_status == 'Married' ? 'selected' : '' }} value="Married">Married</option>
                <option {{ isset($marriage_related) && $marriage_related->marriage_status == 'Divorce' ? 'selected' : '' }} value="Divorce">Divorce</option>
                </select>
                <span class="text-danger">
                @error('marriage_status')
                {{ $message }}
                @enderror
              </span>
            </div>

          <div class="main-input filter-mar-item">
            <label for="" class="color" style="color:#fff">Description a Reason for Divorce*</label>
            <input type="text" name="reason_divorce" placeholder="" value="{{$marriage_related->reason_divorce ?? ''}}"/>
            <span class="text-danger">
              @error('reason_divorce')
              {{ $message }}
              @enderror
            </span>
          </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Do your guardians agree to your marriage?*</label>
                <select name="agree_to_marriage" id="gender">
                  <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff">Select agree to your marriage?*</label>
                  </option>
                <option {{ isset($marriage_related) && $marriage_related->agree_to_marriage == 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                <option {{ isset($marriage_related) && $marriage_related->agree_to_marriage == 'No' ? 'selected' : '' }} value="No">No</option>
                </select>
                <span class="text-danger">
                @error('agree_to_marriage')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Are you willing to do any job after marriage?*</label>
                <select name="after_marriage" id="gender">
                  <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff">Select job after marriage?*</label>
                  </option>
                <option {{ isset($marriage_related) && $marriage_related->after_marriage == 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                <option {{ isset($marriage_related) && $marriage_related->after_marriage == 'No' ? 'selected' : '' }} value="No">No</option>
                </select>
                <span class="text-danger">
                @error('after_marriage')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Would you like to continue your studies after marriage?*</label>
                <select name="studies_after_marriage" id="gender">
                  <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff">Select studies after marriage?*</label>
                  </option>
                <option {{ isset($marriage_related) && $marriage_related->studies_after_marriage == 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                <option {{ isset($marriage_related) && $marriage_related->studies_after_marriage == 'No' ? 'selected' : '' }} value="No">No</option>
                </select>
                <span class="text-danger">
                @error('studies_after_marriage')
                {{ $message }}
                @enderror
              </span>
            </div>

          <div class="main-input">
            <label for="" class="color" style="color:#fff">Why are you getting married?</label>
            <input type="text" name="getting_married" placeholder="" value="{{$marriage_related->getting_married ?? ''}}"/>
            <span class="text-danger">
              @error('getting_married')
              {{ $message }}
              @enderror
            </span>
          </div>
        </div>
        
        <div class="col-md-12">
          <button type="submit" class="btn btn-md btn-primary ">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- ============================ login form end  ============================= -->
@endsection