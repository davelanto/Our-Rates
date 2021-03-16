



    <div class="container-fluid p-4">

 
        
            <div class="col-sm-6 p-lg-5 mx-auto poppins">

            <?php  $this->session = \Config\Services::session(); ?>
                <div class="container shadow-lg p-5 bg-body rounded  animate__animated animate__fadeInTopRight">

                    <div class="mx-auto text-center mb-5">
                    <img src="<?=base_url('images/ourrates.png');?>" style="width:30%" alt="Our Rate">
                    <h6 class="sellingtitle text-dark fw-bolder mt-3">Airspeed Selling Rates</h6>
                    </div>
                            
               
                
                <form method="post" action='<?=base_url('Login/login');?>'>


                    <div class="form-floating mb-4">
                    <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="jdelacruz" value="<?=set_value('username')?>">
                    <label for="username">Username</label>
                    <div class="text-danger errors">
                        <?=$validation->getError('username');?>
                    </div>
                    </div>


                    <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="jdelacruz">
                    <label for="password">Password</label>
                    
                    <div class="text-danger errors">
                        <?=$validation->getError('password');?>
                    <?php
                     if($this->session->getFlashdata('msg') != NULL):
                        echo $this->session->getFlashdata('msg');
                        endif;
                    ?>
                    </div>
                    </div>

                    <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg submit">Login</button>
                    </div>

                </form>
                
                
                
                </div>
            
            
            
            
          

        
        
        
        
        </div>


    
    
    </div>