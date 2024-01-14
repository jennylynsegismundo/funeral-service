<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User's Log In and Registration</title>

    <style type="text/css">
      /*body{
        background-image: url('<=base_url('assets/images/bg1.jpg'); ?');
        background-size: cover; Adjust as needed 
        background-position: center; /* Adjust as needed 
        width: 100%; /* Set the width of the element to display the background 
        height: 407px; /* Set the height of the element to display the background 
      }*/
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="card" style="margin-top: 90px; border-color: whitesmoke;">
            <h5 class="card-header text-center" style="background-color: #61677A; color: white;">Log In Account</h5>
            <div class="card-body">
              <form method="post" autocomplete="off" action="<?=base_url('LoginAccount')?>">

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                  <input type="text" placeholder="User Name" name="username" class="form-control" id="name" aria-describedby="name">
                </div>

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password"placeholder="Password" name="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Log In</button>


              </form>
              <div class="mt-2 text-center">
                <p>Create new Account? <a href="<?=base_url('register')?>">Sign to Register</a></p>
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

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
