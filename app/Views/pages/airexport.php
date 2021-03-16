
 
<div class="container">

<div class="text-center mx-auto mt-5 mb-5">


  <?php  $this->session = \Config\Services::session(); ?>


  <h4 class="text-uppercase">Airspeed International Corporation</h4>
  <h5 class="text-uppercase">Air Export Rates</h5>
    <div class="">
      <h6 style="font-size:11px;" class="text-danger"> Last Update Made by : 
      <i class="far fa-user border text-light border-secondary bg-secondary rounded-circle p-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
      title="
      <?php
      if($lastupdate):
        echo $lastupdate->first_name . " " . $lastupdate->last_name . " - " . date('F j, Y, g:i a', strtotime($lastupdate->last_update)) ;
        
        endif; ?>"></i></h6>
    </div>

            <?php if($this->session->has('msg')): ?>

                <div class="text-center mx-auto mt-3 poppins col-4">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?=$this->session->msg;?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

            <?php endif; ?>

</div>
  


      <div class="row">

        <?php if($this->session->user_type == 'Editor'): ?>

            <div class="text-start col mb-2">
                <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#ModalAirexport">New Rate <i class="fas fa-plus fa-fw"></i></button>
            </div>

        <?php endif; ?>

        <div class="text-end col mb-2">
            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ModalAirexportNotes">Editor's note<i class="far fa-clipboard fa-fw"></i></button>
        </div>

    </div>




<div class="mb-2 bg-light p-4 border border-secondary rounded" >


            <table class="table table-striped  table-responsive" style="width:100%; overflow-x:auto;" >
            <thead class= "bg-dark text-light text-justify">
                <tr class=" p-1 m-1">
                <?php if($this->session->user_type == 'Editor'): ?>
                <th scope="col" class="action">Action</th>
                <th scope="col" class="action">Action</th>
                <?php endif; ?>

                <th scopr="col" class="d-none">ID</th>
                <th scope="col">POL</th>
                <th scope="col">POD</th>
                <th scope="col">Code</th>
                <th scope="col">Carrier</th>
                <th scope="col">Service</th>
                <th scope="col">Validity</th>
                <th scope="col">Min</th>
                <th scope="col">NOR</th>
                <th scope="col">+45</th>
                <th scope="col">+100</th>
                <th scope="col">+250</th>
                <th scope="col">+300</th>
                <th scope="col">+500</th>
                <th scope="col">+1,000</th>
                <th scope="col">FSC</th>
                <th scope="col">SSC</th>
                <th scope="col">TCC/DST</th>
                <th scope="col">AWB Fee</th>
                <th scope="col">ENS / AMS Fee</th>
                <th scope="col">Handling</th>
                <th scope="col">Documentation Fee</th>
                <th scope="col">Peza Processing</th>
                <th scope="col">VAT (12%)</th>
                <th scope="col">Frequency</th>
                <th scope="col">Routing</th>
                <th scope="col">T/T</th>
                <th scope="col">Comments</th>
                </tr>
            </thead>
            <tbody >
                <?php
              
                if ($airexport) {
                 
                    foreach($airexport->getResult() as $rate)
                    {
                  ?>
                       <tr>
                       <?php if($this->session->user_type == 'Editor'): ?>
                            <td><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                            <td><a href="<?=base_url('airexport/remove/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>

                            <?php endif; ?>
                <?php
                       echo'
                            <td class="d-none">'. $rate->id .'</td>
                            <td>'. $rate->pol .'</td>
                            <td>'. $rate->pod .'</td>
                            <td>'. $rate->code .'</td>
                            <td>'. $rate->carrier .'</td>
                            <td>'. $rate->service .'</td>
                            <td>'. $rate->validity .'</td>
                            <td>'. $rate->min .'</td>
                            <td>'. $rate->nor .'</td>
                            <td>'. $rate->fortyfive .'</td>
                            <td>'. $rate->hundred .'</td>
                            <td>'. $rate->twofifty .'</td>
                            <td>'. $rate->threehundred .'</td>
                            <td>'. $rate->fivehundred .'</td>
                            <td>'. $rate->thousand .'</td>
                            <td>'. $rate->fsc .'</td>
                            <td>'. $rate->ssc .'</td>
                            <td>'. $rate->tcc .'</td>
                            <td>'. $rate->awbfee .'</td>
                            <td>'. $rate->ens_ams .'</td>
                            <td>'. $rate->handling .'</td>
                            <td>'. $rate->docufee .'</td>
                            <td>'. $rate->peza .'</td>
                            <td>'. $rate->vat .'</td>
                            <td>'. $rate->frequency .'</td>
                            <td>'. $rate->routing .'</td>
                            <td>'. $rate->tt .'</td>
                            <td>'. $rate->comments .'</td>
                        </tr>';

                    } 
                }else
                {
                    echo '<tr>
                                <td colspan="28" class="text-danger"> No Result </td>
                          <tr>';

                }

                ?>
            </tbody>
            </table>
         


        </div>
       </div>
       </div>


      <?php if($this->session->user_type == 'Editor'): ?>

          <form method="post" action="<?=base_url('airexport/add');?>" class="needs-validation" novalidate >
        <!-- Modal -->
        <div class="modal fade" id="ModalAirexport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalAirexportLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

            <div class="modal-content">

        
              <div class="modal-header">
                <h6 class="modal-title fw-bold poppins text-secondary" id="ModalAirexportLabel">Air Export Rate</h6>
                
              
                
              
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              
              <div class="modal-body poppins"> 
              <h6 class="text-end text-secondary ">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Note: For Null Values To maintain the cleanliness of our rates please use (dash  - )
                        instead of leaving the Textbox blank.">
                        </i></h6>

                <input type="hidden" name="rateid" value="" id="rateid">         
              <div class="row">
                <div class="col">
                  <label for="pol" class="form-label">POL</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off"  id="pol" name="pol" required>
                  <div id="polfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="pod" class="form-label">POD</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="pod" name="pod" required>
                  <div id="podfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="code" class="form-label">Code</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="code" name="code" required>
                  <div id="codefeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>
              </div>
        
              <hr>

              <div class="row">
                <div class="col">
                  <label for="carrier" class="form-label">Carrier</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="carrier" name="carrier" required>
                  <div id="carrierfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="service" class="form-label">Service</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="service" name="service" required>
                  <div id="serivefeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="validity" class="form-label">Validity</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="validity" name="validity" required>
                  <div id="validityfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>
              </div>


              <hr>


              <div class="row">
                <div class="col">
                  <label for="min" class="form-label">Min</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="min" name="min" required>
                  <div id="minfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="nor" class="form-label">NOR</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="nor" name="nor" required>
                  <div id="norfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="fortyfive" class="form-label">+45</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="fortyfive" name="fortyfive" required>
                  <div id="fortyfivefeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>
              </div>


              <hr>


              <div class="row">
                <div class="col">
                  <label for="hundred" class="form-label">+100</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="hundred" name="hundred" required>
                  <div id="hundredfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="twofifty" class="form-label">+250</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="twofifty" name="twofifty" required>
                  <div id="twofiftyfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="threehundred" class="form-label">+300</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="threehundred" name="threehundred" required>
                  <div id="threehundredfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>
              </div>

              <hr>


              <div class="row">
                <div class="col">
                  <label for="fivehundred" class="form-label">+500</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="fivehundred" name="fivehundred" required>
                  <div id="fivehundredfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="thousand" class="form-label">+1000</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="thousand" name="thousand" required>
                  <div id="thousandfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="fsc" class="form-label">FSC</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="fsc" name="fsc" required>
                  <div id="fscfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col">
                  <label for="ssc" class="form-label">SSC</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="ssc" name="ssc" required>
                  <div id="sscfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="tcc" class="form-label">TCC / DST</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="tcc" name="tcc" required>
                  <div id="tccfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="awbfee" class="form-label">AWB Fee</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="awbfee" name="awbfee" required>
                  <div id="awbfeefeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col">
                  <label for="ens" class="form-label">ENS / AMS Fee</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="ens" name="ens" required>
                  <div id="ensfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="handling" class="form-label">Handling</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="handling" name="handling" required>
                  <div id="hamdlingfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="docufee" class="form-label">Documentation Fee</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="docufee" name="docufee" required>
                  <div id="docufeefeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>
              </div>

              <hr>


              <div class="row">
                <div class="col">
                  <label for="peza" class="form-label">Peza Processing</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="peza" name="peza" required>
                  <div id="pezafeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="vat" class="form-label">VAT (12%)</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="vat" name="vat" required>
                  <div id="vatfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="frequency" class="form-label">Frequency</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="frequency" name="frequency" required>
                  <div id="frequencyfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col">
                  <label for="routing" class="form-label">Routing</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="routing" name="routing" required>
                  <div id="frequencyfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="tt" class="form-label">T/T</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="tt" name="tt" required>
                  <div id="ttfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>

                <div class="col">
                  <label for="comment" class="form-label">Comment</label>
                  <input type="text" class="form-control form-control-sm" autocomplete="off" id="comment" name="comment" required>
                  <div id="commentfeedback" class="invalid-feedback">
                  This Field is Required
                  </div>
                </div>
                
              </div>
              

              
          


              </div>


              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          
              </div>
                  

            </div>
          
          </div>
        </div>
        </form>

      <?php endif; ?> 



      <form action="<?=base_url('airexport/updatenotes');?>" method="post">

        <div class="modal fade" id="ModalAirexportNotes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalAirexportNoteslabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                  <div class="modal-header">
                      <h6 class="modal-title fw-bold poppins text-secondary" id="ModalAirexportNoteslabel">Editor's Note</h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                      <div class="modal-body poppins">
                      <?php if ($note) : ?>
                          <?php if($this->session->user_type == 'Editor'): ?>

                              <input type="hidden" name="noteid" value="<?=$note->id;?>" id="noteid">                            
                              <label for="notes" class="form-label text-danger">Notes:</label>
                              <textarea class="form-control" id="notes" name="notes" rows="20"  placeholder="Terms & Condition" ><?=$note->notes;?></textarea>
                              <div id="notesfeedback" class="invalid-feedback">This Field is Required</div>

                      <?php else: ?>

                              <label for="notes" class="form-label text-danger">Notes:</label>
                              <textarea class="form-control" placeholder="None" id="notes" name="notes" rows="20" readonly ><?=$note->notes;?></textarea>

                          <?php endif; ?>

                      <?php endif; ?>

                          
                      
                      
                      </div>
                      <div class="modal-footer">
                          <?php if($this->session->user_type == 'Editor'): ?>
                          <button type="submit" class="btn btn-primary btn-sm">Save</button>
                          <?php endif; ?>
                          
                          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      </div>
              </div>
          </div>
        </div>  



      </form>











<script src="<?=base_url('js/airexport.js');?>"></script>







 