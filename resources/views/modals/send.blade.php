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
            <input type="hidden" id="patient-id" name="patient_id">
            <input type="hidden" id="patient-name" name="patient_name">
            <input type="hidden" id="patient-email" name="patient_email">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                         <p class="text-center fw-bold">EMAIL BODY</p>
                    </div>
                 </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea id="body" name="body" rows="8" cols="53">
Good Day!

Thank You for your interest in our service, attached here is the document file of your prescription. You may also want to keep a copy of this document in your personal health records. If you happen to have any questions about the medication or dosage, feel free to contact us.

Please remember to follow the instructions on the prescription label carefully, and if you experience any unexpected side effects or complications, let me know right away.

I look forward to seeing you at your next appointment.

Best regards,
Dep-Aid
                        
                        </textarea>
                    </div>
                </div>
                <div class="row">
                   <div class="col-md-12">
                        <p class="text-center fw-bold">Diagnosis and Prescripted Medicines Needed To Intake</p>
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="attachments">Attachments</label>
                        <input id="attachments[]" type="file" name="attachments[]" multiple/>
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