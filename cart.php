<?php
include("./db.php");
$title="Cart";
session_start();
$msg="";
if(!isset($_SESSION['id'])){
  header("location:login.php");
}
 
  

if(isset($_POST['delete'])){

  $did=$_POST['delete'];
  $dsql="DELETE FROM `cart` WHERE `id`=$did";
  $dres=mysqli_query($conn,$dsql);
  if($dres){
    $msg="remove successfully ";
  }
}
if(isset($_POST['updatep'])){

  $uid=$_POST['updatep'];
  if($_POST['qun']<5){
    $uqun=$_POST['qun']+1;
    $usql="UPDATE `cart` SET `quantity`=$uqun WHERE id=$uid";
    $ures=mysqli_query($conn,$usql);
    if($ures){
      $msg="update successfully";
    }
  }
  

}
if(isset($_POST['updatem'])){

  $uid=$_POST['updatem'];
  if($_POST['qun']>1){
    $uqun=$_POST['qun']-1;
    $usql="UPDATE `cart` SET `quantity`=$uqun WHERE id=$uid";
    $ures=mysqli_query($conn,$usql);
    if($ures){
      $msg="update successfully";
    }
    
  }
 
}


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
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" >Product</th>
                <th scope="col" class="text-center">Price</th>
                <th scope="col" class="text-center">Quantity</th>
                <th scope="col" class="text-center">Total</th>
                <th scope="col" class="text-center">Remove</th>
              </tr>
            </thead>
            <tbody>
         
            <?php
            $uid=$_SESSION['id'];
            $sql="SELECT * FROM `cart` WHERE `userid` = $uid ORDER BY `id` DESC ";
             $res=mysqli_query($conn,$sql);
          
            $subtotal=0;
            while($row=mysqli_fetch_assoc($res)){
       
              $qun=$row['quantity'];
              $pid=$row['productid'];
              
              $sql2="SELECT * FROM `product` WHERE `id` = $pid";
              $res2=mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($res2);
              $total=$row2['price']*$qun;
              $subtotal=$subtotal+$total;
              echo '
              <tr>
              <td>
                <div class="media">
                  <div class="d-flex" style="width: 50%; justify-content: space-between;" >
                    <img src="./assets/'.$row2['image'].'"  style="max-width:30%; " alt="" />
                    <h3 class="pl-4" style="align-self:center;" >'.$row2['heading'].'</h3>
                  </div>
                </div>
              </td>
              <td class="text-center">
                <h5 class="text-center" >$'.$row2['price'].'</h5>
              </td>
              <td class="text-center">
                <div class="product_count text-center">
                <form method="post" >
                <div class="row" >
                
                <div class="col-4 pr-0">
                <button class="btn btn-outline-danger" name="updatem" value='.$row['id'].' type="submit" ><i class="far fa-minus"></i></button> 
                </div>
                <div class="col-4 p-0">
                <input class="input-number p-0 text-center" style="max-width:100%;" name="qun" type="number" value="'.$qun.'" min="1" max="5" readonly>
                </div>
                <div class="col-4 pl-0">
                <button class="btn btn-outline-primary" name="updatep" value='.$row['id'].' type="submit" ><i class="far fa-plus"></i></button> </div> 
                </div>
               
               </form> 
                </div>
              </td>
              <td class="text-center">
                <h5 class="text-center" >$'.$total.'</h5>
              </td>
              <td class="text-center" > <form method="post" ><button class="btn btn-outline-danger" name="delete" value='.$row['id'].' type="submit" ><i class="far fa-trash"></i></button> </form> </td>
            </tr>
            ';
            }
            ?>
              <tr class="bottom_button">
                <td>
                  <a class="btn_1" href="#">Update Cart</a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="cupon_text float-right">
                    <a class="btn_1" href="#">Close Coupon</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>$<?= $subtotal; ?></h5>
                </td>
              </tr>
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>
                  <div class="shipping_box">
                    <ul class="list">
                      <li>
                        <a href="#">Flat Rate: $5.00</a>
                      </li>
                      <li>
                        <a href="#">Free Shipping</a>
                      </li>
                      <li>
                        <a href="#">Flat Rate: $10.00</a>
                      </li>
                      <li class="active">
                        <a href="#">Local Delivery: $2.00</a>
                      </li>
                    </ul>
                    <h6>
                      Calculate Shipping
                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </h6>
                    <select class="shipping_select">
                      <option value="1">Bangladesh</option>
                      <option value="2">India</option>
                      <option value="4">Pakistan</option>
                    </select>
                    <select class="shipping_select section_bg">
                      <option value="1">Select a State</option>
                      <option value="2">Select a State</option>
                      <option value="4">Select a State</option>
                    </select>
                    <input type="text" placeholder="Postcode/Zipcode" />
                    <a class="btn_1" href="#">Update Details</a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->


<?php

include("./footer.php");
?>