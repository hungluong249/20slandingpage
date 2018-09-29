<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detailbanner.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                Question
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Question
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
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
                            <div class="col-md-12" style="margin-top: 5px;">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th style="width: 10px">Stt </th>
                                                <th style="width: 80px">Câu hỏi </th>
                                                <th style="width: 150px">Lựa chọn </th>
                                            </tr>
                                            <?php foreach ($detail['question']['question'] as $key => $value): ?>
                                                <tr>
                                                    <td><?php echo $key+1;?></td>
                                                    <td><?php echo $value;?></td>
                                                    <td>
                                                        <?php if (!empty($detail['question']['content'][$key])): ?>
                                                            <?php foreach ($detail['question']['content'][$key]  as $k => $val): ?>
                                                                <?php if ($key == 1): ?>
                                                                    <?php if ($k == 0): ?>
                                                                        <table class="table table-striped">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th style="width: 50px">Tiêu đề</th>
                                                                                <th style="width: 150px">Nội dung</th>
                                                                            </tr>
                                                                    <?php endif ?>

                                                                            <tr>
                                                                                <td><?php echo $detail['question']['title'][$key][$k]; ?></td>
                                                                                <td><?php echo $val; ?></td>
                                                                            </tr>
                                                                    <?php if ($k == 2): ?>
                                                                            </tbody>
                                                                        </table>
                                                                    <?php endif ?>
                                                                <?php else: ?>
                                                                    <?php echo $val.(($k+1 < count($detail['question']['content'][$key]))? '/': ''); ?>
                                                                <?php endif ?>
                                                                
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="detail-image col-md-6">
                                <label>Hình ảnh top</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['image_top']); ?>" alt="anh-mo-ta" width=100% height=200>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-image col-md-6">
                                <label>Hình ảnh bottom</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['image_bottom']); ?>" alt="anh-mo-ta" width=100% height=200>
                                    </div>
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
                            Question
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
