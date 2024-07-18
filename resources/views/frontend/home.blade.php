@extends('layouts.index')

@section('content')
    	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Rinso New <br>Collection!</h1>
									<p>Rinso, Bersih Total Tanpa Bekas Noda!</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="/checkouts"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Add to Bag</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="asset/img/rinso/rinso-molto-deterjen-bubuk-royal-gold banner.png" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h1>Rinso New <br>Collection!</h1>
									<p>Rinso, Bersihnya Terlihat, Harumnya Terasa!</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="/checkout"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Add to Bag</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="asset/img/rinso/rinso-molto-deterjen-cair-japanese-peach.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->
	<br>
	<br>

	<!-- product section -->
	<section class="food_section layout_padding-bottom">
		<div class="container">
	
		  <div class="filters-content">
			<div class="row grid">
                @foreach ($products as $product)
                <div class="col-sm-6 col-lg-4 all food">
                    <div class="box">
                      <div>
                        <div class="img-box">
                            @if($product->image)
                                    <a href="{{ $product->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $product->image->getUrl('preview') }}">
                                    </a>
                            @endif
                        </div>
                        <div class="detail-box">
                          <h5>
                            {{ $product->name }}
                          </h5>
                          <!-- <p>
                            rusuk sapi yang dibakar dengan campuran bumbu kacang.
                          </p> -->
                          <div class="options">
                            <h6>
                              Rp. {{ $product->price }}
                            </h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
		  </div>
		</div>
	  </section>
	  <br>
	  <br>
	<!-- end product section -->

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
							<a href="https://www.instagram.com/rinsoid?igsh=dm1yejZoNXA5a2ow"><i class="fa fa-instagram"></i></a>
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
@endsection