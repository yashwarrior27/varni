<?php 
include("./db.php");
$title="Painting";
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

<br><br><br><br><br><br>
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
                                 $sqlp="SELECT * FROM `product` WHERE `pnid` = 1001 ORDER BY id DESC";
                                 $resp=mysqli_query($conn,$sqlp);
                                 while($row=mysqli_fetch_assoc($resp)){

                                    echo ' <div class="col-lg-3 col-sm-6">
                                    <div class="single_product_item">
                                        <img src="./assets/'.$row['image'].'" alt="">
                                        <div class="single_product_text">
                                            <h4>'.$row['heading'].'</h4>
                                            <h3>'.$row['price'].'</h3>
                                            <form method="post" >
                                         <button type="submit"
                                         name="cart"
                                          value='.$row['id'].'
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
<?php

include("./footer.php");
?>