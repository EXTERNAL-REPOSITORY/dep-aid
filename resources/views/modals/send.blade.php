<div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Diagnosis / Prescription</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="send-diagnosis-form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="patient-name" name="patient_name">
            <input type="hidden" id="patient-email" name="patient_email">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                         <p class="text-center fw-bold">Diagnosis to the Patient</p>
                    </div>
                 </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea id="diagnosis" name="diagnosis" rows="8" cols="53"></textarea>
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                        <p class="text-center fw-bold">Prescripted Medicines Needed To Intake</p>
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea id="prescriptions" name="prescriptions" rows="8" cols="53"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Send</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>