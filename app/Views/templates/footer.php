

</div>
<div class="footer">
    <div class="container-fluid border-top border-secondary text-center p-3">
    &copy; Airspeed MIS Department 2021
    </div>
</div>


<?php $validation =  \Config\Services::validation(); ?>


<form method="POST" action="<?=base_url('account/changePassGlobal');?>">
    <div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="changePassModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title fw-bold poppins text-secondary" id="changePassModalLabel"><br> <span class="text-danger fw-light register"> Change Password </span>
                                 <br> <span class="text-secondary" style="font-size:11px;">Username: <span class="spanusername text-success fw-bold"><?=$this->session->username;?></span></span></h6>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body poppins"> 

                                <input type="hidden" name="userid1" value="<?=$this->session->user_id;?>" id="userids1"> 
                                <input type="hidden" name="currenturl" value="<?=current_url();?>">

                                <div class="row">
                             
                                    <div class="col-10">
                                        <label for="newpass" class="form-label">New Password</label>
                                        <input type="password" class="form-control form-control-sm" autocomplete="off" id="newpass1" name="newpass1" required>
                                        
                                        
                                    </div>

                                </div>  

                                <hr>

                                <div class="row">
                                    <div class="col-10">
                                        <label for="cnewpassword" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control form-control-sm" autocomplete="off" id="cnewpassword1" name="cnewpassword1" required>
                                        <div class="text-danger errors" id="cpass1">
                                    </div>
                                    </div>
                                </div>

        </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm save" disabled>Save</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            </div> 
                    </div>

            </div>
    </div>
    </form>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="<?= base_url('js/global.js');?>"></script>





   





</body>
</html>