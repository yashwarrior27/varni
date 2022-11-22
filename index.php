<?php
include("db.php");
$title="Home";

session_start();
if(isset($_POST['cart'])){

if(!$_SESSION['id']){
    header("location:login.php");
}

else{

    $uid=$_SESSION['id'];
    $pid=$_POST['cart'];
    
    $sql1="SELECT * FROM `cart` WHERE `userid`=$uid AND `productid`=$pid";
    $res2=mysqli_query($conn,$sql1);
    
    if(mysqli_num_rows($res2)>0){
    $row2=mysqli_fetch_assoc($res2);
    $upid=$row2['id'];
    $qun=$row2['quantity'] + 1;
    
    $upsql="UPDATE `cart` SET`quantity`=$qun WHERE `id`=$upid";
    $upres=mysqli_query($conn,$upsql);
    
    if($upres){
        header("location:cart.php");
    }
    }
    else{
        $sql="INSERT INTO `cart`( `userid`, `productid`,`quantity`) VALUES ($uid,$pid,1)";
        $res=mysqli_query($conn,$sql);
        if($res){
        header("location:cart.php");
        }
    }

}


}
include("./header.php");
?>
   <!-- banner part start-->
   <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h3>Being creative is not a hobby,<br><br></h3><h2> it is a way of life for every artist</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/Shop01_600x.jpg" alt="">
                                </div>
                            </div>
                        </div>
                      <!-- <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Cloth $ Wood Sofa</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="#" class="btn_2">buy now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>Featured Category</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-sm-6">
                    <div>
                        <img src="img/one.jpg" alt="" style="width: 58%;">
                        <br><br>
                        <p>Beatiful Art</p>
                        <h3>Famous artist paintings</h3>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-6">
                    <div>
                        <img src="img/two.jpeg" alt="">
                          <br><br>
                        <p>Explore Art</p>
                        <h3>The modern art gallery</h3>

                    </div>
                </div>
              <!--  <div class="col-lg-5 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="img/feature/feature_3.png" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-sm-6">
                    <div class="single_feature_post_text">
                        <p>Premium Quality</p>
                        <h3>Latest foam Sofa</h3>
                        <a href="#" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                        <img src="img/feature/feature_4.png" alt="">
                    </div>
                </div>-->
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Paintings <span>Modern Paintings</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div>
                            <div class="row align-items-center justify-content-between">


                            <?php
                            
                            $sqlp="SELECT * FROM `product` WHERE `pnid`=1001  ORDER BY id DESC";
                            $resp=mysqli_query($conn,$sqlp);
                            $nump=mysqli_num_rows($resp);
                            $np=0;
                            if($nump>8){
                                $np=8;
                            }
                            else{
                                $np=$nump;
                            }
                            
                            for($i=0;$i<$np;$i++){
                                $rowp=mysqli_fetch_assoc($resp);
                                echo ' <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="./assets/'.$rowp['image'].'" alt="">
                                    <div class="single_product_text">
                                        <h4>'.$rowp['heading'].'</h4>
                                        <h3>$'.$rowp['price'].'</h3>
                                        <form method="post" >
                                        <button type="submit"
                                        name="cart"
                                         value='.$rowp['id'].'
                                        class="btn btn-outline-success"
                                         >+ add to cart</button>
                                       <form/>
                                    </div>
                                </div>
                            </div>';
                            }
                            ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part start-->

<!-- awesome_shop start-->
<section class="our_offer section_padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-6">
                <div class="offer_img">
                    <img src="img/Shop13_600x.jpg" alt="" style="width: 65%;">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="offer_text">
                    <h2>A true artist is not one who is inspired, but one who inspires to motivate others.</h2>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- awesome_shop part start-->

<!-- product_list part start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Strings <span>Modern Strings</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div>
                        <div class="row align-items-center justify-content-between">
                            
                            <?php
                             $sqls="SELECT * FROM `product` WHERE `pnid`=1002 ORDER BY id DESC ";
                            $ress=mysqli_query($conn,$sqls);
                            $nums=mysqli_num_rows($ress);
                            $ns=0;
                            if($nums>8){
                                $ns=8;
                            }
                            else{
                                $ns=$nums;
                            }
                            for($i=0;$i<$ns;$i++){
                                $rows=mysqli_fetch_assoc($ress);
                                echo ' <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <img src="./assets/'.$rows['image'].'" alt="">
                                    <div class="single_product_text">
                                        <h4>'.$rows['heading'].'</h4>
                                        <h3>$'.$rows['price'].'</h3>
                                        <form method="post" >
                                         <button type="submit"
                                         name="cart"
                                          value='.$rows['id'].'
                                         class="btn btn-outline-success"
                                          >+ add to cart<i class="ti-heart"></i></button>
                                        <form/>
                                    </div>
                                </div>
                            </div>';
                            }
                            ?>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Modern Paintings</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                            <div class="row align-items-center justify-content-between">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="img/blog01.jpg" alt="">
                                    </div>
                                    <h2>Impressionism Art</span></h2>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="img/blog02.jpg" alt="">
                                    </div>
                                    <h2>Expressionism Art</span></h2>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="img/blog03.jpg" alt="">
                                    </div>
                                      <h2>Abstract Art</span></h2>
                                </div>

                        </div>

                        </div>
                    </div>
                </div>
    </section>

<br><br><br><br>
    <!-- subscribe_area part start-->
    <section class="subscribe_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="subscribe_area_text text-center">
                    <br><br><br><br><br><br><br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->

    <!-- feature_part start-->
    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7 col-sm-6">
                    <div>
                        <img src="img/three.webp" alt="">
                          <br><br>
                        <p>Imaginative</p>
                        <h3>Original artworks & paintings</h3>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <div>
                        <img src="img/four.webp" alt="" style="width: 70%;">
                        <br><br>
                        <p>Special Art</p>
                        <h3>Personalized oil paintings</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->
    <?php
    include("./footer.php");
    ?>