<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> <!-- Use version 1.11.6 CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <title>Archive Service</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <style media="screen">
      @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
      body {
          font-family: 'Poppins', sans-serif;
          background: #fafafa;
      }
      p {
          font-family: 'Poppins', sans-serif;
          font-size: 1.1em;
          font-weight: 300;
          line-height: 1.7em;
          color: #999;
      }
      a,
      a:hover,
      a:focus {
          color: inherit;
          text-decoration: none;
          transition: all 0.3s;
      }
      .navbar {
          padding: 15px 10px;
          background: #fff;
          border: none;
          border-radius: 0;
          margin-bottom: 40px;
          box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
      }
      .navbar-btn {
          box-shadow: none;
          outline: none !important;
          border: none;
      }
      .line {
          width: 100%;
          height: 1px;
          border-bottom: 1px dashed #ddd;
          margin: 40px 0;
      }
      /* ---------------------------------------------------
          SIDEBAR STYLE
      ----------------------------------------------------- */
      #sidebar {
          width: 250px;
          position: fixed;
          top: 0;
          left: -250px;
          height: 100vh;
          z-index: 999;
          background: #7386D5;
          color: #fff;
          transition: all 0.3s;
          overflow-y: scroll;
          box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
      }
      #sidebar.active {
          left: 0;
      }
      #dismiss {
          width: 35px;
          height: 35px;
          line-height: 35px;
          text-align: center;
          background: #7386D5;
          position: absolute;
          top: 10px;
          right: 10px;
          cursor: pointer;
          -webkit-transition: all 0.3s;
          -o-transition: all 0.3s;
          transition: all 0.3s;
      }
      #dismiss:hover {
          background: #fff;
          color: #7386D5;
      }
      .overlay {
          display: none;
          position: fixed;
          width: 100vw;
          height: 100vh;
          background: rgba(0, 0, 0, 0.7);
          z-index: 998;
          opacity: 0;
          transition: all 0.5s ease-in-out;
      }
      .overlay.active {
          display: block;
          opacity: 1;
      }
      #sidebar .sidebar-header {
          padding: 20px;
          background: #6d7fcc;
      }
      #sidebar ul.components {
          padding: 20px 0;
          border-bottom: 1px solid #47748b;
      }
      #sidebar ul p {
          color: #fff;
          padding: 10px;
      }
      #sidebar ul li a {
          padding: 10px;
          font-size: 1.1em;
          display: block;
      }
      #sidebar ul li a:hover {
          color: #7386D5;
          background: #fff;
      }
      #sidebar ul li.active>a,
      a[aria-expanded="true"] {
          color: #fff;
          background: #6d7fcc;
      }
      a[data-toggle="collapse"] {
          position: relative;
      }
      .dropdown-toggle::after {
          display: block;
          position: absolute;
          top: 50%;
          right: 20px;
          transform: translateY(-50%);
      }
      ul ul a {
          font-size: 0.9em !important;
          padding-left: 30px !important;
          background: #6d7fcc;
      }
      ul.CTAs {
          padding: 20px;
      }
      ul.CTAs a {
          text-align: center;
          font-size: 0.9em !important;
          display: block;
          border-radius: 5px;
          margin-bottom: 5px;
      }
      a.download {
          background: #fff;
          color: #7386D5;
      }
      a.article,
      a.article:hover {
          background: #6d7fcc !important;
          color: #fff !important;
      }
      /* ---------------------------------------------------
          CONTENT STYLE
      ----------------------------------------------------- */
      #content {
          width: 100%;
          padding: 20px;
          min-height: 100vh;
          transition: all 0.8s;
          position: absolute;
          top: 0;
          right: 0;
      }
    </style>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
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
          <a href="<?=base_url('dashboard')?>"><i class="fas fa-home"></i>Dashboard</a>
        </li>
        <li>
          <a href="<?=base_url('funeralservices')?>"><i class="fas fa-home"></i>Funeral Service Management</a>
        </li>
        <li class="">
          <a class="dropdown-toggle" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-cube"></i>Service Products</a>
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
          <a href="<?=base_url('')?>"><i class="fas fa-home"></i>Inventory</a>
        </li>
        <li>
          <a href="<?=base_url('')?>"><i class="fas fa-home"></i>Scheduling</a>
        </li>
        <li>
          <a href="<?=base_url('')?>"><i class="fas fa-home"></i>Monitoring Bill</a>
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
        <li>
          <a href="<?=base_url('')?>"><i class="fas fa-home"></i>Start to End Transaction Record</a>
        </li>
        <li>
          <a href="<?=base_url('')?>"><i class="fas fa-home"></i>Reports</a>
        </li>
        <li>
          <a href="<?=base_url('')?>"><i class="fas fa-home"></i>Archives</a>
        </li>
      </ul>
    </nav>
  <!-- Page Content  -->
  <div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn btn-info"><i class="fas fa-align-left"></i><span>Menu</span></button>
        <a type="button" id="sidebarCollapse" class="btn btn-danger" href="<?=base_url('logout')?>"><i class="fas fa-align-justify fas fa-user"></i><span style="color: white;">Logout</span></a>
      </div>
    </nav>
    <?php
    } else {
      redirect(base_url('home'));
    } ?>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h4>
          	Edit Service
            <a class="btn btn btn-danger addbtn" href="<?= base_url('funeralservices')?>">Back</a>
          </h4>
        </div>
        <div class="card-body">
          <form action="<?=base_url('update_additional_service/'.$add_service->id)?>" method="post">
            <div class="form-group">
              <label for="">Additional Service Type</label>
              <input type="text" name="additional_serv_type" value="<?= $add_service->additional_serv_type ?>" class="form-control">
              <small><?= form_error('additional_serv_type')?></small>
            </div>

            <div class="form-group">
              <label for="">Description & Details</label>
              <input type="text" name="description_details" value="<?= $add_service->description_details ?>" class="form-control">
              <small><?= form_error('description_details')?></small>
            </div>

            <div class="form-group">
              <label for="">Customization Options</label>
              <input type="text" name="customization_options" value="<?= $add_service->customization_options ?>" class="form-control">
              <small><?= form_error('customization_options')?></small>
            </div>

            <div class="form-group">
              <label for="">Price</label>
              <input type="text" name="price" value="<?= $add_service->price ?>" class="form-control">
              <small><?= form_error('price')?></small>
            </div>

            <div class="form-group mt-2">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>
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
    <!--  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>
