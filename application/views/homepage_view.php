<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>owl-carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>owl-carousel/css/owl.theme.default.min.css">

<div class="nav-side" id="nav-side">
	<ul>
		<li>
			<a href="#about">
				Về DIVISION X
			</a>
		</li>
		<li>
			<a href="#creators">
				CREATOR CỦA CHÚNG TÔI
			</a>
		</li>
		<li>
			<a href="#marketing">
				Influence Marketing
			</a>
		</li>
		<li>
			<a href="#services">
				Dịch vụ của chúng tôi
			</a>
		</li>
		<li>
			<a href="#career">
				CƠ HỘI NGHỀ NGHIỆP
			</a>
		</li>
		<li>
			<a href="#contact">
				LIÊN HỆ
			</a>
		</li>
	</ul>
</div>

<section id="homepage" style="">

	<div class="cover container-fluid" id="top">
		<div class="mask">
			<?php if (!empty(json_decode($banner['image'],true)['avata'])): ?>
				<?php $img = 'assets/upload/banner/'.json_decode($banner['image'],true)['avata'];?>
			<?php else: ?>
				<?php $img = 'assets/img/horizontal.jpg';?>
			<?php endif ?>
			<img src="<?php echo site_url($img) ?>" alt="image cover on TOP">
		</div>

		<div class="overlay"></div>

		<div class="content">
			<div class="row">
				<div class="left col-xs-12 col-md-4">
					<h1 class="title-lg">
						Division X
					</h1>
				</div>

				<div class="right col-xs-12 col-md-8">
					<ul>
						<li>
							<a href="#about">
								<?php echo $division_x['title']; ?>
							</a>
						</li>
						<li>
							<a href="#creators">
								CREATOR CỦA CHÚNG TÔI
							</a>
						</li>
						<li>
							<a href="#marketing">
								<?php echo $influence_marketing['title']; ?>
							</a>
						</li>
						<li>
							<a href="#services">
								Dịch vụ của chúng tôi
							</a>
						</li>
						<li>
							<a href="#career">
								CƠ HỘI NGHỀ NGHIỆP
							</a>
						</li>
						<li>
							<a href="#contact">
								LIÊN HỆ
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid" id="about">
		<div class="row">
			<div class="left col-xs-12 col-md-7">
				<div class="mask wow fadeInUp">
					<img src="<?php echo site_url('assets/upload/post_category/'.$division_x['image']) ?>" width="100%" alt="logo brand">
				</div>

				<div class="content" id="paragraph-sm-none">
					<h1 class="title-lg wow fadeInLeft">
						<?php echo $division_x['title']; ?>
					</h1>

					<div class="line-top d-block d-sm-none"></div>
					<?php echo $division_x['content']; ?>
				</div>

			</div>

			<div class="right col-xs-12 col-md-5 wow fadeInUp">
				<div class="line-top"></div>
				<?php echo $division_x['content']; ?>
			</div>
		</div>
	</div>

	<div class="container-fluid" id="creators">
		<h1 class="title-lg">
			CREATOR <br>
			CỦA CHÚNG TÔI
		</h1>

		<div class="owl-carousel">
			<?php foreach ($result as $key => $value): ?>
				<div class="item">
					<div class="mask">
						<img src="<?php echo site_url('assets/upload/creator/') . $value['image'] ?>" alt="pic of <?php echo $value['name'] ?>">
					</div>
					<div class="content">
						<h3 class="title-sm"><?php echo $value['name'] ?></h3>
						<p class="paragraph"><?php echo $value['job'] ?></p>

						<ul class="list-inline">
							<li class="list-inline-item">
								<?php
								if ($value['facebook'] != ''): ?>
									<a href="<?php echo $value['facebook'];?>" target="_blank">';
									<i class="fab fa-facebook-square"></i>';
									</a>
                                <?php endif ?>
							</li>
							<li class="list-inline-item">
                                <?php
                                if ($value['youtube'] != ''): ?>
                                    <a href="<?php echo $value['youtube'];?>" target="_blank">';
                                    <i class="fab fa-youtube-square"></i>';
                                    </a>
                                <?php endif ?>
							</li>
							<li class="list-inline-item">
                                <?php if ($value['instagram'] != ''): ?> 
                                    <a href="<?php echo $value['instagram'];?>" target="_blank">';
                                    	<i class="fab fa-instagram"></i>';
                                    </a>
                                <?php endif ?>
							</li>
						</ul>
					</div>
				</div>
			<?php endforeach; ?>

<!--			<div class="owl-dots">-->
<!--				<button class="owl-dot" role="button">-->
<!--					<span></span>-->
<!--				</button>-->
<!--			</div>-->
		</div>
	</div>

	<div class="container-fluid" id="marketing">
		<div class="row">
			<div class="left col-xs-12 col-md-3">
				<h1 class="title-lg">
					<?php echo str_replace(' ', '<br>', str_replace('  ', ' ', $influence_marketing['title'])) ?>
				</h1>
			</div>

			<div class="middle col-xs-12 col-md-3">
				<?php echo $influence_marketing['content'];?>
			</div>

			<div class="right col-xs-12 col-md-6">
				<h3 class="title-sm">
					DANH SÁCH KHÁCH HÀNG
				</h3>

				<div class="list-brand">
					<div class="row">
						<?php foreach ($customer as $key => $value): ?>
							<div class="item col-6 col-md-4">
								<img src="<?php echo site_url('assets/upload/customer/'.$value['image']) ?>" width="100%" alt="logo brand">
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid" id="services">
		<div id="serviceSlider" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<?php foreach ($services as $key => $service): ?>
				<div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
					<div class="row">
						<div class="left col-xs-12 col-md-5">
							<div class="d-flex align-items-end">
								<div class="content">
									<h4 class="subtitle-sm">Dịch vụ của chúng tôi</h4>
									<h2 class="title-md">
										<?php echo $service['title'] ?>
									</h2>
									<?php if ($service['desc'] == 1){
										echo '<p class="paragraph">' . $service['description'] . '</p>';
									} ?>
									<div class="row">
										<?php foreach ($service['info'] as $key => $value): ?>
										<div class="item col">
											<p class="paragraph"><?php echo $value ?></p>
										</div>
										<?php endforeach; ?>
									</div>

								</div>
							</div>
						</div>

						<div class="right d-none d-sm-block col-md-7">
							<div class="d-flex flex-row justify-content-between">
								<div class="mask" id="mask-01">
									<img src="<?php echo $service['image_01'] ?>" alt="image of <?php echo $service['title'] ?> 01">
								</div>

								<div class="mask" id="mask-02">
									<img src="<?php echo $service['image_02'] ?>" alt="image of <?php echo $service['title'] ?> 02">
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<a class="carousel-control-next" href="#serviceSlider" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

			<!--
			<a href="#serviceSlider" class="btn btn-light" role="button" data-slide="next">
				NEXT <i class="fas fa-arrow-right"></i>
			</a>
			-->
		</div>
	</div>

	<div class="container-fluid" id="career">
		<div id="sliderTop">
			<ul>
				<li class="">
					<div class="mask">
						<img src="https://images.unsplash.com/photo-1534844624972-72af3082566e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=0d231b116fd868277d1e13e6cc55da2c&auto=format&fit=crop&w=1051&q=80" alt="image slider top 01">
					</div>
				</li>
				<li>
					<div class="mask">
						<img src="https://images.unsplash.com/photo-1526455026374-a105e60a65a3?ixlib=rb-0.3.5&s=8c1d012fcdefbc4c0b1ed15282115ce4&auto=format&fit=crop&w=1092&q=80" alt="image slider top 02">
					</div>
				</li>
				<li>
					<div class="mask">
						<img src="https://images.unsplash.com/photo-1524749292158-7540c2494485?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ab5846a70b2ce31cf27899249b229b1e&auto=format&fit=crop&w=1050&q=80" alt="image slider top 03">
					</div>
				</li>
			</ul>
		</div>

		<div class="content">
			<h1 class="title-lg">
				CƠ HỘI <br>
				NGHỀ NGHIỆP
			</h1>
			<div class="row">
				<div class="col ">
					<p class="paragraph">
						Tại 20sections và Division X mỗi thành viên đều là những mảnh ghép vô cùng quan trọng, tại đây chúng ta đối đầu với thách thức và thử thách sự phi thường của bản thân.
					</p>

					<p class="paragraph">
						Dù bạn ở vị trí công việc, thuộc team nào bạn cũng đang đóng góp sức mình để tạo ra ảnh hưởng tới hàng triệu người Việt trẻ.
					</p>
				</div>

				<div class="col ">
					<p class="paragraph">
						Không có giới hạn ở DivisionX, tại đây không có gì là bất khả thi, DivisionX là môi trường để bạn phát triển và khai phá những tiềm năng của bản thân và thách thức giới hạn sáng tạo
					</p>
				</div>
			</div>
		</div>

		<div class="quest">
			<div class="wrapper">
				<div class="step" id="step-01">
					<h3 class="title-sm">
						1/ Bạn ấn tượng bởi tầm nhìn và sứ mệnh của chúng tôi?
					</h3>
					<div class="row">
						<div class="item col-md-4">
							<button class="btn btn-link" role="button" value="1">
								<h2 class="title-md">Yes</h2>
							</button>
						</div>

						<div class="item col-md-4">
							<button class="btn btn-link" role="button" value="0">
								<h2 class="title-md">No</h2>
							</button>
						</div>
					</div>
				</div>

				<div class="step" id="step-02">
					<h3 class="title-sm">
						2. Bạn phù hợp với giá trị của chúng tôi
					</h3>
					<div class="row">
						<div class="item col-md-4">
							<button class="btn btn-link" role="button" value="1">
								<h3 class="title-sm">Táo bạo:</h3>
								<p class="paragraph">
									Không ngại dư luận, không ngại rào cản, luôn thách thức các giới hạn
								</p>
							</button>
						</div>

						<div class="item col-md-4">
							<button class="btn btn-link" role="button" value="2">
								<h3 class="title-sm">Tiến hoá</h3>
								<p class="paragraph">
									Sản phẩm của hôm nay đã tốt hơn hôm qua nhưng không thể bằng sản phẩm của ngày mai
								</p>
							</button>
						</div>

						<div class="item col-md-4">
							<button class="btn btn-link" role="button" value="3">
								<h3 class="title-sm">Khác biệt</h3>
								<p class="paragraph">
									Muốn khác biệt, luôn khác biệt. Nghĩ và làm như một người tiên phong, một cá nhân xuất chúng
								</p>
							</button>
						</div>
					</div>
				</div>

				<div class="step" id="step-03">
					<h3 class="title-sm">
						3. Bạn phù hợp với team nào
					</h3>
					<div class="row">
						<div class="item col-md-4">
							<button class="btn btn-link" role="button" value="1">
								<h3 class="title-sm">TVC</h3>
							</button>
						</div>
					</div>
				</div>
			</div>

			<button id="sendMessage" class="btn btn-default" role="button" disabled>
				SUBMIT
			</button>
			<button id="surveyReset" class="btn btn-light" role="button">
				Reset
			</button>

		</div>

		<div id="sliderBottom">
			<ul>
				<li>
					<div class="mask">
						<img src="https://images.unsplash.com/photo-1526455026374-a105e60a65a3?ixlib=rb-0.3.5&s=8c1d012fcdefbc4c0b1ed15282115ce4&auto=format&fit=crop&w=1092&q=80" alt="image slider top 02">
					</div>
				</li>
				<li>
					<div class="mask">
						<img src="https://images.unsplash.com/photo-1524749292158-7540c2494485?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ab5846a70b2ce31cf27899249b229b1e&auto=format&fit=crop&w=1050&q=80" alt="image slider top 03">
					</div>
				</li>
				<li>
					<div class="mask">
						<img src="https://images.unsplash.com/photo-1534844624972-72af3082566e?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=0d231b116fd868277d1e13e6cc55da2c&auto=format&fit=crop&w=1051&q=80" alt="image slider top 01">
					</div>
				</li>
			</ul>
		</div>
	</div>

</section>



<!-- MAKE IT WOW -->
<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>animate/animate.min.css">
<script type="text/javascript" src="<?php echo site_url('assets/lib/') ?>wow/wow.min.js"></script>

<!-- Owl Carousel -->
<script src="<?php echo site_url('assets/lib/') ?>owl-carousel/js/owl.carousel.min.js"></script>




<script type="text/javascript">
	for (var i = 0; i < document.querySelectorAll('#paragraph-sm-none p').length; i++) { 
		document.querySelectorAll('#paragraph-sm-none p')[i].classList.add('d-block'); 
		document.querySelectorAll('#paragraph-sm-none p')[i].classList.add('d-sm-none'); 
	}


    $(document).ready(function() {

        new WOW().init();

        $(".owl-carousel").owlCarousel({
			loop: true,
            margin: 30,
			center: true,
            dotsEach: true,
			responsiveClass: true,
			responsive:{
			    0:{
			        items: 1,
					loop: false
				},
				768:{
			        items: 4
				}
			}
		});
    });
</script>