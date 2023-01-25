<div class="modal fade" id="addDoctorNurse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Doctor / Nurse</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('doctor-nurse.store') }}" method="POST" id="add-doctor-nurse-form" enctype="multipart/form-data">
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
                                'id' => 'first_name',
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
                                'id' => 'middle_name',
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
                                'id' => 'last_name',
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
                                'id' => 'position',
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

                <div class="row">
                    <div class="col-md-3">
                        @component('components.inputs.input')
                            @slot('label', '')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'day[0]',
                                'id' => 'monday',
                                'value' => 'Monday',
                                'placeholder' => 'Position',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">From</label>
                            <input class="form-control" type="time" value="" id="monday_from" name="from_time[0]">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">To</label>
                            <input class="form-control" type="time" value="" id="monday_to" name="to_time[0]">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2-custom">
                        <div class="form-check">
                            <input type="hidden" name="is_working[0]" value="0">
                            <input class="form-check-input" type="checkbox" name="is_working[0]" value="" id="is_working_monday">
                            <label for="flexCheckChecked">
                            Day-off / No work
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @component('components.inputs.input')
                            @slot('label', '')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'day[1]',
                                'id' => 'tuesday',
                                'value' => 'Tuesday',
                                'placeholder' => 'Position',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">From</label>
                            <input class="form-control" type="time" value=" id="tuesday_from" name="from_time[1]">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">To</label>
                            <input class="form-control" type="time" value="" id="tuesday_to" name="to_time[1]">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2-custom">
                        <div class="form-check">
                            <input type="hidden" name="is_working[1]" value="0">
                            <input class="form-check-input" type="checkbox" name="is_working[1]" value="" id="is_working_tuesday">
                            <label for="flexCheckChecked">
                            Day-off / No work
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @component('components.inputs.input')
                            @slot('label', '')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'day[2]',
                                'id' => 'wednesday',
                                'value' => 'Wednesday',
                                'placeholder' => 'Position',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">From</label>
                            <input class="form-control" type="time" value="" id="wednesday_from" name="from_time[2]">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">To</label>
                            <input class="form-control" type="time" value="" id="wednesday_to" name="to_time[2]">
                        </div> 
                    </div>
                    <div class="col-md-3 mt-2-custom">
                        <div class="form-check">
                            <input type="hidden" name="is_working[2]" value="0">
                            <input class="form-check-input" type="checkbox" name="is_working[2]" value="" id="is_working_wednesday">
                            <label for="flexCheckChecked">
                            Day-off / No work
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @component('components.inputs.input')
                            @slot('label', '')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'day[3]',
                                'id' => 'thursday',
                                'value' => 'Thursday',
                                'placeholder' => 'Position',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">From</label>
                            <input class="form-control" type="time" value="" id="thursday_from" name="from_time[3]">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">To</label>
                            <input class="form-control" type="time" value="" id="thursday_to" name="to_time[3]">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2-custom">
                        <div class="form-check">
                            <input type="hidden" name="is_working[3]" value="0">
                            <input class="form-check-input" type="checkbox" name="is_working[3]" value="" id="is_working_thursday">
                            <label for="flexCheckChecked">
                            Day-off / No work
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @component('components.inputs.input')
                            @slot('label', '')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'day[4]',
                                'id' => 'friday',
                                'value' => 'Friday',
                                'placeholder' => 'Position',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">From</label>
                            <input class="form-control" type="time" value="" id="friday_from" name="from_time[4]">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">To</label>
                            <input class="form-control" type="time" value="" id="friday_to" name="to_time[4]">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2-custom">
                        <div class="form-check">
                            <input type="hidden" name="is_working[4]" value="0">
                            <input class="form-check-input" type="checkbox" name="is_working[4]" value="" id="is_working_friday">
                            <label for="flexCheckChecked">
                            Day-off / No work
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @component('components.inputs.input')
                            @slot('label', '')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'day[5]',
                                'id' => 'saturday',
                                'value' => 'Saturday',
                                'placeholder' => 'Position',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">From</label>
                            <input class="form-control" type="time" value="" id="saturday_from" name="from_time[5]">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">To</label>
                            <input class="form-control" type="time" value="" id="saturday_to" name="to_time[5]">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2-custom">
                        <div class="form-check">
                            <input type="hidden" name="is_working[5]" value="0">
                            <input class="form-check-input" type="checkbox" name="is_working[5]" value="" id="is_working_saturday">
                            <label for="flexCheckChecked">
                            Day-off / No work
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @component('components.inputs.input')
                            @slot('label', '')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'day[6]',
                                'id' => 'sunday',
                                'value' => 'Sunday',
                                'placeholder' => 'Position',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">From</label>
                            <input class="form-control" type="time" value="" id="sunday_from" name="from_time[6]">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="example-time-input" class="form-control-label">To</label>
                            <input class="form-control" type="time" value="" id="sunday_to" name="to_time[6]">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2-custom">
                        <div class="form-check">
                            <input type="hidden" name="is_working[6]" value="0">
                            <input class="form-check-input" type="checkbox" name="is_working[6]" value="" id="is_working_sunday">
                            <label for="flexCheckChecked">
                            Day-off / No work
                            </label>
                        </div>
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