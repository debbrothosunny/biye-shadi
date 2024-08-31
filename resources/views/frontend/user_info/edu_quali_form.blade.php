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
    @if($edu_qualifications->id ?? '')
    <form action="{!! route('edu_quali_form.update', $edu_qualifications->id)!!}" class="bg-blur" method="POST">
    @else
      <form action="{!! route('edu_quali_form.create')!!}" class="bg-blur"  method="POST">
      @endif
        @csrf
        <h3>Educational Qualifications</h3>
            <div class="form-grid-2"> 
              <div class="main-input ">
                <label for="" class="color" style="color:#fff">Select Your Education Method</label>
                  <select name="education_method" id="gender">
                    <option disabled="disabled"selected="">Your Education Method</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->education_method == 'General' ? 'selected' : '' }} value="General">General</option>
                    <option {{$edu_qualifications->education_method ?? '' == 'Normal' ? 'selected' : ''}} value="Normal">Normal</option>
                  </select>
                  <span class="text-danger">
                  @error('education_method')
                  {{ $message }}
                  @enderror
                </span>
              </div>

              <div class="main-input ">
                <label for="" class="color" style="color:#fff"> Latest Education</label>
                  <select name="latest_edu" id="gender">
                    <option disabled="disabled"selected="">Select Your Latest Education</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Under SSC' ? 'selected' : '' }} value="Under SSC">Under SSC</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'SSC' ? 'selected' : '' }} value="SSC">SSC</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'HSC' ? 'selected' : '' }} value="HSC">HSC</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Dakhil' ? 'selected' : '' }} value="Dakhil">Dakhil</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Alim' ? 'selected' : '' }} value="Alim">Alim</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Fazil' ? 'selected' : '' }} value="Fazil">Fazil</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Kamil' ? 'selected' : '' }} value="Kamil">Kamil</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Alem' ? 'selected' : '' }} value="Alem">Alem</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Alema' ? 'selected' : '' }} value="Alema">Alema</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Hafiz' ? 'selected' : '' }} value="Hafiz">Hafiz</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Hafiza' ? 'selected' : '' }} value="Hafiza">Hafiza</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Diploma' ? 'selected' : '' }} value="Diploma">Diploma</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'BA' ? 'selected' : '' }} value="BA">BA</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'MA' ? 'selected' : '' }} value="MA">MA</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'O-Level' ? 'selected' : '' }} value="O-Level">O-Level</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'A-Level' ? 'selected' : '' }} value="A-Level">A-Level</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'Degree-Pass' ? 'selected' : '' }} value="Degree-Pass">Degree-Pass</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'LLB' ? 'selected' : '' }} value="LLB">LLB</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'LLM' ? 'selected' : '' }} value="LLM">LLM</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'BBA' ? 'selected' : '' }} value="BBA">BBA</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'MBA' ? 'selected' : '' }} value="MBA">MBA</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'BSS' ? 'selected' : '' }} value="BSS">BSS</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'MSS' ? 'selected' : '' }} value="MSS">MSS</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'B.Sc.' ? 'selected' : '' }} value="B.Sc.">B.Sc.</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'M.Sc.' ? 'selected' : '' }} value="M.Sc.">M.Sc.</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'PhD' ? 'selected' : '' }} value="PhD">PhD</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'MBBS' ? 'selected' : '' }} value="MBBS">MBBS</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'FCPS' ? 'selected' : '' }} value="FCPS">FCPS</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'D.in Midwifery' ? 'selected' : '' }} value="D.in Midwifery">D.in Midwifery</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'D.in Nursing' ? 'selected' : '' }} value="D.in Nursing">D.in Nursing</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'IELTS-5' ? 'selected' : '' }} value="IELTS-5">IELTS-5</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'IELTS-5.5' ? 'selected' : '' }} value="IELTS-5.5">IELTS-5.5</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'IELTS-6' ? 'selected' : '' }} value="IELTS-6">IELTS-6</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->latest_edu == 'IELTS-7' ? 'selected' : '' }} value="IELTS-7">IELTS-7</option>
                  </select>
                  <span class="text-danger">
                  @error('latest_edu')
                  {{ $message }}
                  @enderror
                </span>
              </div>
              
              <div class="main-input">
                  <label for="" class="color" style="color:#fff">Passing Year*</label>
                  <input type="number" name="passing_year" placeholder="" value="{{$edu_qualifications->passing_year ?? ''}}" />
                    <span class="text-danger">
                      @error('passing_year')
                      {{ $message }}
                      @enderror
                    </span>
              </div>

              <div class="main-input">
                <label for="" class="color" style="color:#fff">Select Your Group</label>
                  <select name="group" id="gender">
                    <option value=""selected="" disabled>Group</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->group == 'Science' ? 'selected' : '' }} value="Science">Science</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->group == 'Arts' ? 'selected' : '' }} value="Arts">Arts</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->group == 'Commerce' ? 'selected' : '' }} value="Commerce">Commerce</option>
                  </select>
                  <span class="text-danger">
                  @error('group')
                  {{ $message }}
                  @enderror
                </span>
              </div> 

              <div class="main-input">
                <label for="" class="color" style="color:#fff">Select Your Result</label>
                  <select name="result" id="gender">
                    <option value="" selected=""  disabled>Result</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->result == 'A+' ? 'selected' : '' }} value="A+">A+</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->result == 'A' ? 'selected' : '' }} value="A">A</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->result == 'A-' ? 'selected' : '' }} value="A-">A-</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->result == 'B' ? 'selected' : '' }} value="B">B</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->result == 'C' ? 'selected' : '' }} value="C">C</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->result == 'D' ? 'selected' : '' }} value="D">D</option>
                  </select>
                  <span class="text-danger">
                  @error('result')
                  {{ $message }}
                  @enderror
                </span>
              </div>

              <div class="main-input ">
                <label for="" class="color" style="color:#fff">Select Your Equivalent</label>
                  <select name="equivalent" id="gender">
                    <option value="" selected=""  disabled>
                      Which year are you reading in HSC / Alim / Equivalent ?
                    </option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->equivalent == 'SSC' ? 'selected' : '' }} value="SSC">SSC</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->equivalent == 'HSC' ? 'selected' : '' }} value="HSC">HSC</option>
                    <option {{ isset($edu_qualifications) && $edu_qualifications->equivalent == 'Other' ? 'selected' : '' }} value="Other">Other</option>
                  </select>
                  <span class="text-danger">
                  @error('equivalent')
                  {{ $message }}
                  @enderror
                </span>
              </div>

              <div class="main-input">
                <label for="" class="color" style="color:#fff">Other Qualification</label>
                  <input type="text" name="qualification" placeholder="" value="{{$edu_qualifications->qualification ?? ''}}" />
                  <span class="text-danger">
                    @error('qualification')
                    {{ $message }}
                    @enderror
                  </span>
              </div>
            </div>
        
        <div class="row mt-4">
          <div class="col-md-12">
            <button type="submit" class="btn btn-md btn-primary ">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- ============================ login form end  ============================= -->

<!-- ============================ login form end  ============================= -->
@endsection