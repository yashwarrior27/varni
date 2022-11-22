
<?php
include('./db.php');
$title="Registration";

if(isset($_POST['submit'])){

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
 
  $sql="INSERT INTO `register`( `fname`, `lname`, `email`, `password`) VALUES ('$fname','$lname','$email','$pass')";
  $res=mysqli_query($conn,$sql);
  $msg="";
  if($res){
    $msg="Registration successfully";
   header("location:login.php");
  }
  else{
    $msg="Registration Failed";
  }
}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration-form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body style="background-image: url(./img/55.jpg);
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;">   
    <div class="container mt-5" >
        <div class="row justify-content-center">
         <div class="col-lg-5 col-md-6 shadow  pb-3 mb-5 rounded"  style="border: 1px solid white;    background: rgba(0, 0, 0,.4);
         border-radius: 30px !important;">
             <a href="login.php" class="btn text-white"><h6><- Login</h6></a> 
              <h1 class="text-center text-white"> Register</h1>
               <form method="post">
              <div class="form-row">
                <div class="col">
                  <label for="fname" class="text-white">First name</label>
                  <input type="text" class="form-control" name="fname" placeholder="First name" id="fname" required>
                </div>
                <div class="col">
                  <label for="lname" class="text-white">Last name</label>
                  <input type="text" class="form-control" name="lname" placeholder="Last name" id="lname" > 
                </div>
              </div>
              <div class="form-group pt-3">
                <label for="exampleInputEmail1" class="text-white">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address" name="email" required>
                <small id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1" class="text-white">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword2" class="text-white">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                  <label class="form-check-label text-white" for="invalidCheck2">
                    Agree to terms and conditions
                  </label>
                </div>
              </div>
              <button class="btn btn-success btn-lg btn-block" name="submit" type="submit">Register Now</button>
             </form>
            
         </div>
        </div>
    </div>
</body>
</html>