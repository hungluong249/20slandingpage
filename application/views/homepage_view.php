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
			<img src="<?php echo site_url('assets/img/head_cover.jpg') ?>" alt="image cover on TOP">
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
			</div>
		</div>
	</div>

	<div class="container-fluid" id="about">
		<div class="row">
			<div class="left col-xs-12 col-md-7">
				<div class="mask wow fadeInUp">
					<img src="https://images.unsplash.com/photo-1511848324154-9df0746e2473?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=cf2dcf5790e86b67fa2616419726fb8e&auto=format&fit=crop&w=634&q=80" alt="image about cover">
				</div>

				<div class="content">
					<h1 class="title-lg wow fadeInLeft">
						Về DIVISION X
					</h1>

					<div class="line-top d-block d-sm-none"></div>

					<p class="paragraph d-block d-sm-none">DIVISION X là dự án của công ty 20sections đào tạo các cá nhân có năng lực trở thành các người sáng tạo nội dung thế hệ tiếp theo. Sứ mệnh của những người sáng tạo nội dung này là truyền cảm hứng, đặc biệt là truyền cảm hứng cho thế hệ trẻ thông qua các phương tiện truyền thông dễ tiếp cận nhất.</p>
					<p class="paragraph d-block d-sm-none">Nội dung liên tục được đội ngũ sáng tạo nội dung xây dựng và làm mới, tạo ra các trào lưu trong cộng đồng</p>
				</div>

			</div>

			<div class="right col-xs-12 col-md-5 wow fadeInUp">
				<div class="line-top"></div>

				<p class="paragraph">DIVISION X là dự án của công ty 20sections đào tạo các cá nhân có năng lực trở thành các người sáng tạo nội dung thế hệ tiếp theo. Sứ mệnh của những người sáng tạo nội dung này là truyền cảm hứng, đặc biệt là truyền cảm hứng cho thế hệ trẻ thông qua các phương tiện truyền thông dễ tiếp cận nhất.</p>
				<p class="paragraph">Nội dung liên tục được đội ngũ sáng tạo nội dung xây dựng và làm mới, tạo ra các trào lưu trong cộng đồng</p>
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
						<img src="<?php echo site_url('assets/img/team/') . $value['image'] ?>" alt="pic of <?php echo $value['name'] ?>">
					</div>
					<div class="content">
						<h3 class="title-sm"><?php echo $value['name'] ?></h3>
						<p class="paragraph"><?php echo $value['job'] ?></p>

						<ul class="list-inline">
							<li class="list-inline-item">
								<?php
								if ($value['facebook'] == 1) {
									echo '<a href="http://' .$value['fb_link'] . '" target="_blank">';
									echo '<i class="fab fa-facebook-square"></i>';
									echo '</a>';
								} else {
									echo '';
								}
								?>
							</li>
							<li class="list-inline-item">
                                <?php
                                if ($value['youtube'] == 1) {
                                    echo '<a href="http://' .$value['yt_link'] . '" target="_blank">';
                                    echo '<i class="fab fa-youtube-square"></i>';
                                    echo '</a>';
                                } else {
                                    echo '';
                                }
                                ?>
							</li>
							<li class="list-inline-item">
                                <?php
                                if ($value['instagram'] == 1) {
                                    echo '<a href="http://' .$value['in_link'] . '" target="_blank">';
                                    echo '<i class="fab fa-instagram"></i>';
                                    echo '</a>';
                                } else {
                                    echo '';
                                }
                                ?>
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
					Influence <br>
					Marketing
				</h1>
			</div>

			<div class="middle col-xs-12 col-md-3">
				<p class="paragraph">
					Giúp thương hiệu lựa chọn đúng ifluencers và có chiến lược, chiến dịch phù hợp và hiệu quả
				</p>
				<p class="paragraph">
					Chúng tôi cùng các thương hiệu xây dựng mối quan hệ lâu dài, bền vũng và hiệu quả với các influencers. Giúp thương hiệu có thể xây dựng một chiến lược sử dụng influencers hiệu quả với những lượng tương tác lớn.
					Các creator của DivisionX sẽ trở thành in house influencers của nhãn hàng, đồng hành với nhãn hàng lâu dài.
				</p>
			</div>

			<div class="right col-xs-12 col-md-6">
				<h3 class="title-sm">
					DANH SÁCH KHÁCH HÀNG
				</h3>

				<div class="list-brand">
					<div class="row">
						<?php for($i = 0; $i < 9; $i++){ ?>
						<div class="item col-6 col-md-4">
							<img src="<?php echo site_url('assets/img/brand/') ?>vcb.jpeg" width="100%" alt="logo brand">
						</div>
						<?php } ?>
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
			<div class="row">
				<div class="left col">
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

				<div class="right col">
					<div id="surveySlider" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
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
											<button class="btn btn-link" type="button" value="0" data-toggle="modal" data-target="#messageNo">
												<h2 class="title-md">No</h2>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
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
							</div>
							<div class="carousel-item">
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
						</div>
					</div>

					<div class="survey-control">
						<button id="sendMessage" class="btn btn-primary disabled" type="button" data-toggle="modal" data-target="">
							SUBMIT
						</button>
						<button id="surveyPrev" class="btn btn-light" href="#surveySlider" role="button" data-slide="prev">
							Back
						</button>
						<button id="surveyNext" class="btn btn-light" href="#surveySlider" role="button" data-slide="next">
							Next
						</button>
						<button id="surveyReset" class="btn btn-light" role="button">
							Reset
						</button>
					</div>
				</div>
			</div>
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

<div class="modal fade" id="messageNo" tabindex="-1" role="dialog" aria-labelledby="messageNoTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h5 class="modal-title" id="messageNoTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Cám ơn bạn đã dành thời gian tìm hiểu chúng tôi!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formModalTitle">CƠ HỘI NGHỀ NGHIỆP</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <?php
                echo form_open_multipart('homepage/get_data_to_send_mail', array('class' => 'form-horizontal'));
                ?>

				<div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_name');
                    echo form_input('contact_name', set_value('contact_name'), 'class="form-control" id="contact_name" placeholder="Họ và tên (*)"');
                    ?>
				</div>

				<div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_mail');
                    echo form_input('contact_mail', set_value('contact_mail'), 'class="form-control" id="contact_mail" placeholder="Nhập Email của bạn (*)"');
                    ?>
				</div>

				<div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_phone');
                    echo form_input('contact_phone', set_value('contact_phone'), 'class="form-control" id="contact_phone" placeholder="Nhập số điện thoại của bạn (*)"');
                    ?>
				</div>

				<div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_address');
                    echo form_input('contact_address', set_value('contact_address'), 'class="form-control" id="contact_address" placeholder="Địa chỉ (*)"');
                    ?>
				</div>

				<div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_message');
                    echo form_textarea('contact_message', set_value('contact_message'), 'class="form-control" id="contact_message" placeholder="Để lại lời nhắn đến với chúng tôi ..."');
                    ?>
				</div>

				<div class="col-xs-12">
                    <?php echo form_submit('submit', 'Gửi đăng ký', 'class="btn btn-primary"'); ?>
				</div>
                <?php echo form_close(); ?>
			</div>
			<!--
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
			-->
		</div>
	</div>
</div>



<!-- MAKE IT WOW -->
<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>animate/animate.min.css">
<script type="text/javascript" src="<?php echo site_url('assets/lib/') ?>wow/wow.min.js"></script>

<!-- Owl Carousel -->
<script src="<?php echo site_url('assets/lib/') ?>owl-carousel/js/owl.carousel.min.js"></script>




<script type="text/javascript">



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