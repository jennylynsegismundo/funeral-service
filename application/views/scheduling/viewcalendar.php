
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Schedule & Calendar</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>template/css/sb-admin-2.min.css" rel="stylesheet">
    <!--FOR CALENDAR TEMPLATE-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>calendar/fonts/icomoon/style.css">
    <link href='<?php echo base_url();?>calendar/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='<?php echo base_url();?>calendar/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>calendar/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url();?>calendar/css/style.css">
    <!--to show the day in calendar & to read the tooltip-->
    <!-- Bootstrap CSS
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!Bootstrap JS (Popper.js is required for Bootstrap tooltips)>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->

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
        <div class="sidebar-heading">Others</div>
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
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $showUsername?></span><img class="img-profile rounded-circle" src="<?php echo base_url();?>template/img/undraw_profile.svg">
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
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Service Schedule</h1>
          <a href="<?= base_url('AddServiceSchedule')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Add Service Schedule</a>
        </div>
        <!-- Content Row -->
        <!--<div class="row">-->
        <?php if($this->session->flashdata('status')): ?>
          <div class="alert alert-success">
            <?= $this->session->flashdata('status'); ?>
          </div>
        <?php endif; ?>
          <div class="card shadow mb-4">

            <div class="card-body">
              <div id='calendar'></div>
            </div>
          </div>
        </div>
      <!--</div>-->
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

  <!--SCRIPT FOR CALENDAR-->
  <script src="<?php echo base_url();?>calendar/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>calendar/js/bootstrap.min.js"></script>

  <script src='<?php echo base_url();?>calendar/fullcalendar/packages/core/main.js'></script>
  <script src='<?php echo base_url();?>calendar/fullcalendar/packages/interaction/main.js'></script>
  <script src='<?php echo base_url();?>calendar/fullcalendar/packages/daygrid/main.js'></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid' ],
            defaultDate: new Date().toISOString().slice(0, 10),
            editable: true,
            eventLimit: true,
            events: <?= $events ?>, // json_encode($events) Correctly encode the PHP variable to pass events

            // eventRender: function(info) {
            //     var tooltip = new Tooltip(info.el, {
            //         title: info.event.extendedProps.deceasedName + ' - ' +
            //             'Start: ' + info.event.start.toLocaleString() + ' - ' +
            //             'End: ' + info.event.end.toLocaleString(),
            //         placement: 'top',
            //         trigger: 'hover',
            //         container: 'body'
            //     });
            // },
            //
            // eventClick: function(info) {
            //     alert('Event: ' + info.event.title + '\nStart: ' + info.event.start.toLocaleString() + '\nEnd: ' + info.event.end.toLocaleString()
            //         + '\nLocation: ' + info.event.extendedProps.location + '\nDeceased Name: ' + info.event.extendedProps.deceasedName
            //     );
            // }
        });
        calendar.render();
    });
  </script>


  <script src="<?php echo base_url();?>calendar/js/main.js"></script>
</body>
</html>
