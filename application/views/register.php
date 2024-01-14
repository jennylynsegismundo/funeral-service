<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User's Log In and Registration</title>
  </head>

  <body style="background-color: ">
    <!--Form for register account-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="card" style="margin-top: 50px;">
            <h5 class="card-header text-center" style="background-color: #61677A; color: white;">Register Account</h5>
            <div class="card-body">
              <form method="post" autocomplete="off" action="<?=base_url('RegisterAccount')?>">

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                  <input type="text" placeholder="User Name" name="username" class="form-control" id="name" aria-describedby="name">
                  
                </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email Address</label>
                  <input type="email" placeholder="Email Address" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" placeholder="Password" name="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>


              </form>
              <div class="mt-2 text-center">
                <p>Have Already an Account? <a href="<?=base_url('home')?>">Sign to Login</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4"></div>
      </div>
    </div>

<!---->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>