
 
<div class="container">
    <div class="text-center mx-auto mt-5 mb-5">


        <?php  $this->session = \Config\Services::session(); ?>


            <h4 class="text-uppercase">Airspeed Philippines Incorporation</h4>
            <h5 class="text-uppercase">WAREHOUSING</h5>

            
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
                <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#asp_warehousing_modal">New Rate <i class="fas fa-plus fa-fw"></i></button>
            </div>

        <?php endif; ?>

        <div class="text-end col mb-2">
            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#asp_warehousing_notes">Editor's note<i class="far fa-clipboard fa-fw"></i></button>
        </div>

    </div>

    <div class="mb-2 bg-light p-4 border border-secondary rounded" >

    <table class="table table-striped table-responsive" style="width:100%; overflow-x:auto;">

            <thead class="bg-dark text-light">
                <tr class=" p-1 m-1">

                <?php if($this->session->user_type == 'Editor'): ?>

                    <th scope="col" class="col-action2 action">Action</th>
                    <th scope="col" class="col-action2 action">Action</th>

                <?php endif; ?>

                <th scopr="col" class="d-none">ID</th>
                <th scope="col">Services</th>
                <th scope="col">Particulars</th>
                <th scope="col">Rate</th>
           
                </tr>
            </thead>
            <tbody>
                
                <?php if($aspwarehousing): ?>

                    <?php foreach($aspwarehousing->getResult() as $rate ): ?>

                        <tr>
                            <?php if($this->session->user_type == 'Editor'): ?>
                                
                                <td><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                                <td><a href="<?=base_url('aspwarehousing/delete/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>

                            <?php endif; ?>

                            <?php

                        echo'
                            <td class="d-none">'. $rate->id .'</td>
                            <td>'. $rate->services .'</td>
                            <td>'. $rate->particulars .'</td>
                            <td>'. $rate->rate .'</td>
                        </tr>'; ?>

                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            </table>
    </div>





    <?php if($this->session->user_type == 'Editor'): ?>


        <form method="post" action="<?=base_url('aspwarehousing/add');?>" class="needs-validation" novalidate >
            
            <div class="modal fade" id="asp_warehousing_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asp_warehousing_modallabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bold poppins text-secondary" id="asp_warehousing_modallabel">Warehousing</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body poppins">
                                <h6 class="text-end text-secondary">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title='For not applicable field, use dash "-". Don&#8217t leave the field blank.'></i>
                                </h6>

                                <input type="hidden" name="rateid" value="" id="rateid">
                            
                                <div class="row">

                                    <div class="col">
                                        <label for="services" class="form-label">Services</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="services" name="services" required>
                                                <div id="servicesfeedback" class="invalid-feedback"> This Field is Required </div>
                                    </div>

                                    <div class="col">
                                        <label for="particulars" class="form-label">Particulars</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="particulars" name="particulars" required>
                                                <div id="particularsfeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                                </div>

                                <hr>

                                <div class="row">

                                    <div class="col-6">
                                        <label for="rate" class="form-label">Rate</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="rate" name="rate" required>
                                                <div id="ratefeedback" class="invalid-feedback"> This Field is Required </div>
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



        <form action="<?=base_url('aspwarehousing/updatenotes');?>" method="post">

             <div class="modal fade" id="asp_warehousing_notes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asp_warehousing_noteslabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bold poppins text-secondary" id="asp_warehousing_noteslabel">Editor's Note</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body poppins">
                            <?php if ($note) : ?>
                                <?php if($this->session->user_type == 'Editor'): ?>

                                    <input type="hidden" name="noteid" value="<?=$note->id;?>" id="noteid">                            
                                    <label for="notes" class="form-label text-danger">Notes:</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="20"><?=$note->notes;?></textarea>
                                    <div id="notesfeedback" class="invalid-feedback">This Field is Required</div>

                            <?php else: ?>

                                    <label for="notes" class="form-label text-danger">Notes:</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="20" readonly><?=$note->notes;?></textarea>

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















</div>   

<script src="<?=base_url('js/aspwarehousing.js');?>"></script>