@extends('layouts.index')
@section('content')
		<!-- Start Banner Area -->
		<section class="banner-area organic-breadcrumb">
			<div class="container">
				<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
					<div class="col-first">
						<h1>Contact Us</h1>
						<nav class="d-flex align-items-center">
							<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
							<a href="">Contact</a>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<!-- End Banner Area -->
	<br>
	<br>
		<!--================Contact Area =================-->
		<section class="contact_area section_gap_bottom">
			<div class="container">
				<div>
					<iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9260771305812!2d106.52331417475101!3d-6.2734507937153055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e420768746c45fb%3A0x192fcb02ae7a563f!2sUniversitas%20Esa%20Unggul%20Kampus%20Tangerang!5e0!3m2!1sid!2sid!4v1713275549957!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
				  </div>
	
					<br>
				<div class="row">
					<div class="col-lg-3">
						<div class="contact_info">
							<div class="info_item">
								<i class="lnr lnr-home"></i>
								<h6>Esa Unggul University</h6>
								<p>Citra Raya Boulevard No.1</p>
							</div>
							<div class="info_item">
								<i class="lnr lnr-phone-handset"></i>
								<h6><a href="#">081398691114</a></h6>
								<p>Everyday and everytime</p>
							</div>
							<div class="info_item">
								<i class="lnr lnr-envelope"></i>
								<h6><a href="https://www.esaunggul.ac.id/tangerang/">esaunggul.com</a></h6>
								<p>Send us your query anytime!</p>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
								</div>
							</div>
							<div class="col-md-12 text-right">
								<button type="submit" value="submit" class="primary-btn">Send Message</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!--================Contact Area =================-->
	
		<!-- start footer Area -->
		<footer class="footer-area section_gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-3  col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<h6>About Us</h6>
							<p>
								Rinso adalah merek deterjen terkemuka yang dipercaya oleh keluarga di seluruh Indonesia untuk menghadirkan cucian bersih dan harum. Dengan teknologi canggih dan formula ramah lingkungan, kami berkomitmen untuk memberikan solusi pencucian terbaik yang efektif dan aman bagi seluruh keluarga. Temukan keunggulan Rinso dan rasakan kebersihan yang nyata setiap hari.
							</p>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<h6>Follow Us</h6>
							<p>Let us be social</p>
							<div class="footer-social d-flex align-items-center">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
					<p class="footer-text m-0">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
					</p>
				</div>
			</div>
		</footer>
		<!-- End footer Area -->
	
		<!--================Contact Success and Error message Area =================-->
		<div id="success" class="modal modal-message fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fa fa-close"></i>
						</button>
						<h2>Thank you</h2>
						<p>Your message is successfully sent...</p>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Modals error -->
	
		<div id="error" class="modal modal-message fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fa fa-close"></i>
						</button>
						<h2>Sorry !</h2>
						<p> Something went wrong </p>
					</div>
				</div>
			</div>
		</div>
		<!--================End Contact Success and Error message Area =================-->
@endsection