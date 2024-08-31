@extends('frontend.layouts.app')
@section('content')
<!-- ======================== header end  ================================ -->

<!-- ============================ login form ============================= -->

<section class="create-form" style="
        background: linear-gradient(#ff578715, #d400ff2c),
          url('{{asset('/assets/frontend/img/form2.png')}}');   
      ">
  <div class="container">
    <div class="create-content">
      @if($occupation_info->id ?? '')
      <form action="{!! route('ocu_info_form.update', $occupation_info->id)!!}" class="bg-blur" method="POST">
        @else
      <form action="{!! route('ocu_info_form.create')!!}" class="bg-blur" method="POST">
      @endif
        @csrf
        <h3>Occupational information</h3>
        <div class="form-grid-2">
            <div class="main-input">
              <label for="" class="color" style="color:#fff">Occupation*</label>
                <select name="occupation" id="gender">
                  <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff">Select Your Occupation*</label>
                  </option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Still student' ? 'selected' : '' }} value="Still student">Still student</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Govt. employee' ? 'selected' : '' }} value="Govt. employee">Govt. employee</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Govt.clg.teacher' ? 'selected' : '' }} value="Govt.clg.teacher">Govt.clg.teacher</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Govt.sch.teacher' ? 'selected' : '' }} value="Govt.sch.teacher">Govt.sch.teacher</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Private employee' ? 'selected' : '' }} value="Private employee">Private employee</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'P. college teacher' ? 'selected' : '' }} value="P. college teacher">P. college teacher</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'P. school teacher' ? 'selected' : '' }} value="P. school teacher">P. school teacher</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Businessman' ? 'selected' : '' }} value="Businessman">Businessman</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'BCS Cadre' ? 'selected' : '' }} value="BCS Cadre">BCS Cadre</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Banker' ? 'selected' : '' }} value="Banker">Banker</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Engineer' ? 'selected' : '' }} value="Engineer">Engineer</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Doctor' ? 'selected' : '' }} value="Doctor">Doctor</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Nurse' ? 'selected' : '' }} value="Nurse">Nurse</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Dentist' ? 'selected' : '' }} value="Dentist">Dentist</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Lawyer' ? 'selected' : '' }} value="Lawyer">Lawyer</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Barrister' ? 'selected' : '' }} value="Barrister">Barrister</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Journalist' ? 'selected' : '' }} value="Journalist">Journalist</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Law enforcer' ? 'selected' : '' }} value="Law enforcer">Law enforcer</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Chef' ? 'selected' : '' }} value="Chef">Chef</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Unemployed' ? 'selected' : '' }} value="Unemployed">Unemployed</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Driver' ? 'selected' : '' }} value="Driver">Driver</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Maulana' ? 'selected' : '' }} value="Maulana">Maulana</option>
                  <option {{ isset($ocu_data) && $ocu_data->occupation == 'Inform Later' ? 'selected' : '' }} value="Inform Later">Inform Later</option>
                </select>
                <span class="text-danger">
                @error('occupation')
                {{ $message }}
                @enderror
              </span>
            </div>

          <div class="main-input">
          <label for="" class="color" style="color:#fff">Description of Profession*</label>
            <input type="text" name="description_of_profession" placeholder="" value="{{$occupation_info->description_of_profession ?? ''}}"/>
            <span class="text-danger">
              @error('description_of_profession')
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