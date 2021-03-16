
<div class="container-fluid">

        <div class="text-center mt-4">
            <h4 class="fw-bolder p-3">Accounts</h4>
        </div>

<?php $uri = current_url(true); ?>

        
        <?php if($uri->getTotalSegments() >= 2 && $uri->getSegment(2) == "register"): ?>

            <script>
                $(document).ready(function(){
                    $('#accountModal').modal('toggle');
                
                });
            </script>

        <?php elseif($uri->getTotalSegments() >= 2 && $uri->getSegment(2) == "update"): ?>


            <script>

                $(document).ready(function(){
                    $('#editProfileModal').modal('toggle');

                });
            </script>

        <?php elseif($uri->getTotalSegments() >= 2 && $uri->getSegment(2) == "changepassword"): ?>

                <script>
                $(document).ready(function(){
                $('#changePassModal').modal('toggle');
                });
                </script>

        <?php endif; ?>


        <?php if($this->session->has('msg')): ?>
                <div class="text-center mx-auto mt-3 poppins col-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?=$this->session->msg;?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

            <?php endif; ?>

<div class="text-start m-2">
    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#accountModal">New User <i class="fas fa-plus fa-fw"></i></button>
</div>

  <div class="container-fluid mt-3">


        <div class=" p-4 border border-secondary bg-light">
            <table class="table table table-striped table-responsive" style="width:100%; overflow-x:auto;">
                <thead class="bg-dark text-light text-justify">
                    <tr>
                    <th scope="col" class="col-action2 action">Action</th>
                    <th scope="col" class="col-action2 action">Action</th>
                    <th scope="col" class="d-none">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">User Type</th>
                    <th scope="col" class="d-none">type_id</th>
                    </tr>
                </thead>
                <tbody>
            <?php if($account):
                    foreach($account->getResult() as $cred):
                ?>
                 <tr>
                 <td><button type="button" class="btn btn-primary btn-sm editform" >Edit Profile</button></td>
                 <td><button type="button" class="btn btn-danger btn-sm changepass" >Change Password</button></td>
                 <td class="d-none"><?=$cred->user_id; ?></td>
                 <td><?=$cred->username; ?></td>
                 <td><?=$cred->first_name; ?></td>
                 <td><?=$cred->last_name; ?></td>
                 <td><?=$cred->user_type; ?></td>
                 <td scope="col" class="d-none"><?=$cred->type_id; ?></td>
                 </tr>


            <?php
                endforeach;
                endif;
                 ?>
                </tbody>
            </table>
            
        </div>


     </div>

     </div>




</div>



<form method="POST" action="<?=base_url('account/register');?>">
    <div class="modal fade" id="accountModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title fw-bold poppins text-secondary" id="accountModalLabel">Accounts <br> <span class="text-danger fw-light register"> Register </span> </h6>
                            
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body poppins"> 
                                <div class="row">

                                    <div class="col">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control form-control-sm" autocomplete="off" id="username" name="username" value="<?=set_value('username');?>" required>
                                     <div class="text-danger errors">
                                     <?=$validation->getError('username');?>
                                     <div class="errors disabled-text fst-italic fw-bold"></div>
                                     </div>
                                    </div>


                                    <div class="col">
                                        <label for="password" class="form-label" id="labelpassword">Password</label>
                                        <input type="password" class="form-control form-control-sm" autocomplete="off" id="password" name="password" required>
                                    <div class="text-danger errors">
                                     <?=$validation->getError('password');?>
                                     </div>
                                    </div>
                                </div>



                                <hr>
                                <div class="row">

                                                                      
                                    <div class="col">
                                    <label for="cpassword" class="form-label"  id="labelcpassword">Confirm Password</label>
                                    <input type="password" class="form-control form-control-sm" autocomplete="off" id="cpassword" name="cpassword" required>
                                    <div class="text-danger errors">
                                     <?=$validation->getError('cpassword');?>
                                     </div>
                                    </div>

                                    <div class="col">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off" id="fname" name="fname" value="<?=set_value('fname');?>" required>
                                        <div class="text-danger errors">
                                     <?=$validation->getError('fname');?>
                                     </div>
                                        
                                    </div>

                               



                                </div>  

                                <hr>

                                <div class="row">
                                     <div class="col">
                                        <label for="lname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off" id="lname" name="lname" value="<?=set_value('lname');?>" required>
                                        <div class="text-danger errors">
                                     <?=$validation->getError('lname');?>
                                     </div>
                                    </div>

                                        <div class="col">
                                        <label for="usertype" class="form-label">User Type</label>
                                        <select class="form-select" name="type_id" id="type_id">
                                            <option value="1">Editor</option>
                                            <option value="2">Viewer</option>
                                        
                                        </select>
                                        
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






    <form method="POST" action="<?=base_url('account/update');?>">
    <div class="modal fade" id="editProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title fw-bold poppins text-secondary" id="editProfileModalLabel">Accounts <br> <span class="text-danger fw-light register"> Edit Profile </span>
                                 <br> <span class="text-secondary" style="font-size:11px;">Username: <span class="spanusername text-success fw-bold"></span></span>
                                 <br>  <span class="text-danger fw-lighter fst-italic" style="font-size:10px;">Username Editing is not Allowed</span> </h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body poppins"> 

                                <input type="hidden" name="userid" value="" id="userid"> 

                                <div class="row">

                                                                    
                                    <div class="col">
                                        <label for="ufname" class="form-label">First Name</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off" id="ufname" name="ufname" value="<?=set_value('ufname');?>" required>
                                        <div class="text-danger errors">
                                     <?=$validation->getError('ufname');?>
                                     </div>
                                        
                                    </div>

                               



                                </div>  

                                <hr>

                                <div class="row">
                                     <div class="col">
                                        <label for="ulname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control form-control-sm" autocomplete="off" id="ulname" name="ulname" value="<?=set_value('ulname');?>" required>
                                        <div class="text-danger errors">
                                     <?=$validation->getError('ulname');?>
                                     </div>
                                    </div>

                                    
                                
                                
                                </div>

                                <hr>

                                <div class="col">
                                        <label for="usertype" class="form-label">User Type</label>
                                        <select class="form-select" name="utype_id" id="utype_id">
                                            <option value="1">Editor</option>
                                            <option value="2">Viewer</option>
                                        
                                        </select>
                                        
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






    <form method="POST" action="<?=base_url('account/changepassword');?>">
    <div class="modal fade" id="changePassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changePassModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title fw-bold poppins text-secondary" id="changePassModalLabel">Accounts <br> <span class="text-danger fw-light register"> Change Password </span>
                                 <br> <span class="text-secondary" style="font-size:11px;">Username: <span class="spanusername text-success fw-bold"></span></span></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body poppins"> 

                                <input type="hidden" name="userid" value="" id="userids"> 

                                <div class="row">

                                                                    
                                    <div class="col-10">
                                        <label for="newpass" class="form-label">New Password</label>
                                        <input type="password" class="form-control form-control-sm" autocomplete="off" id="newpass" name="newpass" value="<?=set_value('newpass');?>" required>
                                        <div class="text-danger errors">
                                     <?=$validation->getError('newpass');?>
                                     </div>
                                        
                                    </div>

                               



                                </div>  

                                <hr>

                                <div class="row">
                                     <div class="col-10">
                                        <label for="cnewpassword" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control form-control-sm" autocomplete="off" id="cnewpassword" name="cnewpassword" value="<?=set_value('cnewpassword');?>" required>
                                        <div class="text-danger errors">
                                     <?=$validation->getError('cnewpassword');?>
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









<script src="<?=base_url('js/account.js');?>"></script>