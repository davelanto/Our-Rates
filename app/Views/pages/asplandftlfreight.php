
 
<div class="container">
    <div class="text-center mx-auto mt-5 mb-5">


        <?php  $this->session = \Config\Services::session(); ?>


            <h4 class="text-uppercase">Airspeed Philippines Incorporation</h4>
            <h5 class="text-uppercase">LAND FREIGHT</h5>
            <h6 class="text-uppercase fw-bold text-secondary">FULL TRUCK LOAD / SOLO TRUCK</h6>

            
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
                <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#asp_land_freight_ftl_modal">New Rate <i class="fas fa-plus fa-fw"></i></button>
            </div>

        <?php endif; ?>
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
                <th scope="col">PROVINCE</th>
                <th scope="col">CITY / TOWN</th>
                <th scope="col">4 wheeler <br><span class="text-warning fst-italic">1.5 tons</span></th>
                <th scope="col">6 wheeler <br><span class="text-warning fst-italic">2.5 tons</span></th>
                <th scope="col">6w forward <br><span class="text-warning fst-italic">6 tons</span></th>
                <th scope="col">10 wheeler <br><span class="text-warning fst-italic">12 tons</span></th>
                
                </tr>
            </thead>
            <tbody>
                
                <?php if($asplandftlfreight): ?>

                    <?php foreach($asplandftlfreight->getResult() as $rate ): ?>

                        <tr>
                            <?php if($this->session->user_type == 'Editor'): ?>
                                
                                <td><button type="button" class="btn btn-primary btn-sm edit" id="edit" >Edit</button></td>
                                <td><a href="<?=base_url('asplandftlfreight/delete/'. $rate->id); ?>" class="btn btn-sm btn-danger">Delete</a></td>

                            <?php endif; ?>

                            <?php

                        echo'
                            <td class="d-none">'. $rate->id .'</td>
                            <td>'. $rate->province .'</td>
                            <td>'. $rate->areas .'</td>
                            <td>'. $rate->fourwheeler .'</td>
                            <td>'. $rate->sixwheeler .'</td>
                            <td>'. $rate->sixwheelerforward .'</td>
                            <td>'. $rate->tenwheeler .'</td>
                        </tr>'; ?>

                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            </table>
    </div>





    <?php if($this->session->user_type == 'Editor'): ?>


        <form method="post" action="<?=base_url('asplandftlfreight/add');?>" class="needs-validation" novalidate >
            
            <div class="modal fade" id="asp_land_freight_ftl_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="asp_land_freight_ftl_modallabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bold poppins text-secondary" id="asp_land_freight_ftl_modallabel">LAND FREIGHT<br> <span class="text-danger fw-light"> Full Truck Load / Solo Truck </span> </h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body poppins">
                                <h6 class="text-end text-secondary">Help <i class="fas fa-question-circle fa-fw text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title='For not applicable field, use dash "-". Don&#8217t leave the field blank.'></i>
                                </h6>

                                <input type="hidden" name="rateid" value="" id="rateid">
                            
                                <div class="row">

                                    <div class="col">
                                        <label for="province" class="form-label">Province</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="province" name="province" required>
                                                <div id="provincefeedback" class="invalid-feedback"> This Field is Required </div>
                                    </div>

                                    <div class="col">
                                        <label for="areas" class="form-label">City/Town</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="areas" name="areas" required>
                                                <div id="areasfeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                                    <div class="col">
                                        <label for="fourwheeler" class="form-label">4 wheeler</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="fourwheeler" name="fourwheeler" required>
                                                <div id="fourwheelerfeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                                </div>

                                <hr>

                                <div class="row">

                                    <div class="col">
                                        <label for="sixwheeler" class="form-label">6 wheeler</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="sixwheeler" name="sixwheeler" required>
                                                <div id="sixwheelerfeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                                    <div class="col">
                                        <label for="sixwheelerforward" class="form-label">6w forward</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="sixwheelerforward" name="sixwheelerforward" required>
                                                <div id="sixwheelerforwardfeedback" class="invalid-feedback"> This Field is Required </div>
                                        
                                    </div>

                                    <div class="col">
                                        <label for="tenwheeler" class="form-label">10 wheeler</label>
                                            <input type="text" class="form-control form-control-sm" autocomplete="off"  id="tenwheeler" name="tenwheeler" required>
                                                <div id="tenwheelerfeedback" class="invalid-feedback"> This Field is Required </div>
                                        
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

<script src="<?=base_url('js/asplandftlfreight.js');?>"></script>