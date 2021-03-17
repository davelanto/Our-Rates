<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url('css/style.css');?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <script src="<?=base_url('js/jquery.js')?>"></script>

    <style>
    
#loading {
  
    background: url("<?=base_url('images/loading.gif');?>") no-repeat center center;
    background-color: #ffffffff;
    position:fixed;
    top:0;
    width:100%;
    height:100%;
    z-index:100;

    
}
#loading p{
	  position: absolute;
    left: 0;
    right: 0;
    bottom: 50%;
		/* top:0; */
    display: inline-block;
    text-align: center;
		margin-bottom: -5em;
}
    
    </style>
    
</head>
<body>

<div id="loading">
<p class="poppins">If the Page doesn't show in <span class="text-danger fw-bold">30</span> <span class="fw-bold">seconds</span>, Please refresh the page.</p>
</div>


  <?php  $this->session = \Config\Services::session(); ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('airexport');?>">
    <img src="<?=base_url('images/ourrates.png');?>" style="width:100px;" alt="" >
    </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        
       <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Airspeed Intl Corp.
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?= base_url('airexport');?>">Air Export</a></li>
            <li><a class="dropdown-item" href="<?= base_url('airimport');?>">Air Import</a></li>
            <li><a class="dropdown-item" href="<?= base_url('seaexport');?>">Sea Export <span style="font-size:9px; color:red; border-bottom: 1px solid blue;" class="fw-bold"><br> Ocean Freight Asia And Middle East </span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('seaexportFCL');?>">Sea Export <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> FCL Origin Charges </span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('seaexportLCL');?>">Sea Export <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> LCL Origin Charges </span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('seaimport');?>">Sea Import <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> Ocean Freight </span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('seaimportFCL');?>">Sea Import <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> FCL DESTINATION CHARGES </span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('seaimportLCL');?>">Sea Import <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> LCL DESTINATION CHARGES </span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('brokerage');?>">Brokerage <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> CONSUMPTION ENTRY CHARGES </span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('brokeragePeza');?>">Brokerage <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> PEZA CHARGES </span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('brokerageFport');?>">Brokerage <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> FREEPORT ZONE CHARGES </span></a></li>
          </ul>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Airspeed PH Corp.
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?= base_url('aspairfreight');?>">Air Freight Rate</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aspseafreight');?>">Sea Freight Rate</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aspseafreightfcl');?>">Sea Freight FCL Rate</a></li>
            <li><a class="dropdown-item" href="<?= base_url('asproro');?>">RORO <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> ROLL ON, ROLL OFF </span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('asplandfreight');?>">Land Freight <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> Loose Truck Load / Console</span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('asplandftlfreight');?>">Land Freight <span style="font-size:9px; color:red;  border-bottom: 1px solid blue;" class="fw-bold"><br> Full Truck Load / Solo Truck</span></a></li>
            <li><a class="dropdown-item" href="<?= base_url('aspwarehousing');?>">Warehousing</a></li>
          </ul>
        </li>


        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Last Mile Delivery PUD
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?= base_url('aicmailers');?>">Mailers</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aicpouches');?>">Pouches</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aicboxes');?>">Airspeed Boxes</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aicownpackaging');?>">Customer's Own Packaging</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aicservearea');?>">Serve Areas</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aicnotservearea');?>">Not Serve Areas</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aicotdoda');?>">Out of Town Delivery</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aicoda');?>">Out of Delivery Areas</a></li>
            <li><a class="dropdown-item" href="<?= base_url('aicotdodafee');?>">Provincial Delivery Rates & Lead Time</a></li>
          </ul>
        </li> -->

<!-- 

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Option
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          
          </ul>
        </li> -->


        <?php if($this->session->user_type == 'Editor'): ?>
          <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Account');?>">Accounts</a>
         </li>
            <?php endif; ?>

            <!-- <li class="nav-item">
            <a class="nav-link" href="<?= base_url('');?>">Change Password</a></li> -->
            <li class="nav-item"><a class="nav-link" href="<?= base_url('Login/logout');?>">Logout</a></li>
        


      </ul>
    </div>
  </div>
</nav>








<div class="sidenav d-none d-lg-block d-xl-block poppins">
  
  <a class="fw-bolder text-uppercase title"> <span class="border-bottom border-light">Airspeed Intl. Corp</span></a>
  <a class="link" href="<?= base_url('airexport');?>">Air Export</a>
  <a class="link" href="<?= base_url('airimport');?>">Air Import</a>
  <a class="link" href="<?= base_url('seaexport');?>">Sea Export <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold"><br> Ocean Freight Asia And Middle East </span></a>
  <a class="link" href="<?= base_url('seaexportFCL');?>">Sea Export <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> FCL Origin Charges </span></a>
  <a class="link" href="<?= base_url('seaexportLCL');?>">Sea Export <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> LCL Origin Charges </span></a>
  <a class="link" href="<?= base_url('seaimport');?>">Sea Import <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> Ocean Freight </span></a>
  <a class="link" href="<?= base_url('seaimportFCL');?>">Sea Import <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> FCL DESTINATION CHARGES </span></a>
  <a class="link" href="<?= base_url('seaimportLCL');?>">Sea Import <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> LCL DESTINATION CHARGES </span></a>
  <a class="link" href="<?= base_url('brokerage');?>">Brokerage <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> CONSUMPTION ENTRY CHARGES </span></a>
  <a class="link" href="<?= base_url('brokeragePeza');?>">Brokerage <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> PEZA CHARGES </span></a>
  <a class="link" href="<?= base_url('brokerageFport');?>">Brokerage <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> FREEPORT ZONE CHARGES </span></a>

  <hr>

  <a class="text-danger fw-bolder text-uppercase"> <span style="letter-spacing: 1px; border-bottom: 1px solid white;"> Airspeed PH Corp.</span</a>
  <a class="link"  href="<?= base_url('aspairfreight');?>">Air Freight</a>
  <a class="link" href="<?= base_url('aspseafreight');?>">Sea Freight</a>
  <a class="link" href="<?= base_url('aspseafreightfcl');?>">Sea Freight FCL Rate</a>
  <a class="link" href="<?= base_url('asproro');?>">Roro <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> ROLL ON, ROLL OFF </span></a>
  <a class="link" href="<?= base_url('asplandfreight');?>">Land Freight <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> Loose Truck Load / Console </span></a>
  <a class="link" href="<?= base_url('asplandftlfreight');?>">Land Freight <span class="text-danger">-</span><span style="font-size:9px; border-bottom: 1px solid blue;" class="fw-bold "><br> Full Truck Load / Solo Truck </span></a>
  <a class="link" href="<?= base_url('aspwarehousing');?>">Warehousing</a>

  <hr>
  <a class="text-warning fw-bolder text-uppercase"> <span style="letter-spacing: 1px; border-bottom: 1px solid white;"> Last Mile Delivery PUD</span</a>
  <a class="link" href="<?= base_url('aicmailers');?>">Mailers</a>
  <a class="link" href="<?= base_url('aicpouches');?>">Pouches</a>
  <a class="link" href="<?= base_url('aicboxes');?>">Airspeed Boxes</a>
  <a class="link" href="<?= base_url('aicownpackaging');?>">Customer's Own Packaging</a>
  <a class="link" href="<?= base_url('aicservearea');?>">Serve Areas</a>
  <a class="link" href="<?= base_url('aicnotservearea');?>">Not Serve Areas</a>
  <a class="link" href="<?= base_url('aicotdoda');?>">Out of Town Delivery</a>
  <a class="link" href="<?= base_url('aicoda');?>">Out of Delivery Areas</a>
  <a class="link" href="<?= base_url('aicotdodafee');?>">Provincial Delivery Rates & Lead Time</a>
  <hr>
</div>








<div class="main">








