<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Service</title>

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
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Service</h6>
          </div>
          <div class="card-body">
            <form id="form2" action="<?=base_url('funeralservices/store')?>" method="post">
              <!-- Hidden input to store associated product IDs -->
              <input type="hidden" name="associated_product_id[]" id="associated_product_ids" value="">

              <h6 class="text-danger font-weight-bold" style="display: inline;">Adding New Service: </h6><small style="display: inline;" class="text-danger">*when the service to be added is not included in the other services.</small>
              <!-- FOR NEW SERVICE -->
              <div class="form-group mt-2">
                <label class="font-weight-bold text-dark" for="">New Service</label>
                <input type="text" name="new_service_name" class="form-control">
              </div>
              <small class="text-danger"><?= form_error('new_service_name') ?></small>
              <!-- FOR NEW PRICE -->
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="">New Price</label>
                <input type="text" name="new_service_price" class="form-control">
              </div>
              <small class="text-danger"><?= form_error('new_service_price') ?></small>
              <hr>
              <h6 class="text-danger font-weight-bold" style="display: inline;">Other Services: </h6>
              <!-- FOR OTHER SERVICE -->
              <div class="form-group mt-2">
                <label class="font-weight-bold text-dark" for="servicename">Service Name</label>
                <select class="form-control" name="service_name" id="service_name">
                  <option class="font-weight-bold text-dark" value="">Select Service</option>
                  <?php foreach ($other_services as $other_service) :?>
                    <option value="<?php echo $other_service->serv_name; ?>" data-price="<?php echo $other_service->serv_price; ?>">
                      <?php echo $other_service->serv_name; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <small class="text-danger"><?= form_error('service_name') ?></small>
              </div>
              <!-- SERVICE PRICE -->
              <div class="form-group">
                <label class="font-weight-bold text-dark" for="price">Service Price</label>
                <input type="text" name="price" class="form-control" id="price">
                <small class="text-danger"><?=form_error('price') ?></small>
              </div>

              <!-- FOR ADDITIONAL PRODUCT -->

                <div class="form-group">
                  <label class="font-weight-bold text-dark" for="associated_products[]">Associated Products</label>
                  <select class="form-control multiple-select" name="associated_prod_id[]" id="associated_products[]" multiple>
                    <option>--Select Product--</option>
                    <?php foreach ($additional_products as $product) : ?>
                      <option value="<?php echo $product->id; ?>" data-price="<?php echo $product->additional_price; ?>">
                        <?php echo $product->additional_serv_type; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <small class="text-danger"><?=form_error('associated_prod_id[]'); ?></small>
                </div>

              <div class="form-group">
                <button type="submit" id="submitBothForms" class="btn btn-info float-right">Add</button>
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

  <!-- jquey CDN-->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>template/vendor/chart.js/Chart.min.js"></script>

  <!-- <script>
    document.getElementById('submitBothForms').addEventListener('click', function() {
        document.getElementById('form1').submit(); // Submit the first form
        document.getElementById('form2').submit(); // Submit the second form
    });
  </script> -->
  <script>
    $(".multiple-select").select2({
      //maximumSelectionLength: 2
    });
  </script>
  <script type="text/javascript">
    document.getElementById('service_name').onchange = function() {
      var selectedOption = this.options[this.selectedIndex];
      var priceInput = document.getElementById('price');
      var price = selectedOption.getAttribute('data-price');
      priceInput.value = price ? price : '';
    };

    document.getElementById('casket_name').onchange = function() {
      var selectedOption = this.options[this.selectedIndex];
      var priceInput = document.getElementById('casket_price');
      var price = selectedOption.getAttribute('data-price');
      priceInput.value = price ? price : '';
    };

    document.getElementById('urn_name').onchange = function() {
      var selectedOption = this.options[this.selectedIndex];
      var priceInput = document.getElementById('urn_price');
      var price = selectedOption.getAttribute('data-price');
      priceInput.value = price ? price : '';
    };
    // Function to calculate total additional price
    function calculateAdditionalPrice() {
      var selectedOptions = $('#associated_products\\[\\]').find(':selected');
      var totalPrice = 0;

      selectedOptions.each(function() {
        var price = parseFloat($(this).data('price'));
        if (!isNaN(price)) {
          totalPrice += price;
        }
      });

      // var priceInput = document.getElementById('additional_price');
      // priceInput.value = totalPrice.toFixed(2); // Display total price in the input field
      $('#additional_price').val(totalPrice.toFixed(2)); // Display total price in the input field
    }

    // Event listener for changes in the associated products dropdown
    $('#associated_products\\[\\]').on('select2:select select2:unselect', function() {
      calculateAdditionalPrice();
    });
    // calculateAdditionalPrice();
  </script>
  <script type="text/javascript">
    // $('#updateAssociatedProducts').click(function() {
    //       var selectedProducts = $('#associated_products[]').val();
    //       $('#associated_product_ids').val(selectedProducts);
    //   });
    // $(document).ready(function() {
    //   $('#product_type').change(function() {
    //     var selectedProductType = $(this).val();
    //     $('#product_type_selected').val(selectedProductType);
    //
    //     if (selectedProductType === 'casket') {
    //         $('#casket_section').show();
    //         $('#urn_section').hide();
    //         $('#urn_price').val('').parent().hide();
    //
    //     } else if (selectedProductType === 'urn') {
    //         $('#urn_section').show();
    //         $('#casket_section').hide();
    //         $('#casket_price').val('').parent().hide();
    //     }
    //
    //   });
    //
    //   $('#casket_name').change(function() {
    //     var casketPrice = $(this).find(':selected').data('price');
    //     $('#casket_price').val(casketPrice).parent().show();
    //   });
    //
    //   $('#urn_name').change(function() {
    //     var urnPrice = $(this).find(':selected').data('price');
    //     $('#urn_price').val(urnPrice).parent().show();
    //   });
    // });
  </script>
</body>
</html>
