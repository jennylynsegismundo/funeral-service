<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Schedule Service</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!--jquery cdn-->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
          <a class="nav-link" href="<?= base_url('CustomersAccount')?>"><i class="fas fa-fw fa-folder"></i><span>Customer's Account</span></a>
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

        <?php if($this->session->flashdata('error')): ?>
          <div class="alert alert-danger">
              <?= $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('imageError')): ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('imageError'); ?>
          </div>
        <?php endif; ?>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Schedule Service</h6>
          </div>
          <div class="card-body">
            <form action="<?= base_url('scheduling/addSchedule') ?>" method="post" enctype="multipart/form-data">
              <!-- CHOOSE SERVICE -->
              <div class="form-group">
                <label for="">Choose Service:</label>
                <select class="form-control" name="choose_service" id="service_name">
                  <option value="">Select Service</option>
                  <?php foreach ($other_services as $other_service) : ?>
                    <option value="<?php echo $other_service->service_id; ?>" data-price="<?php echo $other_service->price; ?>">
                      <?php echo $other_service->service_name; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <small class="text-danger"><?=form_error('choose_service') ?></small>
              </div>
              <!-- SERVICE PRICE -->
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="price">Service Price</label>
                <input type="text" name="price" class="form-control" id="price">
                <small class="text-danger"><?=form_error('price') ?></small>
              </div>
              <!-- ADDITIONAL PRODUCT -->
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="associated_products[]">Associated Products</label>
                <select class="form-control multiple-select" name="associated_prod_id[]" id="associated_products[]" multiple>

                </select>
              </div>
              <!-- Choose URN or CASKET -->
              <!-- <div class="form-group">
                  <label class="font-weight-bold text-dark" for="choose_product">Choose Product</label>
                  <select class="form-control" name="choose_product">
                      <option value="">Select Product</option>
                      <option value="casket">Select Casket</option>
                      <option value="urn">Select Urn</option>
                  </select>
              </div> -->
              <!-- Casket Selection Section -->
              <div class="form-group" >
                <label class="font-weight-bold text-dark" for="casket_name">Casket</label>
                <select class="form-control" name="casket_id">
                  <option value="">Select Casket</option>
                  <?php foreach ($casket_products as $casket): ?>
                    <option value="<?php echo $casket->casket_id; ?>">
                      <?php echo $casket->casket_name; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                  <!-- Fields related to casket selection -->
              </div>

              <!-- Urn Selection Section -->
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="casket_name">Urn</label>
                <select class="form-control" name="urn_id">
                  <option value="">Select Urn</option>
                  <?php foreach ($urn_products as $urn): ?>
                    <option value="<?php echo $urn->urn_id; ?>">
                      <?php echo $urn->urn_name; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                  <!-- Fields related to urn selection -->
              </div>
              <hr>
              <h6 class="mb-2 text-danger font-weight-bold">Details of Customer</h6>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="name_of_customer">Name of Customer</label>
                <input type="text" name="name_of_customer" class="form-control">
                <small class="text-danger"><?= form_error('name_of_customer')?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="customer_cont_no">Customer Contact Number</label>
                <input type="text" name="customer_cont_no" class="form-control">
                <small class="text-danger"><?= form_error('customer_cont_no')?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="customer_address">Customer Address</label>
                <input type="text" name="customer_address" class="form-control">
                <small class="text-danger"><?= form_error('customer_address')?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="relationship_deceased">Relationship to Deceased</label>
                <input type="text" name="relationship_deceased" class="form-control">
                <small class="text-danger"><?= form_error('relationship_deceased')?></small>
              </div>

              <hr>
              <h6 class="mb-2 text-danger font-weight-bold">Deceased Information</h6>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="">Death Certificate</label>
                <input class="form-control-file" type="file" name="cert_image" value="">
                <small><?php if(isset($error)) {echo $error; } ?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="">Decesead Name</label>
                <input type="text" name="deceased_name" class="form-control">
                <small class="text-danger"><?= form_error('deceased_name')?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="gender">Gender</label>
                <select class="form-control" name="gender">
                  <option></option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
                <small class="text-danger"><?= form_error('gender')?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="date_of_birth">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control">
                <small class="text-danger"><?= form_error('date_of_birth')?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="date_of_death">Date of Death</label>
                <input type="date" name="date_of_death" class="form-control">
                <small class="text-danger"><?= form_error('date_of_death')?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="age">Age</label>
                <input type="number" name="age" class="form-control">
                <small class="text-danger"><?= form_error('age')?></small>
              </div>

              <hr>
              <h6 class="mb-2 text-danger font-weight-bold">Date of Arrangement</h6>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="">Schedule Title</label>
                <input type="type" name="schedule_title" class="form-control">
                <small class="text-danger"><?= form_error('schedule_title')?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="">Start Date</label>
                <input type="date" name="start_date" class="form-control">
                <small class="text-danger"><?= form_error('start_date')?></small>
              </div>

              <div class="form-group">
                <label class="font-weight-bold text-dark" for="">End Date</label>
                <input type="date" name="end_date" class="form-control">
                <small class="text-danger"><?= form_error('end_date')?></small>
              </div>

              <hr>
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="">Location</label>
                <select class="form-control" name="location">
                  <option class="text-italic">--please choose location--</option>
                  <option value="chapel">Chapel</option>
                  <option value="house">House</option>
                </select>
                <small class="text-danger"><?= form_error('location')?></small>
              </div>

              <div class="form-group mt-2">
                <button type="submit" class="btn btn-success float-right">Add</button>
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

  <!-- jquey CDN-->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const chooseProduct = document.querySelector('select[name="choose_product"]');
        const casketSection = document.querySelector('#casket_section');
        const urnSection = document.querySelector('#urn_section');

        // Initially hide both sections
        casketSection.style.display = 'none';
        urnSection.style.display = 'none';

        chooseProduct.addEventListener('change', function() {
            if (chooseProduct.value === 'casket') {
                casketSection.style.display = 'block';
                urnSection.style.display = 'none';
            } else if (chooseProduct.value === 'urn') {
                casketSection.style.display = 'none';
                urnSection.style.display = 'block';
            } else {
                casketSection.style.display = 'none';
                urnSection.style.display = 'none';
            }
        });
    });
  </script>

  <script type="text/javascript">
    $(".multiple-select").select2({
      //maximumSelectionLength: 2
    });

    document.getElementById('service_name').onchange = function() {
      var selectedOption = this.options[this.selectedIndex];
      var priceInput = document.getElementById('price');
      var price = selectedOption.getAttribute('data-price');
      priceInput.value = price ? price : '';
    };
  </script>
  <script>
    function calculateAge()
    {
      var dob = new Date(document.getElementsByName('date_of_birth')[0].value);
      var dod = new Date(document.getElementsByName('date_of_death')[0].value);

      if (!isNaN(dob.getTime()) && !isNaN(dod.getTime()))
      {
        var ageDiff = dod.getFullYear() - dob.getFullYear();
        var monthDiff = dod.getMonth() - dob.getMonth();
        if (monthDiff < 0 || (monthDiff == 0 && dod.getDate() < dob.getDate()))
        {
          ageDiff--;
        }
        document.getElementsByName('age')[0].value = ageDiff;
      }
      else
      {
        document.getElementsByName('age')[0].value = ''; //clear age if dates are invalid
      }
    }

    //add event listeners to date inputs
    document.getElementsByName('date_of_birth')[0].addEventListener('change', calculateAge);
    document.getElementsByName('date_of_death')[0].addEventListener('change', calculateAge);
  </script>
</body>
</html>
