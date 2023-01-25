@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])


@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Patients'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <button class="btn bg-gradient-info z-index-2 me-2" data-bs-toggle="modal" data-bs-target="#filterPatient">Filter</button>
                        <form action="{{ route('patients.generatePdf') }}" method="POST" id="generate-report">
                            @csrf
                            <button type="submit" class="btn bg-gradient-info z-index-2 me-2">Generate Report</button>
                        </form>
                        {{-- <button type="button" class="btn bg-gradient-success z-index-2" data-bs-toggle="modal" data-bs-target="#addPatient">Add Patient</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="{{route('patients.index')}}" method="GET">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search.." name="search" value="{{ $requestData['search'] }}">
                            <button class="search-btn" type="submit" style="border: none; border-top-right-radius: 10px; border-bottom-right-radius: 10px; backgropund-color: #ededed;"><i class="ni ni-zoom-split-in" style="padding-left: 5px; padding-right: 5px"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">ID</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Patient Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Scheduled Date</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Reason/s for Consultation</th>
                                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Remarks</th> --}}
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Action</th>
                                </tr>
                              </thead>
                              <tbody>

                                @forelse ($patient as $index => $row)
                                    <tr class="text-center">
                                        <td>
                                            <p class="text-xs font-weight-bold table-text mb-0">{{ $row->id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold table-text mb-0">{{ ucfirst($row->name) }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold table-text">{{ date('M d, Y', strtotime($row->available_from)) }}</span>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold table-text mb-0">{{ $row->reason_for_consultation }}</p>
                                        </td>
                                        {{-- <td>
                                            <p class="text-xs font-weight-bold table-text mb-0">{{ $row->remarks }}</p>
                                        </td> --}}
                                        <td class="align-middle">
                                            <input type="hidden" id="patient-details-{{$row->id}}" data-detail="{{ $row }}">
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-info z-index-2" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#viewPatient" 
                                                onclick = "viewPatient('{{$row->id}}')">
                                                View
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-warning z-index-2" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editPatient" 
                                                onclick = "editPatient('{{$row->id}}')">
                                                Edit
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-danger z-index-2 drop" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal"
                                                data-url="{{ route('patients.destroy', $row->id) }}"
                                                onclick = "deletePatient(this)">
                                                Delete
                                            </button>
                                            @if($row->is_done_consulting)
                                                <button
                                                    type="button"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#sendModal" 
                                                    class="btn bg-gradient-success z-index-2 drop send-diagnosis"
                                                    onclick = "sendDiagnosis('{{ $row->id }}', this)">
                                                    Send
                                                </button>
                                            @else
                                                <button 
                                                    type="button" 
                                                    class="btn bg-gradient-success z-index-2 drop" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#doneModal"
                                                    data-url="{{ route('patients.done', $row->id) }}"
                                                    onclick = "donePatient(this)">
                                                    Done Consulting
                                                </button>
                                            @endif
                                           
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="font-weight-bold text-center table-text">No Data Available</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                            <div class="table-pagination p-5">
                                <div class="row">
                                    <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600"">
                                        {{$patient->appends(['search' => isset($requestData->search) ? $requestData->search : null])->links('components.pagination')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.patient.view')
    @include('modals.patient.edit')
    @include('modals.patient.filter')
    @include('modals.delete')
    @include('modals.done')
    @include('modals.send')
@endsection

@push('js')
    <script>
        $('.close-modal').on('click', function(){
            $('.sidenav').css('opacity', '100%');
        })

        // $('#viewPatient').modal({
        //     backdrop: 'static',
        //     keyboard: false
        // })

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [year, month, day].join('-');
        }

        function viewPatient(id) {
            const detail = $(`#patient-details-${id}`).data().detail; 
                
            newscheduledAppointment = formatDate(detail.scheduled_appointment);
            console.log(detail);
            $('.sidenav').css('opacity', '50%');
            
            $('#patient_name').val(detail.name);
            $('#patient_age').val(detail.age);
            $('#patient_address').val(detail.address);
            $('#patient_gender').val(detail.gender);
            $('#patient_contact_number').val(detail.contact_number);
            $('#patient_birthdate').val(detail.birthdate);
            $('#patient_height').val(detail.height);
            $('#patient_weight').val(detail.weight);
            $('#patient_heart_rate').val(detail.heart_rate);
            $('#patient_blood_pressure').val(detail.blood_pressure);
            $('#patient_oxygen_saturation').val(detail.oxygen_saturation);
            $('#patient_temperature').val(detail.temperature);
            $('#patient_allergies').val(detail.allergies);
            $('#patient_main_reason_for_consultation').val(detail.main_reason_for_consultation);
            $('#patient_other_reason_for_consultation').val(detail.other_reason_for_consultation);
            $('#patient_current_medications').val(detail.current_medications);
            $('#patient_maintenance_medications').val(detail.maintenance_medications);
            $('#patient_doctor_consulting').val(detail.doctor_consulting);
            $('#patient_day').val(detail.day);
            $('#patient_available_from').val(detail.available_from);
            $('#patient_available_to').val(detail.available_to);
        }

        function editPatient(id) {
            const detail = $(`#patient-details-${id}`).data().detail;     
            newscheduledAppointment = formatDate(detail.scheduled_appointment);

            $('#edit_patient_name').val(detail.patient_name);            
            $('#edit_reasons_for_consultation').val(detail.reasons_for_consultation);            
            $('#edit_remarks').val(detail.remarks);            
            $('#edit_scheduled_appointment').val(newscheduledAppointment);
            $('#edit-patient-form').attr('action', `/patients/update/${detail.id}`)
        }

        function deletePatient(btn) {
            var data = $(btn).data();
            var url = data.url;
            $('#delete-form').attr('action', url);
        }

        function donePatient(btn) {
            var data = $(btn).data();
            console.log(data)
            var url = data.url;
            $('#done-form').attr('action', url);
        }

        function sendDiagnosis(id, btn) {
            const detail = $(`#patient-details-${id}`).data().detail;
            console.log(detail)
            $('#patient-name').attr('value', detail.name);
            $('#patient-email').attr('value', detail.email);
            $('#send-diagnosis-form').attr('action', `/send-prescription-diagnosis/${detail.id}` );
        }

    </script>
@endpush
