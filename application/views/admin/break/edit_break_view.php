<style type="text/css">
    .image-file{
        display: none;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Break
            <small>Chi tiết</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Break</a></li>
            <li class="active">Chi tiết</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết break</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="detail-image col-md-12">
                                <label>Hình ảnh</label>
                                <div class="row">
                                    <div class="item col-md-12">
                                        <div class="mask-lg row">
                                            <img src="<?php echo base_url('assets/upload/break/'. $break['image']) ?>" alt="Image Detail" width="150px">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            echo form_open_multipart('admin/break_list/edit/'. $break['id'], array('class' => 'form-horizontal'));
                            ?>
                            <div class="detail-info col-xs-12">
                                <?php
                                echo form_label('Thêm ảnh vào thư viện (ảnh không quá 1200 KB)', 'image_shared');
                                echo form_error('image_shared');
                                echo form_upload('image_shared','','class="form-control" id="image"');
                                ?>
                                <span style="color: red"><?php echo $this->session->flashdata('message_error_image'); ?></span>
                                <br>
                                <br>
                            </div>

                            <div class="col-md-12">

                                <!-- Nav tabs -->
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

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="vi">
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Tiêu đề', 'title_vi');
                                            echo form_error('title_vi');
                                            echo form_input('title_vi', $break['title_vi'], 'class="form-control" id="title_vi"');
                                            ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="en">
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Title', 'title_en');
                                            echo form_error('title_en');
                                            echo form_input('title_en', $break['title_en'], 'class="form-control" id="title_en"');
                                            ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="cn">
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('标题', 'title_cn');
                                            echo form_error('title_cn');
                                            echo form_input('title_cn', $break['title_cn'], 'class="form-control" id="title_cn"');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-info">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-9 btn-submit">
                                        <button type="submit" class="btn btn-primary">
                                            OK
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script type="text/javascript">
    $('.remove-image').click(function(){
        $('.image-file').show();
    })
</script>
