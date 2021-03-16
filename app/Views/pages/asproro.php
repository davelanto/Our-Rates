
 
<div class="container">
    <div class="text-center mx-auto mt-5 mb-5">


        <?php  $this->session = \Config\Services::session(); ?>


            <h4 class="text-uppercase">Airspeed Philippines Incorporation</h4>
            <h5 class="text-uppercase">RORO (ROLL ON, ROLL OFF)</h5>

            
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


    <div class="mb-2 bg-light p-4 border-top border-start border-bottom border-secondary col-6">
        <div class="row">

                <?php if($this->session->user_type == 'Editor'): ?>

            <div class="text-start col mb-2">
                <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#asp_roro_modal">New Rate <i class="fas fa-plus fa-fw"></i></button>
            </div>

                <?php endif; ?>

                <div class="text-end col mb-2">
                 <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#asp_roro_modal_notes">Editor's note<i class="far fa-clipboard fa-fw"></i></button>
                </div>


        </div>
    <h6 class="text-uppercase text-center text-secondary fw-bold p-3">RORO RATE SHEET</h6>
    <table class="table table-striped table-responsive" style="width:100%; overflow-x:auto;">

        <thead class="bg-dark text-light">
            <tr class=" p-1 m-1">

            <?php if($this->session->user_type == 'Editor'): ?>

                <th scope="col" class="col-action2 action">Action</th>
                <th scope="col" class="col-action2 action">Action</th>

            <?php endif; ?>

            <th scopr="col" class="d-none">ID</th>
            <th scope="col">Destination</th>
            <th scope="col">Code</th>
            <th scope="col">Per CBM Rates <br> <span class="text-warning fst-italic" style="font-size:10px;">  Min of 1 cbm</span></th>
       
            </tr>
        </thead>
        <tbody>
            <?php if($asproro): ?>

                <?php foreach($asproro->getResult() as $rate ): ?>

                    <tr>
                        <?php if($this->session->user_type == 'Editor'): ?>
                            
                            <td><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                            <td><a href="<?=base_url('asproro/delete/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>

                        <?php endif; ?>

                        <?php

                    echo'
                        <td class="d-none">'. $rate->id .'</td>
                        <td>'. $rate->destination .'</td>
                        <td>'. $rate->code .'</td>
                        <td>'. number_format($rate->rates) .'</td>
                    </tr>'; ?>

                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        </table>
    </div>



        <div class="mb-2 bg-light p-4 border-top border-end border-bottom border-secondary col-6">

        <div class="row">

                <?php if($this->session->user_type == 'Editor'): ?>

                <div class="text-start col mb-2">
                <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#asp_roro_sched_modal">New Schedule <i class="fas fa-plus fa-fw"></i></button>
                </div>

                <?php endif; ?>

                
        <div class="text-end col mb-2">
            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#asp_roro_sched_notes">Editor's note<i class="far fa-clipboard fa-fw"></i></button>
        </div>


        </div>
                <h6 class="text-uppercase text-center text-secondary fw-bold p-3">TRIP SCHEDULE</h6>


                <table class="table table-striped table-responsive" style="width:100%; overflow-x:auto;">

        <thead class="bg-dark text-light">
            <tr class=" p-1 m-1">

            <?php if($this->session->user_type == 'Editor'): ?>

                <th scope="col" class="col-action2">Action</th>
                <th scope="col" class="col-action2">Action</th>

            <?php endif; ?>

            <th scopr="col" class="d-none">ID</th>
            <th scope="col">Route</th>
            <th scope="col">Code</th>
            <th scope="col">ETD</th>
            <th scope="col">ETA</th>
       
            </tr>
        </thead>
        <tbody>
            <?php if($asprorosched): ?>

                <?php foreach($asprorosched->getResult() as $sched ): ?>

                    <tr>
                        <?php if($this->session->user_type == 'Editor'): ?>
                            
                            <td><button type="button" class="btn btn-primary btn-sm edittrip" id="edit" >Edit</button></td>
                            <td><a href="<?=base_url('asproro/deletesched/'. $sched->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>

                        <?php endif; ?>

                        <?php

                    echo'
                        <td class="d-none">'. $sched->id .'</td>
                        <td>'. $sched->route .'</td>
                        <td>'. $sched->code .'</td>
                        <td>'. $sched->etd .'</td>
                        <td>'. $sched->eta .'</td>
                    </tr>'; ?>

                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        </table>


        </div>
    </div>


<?php if($this->session->user_type == 'Editor'): ?>


    <form method="post" action="<?=base_url('asproro/add');?>" class="needs-validation" novalidate >
        
        <div class="modal fade" id="asp_roro_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asp_air_freight_modallabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bold poppins text-secondary" id="asp_air_freight_modallabel">RORO Rate</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body poppins">
                            <h6 class="text-end text-secondary">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title='For not applicable field, use dash "-". Don&#8217t leave the field blank.'></i>
                            </h6>

                            <input type="hidden" name="rateid" value="" id="rateid">
                        
                            <div class="row">

                                <div class="col">
                                    <label for="destination" class="form-label">Destination</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off"  id="destination" name="destination" required>
                                            <div id="destinationfeedback" class="invalid-feedback"> This Field is Required </div>
                                </div>

                                <div class="col">
                                    <label for="code" class="form-label">Code</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off"  id="code" name="code" required>
                                            <div id="codefeedback" class="invalid-feedback"> This Field is Required </div>
                                    
                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-6">
                                    <label for="rates" class="form-label">Rate</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off"  id="rates" name="rates" required>
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




<?php if($this->session->user_type == 'Editor'): ?>


    <form method="post" action="<?=base_url('asproro/addsched');?>" class="needs-validation" novalidate >
        
        <div class="modal fade" id="asp_roro_sched_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asp_roro_sched_modallabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bold poppins text-secondary" id="asp_roro_sched_modallabel">Trip Schedule</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body poppins">
                            <h6 class="text-end text-secondary">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title='For not applicable field, use dash "-". Don&#8217t leave the field blank.'></i>
                            </h6>

                            <input type="hidden" name="schedid" value="" id="schedid">

                            <div class="alert alert-warning tip text-center" role="alert">
                            <i class="fas fa-thumbtack text-warning fa-fw fa-lg"></i>
                            Rule: When naming a Route please follow the <b>Standard</b> Route Naming. <br>
                            <span class="text-danger fw-bolder">(Code - Code - Code - Code)</span> <br>
                            1 Space before and after the delimiter/separator. (dash "-")
                            </div>

                            <div class="">

                            </div>
                        
                            <div class="row">

                                <div class="col">
                                    <label for="route" class="form-label">Route</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off"  id="route" name="route" required>
                                            <div id="routefeedback" class="invalid-feedback"> This Field is Required </div>
                                </div>

                            

                            </div>

                            <hr>

                            <div class="row">

                            <div class="col">
                                    <label for="code" class="form-label">Code</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off"  id="code" name="code" required>
                                            <div id="codefeedback" class="invalid-feedback"> This Field is Required </div>
                                    
                                </div>

                                <div class="col">
                                    <label for="etd" class="form-label">ETD</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off"  id="etd" name="etd" required>
                                            <div id="etdfeedback" class="invalid-feedback"> This Field is Required </div>
                                    
                                </div>

                                <div class="col">
                                    <label for="eta" class="form-label">ETA</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off"  id="eta" name="eta" required>
                                            <div id="etafeedback" class="invalid-feedback"> This Field is Required </div>
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






<form action="<?=base_url('asproro/updatenotes');?>" method="post">

        <div class="modal fade" id="asp_roro_modal_notes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asp_roro_modal_noteslabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bold poppins text-secondary" id="asp_roro_modal_noteslabel">Editor's Note</h6>
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





<form action="<?=base_url('asproro/updatenotes');?>" method="post">

        <div class="modal fade" id="asp_roro_sched_notes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asp_roro_sched_noteslabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bold poppins text-secondary" id="asp_roro_sched_noteslabel">Editor's Note</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body poppins">
                        <?php if ($schednote) : ?>
                            <?php if($this->session->user_type == 'Editor'): ?>

                                <input type="hidden" name="noteid" value="<?=$schednote->id;?>" id="noteid">                            
                                <label for="notes" class="form-label text-danger">Notes:</label>
                                <textarea class="form-control" id="notes" name="notes" rows="20"  placeholder="Terms & Condition" ><?=$schednote->notes;?></textarea>
                                <div id="notesfeedback" class="invalid-feedback">This Field is Required</div>

                        <?php else: ?>

                                <label for="notes" class="form-label text-danger">Notes:</label>
                                <textarea class="form-control" placeholder="None" id="notes" name="notes" rows="20" readonly ><?=$schednote->notes;?></textarea>

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



<script src="<?=base_url('js/asproro.js');?>"></script>