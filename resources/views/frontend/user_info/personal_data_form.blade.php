@extends('frontend.layouts.app')
@section('content')
<!-- ============================ login form ============================= -->
<style>
  .drop-zone__prompt{
    pointer-events: none;
  }
   
</style>

<section class="create-form" style="
        background: linear-gradient(#ff578715, #d400ff2c),
          url('{{asset('/assets/frontend/img/form2.png')}}');   
      ">
  <div class="container">
    <div class="create-content">
      @if($personal_data->id ?? '')
      <form action="{!! route('personal_data_form.update', $personal_data->id)!!}" class="bg-blur" method="POST"
        enctype="multipart/form-data">
        @else
        <form action="{!! route('personal_data_form.create')!!}" class="bg-blur" method="POST"
          enctype="multipart/form-data">
          @endif
          @csrf
          <h3>Your Personal Data</h3>

          <div class="form-grid-3">
            <div class="main-input">
              <label for="" class="color" style="color:#fff">Your Full Name*</label>
              <input type="text" name="name" id="name" placeholder="" value="{{$personal_data->name ?? ''}}"  />
              <span class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Phone Number*</label>
              <input type="tel" name="number" id="phone" placeholder="" value="{{$personal_data->number ?? ''}}"
                 />
              <span class="text-danger">
                @error('number')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Enter Your Age*</label>
              <input type="number" name="age" id="age" placeholder="" value="{{$personal_data->age ?? ''}}"  />
              <span class="text-danger">
                @error('age')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Enter Your Height*</label>
              <select name="height" class="form-control" >
               <option value="" selected="" disabled>Enter Your Height*</option>
                <option {{ isset($personal_data) && $personal_data->height == '4.8' ? 'selected' : '' }} value="4.8">4.8"</option>
                <option {{ isset($personal_data) && $personal_data->height == '4.9"' ? 'selected' : '' }} value="4.9"">4.9"</option>
                <option {{ isset($personal_data) && $personal_data->height == '4.10' ? 'selected' : '' }} value="4.10">4.10"</option>
                <option {{ isset($personal_data) && $personal_data->height == '4.11' ? 'selected' : '' }} value="4.11">4.11</option>
                <option {{ isset($personal_data) && $personal_data->height == '5' ? 'selected' : '' }} value="5">5</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.1' ? 'selected' : '' }} value="5.1">5.1"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.2' ? 'selected' : '' }} value="5.2">5.2"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.3' ? 'selected' : '' }} value="5.3">5.3"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.4' ? 'selected' : '' }} value="5.4">5.4"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.5' ? 'selected' : '' }} value="5.5">5.5"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.6' ? 'selected' : '' }} value="5.6">5.6"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.7' ? 'selected' : '' }} value="5.7">5.7"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.8' ? 'selected' : '' }} value="5.8">5.8"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.9' ? 'selected' : '' }} value="5.9">5.9"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.10' ? 'selected' : '' }} value="5.10">5.10"</option>
                <option {{ isset($personal_data) && $personal_data->height == '5.11' ? 'selected' : '' }} value="5.11">5.11"</option>
                <option {{ isset($personal_data) && $personal_data->height == '6' ? 'selected' : '' }} value="6">6</option>
                <option {{ isset($personal_data) && $personal_data->height == '6.1' ? 'selected' : '' }} value="6.1">6.1"</option>
                <option {{ isset($personal_data) && $personal_data->height == '6.2' ? 'selected' : '' }} value="6.2">6.2"</option>
                <option {{ isset($personal_data) && $personal_data->height == '6.3' ? 'selected' : '' }} value="6.3">6.3"</option>
                <option {{ isset($personal_data) && $personal_data->height == '6.4' ? 'selected' : '' }} value="6.4">6.4”</option>
                <option {{ isset($personal_data) && $personal_data->height == '6.5' ? 'selected' : '' }} value="6.5">6.5”</option>
              </select>
              <span class="text-danger">
                @error('height')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Date Of Birth*</label>
              <input placeholder="Date of Birth" type="text" name="date_of_birth" onfocus="(this.type='date')"
                value="{{$personal_data->date_of_birth ?? ''}}" onblur="(this.type='text')" id="date" />
              <span class="text-danger">
                @error('date_of_birth')
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
                <option {{ isset($personal_data) && $personal_data->complexion == 'Fair Skin' ? 'selected' : '' }} value="Fair Skin">Fair Skin</option>
                <option {{ isset($personal_data) && $personal_data->complexion == 'Light Brown Skin' ? 'selected' : '' }} value="Light Brown Skin">Light Brown Skin</option>
                <option {{ isset($personal_data) && $personal_data->complexion == 'Brown Skin' ? 'selected' : '' }} value="Brown Skin">Brown Skin</option>
                <option {{ isset($personal_data) && $personal_data->complexion == 'Black Skin' ? 'selected' : '' }} value="Black Skin">Black Skin'</option>
                </select>
                <span class="text-danger">
                @error('complexion')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Enter Your Weight*</label>
              <input placeholder="" type="text" name="weight" value="{{$personal_data->weight ?? ''}}"  />
              <span class="text-danger">
                @error('weight')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff"> Blood Group*</label>
              <select name="blood_group" class="form-control" >
                  <option value="" selected="" disabled>Enter Your Blood Group*</option>
                  <option {{ isset($personal_data) && $personal_data->blood_group == 'B+' ? 'selected' : '' }} value="B+">B+</option>
                  <option {{ isset($personal_data) && $personal_data->blood_group == 'B' ? 'selected' : '' }} value="B">B</option>
                  <option {{ isset($personal_data) && $personal_data->blood_group == 'B-' ? 'selected' : '' }} value="B-">B-</option>
                  <option {{ isset($personal_data) && $personal_data->blood_group == 'A–' ? 'selected' : '' }} value="A–">A–</option>
                  <option {{ isset($personal_data) && $personal_data->blood_group == 'O+' ? 'selected' : '' }} value="O+">O+</option>
                  <option {{ isset($personal_data) && $personal_data->blood_group == 'O–' ? 'selected' : '' }} value="O–">O–</option>
                  <option {{ isset($personal_data) && $personal_data->blood_group == 'AB+' ? 'selected' : '' }} value="AB+">AB+</option>
                  <option {{ isset($personal_data) && $personal_data->blood_group == 'AB-' ? 'selected' : '' }} value="AB-">AB-</option>
              </select>
              <span class="text-danger">
                @error('blood_group')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Select Your Nationality*</label>
              <select class="form-control" id="exampleInputUsername1" name="nationality">
                <option  disabled  selected>Select Nationality...</option>
                <option {{ isset($personal_data) && $personal_data->nationality == 'Bangladeshi' ? 'selected' : '' }} value="Bangladeshi">Bangladeshi</option>
                <option {{ isset($personal_data) && $personal_data->nationality == 'Foreigner' ? 'selected' : '' }} value="Foreigner">Foreigner</option>
              </select>
              <span class="text-danger">
                @error('nationality')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Enter Your Address*</label>
              <input placeholder="" type="text" name="address" value="{{$personal_data->address ?? ''}}"  />
              <span class="text-danger">
                @error('address')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Country*</label>
              <select class="form-control" id="exampleInputUsername1" name="country_id">
              <option  disabled  selected>Select Country...</option>
                @foreach($country as $postData)
                <option {{ isset($personal_data) && $personal_data->country_id  == $postData->id ? 'selected' : ''}} value="{{$postData->id}}" >{{$postData->country}}</option>
                 @endforeach
              </select>
              <span class="text-danger">@error('country'){{$message}}@enderror</span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Education*</label>
              <select class="form-control" id="exampleInputUsername1" name="education">
                <option  disabled  selected>Select Education...</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Under SSC' ? 'selected' : '' }} value="Under SSC">Under SSC</option>
                <option {{ isset($personal_data) && $personal_data->education == 'SSC' ? 'selected' : '' }} value="SSC">SSC</option>
                <option {{ isset($personal_data) && $personal_data->education == 'HSC' ? 'selected' : '' }} value="HSC">HSC</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Dakhil' ? 'selected' : '' }} value="Dakhil">Dakhil</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Alim' ? 'selected' : '' }} value="Alim">Alim</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Fazil' ? 'selected' : '' }} value="Fazil">Fazil</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Kamil' ? 'selected' : '' }} value="Kamil">Kamil</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Alem' ? 'selected' : '' }} value="Alem">Alem</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Alema' ? 'selected' : '' }} value="Alema">Alema</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Hafiz' ? 'selected' : '' }} value="Hafiz">Hafiz</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Hafiza' ? 'selected' : '' }} value="Hafiza">Hafiza</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Diploma' ? 'selected' : '' }} value="Diploma">Diploma</option>
                <option {{ isset($personal_data) && $personal_data->education == 'BA' ? 'selected' : '' }} value="BA">BA</option>
                <option {{ isset($personal_data) && $personal_data->education == 'MA' ? 'selected' : '' }} value="MA">MA</option>
                <option {{ isset($personal_data) && $personal_data->education == 'O-Level' ? 'selected' : '' }} value="O-Level">O-Level</option>
                <option {{ isset($personal_data) && $personal_data->education == 'A-Level' ? 'selected' : '' }} value="A-Level">A-Level</option>
                <option {{ isset($personal_data) && $personal_data->education == 'Degree-Pass' ? 'selected' : '' }} value="Degree-Pass">Degree-Pass</option>
                <option {{ isset($personal_data) && $personal_data->education == 'LLB' ? 'selected' : '' }} value="LLB">LLB</option>
                <option {{ isset($personal_data) && $personal_data->education == 'LLM' ? 'selected' : '' }} value="LLM">LLM</option>
                <option {{ isset($personal_data) && $personal_data->education == 'BBA' ? 'selected' : '' }} value="BBA">BBA</option>
                <option {{ isset($personal_data) && $personal_data->education == 'MBA' ? 'selected' : '' }} value="MBA">MBA</option>
                <option {{ isset($personal_data) && $personal_data->education == 'BSS' ? 'selected' : '' }} value="BSS">BSS</option>
                <option {{ isset($personal_data) && $personal_data->education == 'MSS' ? 'selected' : '' }} value="MSS">MSS</option>
                <option {{ isset($personal_data) && $personal_data->education == 'B.Sc.' ? 'selected' : '' }} value="B.Sc.">B.Sc.</option>
                <option {{ isset($personal_data) && $personal_data->education == 'M.Sc.' ? 'selected' : '' }} value="M.Sc.">M.Sc.</option>
                <option {{ isset($personal_data) && $personal_data->education == 'PhD' ? 'selected' : '' }} value="PhD">PhD</option>
                <option {{ isset($personal_data) && $personal_data->education == 'MBBS' ? 'selected' : '' }} value="MBBS">MBBS</option>
                <option {{ isset($personal_data) && $personal_data->education == 'FCPS' ? 'selected' : '' }} value="FCPS">FCPS</option>
                <option {{ isset($personal_data) && $personal_data->education == 'D.in Midwifery' ? 'selected' : '' }} value="D.in Midwifery">D.in Midwifery</option>
                <option {{ isset($personal_data) && $personal_data->education == 'D.in Nursing' ? 'selected' : '' }} value="D.in Nursing">D.in Nursing</option>
                <option {{ isset($personal_data) && $personal_data->education == 'IELTS-5' ? 'selected' : '' }} value="IELTS-5">IELTS-5</option>
                <option {{ isset($personal_data) && $personal_data->education == 'IELTS-5.5' ? 'selected' : '' }} value="IELTS-5.5">IELTS-5.5</option>
                <option {{ isset($personal_data) && $personal_data->education == 'IELTS-6' ? 'selected' : '' }} value="IELTS-6">IELTS-6</option>
                <option {{ isset($personal_data) && $personal_data->education == 'IELTS-7' ? 'selected' : '' }} value="IELTS-7">IELTS-7</option>
              </select>
              <span class="text-danger">
              @error('education')
              {{$message}}@enderror
             </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Profession*</label>
              <select class="form-control" id="exampleInputUsername1" name="proffession">
                <option disabled selected>Select Proffession...</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Still student' ? 'selected' : '' }} value="Still student">Still student</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Govt. employee' ? 'selected' : '' }} value="Govt. employee">Govt. employee</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Govt.clg.teacher' ? 'selected' : '' }} value="Govt.clg.teacher">Govt.clg.teacher</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Govt.sch.teacher' ? 'selected' : '' }} value="Govt.sch.teacher">Govt.sch.teacher</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Private employee' ? 'selected' : '' }} value="Private employee">Private employee</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'P. college teacher' ? 'selected' : '' }} value="P. college teacher">P. college teacher</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'P. school teacher' ? 'selected' : '' }} value="P. school teacher">P. school teacher</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Businessman' ? 'selected' : '' }} value="Businessman">Businessman</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'BCS Cadre' ? 'selected' : '' }} value="BCS Cadre">BCS Cadre</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Banker' ? 'selected' : '' }} value="Banker">Banker</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Engineer' ? 'selected' : '' }} value="Engineer">Engineer</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Doctor' ? 'selected' : '' }} value="Doctor">Doctor</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Nurse' ? 'selected' : '' }} value="Nurse">Nurse</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Dentist' ? 'selected' : '' }} value="Dentist">Dentist</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Lawyer' ? 'selected' : '' }} value="Lawyer">Lawyer</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Barrister' ? 'selected' : '' }} value="Barrister">Barrister</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Journalist' ? 'selected' : '' }} value="Journalist">Journalist</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Law enforcer' ? 'selected' : '' }} value="Law enforcer">Law enforcer</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Chef' ? 'selected' : '' }} value="Chef">Chef</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Unemployed' ? 'selected' : '' }} value="Unemployed">Unemployed</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Driver' ? 'selected' : '' }} value="Driver">Driver</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Maulana' ? 'selected' : '' }} value="Maulana">Maulana</option>
                <option {{ isset($personal_data) && $personal_data->proffession == 'Inform Later' ? 'selected' : '' }} value="Inform Later">Inform Later</option>

              </select>
              <span class="text-danger">
                @error('profession'){{$message}}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">City*</label>
              <select class="form-control" id="exampleInputUsername1" name="city_id">
                  <option disabled selected>Select City...</option>
                  @forelse($city as $postData)
                      <option {{ isset($personal_data) && $personal_data->city_id == $postData->id ? 'selected' : '' }} value="{{ $postData->id }}">{{ $postData->city }}</option>
                  @empty
                      <option>City Not Found</option>
                  @endforelse
              </select>
              <span class="text-danger">@error('city_id'){{$message}}@enderror</span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Childern*</label>
              <select name="children" class="form-control">
              <option value="" selected="true" disabled="disabled">Have Any
                  Children?</option>
                <option {{$personal_data->children ?? '' == 'Yes' ? 'selected' : ''}} value="Yes">Yes</option>
                <option {{$personal_data->children ?? '' == 'No' ? 'selected' : ''}} value="No">No</option>
              </select>
              <span class="text-danger">
                @error('children')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Marital*</label>
              <select name="marital" class="form-control">
              <option value="" selected="" disabled="disabled">Select Your Marital Status</option>
              <option {{ isset($personal_data) && $personal_data->marital == 'Single' ? 'selected' : '' }} value="Single">Single</option>
              <option {{ isset($personal_data) && $personal_data->marital == 'Married' ? 'selected' : '' }} value="Married">Married</option>
              <option {{ isset($personal_data) && $personal_data->marital == 'Divorce' ? 'selected' : '' }} value="Divorce">Divorce</option>
              </select>
              <span class="text-danger">
                @error('marital')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Religion*</label>
              <select name="religion" class="form-control" >
                  <option value="" selected="" disabled>Select Your Religion</option>
                  <option {{ isset($personal_data) && $personal_data->religion == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                  <option {{ isset($personal_data) && $personal_data->religion == 'Muslim' ? 'selected' : '' }} value="Muslim">Muslim</option>
                  <option {{ isset($personal_data) && $personal_data->religion == 'Other' ? 'selected' : '' }} value="Other">Other</option>
              </select>
              <span class="text-danger">
                @error('religion')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="main-input">
              <label for="" class="color" style="color:#fff">Gender*</label>
              <select name="gender" class="form-control">
              <option value="" selected="true" disabled="disabled">Select Your Gender</option>
                <option {{ isset($personal_data) && $personal_data->gender == 'Male' ? 'selected' : ''}} value="Male">Male</option>
                <option {{ isset($personal_data) && $personal_data->gender == 'Female' ? 'selected' : ''}} value="Female">Female</option>
                <option {{ isset($personal_data) && $personal_data->gender == 'Other' ? 'selected' : ''}} value="Other">Other</option>
              </select>
              <span class="text-danger">
                @error('gender')
                {{ $message }}
                @enderror
              </span>
            </div>

            <div class="file-upload">
              <div class="file-upload-label drop-zone">
                <label for="file-upload-box" class="drop-zone__prompt"><i
                    class="fa-solid fa-file-arrow-up"></i><span>Click or drag a file to this area to
                    upload.</span></label>
                <input type="file" name="img" id="file-upload-box" class="drop-zone__input" />
              </div>
            </div>

          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-md btn-primary ">Submit</button>
          </div>
    </div>
    </form>
  </div>
</section>

<!-- ============================ login form end  ============================= -->
    <script>
      // file upload
      document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("click", (e) => {
          inputElement.click();
        });

        inputElement.addEventListener("change", (e) => {
          if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
          }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
          e.preventDefault();
          dropZoneElement.classList.add("drop-zone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
          dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
          });
        });

        dropZoneElement.addEventListener("drop", (e) => {
          e.preventDefault();

          if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
          }

          dropZoneElement.classList.remove("drop-zone--over");
        });
      });

      /**
       * Updates the thumbnail on a drop zone element.
       *
       * @param {HTMLElement} dropZoneElement
       * @param {File} file
       */
      function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement =
          dropZoneElement.querySelector(".drop-zone__thumb");

        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
          dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
          thumbnailElement = document.createElement("div");
          thumbnailElement.classList.add("drop-zone__thumb");
          dropZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
          const reader = new FileReader();

          reader.readAsDataURL(file);
          reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
          };
        } else {
          thumbnailElement.style.backgroundImage = null;
        }
      }
    </script>
@endsection