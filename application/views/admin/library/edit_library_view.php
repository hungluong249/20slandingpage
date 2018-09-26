<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới
            <small>Thư viện</small>
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
                            <h4 class="box-title">Thư Viện Ảnh</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>

                        <div class="form-group col-xs-12">
                            <label for="image_shared">Hình ảnh đang sử dụng</label>
                            <?php if (is_array($library['image'])): ?>
                                <?php foreach ($library['image'] as $key => $value): ?>
                                    <img src="<?php echo base_url('assets/upload/library/'. $library['slug'] .'/'. $value) ?>" width="150px">
                                <?php endforeach ?>
                            <?php endif ?>
                            
                        </div>

                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Ảnh đại diện', 'image_shared');
                            echo form_error('image_shared');
                            echo form_upload('image_shared[]', '', 'class="form-control" multiple');
                            ?>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Slug', 'slug_shared');
                                echo form_error('slug_shared');
                                echo form_input('slug_shared', $library['slug'], 'class="form-control" id="slug_shared" readonly');
                                ?>
                            </div>
                        </div>
                        <div>
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#vi" aria-controls="vi" role="tab" data-toggle="tab">
                                        <span class="badge">1</span> Tiếng Việt
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#en" aria-controls="en" role="tab" data-toggle="tab">
                                        <span class="badge">2</span> English
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#cn" aria-controls="cn" role="tab" data-toggle="tab">
                                        <span class="badge">3</span> 中国
                                    </a>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="vi">
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('Tiêu đề', 'title_vi');
                                        echo form_error('title_vi');
                                        echo form_input('title_vi', $library['title_vi'], 'class="form-control" id="title_vi"');
                                        ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="en">
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('Title', 'title_en');
                                        echo form_error('title_en');
                                        echo form_input('title_en', $library['title_en'], 'class="form-control" id="title_en"');
                                        ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="cn">
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('标题', 'title_cn');
                                        echo form_error('title_cn');
                                        echo form_input('title_cn', $library['title_cn'], 'class="form-control" id="title_cn"');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_submit('submit_shared', 'OK', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
