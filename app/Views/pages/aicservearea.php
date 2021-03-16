
 
<div class="container">
    <div class="text-center mx-auto mt-5 mb-5">


        <?php  $this->session = \Config\Services::session(); ?>


            <h4 class="text-uppercase">SERVE AREAS</h4>

            
            <div class="">
                <h6 style="font-size:11px;" class="text-danger"> Last Update Made by : 
                <i class="far fa-user border text-light border-secondary bg-secondary rounded-circle p-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="
                <?php
                if($lastupdate):
                    echo $lastupdate->first_name . " " . $lastupdate->last_name . " - " . date('F j, Y, g:i a', strtotime($lastupdate->last_update)) ;
                endif;
                ?>"></i>
                </h6>
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
                <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#aic_serve_area_modal">New Rate <i class="fas fa-plus fa-fw"></i></button>
            </div>

        <?php endif; ?>

    </div>

    <div class="mb-2 bg-light p-4 border border-secondary rounded" >
         <table class="table table-striped table-responsive" style="width:100%; overflow-x:auto;">

            <thead class="bg-dark text-light">
                <tr class=" p-1 m-1">

                <?php if($this->session->user_type == 'Editor'): ?>

                    <th class="col-action2 action">Action</th>
                    <th class="col-action2 action">Action</th>

                <?php endif; ?>
               
                <th class="d-none">ID</th>
                <th>STATE</th>
                <th>PROVINCE</th>
                <th>CITY/MUNICIPALITY</th>
                <th>BARANGAY</th>
                <th>ZIPCODE</th>
             
                </tr>

            </thead>
            <tbody>

                
                <?php if($aicservearea): ?>

                    <?php foreach($aicservearea->getResult() as $rate ): ?>

            

                        <tr>
                            <?php if($this->session->user_type == 'Editor'): ?>
                                
                                <td><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                                <td><a href="<?=base_url('aicservearea/delete/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>

                            <?php endif; ?>

                            <?php

                        echo'
                            <td class="d-none">'. $rate->id .'</td>
                            <td>'. $rate->state .'</td>
                            <td>'. $rate->province .'</td>
                            <td>'. $rate->city .'</td>
                            <td>'. $rate->barangay .'</td>
                            <td>'. $rate->zipcode .'</td>
                        </tr>'; ?>

                    
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            </table>
    </div>




 
        <?php if($this->session->user_type == 'Editor'): ?>
        <form method="post" action="<?=base_url('aicservearea/add');?>" class="needs-validation" novalidate >
            
            <div class="modal fade" id="aic_serve_area_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="aic_serve_area_modallabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bold poppins text-secondary" id="aic_serve_area_modallabel">SERVE AREAS</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body poppins">
                                <h6 class="text-end text-secondary">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title='For not applicable field, use dash "-". Don&#8217t leave the field blank.'></i>
                                </h6>

                                <input type="hidden" name="rateid" value="" id="rateid">

                                <div class="row">

        
                                    <div class="col">
                                        <label for="state" class="form-label">State</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="state" name="state" required>
                                                <div id="statefeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                                    <div class="col">
                                        <label for="province" class="form-label">Province</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="province" name="province" required>
                                                <div id="provincefeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                               
                                </div>

                                <hr>

                                <div class="row">



                                    <div class="col">
                                        <label for="city" class="form-label">City/Municipality</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="city" name="city" required>
                                                <div id="cityfeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                                    <div class="col">
                                        <label for="barangay" class="form-label">Barangay</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="barangay" name="barangay" required>
                                                <div id="barangayfeedback" class="invalid-feedback"> This Field is Required </div>
                                    </div>


                                    <div class="col">
                                        <label for="zipcode" class="form-label">Zipcode</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="zipcode" name="zipcode" required>
                                                <div id="zipcodefeedback" class="invalid-feedback"> This Field is Required </div>
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

<script src="<?=base_url('js/aicservearea.js');?>"></script>