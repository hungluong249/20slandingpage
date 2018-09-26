<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới
            <small>Sự kiện</small>
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
                            <?php
                            echo form_label('Ảnh đại diện', 'image_shared');
                            echo form_error('image_shared');
                            echo form_upload('image_shared', set_value('image_shared'), 'class="form-control"');
                            ?>
                            <br>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Slug', 'slug_shared');
                                echo form_error('slug_shared');
                                echo form_input('slug_shared', set_value('slug_shared'), 'class="form-control" id="slug_shared" readonly');
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Meta Keywords', 'metakeywords_shared');
                                echo form_error('metakeywords_shared');
                                echo form_input('metakeywords_shared', set_value('metakeywords_shared'), 'class="form-control" id="metakeywords_shared"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Meta Description', 'metadescription_shared');
                                echo form_error('metadescription_shared');
                                echo form_input('metadescription_shared', set_value('metadescription_shared'), 'class="form-control" id="metadescription_shared"');
                                ?>
                            </div>
                        </div>
						<!-- Delete
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Private Rooms', 'privaterooms_shared');
                                echo form_error('privaterooms_shared');
                                echo form_input('privaterooms_shared', set_value('privaterooms_shared'), 'class="form-control" id="privaterooms_shared"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Private Floors', 'privatefloors_shared');
                                echo form_error('privatefloors_shared');
                                echo form_input('privatefloors_shared', set_value('privatefloors_shared'), 'class="form-control" id="privatefloors_shared"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Full Restaurant', 'fullrestaurant_shared');
                                echo form_error('fullrestaurant_shared');
                                echo form_input('fullrestaurant_shared', set_value('fullrestaurant_shared'), 'class="form-control" id="fullrestaurant_shared"');
                                ?>
                            </div>
                        </div>
                        -->
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
                                        echo form_input('title_vi', set_value('title_vi'), 'class="form-control" id="title_vi"');
                                        ?>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('Giới thiệu', 'description_vi');
                                        echo form_error('description_vi');
                                        echo form_textarea('description_vi', set_value('description_vi', '', false), 'class="form-control" rows="5" ')
                                        ?>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('Nội dung', 'content_vi');
                                        echo form_error('content_vi');
                                        echo form_textarea('content_vi', set_value('content_vi', '', false), 'class="tinymce-area form-control"')
                                        ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="en">
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('Title', 'title_en');
                                        echo form_error('title_en');
                                        echo form_input('title_en', set_value('title_en'), 'class="form-control" id="title_en"');
                                        ?>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('Description', 'description_en');
                                        echo form_error('description_en');
                                        echo form_textarea('description_en', set_value('description_en', '', false), 'class="form-control" rows="5" ')
                                        ?>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('Content', 'content_en');
                                        echo form_error('content_en');
                                        echo form_textarea('content_en', set_value('content_en', '', false), 'class="tinymce-area form-control"')
                                        ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="cn">
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('标题', 'title_cn');
                                        echo form_error('title_cn');
                                        echo form_input('title_cn', set_value('title_cn'), 'class="form-control" id="title_cn"');
                                        ?>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('介绍', 'description_cn');
                                        echo form_error('description_cn');
                                        echo form_textarea('description_cn', set_value('description_cn', '', false), 'class="form-control" rows="5" ')
                                        ?>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <?php
                                        echo form_label('内容', 'content_cn');
                                        echo form_error('content_cn');
                                        echo form_textarea('content_cn', set_value('content_cn', '', false), 'class="tinymce-area form-control"')
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
