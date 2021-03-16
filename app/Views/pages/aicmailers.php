
 
<div class="container">
    <div class="text-center mx-auto mt-5 mb-5">


        <?php  $this->session = \Config\Services::session(); ?>


            <h4 class="text-uppercase">LAST MILE DELIVERY</h4>
            <h5 class="text-uppercase">Mailers</h5>

            
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
                <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#aic_mailers_modal">New Rate <i class="fas fa-plus fa-fw"></i></button>
            </div>

        <?php endif; ?>

        <div class="text-end col mb-2">
            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#aic_mailers_notes">Editor's note<i class="far fa-clipboard fa-fw"></i></button>
        </div>

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
                <th colspan="1">VOLUME PER MONTH</th>
                <th></th>
                <th></th>
                <th>RATES</th>
                <th></th>
                <th class="d-none"></th>
             
                </tr>

            </thead>
            <tbody>

                
                <?php if($aicmailers): ?>

                    <tr>
                    <?php if($this->session->user_type == 'Editor'): ?>
                        <td></td>
                        <td></td>    
                    <?php endif; ?>

                    <td class="d-none"></td>
                    <td></td>
                    <td class="fw-bold text-danger">Metro Manila</td>
                    <td class="fw-bold text-danger">Luzon</td>
                    <td class="fw-bold text-danger">Visayas</td>
                    <td class="fw-bold text-danger">Mindanao</td>
                    <td class="d-none"></td>
                    
                  
                </tr>

                

                    <?php foreach($aicmailers->getResult() as $rate ): ?>

                        <?php if($rate->category == 'MAILERS'): ?>

                        <tr>
                            <?php if($this->session->user_type == 'Editor'): ?>
                                
                                <td><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                                <td><a href="<?=base_url('aicmailers/delete/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>

                            <?php endif; ?>

                            <?php

                        echo'
                            <td class="d-none">'. $rate->id .'</td>
                            <td>'. $rate->description .'</td>
                            <td>'. $rate->ncr .'</td>
                            <td>'. $rate->luzon .'</td>
                            <td>'. $rate->visayas .'</td>
                            <td>'. $rate->mindanao .'</td>
                            <td class="d-none">'. $rate->category .'</td>
                        </tr>'; ?>

                        
                   <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            </table>
    </div>



    <div class="mb-2 mt-5 bg-light p-4 border border-secondary rounded" >
                                
                    <h4 class="fw-bold p-2 text-center text-danger">PARCEL</h4>

    <table class="table table-striped table-responsive" style="width:100%; overflow-x:auto;">

            <thead class="bg-dark text-light">
                <tr class=" p-1 m-1">

                <?php if($this->session->user_type == 'Editor'): ?>

                    <th class="col-action2 action">Action</th>
                    <th class="col-action2 action">Action</th>

                <?php endif; ?>
                
                <th class="d-none">ID</th>
                <th colspan="1">WEIGHT (in kg)</th>
                <th></th>
                <th>RATES</th>
                <th></th>
                <th></th>
                <th class="d-none"></th>
                </tr>

            </thead>
            <tbody>

                
                <?php if($aicmailers): ?>

                    <tr>
                    <?php if($this->session->user_type == 'Editor'): ?>
                        <td></td>
                        <td></td>    
                    <?php endif; ?>

                    <td class="d-none"></td>
                    <td></td>
                    <td class="fw-bold text-danger">Metro Manila</td>
                    <td class="fw-bold text-danger">Luzon</td>
                    <td class="fw-bold text-danger">Visayas</td>
                    <td class="fw-bold text-danger">Mindanao</td>
                    <td class="d-none"></td>
                    
                </tr>

                

                    <?php foreach($aicmailers->getResult() as $rate ): ?>

                        <?php if($rate->category == 'PARCEL'): ?>

                        <tr>
                            <?php if($this->session->user_type == 'Editor'): ?>
                                
                                <td><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                                <td><a href="<?=base_url('aicmailers/delete/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>

                            <?php endif; ?>

                            <?php

                        echo'
                            <td class="d-none">'. $rate->id .'</td>
                            <td>'. $rate->description .'</td>
                            <td>'. $rate->ncr .'</td>
                            <td>'. $rate->luzon .'</td>
                            <td>'. $rate->visayas .'</td>
                            <td>'. $rate->mindanao .'</td>
                            <td class="d-none">'. $rate->category .'</td>
                        </tr>'; ?>

                        
                    <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            </table>
            </div>










 
    <?php if($this->session->user_type == 'Editor'): ?>
        <form method="post" action="<?=base_url('aicmailers/add');?>" class="needs-validation" novalidate >
            
            <div class="modal fade" id="aic_mailers_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="aic_mailers_modallabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bold poppins text-secondary" id="aic_mailers_modallabel">Mailers</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body poppins">
                                <h6 class="text-end text-secondary">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title='For not applicable field, use dash "-". Don&#8217t leave the field blank.'></i>
                                </h6>

                                <input type="hidden" name="rateid" value="" id="rateid">

                                <div class="row">

                                    <div class="col">
                                        <label for="category" class="form-label categoryLabel">Rates for</label>
                                        <select class="form-select form-select-sm" name="category" id="category">
                                        <option value="MAILERS">Mailers</option>
                                        <option value="PARCEL">Parcel</option>
                                        </select>

                                    </div>


                                    <div class="col">
                                        <label for="description" class="form-label">Description</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="description" name="description" required>
                                                <div id="descriptionfeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                                    <div class="col">
                                        <label for="ncr" class="form-label">Metro Manila Rate</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="ncr" name="ncr" required>
                                                <div id="ncrfeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                               
                                </div>

                                <hr>

                                <div class="row">

                                    <div class="col">
                                        <label for="luzon" class="form-label">Luzon Rate</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="luzon" name="luzon" required>
                                                <div id="luzonfeedback" class="invalid-feedback"> This Field is Required </div>
                                    </div>



                                    <div class="col">
                                        <label for="visayas" class="form-label">Visayas Rate</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="visayas" name="visayas" required>
                                                <div id="visayasfeedback" class="invalid-feedback"> This Field is Required </div>
                                    </div>

                                    <div class="col">
                                        <label for="mindanao" class="form-label">Mindanao Rate</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="mindanao" name="mindanao" required>
                                                <div id="mindanaofeedback" class="invalid-feedback"> This Field is Required </div>
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


  








        <form action="<?=base_url('aicmailers/updatenotes');?>" method="post">

             <div class="modal fade" id="aic_mailers_notes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asp_air_freight_noteslabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bold poppins text-secondary" id="asp_air_freight_noteslabel">Editor's Note</h6>
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

<script src="<?=base_url('js/aicmailers.js');?>"></script>