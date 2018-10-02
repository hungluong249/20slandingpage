<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf_sitecom_token" />
<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>owl-carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>owl-carousel/css/owl.theme.default.min.css">
<style type="text/css">
	.required.has-error{
		color: red;
	}
	.required.has-error input {
		border: 1px solid red;
	}
	.help-block.hidden{
		display: none;
	}
</style>
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
						<?php if (!empty($value['image'])): ?>
							<?php $value['image'] = 'assets/upload/creator/'.$value['image'];?>
						<?php else: ?>
							<?php $value['image'] = 'assets/img/horizontal.jpg'; ?>
						<?php endif ?>
						<img src="<?php echo site_url($value['image']);?>" alt="pic of <?php echo $value['name'] ?>">
					</div>
					<div class="content">
						<h3 class="title-sm"><?php echo $value['name'] ?></h3>
						<p class="paragraph"><?php echo $value['job'] ?></p>

						<ul class="list-inline">
							<li class="list-inline-item">
								<?php
								if ($value['facebook'] != ''): ?>
									<a href="<?php echo $value['facebook'];?>" target="_blank">
									<i class="fab fa-facebook-square"></i>
									</a>
                                <?php endif ?>
							</li>
							<li class="list-inline-item">
                                <?php
                                if ($value['youtube'] != ''): ?>
                                    <a href="<?php echo $value['youtube'];?>" target="_blank">
                                    <i class="fab fa-youtube-square"></i>
                                    </a>
                                <?php endif ?>
							</li>
							<li class="list-inline-item">
                                <?php if ($value['instagram'] != ''): ?> 
                                    <a href="<?php echo $value['instagram'];?>" target="_blank">
                                    	<i class="fab fa-instagram"></i>
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
									<?php if (!empty($service['content'])): ?>
										<p class="paragraph"><?php echo $service['content'];?></p>
									<?php endif;?>
									<div class="row">
										<?php $service['description'] = json_decode($service['description']);?>
										<?php if (!empty($service['description'])): ?>
											<?php foreach ($service['description'] as $key => $value): ?>
												<div class="item col">
													<p class="paragraph"><?php echo $value ?></p>
												</div>
											<?php endforeach; ?>
										<?php endif ?>
									</div>

								</div>
							</div>
						</div>

						<div class="right d-none d-sm-block col-md-7">
							<div class="d-flex flex-row justify-content-between">
								<?php $service['image'] = json_decode($service['image']);?>
								<?php if (empty($service['avatar'])): ?>
									<?php if (empty($service['image'])): ?>
										<?php $img1 = 'assets/img/horizontal.jpg';?>
									<?php else: ?>
										<?php 
											$img1 = 'assets/upload/post/'.$service['image'][0];
											unset($service['image'][0]);
											$service['image'] = array_values($service['image']);
										?>
									<?php endif ?>
								<?php else: ?>
									<?php $img1 = 'assets/upload/post/'.$service['avatar'];?>
								<?php endif ?>
								<?php
									if (!empty($service['avatar'])) {
							            $k = array_search($service['avatar'], $service['image']);
							            unset($service['image'][$k]);
							            $service['image'] = array_values($service['image']);
									}
									$img2 = empty($service['image']) ? 'assets/img/horizontal.jpg' : 'assets/upload/post/'.$service['image'][0];
								?>
								<div class="mask" id="mask-01">
									<img src="<?php echo site_url($img1) ?>" alt="image of <?php echo $service['title'] ?> 01">
								</div>
								<div class="mask" id="mask-02">
									<img src="<?php echo site_url($img2) ?>" alt="image of <?php echo $service['title'] ?> 02">
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
						<?php if (!empty($question['image_top'])): ?>
							<?php $question['image_top'] = 'assets/upload/question/'.$question['image_top'];?>
						<?php else: ?>
							<?php $question['image_top'] = 'assets/img/horizontal.jpg'; ?>
						<?php endif ?>
						<img src="<?php echo site_url($question['image_top']);?>" alt="image slider top 01">
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

					<?php if (!empty($job_opportunity)): ?>
						<?php $job_opportunity['description'] = json_decode($job_opportunity['description']); ?>
						<div class="row">
							<?php if (!empty($job_opportunity['description'])): ?>
								<div class="col ">
									<?php foreach ($job_opportunity['description'] as $key => $value): ?>
										<?php if ($key%2 == 0): ?>
											<p class="paragraph">
												<?php echo $value;?>
											</p>
										<?php endif ?>
									<?php endforeach ?>
								</div>
								<div class="col ">
									<?php foreach ($job_opportunity['description'] as $key => $value): ?>
										<?php if ($key%2 != 0): ?>
											<p class="paragraph">
												<?php echo $value;?>
											</p>
										<?php endif ?>
									<?php endforeach ?>
								</div>
							<?php endif ?>
						</div>
					<?php endif ?>
				</div>

				<div class="right col">
					<div id="surveySlider" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							
							<div class="carousel-item active">
								<div class="step" id="step-01">
									<h3 class="title-sm">
										1. <?php echo $question['question']['question'][0];?>
									</h3>
									<div class="row">
										<?php foreach ($question['question']['content'][0] as $k => $val): ?>
											<div class="item col-md-4">
												<button class="btn btn-link" <?php echo ($k == 0)?' href="#surveySlider" id="yes-activated" role="button" ':' id="no-activated" type="button" data-toggle="modal" data-target="#messageNo" ';?> value="<?php echo $k;?>">
													<h2 class="title-md"><?php echo $val;?></h2>
												</button>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="step" id="step-02">
									<h3 class="title-sm">
										2. <?php echo $question['question']['question'][1];?>
									</h3>
									<div class="row">
										<?php foreach ($question['question']['content'][1] as $k => $val): ?>
											<?php if (empty($question['question']['title'][1][$k]) && empty($question['question']['content'][1][$k])): ?>
												<?php continue; ?>
											<?php endif ?>
											<div class="item col-md-4">
												<button class="btn btn-link" role="button" value="<?php echo $k;?>">
													<h3 class="title-sm"><?php echo $question['question']['title'][1][$k];?></h3>
													<p class="paragraph">
														<?php echo $question['question']['content'][1][$k];?>
													</p>
												</button>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="step" id="step-03">
									<h3 class="title-sm">
										3. <?php echo $question['question']['question'][2];?>
									</h3>
									<div class="row">
										<?php if (!empty($question['question']['content'][2])): ?>
											<?php foreach ($question['question']['content'][2] as $k => $val): ?>
												<div class="item col-md-4">
													<button class="btn btn-link" role="button" value="<?php echo $k;?>">
														<h3 class="title-sm"><?php echo $val;?></h3>
													</button>
												</div>
											<?php endforeach ?>
										<?php endif ?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="survey-control">
						<button id="sendMessage" class="btn btn-primary disabled" type="button" data-toggle="modal" data-target="">
							SUBMIT
						</button>
						<button id="surveyPrev" class="btn btn-light" disabled href="#surveySlider" role="button" data-slide="prev">
							Back
						</button>
						<button id="surveyNext" class="btn btn-light " disabled href="#surveySlider" role="button" data-slide="next">
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
						<?php if (!empty($question['image_bottom'])): ?>
							<?php $question['image_bottom'] = 'assets/upload/question/'.$question['image_bottom'];?>
						<?php else: ?>
							<?php $question['image_bottom'] = 'assets/img/horizontal.jpg'; ?>
						<?php endif ?>
						<img src="<?php echo site_url($question['image_bottom']);?>" alt="image slider top 02">
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

				<div class="form-group col-xs-12 required">
                    <?php
                    echo form_error('contact_name');
                    echo form_input('contact_name', set_value('contact_name'), 'class="form-control" id="contact_name" placeholder="Họ và tên (*)"');
                    ?>
                    <span class="help-block hidden">Vui lòng nhập trường này</span>
				</div>

				<div class="form-group col-xs-12 required">
                    <?php
                    echo form_error('contact_mail');
                    echo form_input('contact_mail', set_value('contact_mail'), 'class="form-control" id="contact_mail" placeholder="Nhập Email của bạn (*)"');
                    ?>
                    <span class="help-block hidden">Vui lòng nhập trường này</span>
				</div>

				<div class="form-group col-xs-12 required">
                    <?php
                    echo form_error('contact_phone');
                    echo form_input('contact_phone', set_value('contact_phone'), 'class="form-control"  onpaste="return false;" onkeypress=" return isNumberKey(event)" id="contact_phone" placeholder="Nhập số điện thoại của bạn (*)"');
                    ?>
                    <span class="help-block hidden">Vui lòng nhập trường này</span>
				</div>

				<div class="form-group col-xs-12 required">
                    <?php
                    echo form_error('contact_address');
                    echo form_input('contact_address', set_value('contact_address'), 'class="form-control" id="contact_address" placeholder="Địa chỉ (*)"');
                    ?>
                    <span class="help-block hidden">Vui lòng nhập trường này</span>
				</div>

				<div class="form-group col-xs-12">
                    <?php
                    echo form_error('contact_message');
                    echo form_textarea('contact_message', set_value('contact_message'), 'class="form-control" id="contact_message" placeholder="Để lại lời nhắn đến với chúng tôi ..."');
                    ?>
				</div>

				<div class="col-xs-12">
                    <input type="button" class="btn btn-primary" id="sendmail"  onclick="send_mail()" value="Gửi đăng ký" />
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
<script src="<?php echo site_url('assets/js/homepage.js') ?>"></script>



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