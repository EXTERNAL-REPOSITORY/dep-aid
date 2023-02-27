@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Doctor/Nurse'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <button class="btn bg-gradient-info z-index-2 me-2" data-bs-toggle="modal" data-bs-target="#filterLeaveModal">Filter</button>
                        <form action="{{ route('doctor-nurse.generatePdf') }}" method="POST" id="generate-report">
                            @csrf
                            <button type="submit" class="btn bg-gradient-info z-index-2 me-2">Generate Report</button>
                        </form>
                        <button type="button" class="btn bg-gradient-success z-index-2" data-bs-toggle="modal" data-bs-target="#addDoctorNurse">Add User</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="{{route('doctor-nurse.index')}}" method="GET">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search.." name="search" value="{{ $requestData['search'] }}">
                            <button class="search-btn" type="submit" style="border: none; border-top-right-radius: 10px; border-bottom-right-radius: 10px; background-color: #ededed;"><i class="ni ni-zoom-split-in" style="padding-left: 5px; padding-right: 5px"></i></button>
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
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Employee ID</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">First Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Middle Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">Last Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Position</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($doctorNurse as $index => $row)
                                    <tr>
                                        <tr class="text-center">
                                            <td>
                                                <p class="text-xs font-weight-bold table-text mb-0 text-uppercase">{{ $row->employee_id }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold table-text mb-0 text-uppercase">{{ ucfirst($row->first_name) }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold table-text text-uppercase">{{ ucfirst($row->middle_name) }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold table-text text-uppercase">{{ ucfirst($row->last_name) }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold table-text text-uppercase">{{ ucfirst($row->position) }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <input type="hidden" id="doctor-nurse-details-{{$row->id}}" data-detail="{{ $row }}">
                                                <button 
                                                    type="button" 
                                                    class="btn bg-gradient-info z-index-2" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#showDoctorNurse" 
                                                    onclick = "showSchedules('{{$row->id}}')">
                                                    Show
                                                </button>
                                                <button 
                                                    type="button" 
                                                    class="btn bg-gradient-warning z-index-2" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editLeaveModal" 
                                                    onclick = "editDoctorNurse('{{$row->id}}')">
                                                    Edit
                                                </button>
                                                <button 
                                                    type="button" 
                                                    class="btn bg-gradient-danger z-index-2 drop" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal"
                                                    {{-- data-url="{{ route('leave.destroy', $item->id) }}" --}}
                                                    onclick = "deleteDoctorNurse(this)">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="font-weight-bold text-center table-text">No Data Available</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                        </div>
                        {{-- <div class="table-pagination p-5">
                            <div class="item">
                                <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600">
                                    {{$doctorNurse->appends(['search' => isset($requestData->search) ? $requestData->search : null])->links('components.pagination')}}
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.doctor-nurse.create')
    @include('modals.doctor-nurse.edit')
    @include('modals.doctor-nurse.show')
    @include('modals.delete')
@endsection

@push('js')
    <script>
        function showSchedules(id){
            const details = $(`#doctor-nurse-details-${id}`).data().detail;

            $.ajax({
                url: "{{ route('doctor-nurse.show') }}",
                method: "GET",
                data: {
                    employee_id: details.employee_id
                }, 
                success: function(response){
                    const detail = $(`#patient-details-${id}`).data().detail; 
                    newscheduledAppointment = formatDate(detail.scheduled_appointment);
                    console.log(detail);
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
                },
                error: function(response){
                    console.log(response)
                }
            })
        }

        function editDoctorNurse(id) {
            const detail = $(`#doctor-nurse-details-${id}`).data().detail;     
            newManufacturerDate = formatDate(detail.manufacturer_date);
            newExpirationDate = formatDate(detail.expiration_date);

            $('#edit_medicine_name').val(detail.medicine_name);            
            $('#edit_brand').val(detail.brand);            
            $('#edit_manufacturer_date').val(newManufacturerDate);
            $('#edit_expiration_date').val(newExpirationDate);
            $('#edit-anti-inflammatory-form').attr('action', `/anti-inflammatory/update/${detail.id}`)
        }

        function deleteDoctorNurse(btn) {
            var data = $(btn).data();
            var url = data.url;
            $('#delete-form').attr('action', url);
        }

        $('#is_working_monday').on('change', function() {
            if (this.checked == true){
                $(this).val("1");
            } else {
                $(this).val("0");
            }
        })
        $('#is_working_tuesday').on('change', function() {
            if (this.checked == true){
                $(this).val("1");
            } else {
                $(this).val("0");
            }
        })
        $('#is_working_wednesday').on('change', function() {
            if (this.checked == true){
                $(this).val("1");
            } else {
                $(this).val("0");
            }
        })
        $('#is_working_thursday').on('change', function() {
            if (this.checked == true){
                $(this).val("1");
            } else {
                $(this).val("0");
            }
        })
        $('#is_working_friday').on('change', function() {
            if (this.checked == true){
                $(this).val("1");
            } else {
                $(this).val("0");
            }
        })
        $('#is_working_saturday').on('change', function() {
            if (this.checked == true){
                $(this).val("1");
            } else {
                $(this).val("0");
            }
        })
        $('#is_working_sunday').on('change', function() {
            if (this.checked == true){
                $(this).val("1");
            } else {
                $(this).val("0");
            }
        })
    </script>
@endpush
