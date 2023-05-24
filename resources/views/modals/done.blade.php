<div class="modal fade" id="doneModal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="#" method="POST" id="done-form">
            @csrf
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="text-gradient text-danger mt-4">You should read this!</h4>
                    <p>Do you want to Done this item?</p>
                    <input type="hidden" name="patient_form_id" id="done_patient_form_id">
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        @component('components.inputs.select')
                        @slot('label', 'Final Diagnosis')
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
                        'class' => 'selectpicker form-control',
                        'name' => 'diagnosis',
                        'id' => 'diagnosis',
                        'value' => '',
                        'placeholder' => 'Select Diagnosis (Optional)',
                        'style' => 'width:100%!important',
                        ])
                        @endcomponent
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-primary">Yes</button>
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">No</button>
            </div>
        </form>
      </div>
    </div>
</div>