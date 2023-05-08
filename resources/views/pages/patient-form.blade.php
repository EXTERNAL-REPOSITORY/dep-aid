<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/logos/DEP-AID.png">
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
                <form role="form" method="POST" action="{{ route('patient-form.store') }}" id="add-patient-form"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="tab">
                    <div class="row">
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.input')
                        @slot('label', 'Name')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'name',
                        'id' => 'name',
                        'placeholder' => 'Name',
                        'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.input')
                        @slot('label', 'Age')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'number',
                        'name' => 'age',
                        'id' => 'age',
                        'placeholder' => 'Age',
                        'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-6">
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
                      <div class="col-md-12 col-lg-6">
                        @component('components.inputs.select')
                          @slot('label', 'District Address')
                          @slot('options', [
                            "Hypertension" => "Hypertension",
                          ])
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
                        'placeholder' => 'Email',
                        'required' =>'required'
                        ])
                        @endcomponent
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
                        'required' =>'required'
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
                        @slot('label', 'Heart Rate')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'heart_rate',
                        'id' => 'heart_rate',
                        'placeholder' => 'Heart Rate',
                        'required' =>'required'
                        ])
                        @endcomponent
                      </div>
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Blood Pressure')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'blood_pressure',
                        'id' => 'blood_pressure',
                        'placeholder' => 'Blood Pressure'
                        ])
                        @endcomponent
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-12">
                        @component('components.inputs.input')
                        @slot('label', 'Temperature')
                        @slot('attributes', [
                        'class' => 'form-control text-black',
                        'type' => 'text',
                        'name' => 'temperature',
                        'id' => 'temperature',
                        'placeholder' => 'Temperature'
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

                      <div class="col-lg-6 col-md-12">
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
                          <div class="table-responsive">
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
                      <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
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
<script>

  var districtList='<option value="">select...</option>';
  var barangayList='<option value="">select...</option>';

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
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
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
      document.getElementById("add-patient-form").submit();
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


$(document).ready(function () {
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
      $(this).val()+(
        $(this).val()!=""?
          ($('#barangay').val()!=""?", "+$('#barangay').val():""):
          $('#barangay').val()
      )
    );
  });

  $("#barangay").on('change', function (e) {
    e.preventDefault();
    $('#address').val(
      $('#district').val()+(
        $('#district').val()!=""?
          ($(this).val()!=""?", "+$(this).val():""):
          $(this).val()
      )
    );
  });

    
    $('#date-for-consultation').on('change', function (e) {
      e.preventDefault();

      var selectDate = new Date(this.value).getDay();

      $.ajax({
        url: "{{ route('getSchedules') }}",
        method: "GET",
        data: {
          day: selectDate
        },
        success: function (response) {
          var tableBody = $("table tbody");

          if (response == "") {
            var tableRow = "<tr><td colspan='5' style='text-align: center;'>No Data Available</td></tr>";

            tableBody.html(tableRow);
          } else {
            tableBody.html("");

            response.forEach(element => {
              var tableRow = `<tr>
              <td>
              <div>
              <div class='form-check'>
              <input class='form-check-input doctor-consulting' type='radio' name='doctor_consulting' id="flexRadioDefault'${element.id}'" value="${element.employee_id}">
              </div>
              </div>
              </td>
              <td>
              <div class='d-flex px-2 py-1'>
              <div class='d-flex flex-column justify-content-center'>
              <h6 class='mb-0 text-xs'>${element.first_name??'', " ", element.last_name??''}</h6>
              </div>
              </div>
              </td>
              <td>
              <p class='text-xs font-weight-bold mb-0'>${element.position??''}</p>
              </td>
              <td class='align-middle text-center text-sm'>
                <input style="all: unset;boder:none!important; text-decoration:none!important;" type='time' class="text-xs font-weight-bold m-0 p-0" value="${element.available_from??''}" readonly>
              </td>
              <td class='align-middle text-center text-sm'>
                <input style="all: unset;boder:none!important; text-decoration:none!important;" type='time' class="text-xs font-weight-bold m-0 p-0" value="${element.available_to??''}" readonly>
              </td>
              </tr>
              <input type='hidden' name='day' value='${selectDate}'>
              <input type='hidden' name='available_from' value='${element.available_from}'>
              <input type='hidden' name='available_to' value='${element.available_to}'>`;

              var tableBody = $("table tbody");
              tableBody.append(tableRow);
            });
          }
        },
        error: function (response) {

        }
      })
    })
  })

      // var botmanWidget = {
	    //     aboutText: 'DEP-AID',
	    //     introMessage: "✋ Hi! I'm DEP-AID Malaybalay Division. \n How can I help you? \n Please select your queries: Schedule Of Appointment, Things Needed to Bring, Link of FB Page \n",
	    // };
</script>

</html>