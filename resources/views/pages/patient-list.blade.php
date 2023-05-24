@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])


@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Patients'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100" style="background-color: transparent; border: none; box-shadow: none;">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-end">
                        <button class="btn bg-gradient-info z-index-2 me-2" data-bs-toggle="modal"
                            data-bs-target="#filterPatient">Filter</button>
                        <button type="button" class="btn bg-gradient-info z-index-2 me-2"
                            onclick="generateReport();">Generate Report</button>
                        {{-- <button type="button" class="btn bg-gradient-success z-index-2" data-bs-toggle="modal" data-bs-target="#addPatient">Add Patient</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="{{ route('patient.index') }}" method="GET">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search.." name="search"
                                value="{{ $requestData['search'] }}">
                            <button class="search-btn" type="submit"
                                style="border: none; border-top-right-radius: 10px; border-bottom-right-radius: 10px; background-color: #ededed;"><i
                                    class="ni ni-zoom-split-in" style="padding-left: 5px; padding-right: 5px"></i></button>
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
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">
                                            ID</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text ps-2">
                                            Patient Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">
                                            Request Date</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">
                                            Final Diagnosis
                                            {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">Remarks</th> --}}
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 table-text">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($patient as $index => $row)
                                        <tr class="text-center">
                                            <td>
                                                <p class="text-xs font-weight-bold table-text mb-0">{{ $row->id }}</p>
                                            </td>
                                            <td class="text-justify">
                                                <p class="text-xs font-weight-bold table-text mb-0 text-uppercase">
                                                    {{ ucfirst($row->name) }}</p>
                                            </td>
                                            <td class="align-middle">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold table-text text-uppercase">{{ date('M d, Y h:i A', strtotime($row->created_at)) }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <p class="text-xs font-weight-bold table-text mb-0 text-uppercase">
                                                    <b>{{ $row->diagnosis }}</b>
                                                </p>
                                            </td>
                                            <td class="align-middle">
                                                <input type="hidden" id="patient-details-{{ $row->id }}"
                                                    data-detail="{{ $row }}">
                                                <button type="button" class="btn bg-gradient-info z-index-2"
                                                    data-bs-toggle="modal" data-bs-target="#viewPatient"
                                                    title="View Details" onclick="viewPatient('{{ $row->id }}')">
                                                    <i class="fa-solid fa-eye text-sm opacity-10"></i>
                                                </button>
                                                <button type="button" class="btn bg-gradient-warning z-index-2"
                                                    data-bs-toggle="modal" data-bs-target="#schedulePatient"
                                                    title="Schedule Next Visit"
                                                    onclick="schedulePatient('{{ $row->id }}')">
                                                    <i class="fa-solid fa-calendar text-sm opacity-10"></i>
                                                </button>
                                                {{-- <button 
                                                type="button"
                                                class="btn bg-gradient-success z-index-2 drop" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#prescriptionModal"
                                                data-url="{{ route('patient-dispensing.store') }}"
                                                title="Add Prescription"
                                                onclick = "prescribe('{{ $row->id }}', this)">
                                                <i class="fa-solid fa-prescription text-sm opacity-10"></i>
                                            </button>
                                            <button 
                                                type="button" 
                                                class="btn bg-gradient-danger z-index-2 drop" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal"
                                                data-url="{{ route('patient-queued.destroy', $row->id) }}"
                                                onclick = "deletePatient(this)">
                                                Delete
                                            </button> --}}
                                                {{-- @if ($row->is_done_consulting)
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#sendModal"
                                                        class="btn bg-gradient-success z-index-2 drop send-diagnosis"
                                                        title="Send Prescription and Diagnosis"
                                                        onclick="sendDiagnosis('{{ $row->id }}', this)">
                                                        <i class="fa-solid fa-paper-plane text-sm opacity-10"></i>
                                                    </button>
                                                @else
                                                    <button type="button" class="btn bg-gradient-success z-index-2 drop"
                                                        data-bs-toggle="modal" data-bs-target="#doneModal"
                                                        data-url="{{ route('patient-queued.done', $row->id) }}"
                                                        title="Done Consultation" onclick="donePatient(this)">
                                                        <i class="fa-solid fa-viruses text-sm opacity-10"></i>
                                                    </button>
                                                @endif --}}

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="font-weight-bold text-center table-text">No Data
                                                Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="table-pagination p-5">
                            <div class="row">
                                <div class="row col-sm-12 col-md-12 col-lg-12 font-weight-600"">
                                    {{ $patient->appends(['search' => isset($requestData->search) ? $requestData->search : null])->links('components.pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.patient.view')
    @include('modals.patient.schedulePatient')
    @include('modals.patient.list-filter')
    @include('modals.patient.prescription')
    @include('modals.delete')
    @include('modals.done')
    @include('modals.send')
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script>
        $('.close-modal').on('click', function() {
            $('.sidenav').css('opacity', '100%');
        })

        $('#schedule-next-visit-form').on('click', function() {
            $('.sidenav').css('opacity', '100%');
        })

        $(`#nv_patient_name, 
        #reasons_for_consultation,
        #nv_scheduled_appointment,
        #scheduled_time, #remarks`).on('keyup, change', function() {
            // TEXT in Schedule
            $('#text').val($('#nv_patient_name').val() + ", " +
                $('#reasons_for_consultation').val() + ", " +
                $('#remarks').val()).val();

            // Dates in schedule
            $('#start_date').val(moment($('#nv_scheduled_appointment').val() + " " + $('#scheduled_time').val())
                .format('Y-MM-DD H:mm A')).val();
            $('#end_date').val(moment($('#nv_scheduled_appointment').val() + " " + $('#scheduled_time').val())
                .format('Y-MM-DD H:mm A')).val();
        });

        $('#print-prescription').on('click', function() {
            $("#myDiv").printElement();
        })

        // $('#patient_form_id').val(detail.id);            
        // $('#nv_patient_name').val(detail.name);            
        // $('#reasons_for_consultation').val(detail.main_reason_for_consultation);            
        // $('#scheduled_appointment').val(newscheduledAppointment);
        // $('#scheduled_time').val(moment(detail.schedule?detail.schedule.start_date:'').format('H:i'));
        // $('#schedule-next-visit-form').attr('action', `/schedules/store`)

        // $('#viewPatient').modal({
        //     backdrop: 'static',
        //     keyboard: false
        // })


        function generateReport() {
            $.ajax({
                type: 'GET',
                url: `{{ route('patient.generatePdf') }}${window.location.search}`,
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response) {
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "DEP-AID Patients list - Report.pdf";
                    link.click();
                },
                error: function(blob) {
                    console.log(blob);
                }
            });
        }

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

            // newscheduledAppointment = formatDate(detail.scheduled_appointment);
            // console.log(detail);
            // $('.sidenav').css('opacity', '50%');
            console.log(detail);
            $('#patient_name').val(detail.name);
            $('#patient_age').val(detail.age);
            $('#patient_address').val(detail.address);
            $('#patient_gender').val(detail.gender);
            $('#patient_contact_number').val(detail.contact_number);
            $('#patient_email').val(detail.email);
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
            $('#diagnosis').val(detail.diagnosis);
            $('#patient_current_medications').val(detail.current_medications);
            $('#patient_maintenance_medications').val(detail.maintenance_medications);
            $('#patient_doctor_consulting').val(detail.doctor_consulting);
            $('#patient_day').val(detail.day);
            $('#patient_available_from').val(detail.available_from);
            $('#patient_available_to').val(detail.available_to);
            if (detail.start_date) {
                $('#scheduled_appointment').html(
                    `
                <br>
                <b>From:</b> <span>${moment(detail.start_date!=''?detail.start_date:'').format('LL H:mm A')}</span>
                ${moment(detail.start_date).format('LL')==moment(detail.end_date).format('LL')?
                `<b>-</b> <span>`+moment(detail.end_date!=''?detail.end_date:'').format('H:mm A') :
                ` &nbsp; <b>To:</b> <span>`+(moment(detail.end_date!=''?detail.end_date:'').format('LL H:mm A'))}</span>`
                );
            } else {
                $('#scheduled_appointment').html(`<br>None`);
            }

        }

        function schedulePatient(id) {
            const detail = $(`#patient-details-${id}`).data().detail;
            newscheduledAppointment = formatDate(detail.scheduled_appointment);
            console.log(detail);
            $('#patient_form_id').val(detail.id);
            $('#nv_patient_name').val(detail.name);
            $('#reasons_for_consultation').val(detail.main_reason_for_consultation);
            $('#nv_scheduled_appointment').val(newscheduledAppointment);
            $('#scheduled_time').val(moment(detail.schedule ? detail.schedule.start_date : '').format('HH:mm:ss'));
            $('#schedule-next-visit-form').attr('action', `/schedules/store2`);
        }

        function deletePatient(btn) {
            var data = $(btn).data();
            var url = data.url;
            $('#delete-form').attr('action', url);
        }

        function prescribe(id, btn) {
            var data = $(btn).data();
            var url = data.url;
            $('#prescription-form').attr('action', url);
        }

        function donePatient(btn) {
            var data = $(btn).data();
            console.log(data)
            var url = data.url;
            $('#done-form').attr('action', url + '/' + $('#diagnonis').val());
        }

        function sendDiagnosis(id, btn) {
            const detail = $(`#patient-details-${id}`).data().detail;
            console.log(detail)
            $('#patient-id').attr('value', detail.id);
            $('#patient-name').attr('value', detail.name);
            $('#patient-email').attr('value', detail.email);
            $('#send-diagnosis-form').attr('action', `/send-prescription-diagnosis/${detail.id}`);
        }

        function printDiv(divName) {
            var printContents = $(divName).html();
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.focus();
            window.print();
            window.close();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
