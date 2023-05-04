<div class="modal fade" id="schedulePatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Schedule Next Visit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" id="schedule-next-visit-form" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            @component('components.inputs.input')
                            @slot('label', 'Patient Name')
                            @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'nv_patient_name',
                            'id' => 'nv_patient_name',
                            'placeholder' => 'Patient Name'
                            ])
                            @endcomponent
                            <input type="hidden" type="text" name="patient_form_id"
                                    id="patient_form_id">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nv_scheduled_appointment" class="form-control-label">Scheduled Appointment</label>
                                <input class="form-control" type="date" name="nv_scheduled_appointment"
                                    id="nv_scheduled_appointment">

                                <input type="hidden" name="start_date"
                                    id="start_date">
                                <input type="hidden" name="end_date"
                                    id="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="scheduled_time" class="form-control-label">Scheduled Time</label>
                                <input class="form-control" type="time" name="scheduled_time"
                                    id="scheduled_time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @component('components.inputs.select')
                            @slot('label', 'Reason For Consultation')
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
                            'name' => 'reasons_for_consultation',
                            'id' => 'reasons_for_consultation',
                            'value' => '',
                            'placeholder' => 'Select'
                            ])
                            @endcomponent
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @component('components.inputs.input')
                            @slot('label', 'Remarks')
                            @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'remarks',
                            'id' => 'remarks',
                            'placeholder' => 'Remarks'
                            ])
                            @endcomponent

                            @component('components.inputs.input')
                            @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'hidden',
                            'name' => 'text',
                            'id' => 'text',
                            'placeholder' => 'Schedule Text'
                            ])
                            @endcomponent
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>