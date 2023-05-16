<div class="modal fade" id="dispensePatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Dispense Medicine</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('patient-dispensing.store') }}" method="POST" id="add-dispensePatient-form" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <span id="medicine">
                            <div class="d-flex justify-content-center container-fluid">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'Type')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'number',
                                'name' => 'quantity',
                                'id' => 'quantity',
                                'placeholder' => '0',
                                'value'=>0
                            ])
                        @endcomponent
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        @component('components.inputs.input')
                            @slot('label', 'Patient List')
                            @slot('attributes', [
                                'class' => 'radio_patient',
                                'type' => 'radio',
                                'name' => 'radio_patient',
                                'value' => 'patient_list',
                            ])          
                        @endcomponent
                    </div>
                    <div class="col-md-6">
                        @component('components.inputs.input')
                            @slot('label', 'Out Patient')
                            @slot('attributes', [
                                'class' => 'radio_patient',
                                'type' => 'radio',
                                'name' => 'radio_patient',
                                'value' => 'out_patient',
                            ])          
                        @endcomponent
                    </div>
                </div>
                <span id="patient">
                    <div class="d-flex justify-content-center container-fluid">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </span>
                <div class="row">
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'Remarks')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'remarks',
                                'id' => 'remarks',
                                'placeholder' => 'Remarks...'
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