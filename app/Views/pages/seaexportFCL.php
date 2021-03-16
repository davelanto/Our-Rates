<div class="container">


<?php  $this->session = \Config\Services::session(); ?>

    <div class="text-center mx-auto mt-5 mb-5">
        <h4 class="text-uppercase">Airspeed International Corporation</h4>
        <h5 class="text-uppercase">Sea Export Rates</h5>
        <h5 class="text-uppercase text-danger">FULL CONTAINER LOAD ORIGIN CHARGES <span class="fst-italic fw-light">(FCL)</span></h5>

        <div class="">
        <h6 style="font-size:11px;" class="text-danger"> Last Update Made by : 
        <i class="far fa-user border text-light border-secondary bg-secondary rounded-circle p-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
        title="
        <?php
        if($lastupdate):
            echo $lastupdate->first_name . " " . $lastupdate->last_name . " - " . date('F j, Y, g:i a', strtotime($lastupdate->last_update)) ;
            
            endif; ?>"></i></h6>
        </div>
    </div>


            <?php if($this->session->has('msg')): ?>
                <div class="text-center mx-auto mt-3 poppins col-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?=$this->session->msg;?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

            <?php endif; ?>

    <div class="row">

            <?php if($this->session->user_type == 'Editor'): ?>

                <div class="text-start col mb-2">
                    <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#seaexportFCLModal">New Rate <i class="fas fa-plus fa-fw"></i></button>
                </div>
            <?php endif; ?>
    </div>  





    <?php
                    
        if ($group) {

            foreach($group->getResult() as $header)
            {
    ?>
        <div class="mb-5 bg-light p-4 border border-secondary rounded" >
        <h6 class="text-uppercase text-center text-secondary fw-bold p-3"><?=$header->charges; ?></h6>
        <input type="hidden" id="title" value = "<?=$header->charge_id;?>">
             <table class="table table-striped  table-responsive" style="width:100%; overflow-x:auto;">
                    <thead class= "bg-dark text-light text-justify">
                        <tr class=" p-1 m-1">

                        <?php if($this->session->user_type == 'Editor'): ?>
                        <th scope="col" class="col-action2 action">Action</th>
                        <th scope="col" class="col-action2 action" >Action</th>
                        <?php endif; ?>

                        <th scopr="col" class="d-none">Charge ID</th>
                        <th scopr="col" class="d-none">ID</th>
                        <th scope="col">Charges</th>
                        <th scope="col">Currency</th>
                        <th scope="col">20' (USD)</th>
                        <th scope="col">40' (USD)</th>
                        <th scope="col">40HQ (USD)</th>
                        </tr>
                    </thead>
                    <tbody >

                    <?php
                    
                    if ($seaexportFCL) {
                    
                        foreach($seaexportFCL->getResult() as $rate)
                        {
                            if($header->charge_id == $rate->charge_id){
                    ?>
                        <tr>
                        <?php if($this->session->user_type == 'Editor'): ?>
                                <td><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                                <td><a href="<?=base_url('seaexportFCL/delete/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                <?php endif; ?>

                    <?php
                        echo'
                                <td class="d-none">'. $rate->charge_id .'</td>
                                <td class="d-none">'. $rate->id .'</td>
                                <td class="fw-bolder text-danger">'. $rate->charge .'</td>
                                <td>'. $rate->currency .'</td>
                                <td>'. $rate->twenty .'</td>
                                <td>'. $rate->forty .'</td>
                                <td>'. $rate->fortyhq .'</td>
                            </tr>';
                        }
                        } 
                    }else
                    {
                        echo '<tr>
                                    <td colspan="10" class="text-danger"> No Result </td>
                            <tr>';

                    }

                    ?>
                </tbody>
        </table>

                    </div>
             
        
    <?php  }

    }  ?> 


    <?php if($this->session->user_type == 'Editor'): ?>


            <form method="POST" action="<?=base_url('seaexportFCL/add');?>" class="needs-validation" novalidate>
                <div class="modal fade" id="seaexportFCLModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="seaexportModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title fw-bold poppins text-secondary" id="seaexportModalLabel">Sea Export Rate<br> <span class="text-danger fw-light"> FCL ORIGIN CHARGES </span> </h6>
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
                                                        <?php  if ($group) { ?>
                                                            <?php foreach($group->getResult() as $groupOption) { ?>
                                                    <?php echo "<option value = ". $groupOption->charge_id . " >" . $groupOption->charge . "</option>"; ?>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="text-danger fst-italic fw-bold d-none" style="font-size:10px;" id="notif">Charge Group is Disabled during Editing.</span>
                                                
                                                
                                                
                                                </div>
                                            
                                            
                                            </div>

                                            <hr>

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
                                                <input type="text" class="form-control form-control-sm" autocomplete="off"  id="pod" name="pod" required>
                                                <div id="podfeedback" class="invalid-feedback">
                                                This Field is Required
                                                </div>
                                                </div>

                                                <div class="col">
                                                <label for="charges" class="form-label">Charges</label>
                                                <input type="text" class="form-control form-control-sm" autocomplete="off"  id="charges" name="charges" required>
                                                <div id="chargesfeedback" class="invalid-feedback">
                                                This Field is Required
                                                </div>
                                                </div>

                                            


                                            </div>



                                            <hr>
                                            <div class="row">

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

                                                            
                                                <div class="col">
                                                <label for="forty" class="form-label">40' (USD)</label>
                                                <input type="text" class="form-control form-control-sm" autocomplete="off" id="forty" name="forty" required>
                                                <div id="fortyfeedback" class="invalid-feedback">
                                                This Field is Required
                                                </div>
                                                </div>


                                            

                                            </div>  
                                                <hr>
                                            <div class="row">

                                            <div class="col-4">
                                                    <label for="fortyhq" class="form-label">40HQ (USD)</label>
                                                    <input type="text" class="form-control form-control-sm" autocomplete="off" id="fortyhq" name="fortyhq" required>
                                                    <div id="fortyhqfeedback" class="invalid-feedback">
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










</div>


<script src="<?=base_url('js/seaexportfcl.js');?>"></script>


