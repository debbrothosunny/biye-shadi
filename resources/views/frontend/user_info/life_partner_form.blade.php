@extends('frontend.layouts.app')
@section('content')

<!-- ============================ login form ============================= -->

<section class="create-form" style="
        background: linear-gradient(#ff578715, #d400ff2c),
          url('{{asset('/assets/frontend/img/form2.png')}}');   
      ">
  <div class="container">
    <div class="create-content">

      @if($life_partner->id ?? '')
      <form action="{!! route('life_partner_form.update',$life_partner->id)!!}" class="bg-blur" method="POST">
        @else
        <form action="{!! route('life_partner_form.create')!!}" class="bg-blur" method="POST" method="POST">
          @endif
          @csrf
          <h3>Expected Life Partner</h3>
          <div class="form-grid-2">
          <div class="main-input">
              <label for="" class="color" style="color:#fff">Age*</label>
                <select name="age" id="gender">
                  <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff">Select Age*</label>
                  </option>
                <option {{ isset($life_partner) && $life_partner->age == '20-25' ? 'selected' : '' }} value="20-25">20-25</option>
                <option {{ isset($life_partner) && $life_partner->age == '25-30' ? 'selected' : '' }} value="25-30">25-30</option>
                <option {{ isset($life_partner) && $life_partner->age == '30-35' ? 'selected' : '' }} value="30-35">30-35</option>
                <option {{ isset($life_partner) && $life_partner->age == '35-40' ? 'selected' : '' }} value="35-40">35-40</option>
                </select>
                <span class="text-danger">
                @error('age')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Complexion*</label>
                <select name="complexion" id="gender">
                  <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff">Select Complexion*</label>
                  </option>
                <option {{ isset($life_partner) && $life_partner->complexion == 'Fair Skin' ? 'selected' : '' }} value="Fair Skin">Fair Skin</option>
                <option {{ isset($life_partner) && $life_partner->complexion == 'Light Brown Skin' ? 'selected' : '' }} value="Light Brown Skin">Light Brown Skin</option>
                <option {{ isset($life_partner) && $life_partner->complexion == 'Brown Skin' ? 'selected' : '' }} value="Brown Skin">Brown Skin</option>
                <option {{ isset($life_partner) && $life_partner->complexion == 'Black Skin' ? 'selected' : '' }} value="Black Skin">Black Skin'</option>
                </select>
                <span class="text-danger">
                @error('complexion')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Height</label>
                <select name="height" class="form-control" >
                <option value="" selected="" disabled>Enter Your Height*</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '4.8' ? 'selected' : '' }} value="4.8">4.8"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '4.9"' ? 'selected' : '' }} value="4.9"">4.9"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '4.10' ? 'selected' : '' }} value="4.10">4.10"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '4.11' ? 'selected' : '' }} value="4.11">4.11</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5' ? 'selected' : '' }} value="5">5</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.1' ? 'selected' : '' }} value="5.1">5.1"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.2' ? 'selected' : '' }} value="5.2">5.2"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.3' ? 'selected' : '' }} value="5.3">5.3"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.4' ? 'selected' : '' }} value="5.4">5.4"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.5' ? 'selected' : '' }} value="5.5">5.5"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.6' ? 'selected' : '' }} value="5.6">5.6"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.7' ? 'selected' : '' }} value="5.7">5.7"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.8' ? 'selected' : '' }} value="5.8">5.8"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.9' ? 'selected' : '' }} value="5.9">5.9"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.10' ? 'selected' : '' }} value="5.10">5.10"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '5.11' ? 'selected' : '' }} value="5.11">5.11"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '6' ? 'selected' : '' }} value="6">6</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '6.1' ? 'selected' : '' }} value="6.1">6.1"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '6.2' ? 'selected' : '' }} value="6.2">6.2"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '6.3' ? 'selected' : '' }} value="6.3">6.3"</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '6.4' ? 'selected' : '' }} value="6.4">6.4”</option>
                <option {{ isset($life_partner_data) && $life_partner_data->height == '6.5' ? 'selected' : '' }} value="6.5">6.5”</option>
                </select>
              <span class="text-danger">
                @error('height')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Educational Qualification*</label>
                <select name="educational_qualification" id="gender">
                <option value="" selected=""  disabled>
                <label for="" class="color" style="color:#fff">Select Educational Qualification*</label>
                </option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Under SSC' ? 'selected' : '' }} value="Under SSC">Under SSC</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'SSC' ? 'selected' : '' }} value="SSC">SSC</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'HSC' ? 'selected' : '' }} value="HSC">HSC</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Dakhil' ? 'selected' : '' }} value="Dakhil">Dakhil</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Alim' ? 'selected' : '' }} value="Alim">Alim</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Fazil' ? 'selected' : '' }} value="Fazil">Fazil</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Kamil' ? 'selected' : '' }} value="Kamil">Kamil</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Alem' ? 'selected' : '' }} value="Alem">Alem</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Alema' ? 'selected' : '' }} value="Alema">Alema</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Hafiz' ? 'selected' : '' }} value="Hafiz">Hafiz</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Hafiza' ? 'selected' : '' }} value="Hafiza">Hafiza</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Diploma' ? 'selected' : '' }} value="Diploma">Diploma</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'BA' ? 'selected' : '' }} value="BA">BA</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'MA' ? 'selected' : '' }} value="MA">MA</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'O-Level' ? 'selected' : '' }} value="O-Level">O-Level</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'A-Level' ? 'selected' : '' }} value="A-Level">A-Level</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'Degree-Pass' ? 'selected' : '' }} value="Degree-Pass">Degree-Pass</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'LLB' ? 'selected' : '' }} value="LLB">LLB</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'LLM' ? 'selected' : '' }} value="LLM">LLM</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'BBA' ? 'selected' : '' }} value="BBA">BBA</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'MBA' ? 'selected' : '' }} value="MBA">MBA</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'BSS' ? 'selected' : '' }} value="BSS">BSS</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'MSS' ? 'selected' : '' }} value="MSS">MSS</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'B.Sc.' ? 'selected' : '' }} value="B.Sc.">B.Sc.</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'M.Sc.' ? 'selected' : '' }} value="M.Sc.">M.Sc.</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'PhD' ? 'selected' : '' }} value="PhD">PhD</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'MBBS' ? 'selected' : '' }} value="MBBS">MBBS</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'FCPS' ? 'selected' : '' }} value="FCPS">FCPS</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'D.in Midwifery' ? 'selected' : '' }} value="D.in Midwifery">D.in Midwifery</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'D.in Nursing' ? 'selected' : '' }} value="D.in Nursing">D.in Nursing</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'IELTS-5' ? 'selected' : '' }} value="IELTS-5">IELTS-5</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'IELTS-5.5' ? 'selected' : '' }} value="IELTS-5.5">IELTS-5.5</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'IELTS-6' ? 'selected' : '' }} value="IELTS-6">IELTS-6</option>
                <option {{ isset($life_partner_data) && $life_partner_data->educational_qualification == 'IELTS-7' ? 'selected' : '' }} value="IELTS-7">IELTS-7</option>
                </select>
                <span class="text-danger">
                @error('educational_qualification')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">District</label>
              <input type="text" name="district" placeholder=""
                value="{{$life_partner->district ?? ''}}" />
              <span class="text-danger">
                @error('district')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Why Are You Getting Married?</label>
              <input type="text" name="getting_married" placeholder=""
                value="{{$life_partner->getting_married ?? ''}}" />
              <span class="text-danger">
                @error('getting_married')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Financial Condition*</label>
                <select name="financial_condition" id="gender">
                  <option value="" selected=""  disabled>
                  <label for="" class="color" style="color:#fff">Select Your Financial Condition*</label>
                  </option>
                  <option {{ isset($life_partner) && $life_partner->financial_condition == 'Higher Class' ? 'selected' : '' }} value="Higher Class">Higher Class</option>
                  <option {{ isset($life_partner) && $life_partner->financial_condition == 'Middle Class' ? 'selected' : '' }} value="Middle Class">Middle Class</option>
                </select>
                <span class="text-danger">
                @error('financial_condition')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Expected Qualities or Attributes of Your Life Partner</label>
              <input type="text" name="life_partner" placeholder=""
                value="{{$life_partner->life_partner ?? ''}}" />
              <span class="text-danger">
                @error('life_partner')
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