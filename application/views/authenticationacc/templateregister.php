<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" autocomplete="off" action="<?=base_url('RegisterAccount')?>">
                                <div class="form-group row">
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input name="cust_name" type="text" class="form-control form-control-user" id="" placeholder="Customer Name"aria-describedby="name">
                                      <small class="text-danger font-italic"><?= form_error('username')?></small>
                                  </div>

                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input name="cust_cont_no" type="number" class="form-control form-control-user" id="" placeholder="Customer Contact Number"aria-describedby="name">
                                      <small class="text-danger font-italic"><?= form_error('username')?></small>
                                  </div>

                                  <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                      <input name="cust_address" type="text" class="form-control form-control-user" id="name" placeholder="Customer's Address"aria-describedby="name">
                                      <small class="text-danger font-italic"><?= form_error('username')?></small>
                                  </div>

                                  <div class="col-sm-6 mt-4">
                                      <input type="email" name="email" aria-describedby="emailHelp" class="form-control form-control-user" id="exampleInputEmail1"
                                      placeholder="Email Address">
                                      <small class="text-danger font-italic"><?= form_error('email')?></small>
                                  </div>

                                  <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                    <input name="username" type="text" class="form-control form-control-user" id="name" placeholder="User Name"aria-describedby="name">
                                    <small class="text-danger font-italic"><?= form_error('username')?></small>
                                  </div>

                                  <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                                    <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword1" placeholder="Password">
                                    <small class="text-danger font-italic"><?= form_error('password')?></small>
                                  </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="role">
                                          <option value=""></option>
                                          <option value="customer" <?php if ($this->input->post('role') == 'customer') echo 'selected="selected"'; ?>>Customer</option>
                                          <!-- <option value="admin" <?php if ($this->input->post('role') == 'admin') echo 'selected="selected"'; ?>>Admin</option> -->
                                        </select>
                                        <small class="text-danger font-italic"><?= form_error('role')?></small>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="<?=base_url('home')?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
