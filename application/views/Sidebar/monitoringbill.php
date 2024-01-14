<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Bill Module</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        body {
          font-family: "Lato", sans-serif;
        }

        .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
        }

        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }

        .sidenav a:hover {
          color: #f1f1f1;
        }

        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
        /* Style for the horizontal lines */
        hr {
            border: none;
            height: 2px; /* Adjust the height as needed */
            background-color: white; /* Color of the line */
            opacity: 0.5; /* Adjust the opacity to make it less prominent */
            margin: 5px 0; /* Adjust the margin for spacing */
        }
        /*for funeral service div*/
        .menu{
            text-align: center;
            border: 2px solid #007BFF; /* Change the color code to the primary color */
            padding-bottom: 5px; /* Adjust padding as needed */
            border-radius: 8px;
            background-color: #007BFF;
        }
        .cf{
            margin-top: 10px;

        }
        .total_sched_serv{
            border-radius: 10px;
            /*
            border-color: #01DFD7;
            border-style: solid;
            border-width: 2px;*/
        }
        .pending_task{
            border-radius: 10px;
            /*
            border-color: #58FAF4;
            border-style: solid;
            border-width: 2px;*/
        }
    </style>
</head>
<body>
    <?php
    if ($this->session->userdata('UserLoginSession')) {
        $udata = $this->session->userdata('UserLoginSession');
        $welcomeMessage = 'Monitoring Bill';
        ?>
        <nav class="navbar navbar-dark bg-dark">
            <div class="navbar-nav">
                <span class="" style="font-size:30px;cursor:pointer; color: white; padding-left: 10px" onclick="openNav()">&#9776; Menu</span>
                <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="<?=base_url('dashboard')?>">Dashboard</a>
                  <hr>
                  <a href="<?=base_url('funeralservices')?>">Manage Funeral Service</a>
                  <hr>
                  <a href="<?=base_url('Inventory')?>">Inventory</a>
                  <hr>
                  <a href="<?=base_url('scheduling_module')?>">Scheduler</a>
                  <hr>
                  <a href="#">Start to End Transaction Record</a>
                  <hr>
                  <a href="#">Report</a>
                  <hr>
                  <a href="<?=base_url('archivepage')?>">Archives</a>
                </div>
            </div>
            <a class="navbar-brand"><?php echo $welcomeMessage; ?></a>
            <div class="navbar-nav ml-auto" style="padding-right: 10px;">
                <a class="btn btn-primary ml-auto" href="<?= base_url('logout') ?>">Log Out</a>
            </div>
        </nav>
    <?php
    } else {
        redirect(base_url('home'));
    }
    ?>
    <div class="container mt-4">
        <h1 class="mb-4">Monitoring Bills</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Service Name</th>
                    <th>Total Amount</th>
                    <th>Remaining Balance</th>
                    <th>Payment Status</th>
                    <th>Payment Type</th>
                    <th>View Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Traditional Funeral</td>
                    <td>$5,000.00</td>
                    <td>$2,000.00</td>
                    <td><span class="badge bg-danger">Unpaid</span></td>
                    <td>Partial Payment</td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal2">View</button>
                    </td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>Cremation Service</td>
                    <td>$3,500.00</td>
                    <td>$0.00</td>
                    <td><span class="badge bg-success">Paid</span></td>
                    <td>Full Payment</td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal2">View</button>
                    </td>
                </tr>
                <!-- Add more customer rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Modal for Customer Details -->
    <div class="modal fade" id="detailsModal1" tabindex="-1" aria-labelledby="detailsModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel1">Customer Details - John Doe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add detailed customer information here -->
                    <p><strong>Customer Name:</strong> John Doe</p>
                    <p><strong>Service Name:</strong> Traditional Funeral</p>
                    <p><strong>Total Amount:</strong> $5,000.00</p>
                    <p><strong>Remaining Balance:</strong> $2,000.00</p>
                    <p><strong>Payment Status:</strong> Unpaid</p>
                    <p><strong>Payment Type:</strong> Partial Payment</p>
                    <!-- You can include more details here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Customer Details -->
    <div class="modal fade" id="detailsModal2" tabindex="-1" aria-labelledby="detailsModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel2">Customer Details - Jane Smith</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add detailed customer information here -->
                    <p><strong>Customer Name:</strong> Jane Smith</p>
                    <p><strong>Service Name:</strong> Cremation Service</p>
                    <p><strong>Total Amount:</strong> $3,500.00</p>
                    <p><strong>Remaining Balance:</strong> $0.00</p>
                    <p><strong>Payment Status:</strong> Paid</p>
                    <p><strong>Payment Type:</strong> Full Payment</p>
                    <!-- You can include more details here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
