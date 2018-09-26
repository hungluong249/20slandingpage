<div id="slider" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!--
    <ol class="carousel-indicators">
        <li data-target="#slider" data-slide-to="0" class="active"></li>
        <li data-target="#slider" data-slide-to="1"></li>
        <li data-target="#slider" data-slide-to="2"></li>
    </ol>
    -->

    <!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
        <?php if($banner): ?>
            <?php foreach($banner as $key => $value): ?>
                <?php $i = 1; ?>
				<div class="item <?php echo ($key == 0)? 'active' : '' ?>">
					<div class="mask">
						<img src="<?php echo base_url('assets/upload/banner/'. $value['image']) ?>" alt="Image Slide <?php echo $i++; ?>">
					</div>
				</div>
            <?php endforeach; ?>
        <?php endif; ?>
	</div>

    <!-- Controls -->
    <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#slider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

    <div id="scrollBottom">
        <a href="#booking">
            <i class="fa fa-3x fa-angle-down" aria-hidden="true"></i>
        </a>
    </div>
</div>
<!-- End Slider -->

<section class="main-content container-fluid">

    <div class="container content" id="booking">
        <div class="title">
            <h1><?php echo $this->lang->line('book-your-table') ?></h1>
        </div>

        <?php
        echo form_open_multipart('', array('class' => 'form-horizontal'));
        ?>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <?php
                    echo form_label($this->lang->line('your-name') . '(*)', 'contact_name');
                    echo form_error('contact_name');
                    echo form_input('contact_name', set_value('contact_name'), 'class="form-control" id="contact_name"');
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label($this->lang->line('your-mail') . '(*)', 'contact_mail');
                    echo form_error('contact_mail');
                    echo form_input('contact_mail', set_value('contact_mail'), 'class="form-control" id="contact_mail"');
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label($this->lang->line('your-phone') . '(*)', 'contact_phone');
                    echo form_error('contact_phone');
                    echo form_input('contact_phone', set_value('contact_phone'), 'class="form-control" id="contact_phone"');
                    ?>
                </div>
				<!--
				<div class="form-group">
                    <?php
                    echo form_label($this->lang->line('your-address') . '(*)', 'contact_address');
                    echo form_error('contact_address');
                    echo form_input('contact_address', set_value('contact_address'), 'class="form-control" id="contact_address"');
                    ?>
				</div>
				-->
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <?php
                    echo form_label($this->lang->line('your-date') . '(*)', 'contact_date');
                    echo form_error('contact_date');
                    echo form_input('contact_date', set_value('contact_date'),'class="form-control" id="contact_date"');
                    ?>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <?php
                        echo form_label($this->lang->line('your-time') . '(*)', 'contact_time');
                        echo form_error('contact_time');
                        echo form_input('contact_time', set_value('contact_time'),'class="form-control" id="contact_time"');
                        ?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-6">
                        <?php
                        echo form_label($this->lang->line('your-number') . '(*)', 'contact_quantity');
                        echo form_error('contact_quantity');
                        echo form_input('contact_quantity', set_value('contact_quantity'),'class="form-control" id="contact_quantity"');
                        ?>
                    </div>
                </div>

				<div class="row">
					<div class="col-xs-6">
                		<?php echo form_submit('submit', $this->lang->line('submit'), 'class="btn btn-outline"'); ?>
					</div>
					<div class="col-xs-6 visible-xs">
						<!--
						<p><?php echo $this->lang->line('company-address') ?></p>
						<p>Tel: <?php echo $this->lang->line('company-tel') ?> | <?php echo $this->lang->line('company-email') ?></p>
						<p><?php echo $this->lang->line('company-open-time') ?></p>
						<p><?php echo $this->lang->line('company-open-time-start') ?> & <?php echo $this->lang->line('company-open-time-end') ?></p>
						-->
						<a href="tel:+84 913 315 127" class="btn btn-outline" id="clickToCall" role="button">
							<i class="fa fa-phone" aria-hidden="true"></i> Hotline
						</a>
					</div>
				</div>
            </div>
        </div>


        <?php echo form_close(); ?>
    </div>
    <!-- End Contact -->


</section>