<div class="container">

    <?php  $this->session = \Config\Services::session(); ?>

    <div class="text-center mx-auto mt-5 mb-5">
        <h4 class="text-uppercase">Airspeed International Corporation</h4>
        <h5 class="text-uppercase">BROKERAGE</h5>
        <h5 class="text-uppercase text-danger">CONSUMPTION ENTRY CHARGES</h5>
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
                <div class="text-center mx-auto mt-3 poppins col-6">
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
                <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#brokerageModal">New Rate <i class="fas fa-plus fa-fw"></i></button>
            </div>

        <?php endif; ?>

        <div class="text-end col mb-2">
            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#brokerageNotesModal">Editor's note<i class="far fa-clipboard fa-fw"></i></button>
        </div>

    </div>

    <?php
    
    if($charges):
        
        foreach($charges->getResult() as $row):

    ?>
            <div class="mb-5 bg-light p-4 border border-secondary rounded">
            <h6 class="text-uppercase text-center poppins text-secondary fw-bold p-3"><?=$row->charge;?></h6>
                <table class="table table-striped  table-responsive" style="width:100%; overflow-x:auto;" >
                    <thead class= "bg-dark text-light text-justify">
                        <tr class=" p-1 m-1">

                            
                <?php if($this->session->user_type == 'Editor'): ?> 
                        <th scope="col" class="action">Action</th>
                        <th scope="col" class="action">Action</th>
                <?php endif; ?>

                        <th scopr="col" class="d-none">ID</th>
                        <th scopr="col" class="d-none">ChargeID</th>
                        <th scope="col">Charges</th>
                        <th scope="col">Currency</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Remarks</th>
                        </tr>
                    </thead>
                        <tbody >
                            <?php
                        
                            if ($brokerage) {
                            
                                foreach($brokerage->getResult() as $rate)
                                {

                                    if($rate->charge_id == $row->charge_id):
    
                            ?>
                                <tr>
                                    <?php if($this->session->user_type == 'Editor'): ?> 
                                        <td class="col-action"><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                                        <td class="col-action"><a href="<?=base_url('brokerage/delete/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                    <?php endif; ?>

                            <?php
                                echo'
                                        <td class="d-none">'. $rate->id .'</td>
                                        <td class="d-none">'. $rate->charge_id .'</td>
                                        <td>'. $rate->charges .'</td>
                                        <td>'. $rate->currency .'</td>
                                        <td>'. $rate->amount .'</td>
                                        <td>'. $rate->remarks .'</td>
                                    </tr>';

                                endif;

                                } 
                            }else
                            {
                                echo '<tr>
                                            <td colspan="9" class="text-danger"> No Result </td>
                                    <tr>';

                            }

                            ?>
                        </tbody>
                </table>
            </div>

        <?php
                endforeach;   
            endif;
            
        ?>




          

            <div class="container bg-light border border-secondary rounded">



                <h6 class="fw-bold mt-5 text-secondary text-center">BROKERAGE FEE</h6>
                <h6 class="text-center mb-2">CAO NO.  1-2001</h6>

                <?php if($this->session->user_type == 'Editor'): ?> 

                    <div class="text-start mb-2">
                    <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#caomodal">New Brokerage Fee <i class="fas fa-plus fa-fw"></i></button>
                    </div>
                    <?php endif; ?>


                <table class="table table-striped  table-responsive" style="width:100%; overflow-x:auto;"  >
                <thead class= "bg-dark text-light text-center">
                        <tr class=" p-1 m-1">

                        <?php if($this->session->user_type == 'Editor'): ?> 
                        <th scope="col" class="col-action action">Action</th>
                        <th scope="col" class="col-action action">Action</th>
                        <?php endif; ?>

                        <th scopr="col" class="d-none">ID</th>
                        <th scope="col" style="width:250px;">DUTIABLE VALUE OF SHIPMENT</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col"> RATES  <span class="fst-italic fw-lighter" style="font-size:8px;"> (per entry) </span></th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php if($cao): ?>
                            <tr>
                              
                            <?php  foreach($cao->getResult() as $price): ?>
                                <?php if($this->session->user_type == 'Editor'): ?> 
                                        <td class="col-action"><button type="button" class="btn btn-primary btn-sm cao" id="edit" >Edit</button></td>
                                        <td class="col-action"><a href="<?=base_url('brokerage/deletecao/'. $price->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                <?php endif; ?>
                                <?php  echo'
                                        <td class="d-none">'. $price->id .'</td>
                                        <td>'. $price->dutiable_value .'</td>
                                        <td>'. $price->from_price .'</td>
                                        <td>'. $price->to_price .'</td>
                                        <td>'. $price->rates .'</td>
                                        </tr>';

                            endforeach; ?>
                            </tr>
                            <?php else: ?>
                           
                            <tr>
                            <td colspan="9" class="text-danger"> No Result </td>
                            <tr>

                         
                            <?php endif; ?>
                        </tbody>
                </table>
            </div>


</div>


            <?php if($this->session->user_type == 'Editor'): ?> 


                                <form action="<?=base_url('brokerage/newcao');?>" method="post" class="needs-validation" novalidate>

                                <div class="modal fade" id="caomodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="caomodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h6 class="modal-title fw-bold poppins text-secondary" id="brokerageModalLabel">Brokerage Fee <br> <span class="text-danger fw-light">  CAO NO. 1-2001 </span> </h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body poppins">

                                        <h6 class="text-end text-secondary ">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title='For not applicable field, use dash "-". Don&#8217t leave the field blank.'></i>
                                        </h6>

                                        <input type="hidden" name="fee_id" value="" id="fee_id"> 


                                        <div class="row">

                                            <div class="col">
                                            <label for="dutiable_value" class="form-label">Dutiable Value of Shipment</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off" id="dutiable_value" name="dutiable_value" required>
                                            <div id="dutiable_valuefeedback" class="invalid-feedback">
                                            This Field is Required
                                            </div>
                                            </div>


                                            <div class="col">
                                                <label for="from_rate" class="form-label">From Rate</label>
                                                <input type="text" class="form-control form-control-sm" autocomplete="off" id="from_rate" name="from_rate" required>
                                                <div id="from_ratefeedback" class="invalid-feedback">
                                                This Field is Required
                                                </div>
                                            </div>


                                                                                
                                            <div class="col">
                                            <label for="to_rate" class="form-label">To Rate</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off" id="to_rate" name="to_rate" required>
                                            <div id="to_ratefeedback" class="invalid-feedback">
                                            This Field is Required
                                            </div>
                                            </div>

                                         </div>

                                        <hr>

                                        <div class="row">

                                            <div class="col-4">
                                            <label for="rates" class="form-label">Rates<span class="fst-italic fw-lighter" style="font-size:8px;"> (per entry) </span></label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off" id="rates" name="rates" required>
                                            <div id="ratesfeedback" class="invalid-feedback">
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


         
        

                                <form method="POST" action="<?=base_url('brokerage/add');?>" class="needs-validation" novalidate>
                                <div class="modal fade" id="brokerageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="brokerageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title fw-bold poppins text-secondary" id="brokerageModalLabel">Brokerage <br> <span class="text-danger fw-light"> Consumption Entry Charges </span> </h6>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body poppins"> 
                                                            <h6 class="text-end text-secondary ">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title='For not applicable field, use dash "-". Don&#8217t leave the field blank.'></i>
                                                            </h6>

                                                            <input type="hidden" name="rateid" value="" id="rateid"> 
                                                            <input type="hidden" value="" name="charge_id" id="charge_id">
                                            

                                                            <div class="row">
                                                                <div class="col-10">
                                                                    <label for="groupname" class="form-label">Charge Group</label>
                                                                        <select class="form-select form-select-sm" name="groupname" id="groupname">
                                                                            <?php  if ($charges) { ?>
                                                                                <?php foreach($charges->getResult() as $row) { ?>
                                                                                    <?php echo "<option value = ". $row->charge_id.">".$row->charge."</option>"; ?>
                                                                            <?php } ?>
                                                                                <?php } ?>
                                                                        </select>
                                                                        <span class="text-danger fst-italic fw-bold d-none" style="font-size:10px;" id="notif">Charge Group is Disabled during Editing.</span>
                                                                </div>
                                                            </div>

                                                            <hr>

                                                            <div class="row">

                                                                <div class="col">
                                                                <label for="charges" class="form-label">Charges</label>
                                                                <input type="text" class="form-control form-control-sm" autocomplete="off" id="charges" name="charges" required>
                                                                <div id="chargesfeedback" class="invalid-feedback">
                                                                This Field is Required
                                                                </div>
                                                                </div>


                                                                <div class="col">
                                                                    <label for="currency" class="form-label">Currency</label>
                                                                    <input type="text" class="form-control form-control-sm" autocomplete="off" id="currency" name="currency" required>
                                                                    <div id="currencyfeedback" class="invalid-feedback">
                                                                    This Field is Required
                                                                    </div>
                                                                </div>


                                                                                                    
                                                                <div class="col">
                                                                <label for="twenty" class="form-label">Amount</label>
                                                                <input type="text" class="form-control form-control-sm" autocomplete="off" id="amount" name="amount" required>
                                                                <div id="twentyfeedback" class="invalid-feedback">
                                                                This Field is Required
                                                                </div>
                                                                </div>

                                                            </div>



                                                            <hr>
                                                            <div class="row">

                                                                <div class="col-4">
                                                                    <label for="remarks" class="form-label">Remarks</label>
                                                                    <input type="text" class="form-control form-control-sm" autocomplete="off" id="remarks" name="remarks" required>
                                                                    <div id="remarksfeedback" class="invalid-feedback">
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



                        <form action="<?=base_url('brokerage/updatenotes');?>" method="post">
                            <div class="modal fade" id="brokerageNotesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="brokerageNotesModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title fw-bold poppins text-secondary" id="brokerageNotesModalLabel">Editor's Note <br> <span class="text-danger text-lgi"></span> </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
            
                                                <div class="modal-body poppins"> 
            
                                                    <?php if ($note) { ?>
                            

                                                     <input type="hidden" name="noteid" value="<?=$note->id;?>" id="noteid">                            
                                                        <label for="notes" class="form-label text-danger">Notes:</label>

                                                        <?php if($this->session->user_type == 'Editor'): ?> 

                                                        <textarea class="form-control" id="notes" name="notes" rows="6"><?=$note->notes;?></textarea>
                                                        <div id="notesfeedback" class="invalid-feedback">
                                                        This Field is Required
                                                        </div>

                                                        <?php else: ?>

                                                        <textarea class="form-control" id="notes" name="notes" rows="6" readonly><?=$note->notes;?></textarea>
                                                        
                                                        <?php endif; ?> 
                                                       
                                                                    
                                                    <?php   } ?>
                                                       
            
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


<script src="<?=base_url('js/brokerage.js');?>"></script>