<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detailbanner.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                Banner
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Banner
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf_seafood_token" />
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <label class="col-xs-12">Hình ảnh</label>
                            <div class="detail-image col-xs-12">
                                <?php if (!empty($detail['image']['image'])): ?>
                                    <?php foreach ($detail['image']['image'] as $key => $value): ?>

                                        <div class="col-sm-4 col-xs-6 row_<?php echo $key;?>" style="position: relative;padding-right:10px;padding-left: 0px; margin-bottom: 10px;">
                                            <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$value); ?>" alt="anh-mo-ta" width=100% height=200px>
                                            <i class="fa-2x fa fa-check <?php echo ($detail['image']['avata'] == $value) ?'avata':''; ?>" style="cursor: pointer; position: absolute;color:<?php echo ($detail['image']['avata'] == $value) ?'green':'black'; ?>; top:0px;right:40px;" onclick="activated_image('<?php echo $controller;?>','<?php echo $value; ?>','<?php echo $key ?>')"></i>
                                            <i class="fa-2x fa fa-times" style="cursor: pointer; position: absolute;color:red; top:0px;right: 15px;" onclick="remove_image_banner('<?php echo $controller;?>','<?php echo $value; ?>','<?php echo $key ?>')"></i>
                                        </div>

                                       <!--  <div class="col-xs-4" style="padding-left: 0px;">
                                            <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$value); ?>" alt="anh-mo-ta" width=100% height=200px>
                                        </div> -->
                                    <?php endforeach ?>
                                <?php else: ?>
                                    Chưa có ảnh
                                <?php endif ?>
                            </div>
                            <div class="detail-info col-md-6 hidden" style="margin-top: 5px;">
                                <label>Status: </label>
                                <?php if ($detail['is_activated'] == 0): ?>
                                    <a class="btn btn-success btn-xs" title="Banner đang bật">Đang  sử dụng </a>
                                <?php else: ?>
                                    <a class="btn btn-warning btn-xs" title="Banner không sử dụng">Không sử dụng</a>
                                <?php endif ?>
                            </div>
                            <div class="col-md-12 hidden" style="margin-top: 5px;">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                                <tr>
                                                    <th style="width: 100px">Tiêu đề: </th>
                                                    <td><?php echo $detail['title'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Giới thiệu: </th>
                                                    <td><?php echo $detail['description'] ?></td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Chỉnh sửa 
                            Banner
                         này?</h3>
                    </div>
                    <div class="box-body">
                        <a href="<?php echo base_url('admin/'.$controller.'/edit') ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>

            <div id="encypted_ppbtn_all"></div>
            <div id="myModal" class="modal">
                <img class="modal-content" id="img01">
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script src="<?php echo site_url('assets/js/admin/') ?>showmodalimg.js"></script>
<script src="<?php echo site_url('assets/js/admin/') ?>detail-banner.js"></script>