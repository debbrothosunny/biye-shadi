@extends('frontend.layouts.app')
@section('content')
<!-- ============================ login form ============================= -->

<section class="create-form" style="
        background: linear-gradient(#ff578715, #d400ff2c),
          url('{{asset('/assets/frontend/img/form2.png')}}');   
      ">
  <div class="container">
    <div class="create-content">
      @if($family_information->id ?? '')
      <form action="{!! route('family_information_form.update', $family_information->id)!!}" class="bg-blur" method="POST">
        @else
        <form action="{!! route('family_information_form.create')!!}" class="bg-blur" method="POST">
          @endif
          @csrf
          <h3>Family Information</h3>
          <div class="form-grid-3">
            <div class="main-input">  
              <label for="" class="color" style="color:#fff">Your father is Alive?</label>
                <select name="father_alive" id="gender" class="flive">
                <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff"> Is Your father is Alive?</label>
                  </option>

                  <option  {{ isset($family_information) && $family_information->father_alive == 'Not alive' ? 'selected' : '' }}  value="Not alive"data-target="fnalive">Not alive</option>

                  <option {{ isset($family_information) && $family_information->father_alive == 'alive' ? 'selected' : '' }} value="alive" data-target="falive">alive</option>
                </select>
              <span class="text-danger">
                @error('father_alive')
                {{ $message }}
                @enderror
              </span>
            </div>


            <div class="main-input father-filter falive">
              <label for="" class="color" style="color:#fff">Father's Profession</label>
                <select name="father_profession" class="form-control"  >
                    <option value="" selected="" disabled>Select Your Father's Profession</option>
                    <option {{ isset($family_information) && $family_information->father_profession == 'Lawyer' ? 'selected' : '' }} value="Lawyer">Lawyer</option>
                    <option {{ isset($family_information) && $family_information->father_profession == 'Teacher' ? 'selected' : '' }} value="Teacher">Teacher</option>
                    <option {{ isset($family_information) && $family_information->father_profession == 'Bank Manager' ? 'selected' : '' }} value="Bank Manager">Bank Manager</option>
                    <option {{ isset($family_information) && $family_information->father_profession == 'Doctor' ? 'selected' : '' }} value="Doctor">Doctor</option>
                    <option {{ isset($family_information) && $family_information->father_profession == 'Engineer' ? 'selected' : '' }} value="Engineer">Engineer</option>
                    <option {{ isset($family_information) && $family_information->father_profession == 'Bussiness Man' ? 'selected' : '' }} value="Bussiness Man">Bussiness Man</option>
                </select>
                <span class="text-danger">
                  @error('father_profession')
                  {{ $message }}
                  @enderror
                </span>
            </div>

            <div class="main-input">  
              <label for="" class="color" style="color:#fff">Your mother is Alive?</label>
                <select name="mother_alive" id="gender" class="mlive">
                <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff"> Is Your mother is Alive?</label>
                  </option>

                  <option  {{ isset($family_information) && $family_information->mother_alive == 'Not alive' ? 'selected' : '' }}  value="Not alive"data-target="mnalive">Not alive</option>

                  <option {{ isset($family_information) && $family_information->mother_alive == 'alive' ? 'selected' : '' }} value="alive" data-target="malive">alive</option>
                </select>
              <span class="text-danger">
                @error('mother_alive')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input mother-filter malive">
              <label for="" class="color" style="color:#fff">Mother's Profession</label>
                <select name="mother_profession" class="form-control"  >
                    <option value="" selected="" disabled>Select Your Mother's Profession</option>
                    <option {{ isset($family_information) && $family_information->mother_profession == 'Housewife' ? 'selected' : '' }} value="Housewife">Housewife</option>
                    <option {{ isset($family_information) && $family_information->mother_profession == 'Teacher' ? 'selected' : '' }} value="Teacher">Teacher</option>
                    <option {{ isset($family_information) && $family_information->mother_profession == 'Lawyer' ? 'selected' : '' }} value="Lawyer">Lawyer</option>
                    <option {{ isset($family_information) && $family_information->mother_profession == 'Engineer' ? 'selected' : '' }} value="Engineer">Engineer</option>
                </select>
                <span class="text-danger">
                  @error('mother_profession')
                  {{ $message }}
                  @enderror
                </span>
            </div>

            <div class="main-input">
            <label for="" class="color" style="color:#fff">How many Brothers/Sisters do you have?</label>
              <input type="number" name="how_many_brother" placeholder=""
                value="{{$family_information->how_many_brother ?? ''}}" />
              <span class="text-danger">
                @error('how_many_brother')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
            <label for="" class="color" style="color:#fff">Brother/Sister Information*</label>
              <input type="text" name="brother_information" placeholder=""  value="{{$family_information->brother_information ?? ''}}" />
              <span class="text-danger">
                @error('brother_information')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Description of Financial Status*</label>
                <select name="financial_status" id="gender">
                  <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff">Select Your Financial Status*</label>
                  </option>
                  <option {{ isset($family_information) && $family_information->financial_status == 'Higher Class' ? 'selected' : '' }} value="Higher Class">Higher Class</option>
                  <option {{ isset($family_information) && $family_information->financial_status == 'Middle Class' ? 'selected' : '' }} value="Middle Class">Middle Class</option>
                </select>
                <span class="text-danger">
                @error('financial_status')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
            <label for="" class="color" style="color:#fff">Description of Financial Condition*</label>
              <input type="text" name="financial_condition" placeholder=""
                value="{{$family_information->financial_condition ?? ''}}" />
              <span class="text-danger">
                @error('financial_condition')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
            <label for="" class="color" style="color:#fff">How is your family's religious condition?</label>
              <input type="text" name="religious_condition" placeholder=""
                value="{{$family_information->religious_condition ?? ''}}" />
              <span class="text-danger">
                @error('religious_condition')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-12">
              <button type="submit" class="btn btn-md btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>
</section>

<!-- ============================ login form end  ============================= -->
@endsection