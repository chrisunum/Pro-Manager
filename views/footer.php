<footer id="footer" style="overflow-x:hidden;"><!--Footer-->
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="single-widget">
							<div class="logo">
								<a href="<?= ROOT ?>assets/"><strong><h3 style="margin:0; margin-top:7px;"><img src="<?= ROOT ?>assets/images/logo.png" width="200px"/></h3></strong></a>
							</div>
							<div style="margin-top:10px;">
								We are motivated with passion, persistence, and the knowledge that whether designing a product, leading a team of designers or managing a showroom, our customer satisfaction is priority.
							</div>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Useful Links</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?= ROOT ?>assets/terms_and_conditions">Terms and conditions</a></li>
								<li><a href="<?= ROOT ?>assets/privacy_policy">Privacy policy</a></li>
								<li><a href="<?= ROOT ?>assets/post_ads">My Ads</a></li>
								<li><a href="<?= ROOT ?>assets/contact_us">contact_us</a></li>
								
							</ul>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

	 <!-- Modal content begin-->

    <!-- The Modal -->
    <div id="myModal2" class="modal2">
      <!-- Modal content -->
      <div id="modal-container">
        <div class="modal-content">
          <span class="close" id="close2">&times;</span>
          <div id="modal-message">
            <p></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal content end-->

    <!-- The Modal -->
    <div id="myLoader" class="modal2">
      <!-- Modal content -->
      <div id="modal-container2">
        
      </div>
    </div>
    <!-- Modal content end-->
	

  
    <script src="<?= ROOT ?>assets/js/jquery.js"></script>
	<script src="<?= ROOT ?>assets/js/bootstrap.min.js"></script>
	<script src="<?= ROOT ?>assets/js/jquery.scrollUp.min.js"></script>
	<script src="<?= ROOT ?>assets/js/price-range.js"></script>
    <script src="<?= ROOT ?>assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?= ROOT ?>assets/js/loader.js"></script>
    <script src="<?= ROOT ?>assets/js/modal.js"></script>
    <script src="<?= ROOT ?>assets/js/eshop.js"></script>
    <script src="<?= ROOT ?>assets/js/main.js"></script>
	<script type="text/javascript" src="<?= ROOT ?>assets/js/slick.js"></script>  
	<?php 
		if(isset($_SESSION['notification'])){
			echo "<script>showModal('".$_SESSION['notification']."')</script>";
			unset($_SESSION['notification']);
		}
	?>
    <script>
    $(document).ready(function(){
	  $('.customer-logos').slick({
	    slidesToShow: 4,
	    slidesToScroll: 1,
	    autoplay: true,
	    autoplaySpeed: 3000,
	    arrows: false,
	    dots: false,
	    pauseOnHover: true,
	    responsive: [{
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 3
	      }
	    }, {
	      breakpoint: 520,
	      settings: {
	        slidesToShow: 2
	      }
	    }]
	  });
	});
  </script>
</body>
</html>