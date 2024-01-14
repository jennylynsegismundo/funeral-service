<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="assets/style/adminDashboard/admindashboard.css">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

  <style media="screen">
    .border-left-service {
      border-left: 5px solid #87C4FF; /* Replace with your desired color code */
    }
    .border-left-inventory {
      border-left: 5px solid #82CD47; /* Replace with your desired color code */
    }
    .border-left-scheduling {
      border-left: 5px solid #01DFD7; /* Replace with your desired color code */
    }
    .size{
      font-size: 25px;
    }
    .card
    {
      transition: transform 0.2s;
    }
    .card:hover
    {
      transform: scale(1.1);
    }
  </style>
</head>

<body>
  <?php
    if ($this->session->userdata('UserLoginSession')) {
      $udata = $this->session->userdata('UserLoginSession');
      $welcomeMessage = 'Welcome!';
      $showUsername = $udata['username'];
   ?>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
      </div>

      <div class="sidebar-header">
        <h3 class="text-center"><?php echo $welcomeMessage;?></h3>
        <h3 class="text-center"><?php echo $showUsername;?></h3>
      </div>

      <ul class="list-unstyled">
        <li>
          <a href="<?=base_url('dashboard')?>">
            <i class="fas fa-home"></i>
            Dashboard
          </a>
        </li>
        <li class="">
          <a class="dropdown-toggle" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-cube"></i>
            Service Products
          </a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="<?=base_url('casket')?>">Casket</a>
            </li>
            <li>
              <a href="<?=base_url('urn')?>">Urn</a>
            </li>
            <li>
              <a href="<?=base_url('additional_services')?>">Additional Service</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?=base_url('scheduler')?>">
            <i class=""></i>
            Schedule Record
          </a>
        </li>
        <li>
          <a href="<?=base_url('')?>">
            <i class=""></i>
            Monitoring Bill
          </a>
        </li>
        <li>
          <a class="dropdown-toggle" href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Archive</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
              <a href="<?=base_url('archiveFuneralService')?>">Service</a>
            </li>
            <li>
              <a href="<?=base_url('archive_casket')?>">Casket</a>
            </li>
            <li>
              <a href="<?=base_url('archive_urn')?>">Urn</a>
            </li>
            <li>
              <a href="<?=base_url('archiveAdditionalService')?>">Additional Service</a>
            </li>
          </ul>
        </li>
        </li>
        <li>
          <a href="<?=base_url('')?>">
            <i class=""></i>
            Start to End Transaction Record
          </a>
        </li>
        <li>
          <a href="<?=base_url('')?>">
            <i class=""></i>
            Reports
          </a>
        </li>
      </ul>
    </nav>
    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Menu</span>
          </button>
          <a type="button" id="" class="btn btn-danger" href="<?=base_url('logout')?>">
            <i class="fas fa-align-justify fas fa-user"></i>
            <span style="color: white;">Logout</span>
          </a>
        </div>
      </nav>
      <?php
      } else {
        redirect(base_url('home'));
      } ?>
      <div class="container">
        <div class="row">
          <!-- FUNERAL SERVICE -->
          <div class="col-sm-6 mb-4">
            <div class="card border-left-service shadow">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="size font-weight-bold text-primary text-uppercase mb-1">
                      <a href="<?=base_url('funeralservices')?>" style="text-decoration: none; color: inherit;">
                        Funeral Service
                    </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- INVETORY -->
          <div class="col-sm-6 mb-4">
            <div class="card border-left-inventory shadow">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="size font-weight-bold text-success text-uppercase mb-1">
                      <a href="<?=base_url('Inventory')?>" style="text-decoration: none; color: inherit;">
                      Inventory Management
                    </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-box fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- SCHEDULING -->
          <div class="col-sm-6 mb-4">
            <div class="card border-left-scheduling shadow">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="size font-weight-bold text-info text-uppercase mb-1">
                      <a href="<?=base_url('scheduling')?>" style="text-decoration: none; color: inherit;">
                      Scheduling
                    </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });
        });
    </script>
</body>

</html>
