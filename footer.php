		<!-- Footer Start -->
        <footer id="footer-section" class="footer-section">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
						<h4 class="footer-title">about us</h4>
                            <div class="about-widget">
                                <a href="<?=$url?>index"><img src="<?= $url ?>uploads/settings/<?= $websitefetch["site_logo"] ?>" alt="harosa" style="width: 100px;"></a>
                                <p><?= base64_decode($websitefetch['description']) ?></p>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-title">Recent Posts</h4>
                            <ul class="sitemap-widget">
                            <?php 
                                if($websitefetch["office_address"] != ''){
                                ?>
                                <li class="address add" style="padding: 4px  0px;"><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;<?= $websitefetch["office_address"] ?></li>
                                <?php }
                                if($websitefetch['office_phone'] != ''){
                                ?>
                                <li class="phone add" style="padding: 4px  0px;"><i class="fa fa-phone-square" aria-hidden="true"></i> <?= $websitefetch['office_phone'] ?></li>
                                <?php }
                                if($websitefetch['site_email'] != ''){
                                ?>
                                <li class="email add" style="padding: 4px  0px;"><i class="fa fa-envelope" aria-hidden="true"></i> <?= $websitefetch['site_email'] ?></li>
                                <?php 
                                }
                                ?>
                                
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-title">Useful Links</h4>
                            <ul class="sitemap-widget">
                                <li class="active"><a href="<?=$url?>">About Us</a></li>
                                <li><a href="<?=$url?>team">Team Sheet</a></li>
                                <li><a href="<?=$url?>transfer-news">Transfer New</a></li> 
                                <li><a href="<?=$url?>shop">Shop</a></li> 
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-title"><?= content(26) ?></h4>
                            <form class="footer-subscribe" method="post" id="submitNewsletter">
	                            <input type="email" class="form-input" name="email" placeholder="Email">
	                            <input type="submit" class="form-input" value="Subscribe">
	                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="copyright">
                                <p>© 2022 <?= $websitefetch["site_name"] ?>. Developed By <a href="https://xiomstudio.com/" target="_blank">Xiom Software Company</a>. </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="text-right ft-bottom-right">
                                <div class="footer-bottom-share">
                                    <ul>
                                    <?php
									if ($websitefetch["fb_link"] != "") {
									?>
										<li class="facebook"><a href="<?= $websitefetch["fb_link"] ?>" target="_blank" class="active"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<?php } ?>
									<?php
									if ($websitefetch["twitter_link"] != "") {
									?>
										<li class="twitter"><a href="<?= $websitefetch["twitter_link"] ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<?php } ?>
									<?php
									//if ($websitefetch["youtube_link"] != "") {
									?>
										<li class="youtube"><a href="https://www.youtube.com/manutd" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
									<?php //} ?>
									<?php
									if ($websitefetch["insta_link"] != "") {
									?>
										<li class="instagram"><a href="<?= $websitefetch["insta_link"] ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<?php } ?>
									
                                    </ul>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
        
        <!-- Search Modal Start Here -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="fa fa-close"></span>
	        </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="eg: Soccer News" type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End Here -->
        
		<!-- Start scrollUp  -->
		<div id="return-to-top">
			<span>Top</span>
		</div>
		<!-- End scrollUp  -->
        <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="product_modal">
            <div class="modal-dialog my-modal">
                <div class="modal-content">
                    <div class="modal-close-btn">
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- END Modal -->
    </div>
		<!-- all js here -->
		<!-- jquery latest version -->
		<script src="<?=$url?>frontassets/js/jquery.min.js"></script>
		<!-- Menu js -->
		<script src="<?=$url?>frontassets/js/rsmenu-main.js"></script> 
		 <!-- jquery-ui js -->
		<script src="<?=$url?>frontassets/js/jquery-ui.min.js"></script>
		<!-- bootstrap js -->
		<script src="<?=$url?>frontassets/js/bootstrap.min.js"></script>
		<!-- meanmenu js -->
		<script src="<?=$url?>frontassets/js/jquery.meanmenu.js"></script>
		<!-- wow js -->
		<script src="<?=$url?>frontassets/js/wow.min.js"></script>
		<!-- Slick js -->
		<script src="<?=$url?>frontassets/js/slick.min.js"></script>
		<!-- masonry js -->
		<script src="<?=$url?>frontassets/js/masonry.js"></script>
		<!-- magnific-popup js -->
		<!-- owl.carousel js -->
		<script src="<?=$url?>frontassets/js/owl.carousel.min.js"></script>
		<!-- magnific-popup js -->
		<script src="<?=$url?>frontassets/js/jquery.magnific-popup.js"></script>
		<!-- jquery.counterup js -->
		<script src="<?=$url?>frontassets/js/jquery.counterup.min.js"></script>
		<script src="<?=$url?>frontassets/js/waypoints.min.js"></script>
		<!-- main js -->
		<script src="<?=$url?>frontassets/js/main.js"></script>
        <script src="<?= $url ?>frontassets/js/customise.js"></script>
        <script src="<?= $url ?>admin/assets/js/customize.js"></script>
        <script src="<?= $url ?>snackbar/dist/snackbar.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
    include "include/script.php";
    ?>
	</body>
 

</html>
<script>
    <?php 
    if(isset($_GET['codes'])){
        $ssmail =base64_decode($_GET['codes']) ;
        $s_u = mysqli_query($con,"UPDATE `users` SET verify = 1 where email = '$ssmail'");
        if($s_u){
            ?>
            Swal.fire({
  icon: 'success',
  title: 'Done',
  text: 'Your Email Verify Successfully. Now You Can Login',
//   footer: '<a href="">Why do I have this issue?</a>'
});
setTimeout(function () {
          window.open('login', '_self')
        }, 3000);
            <?php
        }
    }
    ?>

    </script>