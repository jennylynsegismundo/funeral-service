<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Additional Product</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php
    if ($this->session->userdata('UserLoginSession')) {
      $udata = $this->session->userdata('UserLoginSession');
      $welcomeMessage = 'Dashboard';
      $showUsername = $udata['username']. ' ';
  ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('AdminDashboard')?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
          <?= $welcomeMessage?>
        </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('AdminDashboard')?>">
          <i class="fas fa-fw fa-home"></i><span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">Interface</div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('scheduler')?>"><i class="fas fa-fw fa-calendar"></i><span>Schedule Record</span></a>
        </li>
        <!-- START TO END TRANSACTION -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('ViewStartToEnd')?>"><i class="fas fa-fw fa-calendar"></i><span>Start To End Transaction</span></a>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-box"></i>
            <span>Service Product</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?=base_url('casket')?>">Casket</a>
              <a class="collapse-item" href="<?=base_url('urn')?>">Urn</a>
              <a class="collapse-item" href="<?=base_url('additional_services')?>">Additional Product</a>
            </div>
          </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">Addons</div>
        <!-- CustomersAccount -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('CustomersAccount')?>"><i class="fas fa-fw fa-folder"></i><span>Start To End Transaction</span></a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Archive</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white collapse-inner rounded">
              <a class="collapse-item" href="<?=base_url('archiveFuneralService')?>">Service</a>
              <a class="collapse-item" href="<?=base_url('archive_casket')?>">Casket</a>
              <a class="collapse-item" href="<?=base_url('archive_urn')?>">Urn</a>
              <a class="collapse-item" href="<?=base_url('archiveAdditionalService')?>">Additional Product</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
  <?php
  } else {
    redirect(base_url('home'));
  } ?>
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
          <div class="topbar-divider d-none d-sm-block"></div>
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $showUsername?></span>
              <img class="img-profile rounded-circle" src="<?php echo base_url();?>template/img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= base_url('logout')?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- End of Topbar -->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Additional Product</h6>
          </div>
          <div class="card-body">
            <form action="<?=base_url('update_additional_service/'.$add_service->id)?>" method="post">
              <div class="form-group">
                <label for="">Additional Product Type</label>
                <input type="text" name="additional_serv_type" value="<?= $add_service->additional_serv_type ?>" class="form-control">
                <small class="text-danger"><?= form_error('additional_serv_type')?></small>
              </div>

              <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="additional_price" value="<?= $add_service->additional_price ?>" class="form-control">
                <small class="text-danger"><?= form_error('additional_price')?></small>
              </div>

              <div class="form-group mt-2">
                <button type="submit" class="btn btn-info float-right">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
  </div>
  <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <button class="btn btn-secondary float-left" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary float-right" href="<?= base_url('home')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>template/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>template/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url();?>template/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url();?>template/js/demo/chart-pie-demo.js"></script>
</body>
</html>
