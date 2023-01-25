<div class="modal fade" id="viewPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Patient</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    @component('components.inputs.input')
                        @slot('label', 'Patient Name')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_name',
                            'id' => 'patient_name',
                            'placeholder' => 'Patient Name',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @component('components.inputs.input')
                        @slot('label', 'Age')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_age',
                            'id' => 'patient_age',
                            'placeholder' => 'Age',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @component('components.inputs.input')
                        @slot('label', 'Gender')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_gender',
                            'id' => 'patient_gender',
                            'placeholder' => 'Gender',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-date-input" class="form-control-label">Birth Date</label>
                        <input class="form-control" type="date" value="" name="patient_birthdate" id="patient_birthdate" min={{date('Y-m-d')}}>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Height')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_height',
                            'id' => 'patient_height',
                            'placeholder' => 'Height',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Weight')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_weight',
                            'id' => 'patient_weight',
                            'placeholder' => 'Weight',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @component('components.inputs.input')
                        @slot('label', 'Address')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_address',
                            'id' => 'patient_address',
                            'placeholder' => 'Address',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @component('components.inputs.input')
                        @slot('label', 'Contact Number')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'number',
                            'name' => 'patient_contact_number',
                            'id' => 'patient_contact_number',
                            'placeholder' => 'Contact Number',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Heart Rate')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'number',
                            'name' => 'patient_heart_rate',
                            'id' => 'patient_heart_rate',
                            'placeholder' => 'Heart Rate',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Blood Pressure')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'number',
                            'name' => 'patient_blood_pressure',
                            'id' => 'patient_blood_pressure',
                            'placeholder' => 'Blood Pressure',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Temperature')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'number',
                            'name' => 'patient_temperature',
                            'id' => 'patient_temperature',
                            'placeholder' => 'Temperature',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Oxygen Saturation')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'number',
                            'name' => 'patient_oxygen_saturation',
                            'id' => 'patient_oxygen_saturation',
                            'placeholder' => 'Oxygen Saturation',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Main reason for Consultation')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_main_reason_for_consultation',
                            'id' => 'patient_main_reason_for_consultation',
                            'placeholder' => 'Main reason for Consultation',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Other Reason for Consultation')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_other_reason_for_consultation',
                            'id' => 'patient_other_reason_for_consultation',
                            'placeholder' => 'Other Reason for Consultation',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @component('components.inputs.input')
                        @slot('label', 'Allergies')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_allergies',
                            'id' => 'patient_allergies',
                            'placeholder' => 'Allergies',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Maintenace Medication')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_maintenance_medications',
                            'id' => 'patient_maintenance_medications',
                            'placeholder' => 'Maintenace Medication',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
                <div class="col-md-6">
                    @component('components.inputs.input')
                        @slot('label', 'Current Medication')
                        @slot('attributes', [
                            'class' => 'form-control',
                            'type' => 'text',
                            'name' => 'patient_current_medications',
                            'id' => 'patient_current_medications',
                            'placeholder' => 'Current Medication',
                            'readonly' => true
                        ])          
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-date-input" class="form-control-label">Scheduled Appointment</label>
                        <input class="form-control" type="date" value="" name="scheduled_appointment" id="scheduled_appointment" min={{date('Y-m-d')}}>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
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
                </div>
            </div> --}}
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary close-modal" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>
  </div>