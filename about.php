<?php
include("./db.php");
$title="About";
session_start();
include("./header.php");

?>
 <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>About us</h2>
                            <p>Home <span>-</span> About us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Blog Area =================-->
    <section class="blog_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-6 mb-sm-12">

                         <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="img/logo1.png" alt="">
                                </div>

                        </article>

                    </div>
                    <div class="col-lg-6 mb-6 mb-sm-12">

                             <article class="blog_item">

<?php
$sql="SELECT * FROM `about`";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
?>


                            <div class="blog_details">
                                    <a class="d-inline-block" href="single-blog.html">
                                        <h2><?= $row['heading'] ?></h2>
                                    </a>
                                    <p><?= $row['description'] ?></p>
                                  </div>
                            </article>

                        </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


<?php
include("./footer.php");
?>