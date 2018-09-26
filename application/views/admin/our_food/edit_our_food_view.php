<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			Món ăn của chúng tôi
			<small>Chi tiết</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#"><i class="fa fa-dashboard"></i> Món ăn</a></li>
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
                        <h3 class="box-title">Chi tiết sự kiện</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="detail-image col-md-12">
                                <label>Hình ảnh</label>
                                <div class="row">
                                    <div class="item col-md-12">
                                        <div class="mask-lg">
                                            <?php if (is_array(json_decode($our_food['image']))): ?>
                                                <?php foreach (json_decode($our_food['image']) as $key => $value): ?>
                                                    <img src="<?php echo base_url('assets/upload/our_food/'.$value) ?>" alt="Image Detail" width="150px">
                                                <?php endforeach; ?>
                                            <?php endif ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            echo form_open_multipart('admin/our_food/edit', array('class' => 'form-horizontal'));
                            ?>
                            <div class="form-group col-xs-12">
                                <label for="slug_shared">Slug</label>
                                <input type="text" name="slug_shared" value="<?php echo $our_food['slug'] ?>" class="form-control" id="slug_shared" readonly="">
                            </div>
                            <div class="detail-info col-xs-12">
                                <?php
                                echo form_label('Thêm ảnh vào thư viện (ảnh không quá 1200 KB)', 'image_shared');
                                echo form_error('image_shared');
                                echo form_upload('image_shared[]','','multiple class="form-control" id="image"');
                                ?>
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
                                            echo form_input('title_vi', $our_food['title_vi'], 'class="form-control" id="title_vi"');
                                            ?>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Nội dung', 'content_vi');
                                            echo form_error('content_vi');
                                            echo form_textarea('content_vi', $our_food['content_vi'], 'class="tinymce-area form-control" id="content_vi"')
                                            ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="en">
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Title', 'title_en');
                                            echo form_error('title_en');
                                            echo form_input('title_en', $our_food['title_en'], 'class="form-control" id="title_en"');
                                            ?>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('Content', 'content_en');
                                            echo form_error('content_en');
                                            echo form_textarea('content_en', $our_food['content_en'], 'class="tinymce-area form-control" id="content_en"')
                                            ?>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="cn">
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('标题', 'title_cn');
                                            echo form_error('title_cn');
                                            echo form_input('title_cn', $our_food['title_cn'], 'class="form-control" id="title_cn"');
                                            ?>
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <?php
                                            echo form_label('内容', 'content_cn');
                                            echo form_error('content_cn');
                                            echo form_textarea('content_cn', $our_food['content_cn'], 'class="tinymce-area form-control" id="content_cn" ')
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
