<div class="modal fade" id="prescriptionModal" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-notification">Create Prescription</h6>
          <!-- <i class="fa-solid fa-print text-info text-sm opacity-10" onclick="printDiv('.prescription-main')"></i> -->
        </div>
        <form action="#" method="POST" id="prescription-form">
            @csrf
            <div class="modal-body">
                <div class="prescription-main">
                    <style>
                        .prescription-main{
                            position: relative;
                            padding: 20px;        
                        }
                        .header{
                            width:100%;
                        }
                        .mallogo{
                            position: relative;
                            padding: 10px;
                    
                        }
                        .deplogo{
                            position: relative;
                            padding: 10px;
                        }
                        .prescription-body{
                            padding: 20px;
                        }
                    </style>
                    <hr style="height: 2px; color:black; border-color: black;" hidden>
                    <table class="header" hidden>
                        <tr style="text-align: center;">
                            <td>
                                <!-- <img class="mallogo" src="https://depaid.000webhostapp.com/img/logos/dep-ed.png" alt="malabalay logo" width="200"> -->
                                <img class="mallogo" src="{{asset('img/logos/dep-ed-nbg.png')}}" alt="malabalay logo" width="80">
                            </td>
                            <td>
                                <table  class="header" style="text-align: center; padding: 0; margin: 0;">
                                    <tr  style="text-align: center; padding: 0; margin: 0;">
                                        <td>Republic of the Philippines</td>
                                    </tr>
                                    <tr style="text-align: center; padding: 0; margin: 0;">
                                        <td>Department of Education</td>
                                    </tr>
                                    <tr style="text-align: center; padding: 0; margin: 0;">
                                        <td>Region X-Northern Mindanao</td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bold;color: blue; padding: 0; margin: 0;">
                                        <td>DIVISION OF MALAYBALAY CITY</td>
                                    </tr>
                                    <tr style="text-align: center; padding: 0; margin: 0;">
                                        <td>Purok 6, Casisang Malaybalay City</td>
                                    </tr>
                                    <tr style="text-align: center; padding: 0; margin: 0;">
                                        <td>Telefax #D88-314-0094</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <img class="deplogo" src="{{asset('img/logos/deped-malaybalay.png')}}" alt="deped logo" width="80">
                            </td>
                        </tr>
                    </table>
                    <hr style="height: 2px; color:black;" hidden>
                    <div id="prescription-body">
                        <i class="fa-solid fa-prescription opacity-10" style="font-size: 50px;"></i>
                        <span class="text-center text-danger">AVAILABLE SOON!</span>
                    </div>
                    <!-- <p style="
                    /* font-family: 'Rx-FiveFive', sans-serif;  */
                    font-size: 50px; font-weight: bolder;padding:0px;">R<span style="margin-left: -10px;">x</span></p> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="submit" class="btn bg-gradient-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>