@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Doctor/Nurse'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <button class="btn bg-gradient-info z-index-2 me-2" data-bs-toggle="modal" data-bs-target="#filterLeaveModal">Filter</button>
                        <button type="button" class="btn bg-gradient-info z-index-2 me-2" onclick="generateReport();">Generate Report</button>
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
                                                {{-- <button 
                                                    type="button" 
                                                    class="btn bg-gradient-info z-index-2" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#showDoctorNurse" 
                                                    onclick = "showSchedules('{{$row->id}}')">
                                                    Show
                                                </button> --}}
                                                <button 
                                                    type="button" 
                                                    class="btn bg-gradient-warning z-index-2" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editDoctorNurse" 
                                                    onclick = "editDoctorNurse('{{$row->id}}')">
                                                    Edit
                                                </button>
                                                <button 
                                                    type="button" 
                                                    class="btn bg-gradient-danger z-index-2 drop" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal"
                                                    data-url="{{ route('doctor-nurse.destroy', $row->employee_id) }}"
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
    {{-- @include('modals.doctor-nurse.show') --}}
    @include('modals.delete')
@endsection

@push('js')
    <script>
        function generateReport(){
            $.ajax({
                type: 'GET',
                url: `{{ route('doctor-nurse.generatePdf') }}${window.location.search}`,
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response){
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "DEP-AID Doctor - Nurse List Report.pdf";
                    link.click();
                },
                error: function(blob){
                    console.log(blob);
                }
            });
        }
        function showSchedules(id){
            const details = $(`#doctor-nurse-details-${id}`).data().detail;
            console.log("show details");
            console.log(details);
            $.ajax({
                url: "{{ route('doctor-nurse.show') }}",
                method: "GET",
                data: {
                    employee_id: details.employee_id
                }, 
                success: function(response){
                    // const detail = $(`#patient-details-${id}`).data().detail; 
                    // newscheduledAppointment = formatDate(detail.scheduled_appointment);
                    $('#show_first_name').val(details.first_name);
                    $('#show_middle_name').val(details.middle_name);
                    $('#show_last_name').val(details.last_name);
                    $('#show_position').val(details.position);
                    $day=[
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                        "Sunday"
                    ];
                    $i=0; $rows='';
                    response.data.map(element => {
                        console.log(element);
                        $rows+=`<div class="row">
                            <div class="col-md-3">
                                <input class="form-control mt-4" type="text" value="${$day[$i]}" readonly>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-time-input" class="form-control-label">From</label>
                                    <input class="form-control" type="time" value="${element.available_from??'-- --'}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-time-input" class="form-control-label">To</label>
                                    <input class="form-control" type="time" value="${element.available_to??'-- --'}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2-custom">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled ${element.is_working==1?'':'checked'}>
                                    <label for="flexCheckChecked">
                                    Day-off / No work
                                    </label>
                                </div>
                            </div>
                        </div>`;
                        $i++;
                    });
                    $('#show_schedules').html($rows);
                },
                error: function(response){
                    console.log(response)
                }
            })
        }

        function editDoctorNurse(id) {
            const details = $(`#doctor-nurse-details-${id}`).data().detail;            
            $.ajax({
                url: "{{ route('doctor-nurse.show') }}",
                method: "GET",
                data: {
                    employee_id: details.employee_id
                }, 
                success: async function(response){
                    // const detail = $(`#patient-details-${id}`).data().detail; 
                    // newscheduledAppointment = formatDate(detail.scheduled_appointment);
                    console.log(response);
                    $('#edit_first_name').val(details.first_name);
                    $('#edit_middle_name').val(details.middle_name);
                    $('#edit_last_name').val(details.last_name);
                    $('#edit_position').val(details.position);
                    $day=[
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                        "Sunday"
                    ];
                    $i=0; $rows='';
                    await response.data.map(element => {
                        console.log(element);
                        $rows+=`<div class="row">
                            <div class="col-md-3">
                                <input class="form-control mt-4" type="text" name="day[${$i}]" id="edit_${$day[$i].toLowerCase()}" value="${$day[$i]}" readonly>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-time-input" class="form-control-label">From</label>
                                    <input class="form-control edit_${$day[$i].toLowerCase()}_from" type="time" value="${element.available_from??''}" name="from_time[${$i}]">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-time-input" class="form-control-label">To</label>
                                    <input class="form-control edit_${$day[$i].toLowerCase()}_to" type="time" value="${element.available_to??''}" name="to_time[${$i}]">
                                </div>
                            </div>
                            <div class="col-md-3 mt-2-custom">
                                <div class="form-check">
                                    <input type="hidden" name="is_working[${$i}]" value="1">
                                    <input class="form-check-input is_working_${$day[$i].toLowerCase()}" type="checkbox" name="is_working[${$i}]" value="" ${element.is_working==0?'checked':''}>
                                    <label for="flexCheckChecked">
                                    Day-off / No work
                                    </label>
                                </div>
                            </div>
                        </div>`;
                        $i++;
                    });
                    $('#edit_schedules').html($rows);
                },
                error: function(response){
                    console.log(response)
                }
            });
            
            $('#edit-doctor-nurse-form').attr('action', `/doctor-nurse/update/${details.id}`);
        }

        function deleteDoctorNurse(btn) {
            var data = $(btn).data();
            var url = data.url;
            $('#delete-form').attr('action', url);
        }

        $('#is_working_monday').on('click', function() {
            console.log('asda');
            if (this.checked == true){
                $(this).val("0");
            } else {
                $(this).val("1");
            }
        })
        $('#is_working_tuesday').on('click', function() {
            if (this.checked == true){
                $(this).val("0");
            } else {
                $(this).val("1");
            }
        })
        $('#is_working_wednesday').on('click', function() {
            if (this.checked == true){
                $(this).val("0");
            } else {
                $(this).val("1");
            }
        })
        $('#is_working_thursday').on('click', function() {
            if (this.checked == true){
                $(this).val("0");
            } else {
                $(this).val("1");
            }
        })
        $('#is_working_friday').on('click', function() {
            if (this.checked == true){
                $(this).val("0");
            } else {
                $(this).val("1");
            }
        })
        $('#is_working_saturday').on('click', function() {
            if (this.checked == true){
                $(this).val("0");
            } else {
                $(this).val("1");
            }
        })
        $('#is_working_sunday').on('click', function() {
            if (this.checked == true){
                $(this).val("0");
            } else {
                $(this).val("1");
            }
        })
    </script>
@endpush
