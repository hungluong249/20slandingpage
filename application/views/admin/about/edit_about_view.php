<style type="text/css">
    .image-file{
        display: none;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Giới thiệu
            <small>Chi tiết</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Giới thiệu</a></li>
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
                        <h3 class="box-title">Chi tiết giới thiệu</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="detail-image col-md-12">
                                <label>Hình ảnh <?php echo (count(json_decode($about['image'])) >= 3)? ' (Số hình ảnh đã đủ. Muốn upload ảnh mới vui lòng xóa ảnh cũ!)' : '' ?></label>
                                <div class="row">
                                    <div class="item col-md-12">
                                        <div class="mask-lg row">
                                            <?php foreach (json_decode($about['image']) as $key => $value): ?>
                                                <div class="col-md-2">
                                                    <span class="row_<?php echo $key ?>">
                                                        <img src="<?php echo base_url('assets/upload/about/'.$value) ?>" alt="Image Detail" width="150px">
                                                        <?php echo ($value == $about['avatar'])? '<i class="fa fa-check" aria-hidden="true"></i>' : '' ?>
                                                        <i class="fa fa-times remove-image" aria-hidden="true" onclick="remove_image('about', <?php echo $about['id'] ?>, '<?php echo $value ?>', <?php echo $key ?>)"></i>
                                                    </span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            echo form_open_multipart('admin/about/edit', array('class' => 'form-horizontal'));
                            ?>
                            <div class="form-group col-xs-12">
                                <label for="slug_shared">Slug</label>
                                <input type="text" name="slug_shared" value="<?php echo $about['slug'] ?>" class="form-control" id="slug_shared" readonly="">
                            </div>
                            <?php $count_image = count(json_decode($about['image'])) ?>
                            <input type="hidden" name="count_image" value="<?php echo $count_image   ?>">
                            <div class="detail-info col-xs-12 <?php echo ($count_image >= 3)? 'image-file' : '' ?>">
                                <?php
                                echo form_label('Thêm ảnh vào thư viện (ảnh không quá 1200 KB)', 'image_shared');
                                echo form_error('image_shared');
                                echo form_upload('image_shared[]','','multiple class="form-control" id="image"');
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
                                            echo form_input('title_vi', $about['title_vi'], 'class="form-control" id="title_vi"');
                                            ?>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Nội dung', 'content_vi');
                                            echo form_error('content_vi');
                                            echo form_textarea('content_vi', $about['content_vi'], 'class="tinymce-area form-control" id="content_vi"')
                                            ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="en">
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Title', 'title_en');
                                            echo form_error('title_en');
                                            echo form_input('title_en', $about['title_en'], 'class="form-control" id="title_en"');
                                            ?>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Content', 'content_en');
                                            echo form_error('content_en');
                                            echo form_textarea('content_en', $about['content_en'], 'class="tinymce-area form-control" id="content_en" ')
                                            ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="cn">
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('标题', 'title_cn');
                                            echo form_error('title_cn');
                                            echo form_input('title_cn', $about['title_cn'], 'class="form-control" id="title_cn"');
                                            ?>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('内容', 'content_cn');
                                            echo form_error('content_cn');
                                            echo form_textarea('content_cn', $about['content_cn'], 'class="tinymce-area form-control" id="content_cn" ')
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
