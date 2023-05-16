<div class="modal fade" id="filterPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel5">Filter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('patient-queued.index') }}" method="GET" id="filter-patient" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="fw-bold">Scheduled Appointment</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-date-input" class="form-control-label">From</label>
                          <input class="form-control" type="date" value="" name="from_date_patient_tbl" id="from_date">
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-date-input" class="form-control-label">To</label>
                          <input class="form-control" type="date" value="" name="to_date_patient_tbl" id="to_date">
                      </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Filter</button>
              </div>
        </form>
      </div>
    </div>
  </div>