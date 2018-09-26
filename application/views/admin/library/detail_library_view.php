<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                Thư viện ảnh <p></p>
            </h3>
            <?php if ($this->session->flashdata('message_error')): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('message_error'); ?>
                </div>
            <?php endif ?>
            <?php if ($this->session->flashdata('message_success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('message_success'); ?>
                </div>
            <?php endif ?>
            <div class="row">
                <?php
                    echo form_open_multipart('admin/library/index', array('class' => 'form-horizontal'));
                ?>
                    <a type="button" href="<?php echo site_url('admin/library/create'); ?>" class="btn btn-primary">THÊM MỚI</a>
                    <a type="button" href="<?php echo site_url('admin/library/delete_all/'); ?>" class="btn btn-primary">XÓA HẾT ẢNH</a>
                <?php echo form_close(); ?>
            </div>
            <div>
            <br>
            <br>
            
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />

            </div>
            <?php if ($images): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th style="width: 100px"><b>Ảnh</b></th>
                                    <th style="width: 100px"><b>Tiêu đề</b></th>
                                    <th style="width: 100px"><b>Operations</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($images as $key => $value): ?>
                                    <tr class="remove_<?php echo $value['id'] ?>" >
                                        <td style="width: 100px">
                                            <img src="<?php echo base_url('assets/upload/library/thumb/'. $value['image']) ?>" alt="" style="width: 200px">
                                        </td>
                                        <td>
                                            <table>
                                                <tr class="row_<?php echo $value['id'] ?>" >
                                                    <td class="col-md-3">
														<label>Tiêu đề:</label>
														<br>
                                                        <input type="text" name="title-vi" value="<?php echo $value['title_vi'] ?>" disabled>
                                                    </td>
                                                    <td class="col-md-3">
														<label>Title:</label>
														<br>
                                                        <input type="text" name="title-en" value="<?php echo $value['title_en'] ?>" disabled>
                                                    </td>
                                                    <td class="col-md-3">
														<label>标题:</label>
														<br>
                                                        <input type="text" name="title-cn" value="<?php echo $value['title_cn'] ?>" disabled>
                                                    </td>
                                                    <td class="col-md-3">
                                                        <button class="btn btn-warning btn-edit-<?php echo $value['id'] ?> btn-edit-ok" data-id="<?php echo $value['id'] ?>">Sửa</button>
                                                        <button class="btn btn-success btn-success-<?php echo $value['id'] ?> btn-success-ok" data-id="<?php echo $value['id'] ?>" style="display: none">Ok</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="col-md-6 col-md-offset-5 page">
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        Chưa có thư viện. Vui lòng thêm mới!
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>
</div>
<script src="<?php echo site_url('assets/js/admin/image.js') ?>"></script>
