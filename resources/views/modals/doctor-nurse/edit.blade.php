<div class="modal fade" id="editDoctorNurse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Doctor / Nurse</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="edit-doctor-nurse-form" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'First Name')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'first_name',
                                'id' => 'edit_first_name',
                                'placeholder' => 'First Name'
                            ])          
                        @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'Middle Name')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'middle_name',
                                'id' => 'edit_middle_name',
                                'placeholder' => 'Middle Name'
                            ])          
                        @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'Last Name')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'last_name',
                                'id' => 'edit_last_name',
                                'placeholder' => 'Last Name'
                            ])          
                        @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'Position')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'position',
                                'id' => 'edit_position',
                                'placeholder' => 'Position'
                            ])          
                        @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="fw-bold">Availability</h6>
                    </div>
                </div>
                <div id="edit_schedules"></div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>