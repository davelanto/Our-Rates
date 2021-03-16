<div class="container">


<?php  $this->session = \Config\Services::session(); ?>

    <div class="text-center mx-auto mt-5 mb-5">
        <h4 class="text-uppercase">Airspeed International Corporation</h4>
        <h5 class="text-uppercase">Sea Import Rates</h5>
        <h5 class="text-uppercase text-danger">FULL CONTAINER LOAD  DESTINATION CHARGES <span class="fst-italic fw-light">(FCL)</span> </h5>


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
        <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#seaimportFCLModal">New Rate <i class="fas fa-plus fa-fw"></i></button>
    </div>

<?php endif; ?>

<div class="text-end col mb-2">
    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#seaimportFCLNotesModal">Editor's note<i class="far fa-clipboard fa-fw"></i></button>
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
            <th scope="col">Destination Charges</th>
            <th scope="col">Currency</th>
            <th scope="col">20' (USD)</th>
            <th scope="col">40' (USD)</th>
            <th scope="col">40HQ (USD)</th>
            <th scope="col">Remarks</th>
            </tr>
        </thead>
        <tbody >
            <?php
        
            if ($seaimportFCL) {
            
                foreach($seaimportFCL->getResult() as $rate)
                {
            ?>
                <tr>
                    <?php if($this->session->user_type == 'Editor'): ?>
                        <td class="col-action"><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                        <td class="col-action"><a href="<?=base_url('seaimportFCL/delete/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>
                    <?php endif; ?>
            <?php
                echo'
                        <td class="d-none">'. $rate->id .'</td>
                        <td>'. $rate->charge .'</td>
                        <td>'. $rate->currency .'</td>
                        <td>'. $rate->twenty .'</td>
                        <td>'. $rate->forty .'</td>
                        <td>'. $rate->fortyhq .'</td>
                        <td>'. $rate->remarks .'</td>

                    </tr>';

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


<?php if($this->session->user_type == 'Editor'): ?>

        <form method="POST" action="<?=base_url('seaimportFCL/add');?>" class="needs-validation" novalidate>
        <div class="modal fade" id="seaimportFCLModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="seaimportFCLModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title fw-bold poppins text-secondary" id="seaimportFCLModalLabel">Sea import Rate <br> <span class="text-danger fw-light"> FCL Destination Charges </span> </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body poppins"> 
                                    <h6 class="text-end text-secondary ">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title='For not applicable field, use dash "-". Don&#8217t leave the field blank.'></i>
                                    </h6>

                                    <input type="hidden" name="rateid" value="" id="rateid"> 

                                    <div class="row">

                                        <div class="col">
                                        <label for="charges" class="form-label">Destination Charges</label>
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
                                        <label for="twenty" class="form-label">20' (USD)</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off" id="twenty" name="twenty" required>
                                        <div id="twentyfeedback" class="invalid-feedback">
                                        This Field is Required
                                        </div>
                                        </div>

                                    </div>



                                    <hr>
                                    <div class="row">

                                    
                                    <div class="col">
                                            <label for="forty" class="form-label">40' (USD)</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off" id="forty" name="forty" required>
                                            <div id="fortyfeedback" class="invalid-feedback">
                                            This Field is Required
                                            </div>
                                        </div>
            

                                        <div class="col">
                                            <label for="fortyhq" class="form-label">40HQ (USD)</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off" id="fortyhq" name="fortyhq" required>
                                            <div id="fortyhqfeedback" class="invalid-feedback">
                                            This Field is Required
                                            </div>
                                        </div>

                                        <div class="col">
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







            <form action="<?=base_url('seaimportFCL/updatenotes');?>" method="post">
                        <div class="modal fade" id="seaimportFCLNotesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="seaimportFCLNotesModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title fw-bold poppins text-secondary" id="seaimportFCLNotesModalLabel">Editor's Note <br> <span class="text-danger text-lgi"></span> </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
            
                                                <div class="modal-body poppins"> 
            
                                                    <?php if ($note) { ?>
                            
                                                        <?php if($this->session->user_type == 'Editor'): ?>

                                                     <input type="hidden" name="noteid" value="<?=$note->id;?>" id="noteid">                            
                                                        <label for="notes" class="form-label text-danger">Notes:</label>
                                                        <textarea class="form-control" id="notes" name="notes" rows="6"><?=$note->notes;?></textarea>
                                                        <div id="notesfeedback" class="invalid-feedback">
                                                        This Field is Required
                                                        </div>

                                                        <?php else: ?>

                                                        <label for="notes" class="form-label text-danger">Notes:</label>
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


</div>

<script src="<?=base_url('js/seaimportfcl.js');?>"></script>