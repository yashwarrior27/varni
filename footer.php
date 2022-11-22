    <!--::footer_part start::-->

    <?php
$smsg="";
if(isset($_POST['subscribe'])){
$semail=$_POST['semail'];
$sdate=date('d M');
$subsql="INSERT INTO `newsletter`(`email`, `date`) VALUES ('$semail','$sdate')";
$subres=mysqli_query($conn,$subsql);
print_r($subres);
if($subres){
  $smsg="subscribe";
}
else{
  $smsg="unsubscribe";
}

}

?>


    <footer class="footer_part">
       <div class="container">
         <div class="row justify-content-around">
           <div class="col-sm-6 col-lg-3">
             <div class="single_footer_part">
               <h4>Shop</h4>
               <ul class="list-unstyled">
                 <li><a href="">Managed Website</a></li>
                 <li><a href="">Manage Reputation</a></li>
               </ul>
             </div>
           </div>
           <div class="col-sm-6 col-lg-3">
             <div class="single_footer_part">
               <h4>Pages</h4>
               <ul class="list-unstyled">
                 <li><a href="">Privacy & Policy</a></li>
                 <li><a href="">Terms & Conditions</a></li>
                 <li><a href="">Return & Refund</a></li>
               </ul>
             </div>
           </div>
           <div class="col-sm-6 col-lg-6">
             <div class="single_footer_part">
               <h4>Newsletter</h4>
               <p>Sign Up For Latest News
               </p>
               <div id="mc_embed_signup " style="text-align:end;">
               
                <h3 class="text-success tex-center" > <?php if($smsg=="subscribe"){echo "Thanks For Subscribe";}else{echo "";} ?> </h3>

                 <form method="post" class="<?php if($smsg=="subscribe"){echo "d-none";}else{echo "";}?>"  
                id="idOfForm"
                 >
                   <input type="email" name="semail" id="newsletter-form-email" placeholder="Email Address"
                     class="placeholder hide-on-focus form-control <?php if($smsg=="subscribe"){echo "d-none";}else{echo "";}?> " onfocus="this.placeholder = ''"
                     onblur="this.placeholder = ' Email Address '"  >
                     <p class="text-danger" id="subp"></p>
                   <button type="submit" name="subscribe" id="newsletter-submit"
                     class=" btn btn-danger mt-3 email_icon newsletter-submit button-contactForm <?php if($smsg=="subscribe"){echo "d-none";}else{echo "";}?> " onclick="subsch()">subscribe</button>
                   <div class="mt-10 info"></div>
                 </form>
               </div>
             </div>
           </div>
         </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://acunec.com" target="_blank">Acunec.</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </footer>

<script>
function subsch(){
  let subs=document.getElementById("newsletter-form-email").value;
if(subs==""){
  var form = document.getElementById("idOfForm");
form.onsubmit = function() {
  return false;
}
document.getElementById('subp').innerHTML="*Please Enter a Email";
}
else{
  var form = document.getElementById("idOfForm");
form.onsubmit = function() {
  return true;
}
document.getElementById('subp').innerHTML="";
}
}
</script>


    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>
