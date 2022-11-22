<?php
include("./db.php");
$title="Login";
session_start();

$email ="";
$pass="";
$msg="";
$uname="";
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql="SELECT * FROM `register` WHERE `email`='$email' AND `password`='$pass'";
    $res=mysqli_query($conn,$sql);
 
if(mysqli_num_rows($res)>0){
    $sql1="SELECT * FROM `register` WHERE `email`='$email'";
    $res1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($res1);
    $uname=$row1['fname'];
    $msg="login";
    $_SESSION['uname']=$uname;
     $_SESSION['id']=$row1['id'];
     header("location:index.php");
}
else{
   
   $pass="";
    $msg="failed";
}
}

if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("location:index.php");
}

include("./header.php");
?>

<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Tracking Order</h2>
                            <p>Home <span>-</span> Tracking Order</p>
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
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="./register.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner 
                        <?php if(isset($_SESSION['id'])){
                            echo 'd-none';
                        } else{
                            echo "";
                        }  ?> ">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" action="#" method="post" >
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="name" name="email" value="<?php echo $email; ?>"
                                        placeholder="email" required>
                                        <p class="text-danger"><?php if($msg==="failed"){
                                            echo"*Invalid Id or Password";
                                        }else{
                                            echo"";
                                        } ?></p>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="pass" value="<?php echo $pass; ?>"
                                        placeholder="Password" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit"   name="submit" class="btn_3">
                                        log in
                                    </button>
                                    <a class="lost_pass" href="#">forget password?</a>
                                </div>
                            </form>
                        </div>

                        <div class="d-none text-center  <?php if(isset($_SESSION['id'])){
                            echo 'd-block';
                        } else{
                            echo "";
                        }  ?> " >
                        <h2 class=" pt-4 "> You Already Login - </h2>
                        <form method="post">
                        <button class="btn btn-lg btn-danger mt-4" type="submit" name="logout" >Logout</button>
                        </form>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php

include("./footer.php");
?>
<script>
    if(<?php if($msg===0){ echo 1;} else{ echo 0;} ?>){
        alert("invalid username or password");
    }
</script>