<?php
include("./db.php");
$title="Blog";
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
                            <h2>Blog</h2>
                            <p>Home <span>-</span> Blog</p>
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
                <div class="col-lg-12 mb-12 mb-lg-12">
                    <div class="blog_left_sidebar">

      <?php
       $sql="SELECT * FROM `blog` ORDER BY id DESC";
       $res=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($res)){
        $d=str_split($row['date'],3);
         echo '  <article class="blog_item">
         <div class="blog_item_img">
             <img class="card-img rounded-0" src="./assets/'.$row['image'].'" alt="">
             <a href="#" class="blog_item_date">
                 <h3>'.$d[0].'</h3>
                 <p>'.$d[1].'</p>
             </a>
         </div>

         <div class="blog_details">
             <a class="d-inline-block" href="single-blog.html">
                 <h2>'.$row['heading'].'</h2>
             </a>
             <p>'.$row['description'].'</p>
           </div>
     </article>';
       }
      ?>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

<?php
include("./footer.php");

?>