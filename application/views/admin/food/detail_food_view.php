<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>Món ăn</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-body">
                        <div class="col-xs-12">
                            <h4 class="box-title">Thông tin cơ bản</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>

                        </div>
                        <div class="form-group col-xs-12">
                            <label for="image_shared">Hình ảnh đang sử dụng</label>
                            <?php if (is_array($food['image'])): ?>
                                <?php foreach ($food['image'] as $key => $value): ?>
                                    <span class="row_<?php echo $key ?>">
                                        <img src="<?php echo base_url('assets/upload/food/'. $food['slug'] .'/'. $value) ?>" width="150px">
                                        <i class="fa fa-times" aria-hidden="true" onclick="remove_image('food', <?php echo $food['id'] ?>, '<?php echo $value ?>', <?php echo $key ?>)"></i>
                                    </span>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Slug', 'slug_shared');
                                echo form_error('slug_shared');
                                echo form_input('slug_shared', $food['slug'], 'class="form-control" id="slug_shared" readonly');
                                ?>
                            </div>
                        </div>
                        
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />

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
                                <div role="tabpanel" class="tab-pane active detail-info" id="vi">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 100px">Tiêu đề: </th>
                                                    <td><?php echo $food['title_vi'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Giới thiệu: </th>
                                                    <td><?php echo $food['description_vi'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Nội dung: </th>
                                                    <td><?php echo $food['content_vi'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="en">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 100px">Title: </th>
                                                    <td><?php echo $food['title_en'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Description: </th>
                                                    <td><?php echo $food['description_en'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Content: </th>
                                                    <td><?php echo $food['content_en'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="cn">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 100px">标题: </th>
                                                    <td><?php echo $food['title_cn'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">介绍: </th>
                                                    <td><?php echo $food['description_cn'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">内容: </th>
                                                    <td><?php echo $food['content_cn'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
