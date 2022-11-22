<?php
include("./db.php");
session_start();
if(isset($_SESSION['id'])){
    header("location:login.php");
}

$title="register";
$fname="";
$lname="";
$email="";
$valmsg="";
if(isset($_POST['submit'])){


    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];

    if($pass!==$cpass){
         $valmsg="*password does not matched";
    }
   else{

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
    
  }
  
include("./header.php");
?>

<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Register</h2>
                            <p>Home <span>-</span> Register</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Allready Registered?</h2>
                            <p>Login Here</p>
                            <a href="./login.php" class="btn_3">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Register Here ! <br>
                                Please Sign Up now</h3>
                            <form class="row contact_form" action="#" method="post" >
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="fname" value="<?= $fname; ?>"placeholder="First name" required>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="lname" value="<?= $lname; ?>"
                                        placeholder="Last name" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="name" name="email" value="<?= $email; ?>"
                                        placeholder="email" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="pass" name="pass" value=""
                                        placeholder="Password"  required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="cpass" name="cpass" value=""
                                        placeholder="Confirm Password"   required>
                                        <p id="text" class="text-danger"><?= $valmsg; ?></p>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" id="subb"  name="submit" class="btn_3" >
                                        Sign up
                                    </button>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- <script>
function check(){
    let p1=document.getElementById('pass').value;
    let p2=document.getElementById('cpass').value;
    if(p1!==p2){
        document.getElementById('text').innerHTML="*password does not matched";
    }
    else{
        document.getElementById('text').innerHTML="";
    }
}  </script> -->
<?php

include("./footer.php");
?>
<script>
    if(<?php if($msg===0){ echo 1;} else{ echo 0;} ?>) {
        alert("invalid username or password");
    }
</script>