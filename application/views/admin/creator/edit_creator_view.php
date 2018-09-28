<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Banner
            </small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-body">
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <div class="col-xs-12">
                            <h4 class="box-title">Basic Information</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="image_shared">Hình ảnh đang dùng</label>
                                    <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['image']); ?>" alt="anh-mo-ta" width=150>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Ảnh đại diện', 'image_shared');
                            echo form_error('image_shared');
                            echo form_upload('image_shared', set_value('image_shared'), 'class="form-control"');

                            echo form_label('Họ tên', 'name');
                            echo form_error('name');
                            echo form_input('name', trim($detail['name']), 'class="form-control" id="name"');

                            echo form_label('Công việc', 'job');
                            echo form_error('job');
                            echo form_input('job', trim($detail['job']), 'class="form-control" id="job"');

                            echo form_label('Nhập link facebook nếu có', 'facebook');
                            echo form_error('facebook');
                            echo form_input('facebook', trim($detail['facebook']), 'class="form-control" id="facebook"');

                            echo form_label('Nhập link youtube nếu có', 'youtube');
                            echo form_error('youtube');
                            echo form_input('youtube', trim($detail['youtube']), 'class="form-control" id="youtube"');

                            echo form_label('Nhập link instagram nếu có', 'instagram');
                            echo form_error('instagram');
                            echo form_input('instagram', trim($detail['instagram']), 'class="form-control" id="instagram"');
                            ?>
                        </div>
                        <?php echo form_submit('submit_shared', 'OK', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/script.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/common.js') ?>"></script>

