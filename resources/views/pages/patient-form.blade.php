<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/logos/DEP-AID.png">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>
    DEP-AID
  </title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
  <link href="./assets/css/custom.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      appearance: textfield;
      -moz-appearance: textfield;
    }
    
    *{
        text-transform: uppercase !important;
    }

    
/* scrollbar */
::-webkit-scrollbar {
  width: 5px;
  height: 5px;
}

::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  -webkit-border-radius: 10px;
  border-radius: 10px;
}

::-webkit-scrollbar-thumb {
  -webkit-border-radius: 10px;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.3);
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
}

::-webkit-scrollbar-thumb:window-inactive {
  background: rgba(255, 255, 255, 0.3);
}
  </style>
</head>

<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-12 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card card-plain">
              <div class="card-header pb-0 text-center">
                <div class="row mt-5">
                  <div class="col-lg-6 col-md-6 col-6 text-center">
                    <img src="{{ asset('img/logos/dep-ed.png') }}"  style="border-radius: 50%;border-width: 1px;" height="100">
                  </div>
                  <div class="col-lg-6 col-md-6 col-6 text-center">
                    <img src="{{ asset('img/logos/DEP-AID.png') }}" height="100">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="text-center text-black">Please provide the following informations</h6>
                <form role="form" id="add-patient-form" enctype="multipart/form-data">
                  <div class="tab">
                    <div class="row">
                      <div class="col-md-12 col-lg-4">
                        @component('components.inputs.input')
                        @slot('label', 'First Name')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'firstname',
                        'id' => 'firstname',
                        'placeholder' => 'First Name',
                         'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-md-12 col-lg-4">
                        @component('components.inputs.input')
                        @slot('label', 'Middle Name')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'middlename',
                        'id' => 'middlename',
                        'placeholder' => 'Middle Name',
                         'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-md-12 col-lg-4">
                        @component('components.inputs.input')
                        @slot('label', 'Last Name')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'lastname',
                        'id' => 'lastname',
                        'placeholder' => 'Last Name',
                         'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-4">
                        @component('components.inputs.select')
                        @slot('label', 'Gender')
                        @slot('options', ["Male" => 'Male', "Female" => 'Female'])
                        @slot('attributes', [
                        'class' => 'form-control',
                        'name' => 'gender',
                        'id' => 'gender',
                        'value' => '',
                        'placeholder' => 'select...',
                         'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.input')
                        @slot('label', 'Birthdate')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'date',
                        'name' => 'birthdate',
                        'id' => 'birthdate',
                        'placeholder' => 'Birthdate',
                         'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-md-12 col-lg-2">
                        @component('components.inputs.input')
                        @slot('label', 'Age')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'number',
                        'name' => 'age',
                        'id' => 'age',
                        'placeholder' => 'Age',
                         'readonly' =>'readonly'
                        ])
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.input-group')
                        @slot('label', 'Height')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'number',
                        'name' => 'height',
                        'id' => 'height',
                        'placeholder' => 'Height',
                         'required' =>'required'
                        ])
                        @slot('append', 'cm')
                        @endcomponent
                      </div>
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.input-group')
                        @slot('label', 'Weight')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'number',
                        'name' => 'weight',
                        'id' => 'weight',
                        'placeholder' => 'Weight',
                         'required' =>'required'
                        ])
                        @slot('append', 'kl')
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        @component('components.inputs.input')
                          @slot('label', 'Street Address')
                          @slot('attributes', [
                          'class' => 'form-control',
                          'name' => 'street',
                          'id' => 'street',
                          'value' => '',
                          'placeholder' => 'Street Name...',
                          'onchange'=>'street',
                        ])
                        @endcomponent
                      </div>
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.select')
                          @slot('label', 'District Address')
                          @slot('options', [])
                          @slot('attributes', [
                          'class' => 'form-control',
                          'name' => 'district',
                          'id' => 'district',
                          'value' => '',
                          'placeholder' => 'select...',
                          'onchange'=>'address',
                           'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.select')
                          @slot('label', 'Barangay Address')
                          @slot('options', [])
                          @slot('attributes', [
                          'class' => 'form-control',
                          'name' => 'barangay',
                          'id' => 'barangay',
                          'value' => '',
                          'placeholder' => 'Select',
                          'onchange'=>'',
                           'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-md-12 col-lg-12">
                        @component('components.inputs.input')
                        @slot('label', 'Full Address')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'address',
                        'id' => 'address',
                        'placeholder' => 'Address',
                        'readonly'=>'readonly',
                        ])
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.input-group')
                        @slot('label', 'Email')
                        @slot('prepend', '<i class="fa fa-envelope-o" style="font-size: x-large;" aria-hidden="true"></i>')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'email',
                        'name' => 'email',
                        'id' => 'email',
                        'placeholder' => 'Active Email Address',
                        'required' =>'required'
                        ])
                        @endcomponent
                        <small>(note: this email will receive the confirmation of schedule)</small>
                      </div>
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.input-group')
                        @slot('label', 'Contact Number')
                        @slot('prepend', '+63')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'number',
                        'name' => 'contact_number',
                        'id' => 'contact-number',
                        'placeholder' => 'Contact Number',
                        'maxlength'=>'11',
                        ])
                        @endcomponent
                      </div>
                    </div>
                  </div>

                  <div class="tab">
                    <div class="row mt-3 mb-3">
                      <h6 class="text-center text-black">Vital Signs (If Available)</h6>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Blood Pressure Systolic:')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'number',
                        'name' => 'blood_pressure_systolic',
                        'id' => 'blood_pressure_systolic',
                        'placeholder' => '-- mmHg --'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Blood Pressure Diastolic:')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'number',
                        'name' => 'blood_pressure_diastolic',
                        'id' => 'blood_pressure_diastolic',
                        'placeholder' => '-- mmHg --' //millimeters of mercury
                        ])
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Heart Rate')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'heart_rate',
                        'id' => 'heart_rate',
                        'placeholder' => 'Heart Rate',
                         //'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Repiratory Rate')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'respiratory_rate',
                        'id' => 'respiratory_rate',
                        'placeholder' => '-- cpm --',//cycles per minute
                         //'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Body Temperature')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'temperature',
                        'id' => 'temperature',
                        'placeholder' => '-- °C --'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Oxygen Saturation')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'oxygen_saturation',
                        'id' => 'oxygen_saturation',
                        'placeholder' => 'Oxygen Saturation'
                        ])
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.select')
                        @slot('label', 'Main Reason For Consultation')
                        @slot('options', [
                        "Hypertension" => "Hypertension",
                        "Diabetes" => "Diabetes",
                        "Urinary Tract Infection" => "Urinary Tract Infection",
                        "Tubercolosis" => "Tubercolosis",
                        "Headache" => "Headache",
                        "Pneumonia" => "Pneumonia",
                        "Heart Disease" => "Heart Disease",
                        "Gastritis" => "Gastritis",
                        "Ulcer" => "Ulcer",
                        "Colds / Flu" =>"Colds / Flu",
                        "Stomache Aches" => "Stomache Aches",
                        "Cough" => "Cough",
                        "Sore Throat" => "Sore Throat",
                        "Diarrhea" => "Diarrhea",
                        "Athritis" => "Athritis",
                        "Appendicitis" => "Appendicitis",
                        "Asthma" => "Asthma" ,
                        "Cancer" => "Cancer",
                        "Bronchitis" => "Bronchitis",
                        "Chickenpox" => " Chickenpox",
                        "Constipation" => "Constipation",
                        "COVID" => "COVID",
                        "Hepatitis" => "Hepatitis",
                        "Malaria" => "Malaria",
                        "Dengue" => "Dengue",
                        "Osteoporosis" => "Osteoporosis",
                        "Sinusitis" => "Sinusitis",
                        "Stroke" => "Stroke",
                        "Tonsilitis" => "Tonsilitis",
                        ])
                        @slot('attributes', [
                        'class' => 'form-control',
                        'name' => 'main_reason_for_consultation',
                        'id' => 'main_reason_for_consultation',
                        'value' => '',
                        'placeholder' => 'Select',
                         'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Other Reason for Consultation')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'other_reason_for_consultation',
                        'id' => 'other_reason_for_consultation',
                        'placeholder' => 'Other Reason for Consultation'
                        ])
                        @endcomponent
                      </div>

                      <div class="col-lg-12 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Allergies')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'allergies',
                        'id' => 'allergies',
                        'placeholder' => 'Allergies'
                        ])
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Maintenance Medications')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'maintenance_medications',
                        'id' => 'maintenance_medications',
                        'placeholder' => 'Maintenance Medications'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Current Medications')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'current_medications',
                        'id' => 'current_medications',
                        'placeholder' => 'Current Medications'
                        ])
                        @endcomponent
                      </div>
                    </div>
                  </div>
                  <div class="tab">
                    <div class="row mt-3 mb-3">
                      <h6 class="text-center text-black">Date for Consultation</h6>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="example-date-input" class="form-control-label">Date</label>
                          <input class="form-control" type="date" name="date" value="" id="date-for-consultation" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="table-responsive" style="max-height:500px!important;overflow-y: auto">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                  </th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Position</th>
                                  <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Available From</th>
                                  <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Available To</th>
                                </tr>
                              </thead>
                              <tbody>
                                {{-- <tr>
                                  <td>
                                    <div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                          id="flexRadioDefault2">
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="d-flex px-2 py-1">
                                      <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">John Michael</h6>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                                  </td>
                                </tr> --}}
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div style="overflow:auto;">
                    <div style="float:right;">
                      <button type="button" class="btn btn-success me-3" id="prevBtn"
                        onclick="nextPrev(-1)">Previous</button>
                      <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">
                      <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                      </div> Next</button>
                    </div>
                  </div>

                  <!-- Circles which indicates the steps of the form: -->
                  <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <div
            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
            <div
              class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
              style="background-image: url('img/medical.svg'); background-size: cover;">
              <span class="mask opacity-6"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- FACEBOOK PAGE BOT -->
<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
   var chatbox = document.getElementById('fb-customer-chat');
   chatbox.setAttribute("page_id", "101459382826787");
   chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
   window.fbAsyncInit = function () {
     FB.init({
       xfbml: true,
       version: 'v15.0'
     });
   };

   (function (d, s, id) {
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) return;
     js = d.createElement(s); js.id = id;
     js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<!-- END FACEBOOK PAGE BOT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
  integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
  integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> -->

<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>


<script>

  var districtList='<option value="">select...</option>';
  var barangayList='<option value="">select...</option>';
  var tableRow='';

  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  loadDistrictsWithBarangay();
  
  function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
      document.getElementById("nextBtn").setAttribute('type','submit');
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
      document.getElementById("nextBtn").setAttribute('type','button');
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form... :
    if (currentTab >= x.length) {
      //...the form gets submitted:
      // document.getElementById("add-patient-form").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].querySelectorAll("input[required='required'],select[required='required']");
    // console.log(y);
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        if(!$(y[i]).attr('class').match('invalid')){
          y[i].className += " invalid";
        }
        // and set the current valid status to false:
        valid = false;
      }else{
        $(y[i]).removeClass($(y[i]).attr('class').match('invalid'));
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
  }

  function barangayList(district_name){
    $.ajax({
        url: "{{ route('barangays') }}",
        method: "GET",
        data: {
          district_name: district_name
        },
        success: function (response) {
          console.log(response);
          if (response == "") {
            console.log(response);
          } else {
            response = JSON.parse(response);
            response.districts.forEach(element => {
              barangayList+='<option value="'+element.district_name+'">'+element.district_name+'</option>';
            });
            
            $('#barangay').html(barangayList);
          }
        },
        error: function (response) {
          console.log(response);
        }
      });
  }

  function loadDistrictsWithBarangay(){
    $.ajax({
        url: "{{ route('districts') }}",
        method: "GET",
        success: function (response) {
          if (response == "") {
            console.log(response);
          } else {
            response = JSON.parse(response);
            response.districts.forEach(element => {
              districtList+='<option value="'+element.district_name+'">'+element.district_name+'</option>';
            });
            barangayList
            $('#district').html(districtList);
          }
        },
        error: function (response) {
          console.log(response);
        }
      });
  }


  // async function validateSchedule(attending_id,start_date){
  //   return new Promise(function(resolve, reject) {
  //     // Only `delay` is able to resolve or reject the promise
  //     $.ajax({
  //       url: "{{ route('schedules-validate') }}",
  //       method: "GET",
  //       data: {
  //         attending_id:attending_id,
  //         start_date:start_date
  //       },
  //       success: function (response) {
  //         // return ;
  //         resolve(response); // After 3 seconds, resolve the promise with value 42
  //       },
  //       error: function (response) {
  //         console.log(response);
  //       }
  //     });
  //   });
  // }

  async function validateSchedule(date){
    return new Promise(function(resolve, reject) {
      // Only `delay` is able to resolve or reject the promise
      $.ajax({
        url: "{{ route('schedules-validate') }}",
        method: "GET",
        data: {start_date:date},
        success: function (response) {
          resolve(response);
        },
        error: function (response) {
          reject(response);
        }
      });
    });
  }


$(document).ready(function () {

  $('#birthdate').on('change',function(){
    $('#age').val(moment().diff(new Date($(this).val()), 'years'));
  })

    $('#add-patient-form').submit(function(e){
      e.preventDefault();
      const formData = $(this).serializeArray().reduce((o,kv) => ({...o, [kv.name]: kv.value}), {});
      console.log(formData);
      const schedule = $('input[name="schedule"]:checked');
      formData['employee_id']=schedule.data("employee_id");
      formData['attending_id']=schedule.data("attending_id");
      formData['day']=schedule.data("day");
      formData['available_from']=schedule.data("available_from");
      formData['available_to']=schedule.data("available_to");
      $.ajax({
        url: "{{ route('patient-form.store') }}",
        method: "POST",
        data: formData,
        success: function (response) {
          $('html').html(response);
        },
        error: function (response) {
          console.log('aw');
          console.log(response);
        }
      });
    });



  $("#district").on('change', function (e) {
    e.preventDefault();
    $.ajax({
      url: "{{ route('barangays') }}",
      method: "GET",
      data: {
        district_name: $(this).val()
      },
      success: function (response) {
        // console.log(response);
        barangayList='<option value="">select...</option>';
        if (response == "") {
          console.log(response);
        } else {
          response = JSON.parse(response);
          // console.log(response.barangays);
          response.barangays.forEach(element => {
            element.barangays.forEach(prop => {
              barangayList+='<option value="'+prop.barangay_name+'">'+prop.barangay_name+'</option>';
            })
          });
        }
        $('#barangay').html(barangayList);
      },
      error: function (response) {
        console.log(response);
      }
    });
    $('#address').val(
      ($("#street").val()!=""?($(this).val()!="" && $("#barangay").val()!=""?$("#street").val()+", ":" "):"")+
      $(this).val()+(
        $(this).val()!=""?
          ($('#barangay').val()!=""?", "+$('#barangay').val():""):
          $('#barangay').val()
      )+", Malaybalay City, Bukidnon, Philippines"
    );
  });

  $("#barangay").on('change', function (e) {
    e.preventDefault();
    $('#address').val(
      ($("#street").val()!=""?($("#district").val()!="" && $(this).val()!=""?$("#street").val()+", ":" "):"")+
      $('#district').val()+(
        $('#district').val()!=""?
          ($(this).val()!=""?", "+$(this).val():""):
          $(this).val()
      )+", Malaybalay City, Bukidnon, Philippines"
    );
  });

  $("#street").on('change', function (e) {
    e.preventDefault();
    $('#address').val(
      ($(this).val()!=""?($("#district").val()!="" && $("#barangay").val()!=""?$(this).val()+", ":" "):"")+
      $('#district').val()+(
        $('#district').val()!=""?
          ($('#address').val()!=""?", "+$('#address').val():""):
          $('#address').val()
      )+", Malaybalay City, Bukidnon, Philippines"
    );
  });

    
    $('#date-for-consultation').on('change', async function (e) {
      e.preventDefault();

      var selectDate = new Date(this.value).getDay();
      var date_consult =new Date(this.value);
      var dateFrom = moment(new Date(date_consult.getFullYear()+'-'+moment(new Date(date_consult)).format('MM')+'-'+date_consult.getDate())).format('Y-MM-DD');
      
      var scheds = [];
      await validateSchedule(dateFrom).then((value) => {scheds=value;});

      $.ajax({
        url: "{{ route('getSchedules') }}",
        method: "GET",
        data: {
          day: selectDate
        },
        success: function (response) {
          // console.log(response);
          var tableBody = $("table tbody");

          if (response == "") {
            tableRow = "<tr><td colspan='5' style='text-align: center;'>No Data Available</td></tr>";
            tableBody.html(tableRow);
          } else {
            tableBody.html("");
            tableRow='';
            
            response.forEach(element => {
              console.log(element);
              var from = moment(new Date(date_consult.getFullYear()+'-'+date_consult.getMonth()+'-'+date_consult.getDate()+' '+element.available_from));
              var to = moment(new Date(date_consult.getFullYear()+'-'+date_consult.getMonth()+'-'+date_consult.getDate()+' '+element.available_to));
              
              // From time calculations
              let fromTime = moment(from, 'HH:mm');
              let toTime = moment(to, 'HH:mm');
              let noon = moment('12:00', 'HH:mm');

              let duration = moment.duration(toTime.diff(fromTime));
              let diff = duration.hours();
              let time = moment(fromTime).add(0, 'hours').format('HH:mm');
              // console.log(diff);

              for (i = 0; diff > i; i++) {
                if(i==0){
                  timef = moment(fromTime).add(i, 'hours').format('HH:mm');
                  timet = moment(fromTime).add((i+1.5), 'hours').format('HH:mm');
                }else{
                  timef = moment(fromTime).add(i+1.5, 'hours').format('HH:mm');
                  timet = moment(fromTime).add((i+2.5), 'hours').format('HH:mm');
                }

                if((timef.split(":")[0]!=12 && timet.split(":")[0]<=17)){
                  // console.log(moment(new Date(date_consult)).format('MM'));
                  var date_from = moment(new Date(date_consult.getFullYear()+'-'+moment(new Date(date_consult)).format('MM')+'-'+date_consult.getDate()+' '+timef+':00')).format('Y-MM-DD hh:mm:ss');
                  // Enter database validation here.....          
                 
                  tableRow += `<tr>
                    <td>
                      <div>
                        <div class='form-check'>
                          <input class='form-check-input schedule' type='radio' name='schedule' id="flexRadioDefault${element.id}" 
                          value="${element.id}" data-employee_id="${element.employee_id}" data-attending_id="${element.id}"
                          data-day="${selectDate}" data-available_from="${timef}:00" data-available_to="${timet}:00">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class='d-flex px-2 py-1'>
                        <div class='d-flex flex-column justify-content-center'>
                          <h6 class='mb-0 text-xs'>${element.first_name??''} ${element.last_name??''}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class='text-xs font-weight-bold mb-0'>${element.position??''}</p>
                    </td>
                    <td class='align-middle text-center text-sm'>
                      <input style="all: unset;boder:none!important; text-decoration:none!important;" type='time' class="text-xs font-weight-bold m-0 p-0" value="${timef??''}" readonly>
                    </td>
                    <td class='align-middle text-center text-sm'> 
                      <input style="all: unset;boder:none!important; text-decoration:none!important;" type='time' class="text-xs font-weight-bold m-0 p-0" value="${timet??''}" readonly>
                    </td>
                  </tr>`;
                 
                  console.log("This");
                  scheds.forEach(el=>{
                    if(el.attending_id==element.id && el.start_date==date_from){
                      console.log(el.attending_id==element.id && el.start_date==date_from);
                    }
                  });
                 
                 
                 
                 
                 
                 
                 
                  // scheds.forEach(el=>{
                  //   // console.log("ASDASDASD");
                  //   // console.log(el.attending_id +'=='+element.id);
                  //   // console.log(date_from +'=='+el.start_date);
                  //   // console.log(el.attending_id);
                  //   // console.log(element.id);
                  //   console.log(el);
                  //   console.log("&");
                  //   console.log(element);
                    
                  //   // console.log((el.attending_id==element.id && el.start_date==date_from)+' '+(el.attending_id==element.id)+" && "+(el.start_date==date_from));

                  //   if(el.attending_id==element.id && el.start_date==date_from){
                  //     console.log((el.attending_id)+" && "+(date_from));
                  //   }else{
                      
                  //     tableRow += `<tr>
                  //           <td>
                  //             <div>
                  //               <div class='form-check'>
                  //                 <input class='form-check-input schedule' type='radio' name='schedule' id="flexRadioDefault${element.id}" 
                  //                 value="${element.id}" data-employee_id="${element.employee_id}" data-attending_id="${element.id}"
                  //                 data-day="${selectDate}" data-available_from="${timef}:00" data-available_to="${timet}:00">
                  //               </div>
                  //             </div>
                  //           </td>
                  //           <td>
                  //             <div class='d-flex px-2 py-1'>
                  //               <div class='d-flex flex-column justify-content-center'>
                  //                 <h6 class='mb-0 text-xs'>${element.first_name??''} ${element.last_name??''}</h6>
                  //               </div>
                  //             </div>
                  //           </td>
                  //           <td>
                  //             <p class='text-xs font-weight-bold mb-0'>${element.position??''}</p>
                  //           </td>
                  //           <td class='align-middle text-center text-sm'>
                  //             <input style="all: unset;boder:none!important; text-decoration:none!important;" type='time' class="text-xs font-weight-bold m-0 p-0" value="${timef??''}" readonly>
                  //           </td>
                  //           <td class='align-middle text-center text-sm'> 
                  //             <input style="all: unset;boder:none!important; text-decoration:none!important;" type='time' class="text-xs font-weight-bold m-0 p-0" value="${timet??''}" readonly>
                  //           </td>
                  //         </tr>`;
                  //     // console.log('NAA');
                  //   }
                  // });
                }
              }
              tableBody.append(tableRow);
              // console.log(moment(new Date(date_consult.getFullYear()+'-'+date_consult.getMonth()+'-'+date_consult.getDate()+' '+element.available_from)).subtract('01:14:00').format('h:mm A'));
            });            
          }
        },
        error: function (response) {

        }
      });
    });
  });

      // var botmanWidget = {
	    //     aboutText: 'DEP-AID',
	    //     introMessage: "✋ Hi! I'm DEP-AID Malaybalay Division. \n How can I help you? \n Please select your queries: Schedule Of Appointment, Things Needed to Bring, Link of FB Page \n",
	    // };
</script>

</html>