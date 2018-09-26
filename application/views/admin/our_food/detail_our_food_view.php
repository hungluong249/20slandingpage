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
                            <div class="detail-image col-md-12">
                                <label>Hình ảnh (Click vào ảnh để chọn ảnh làm Avatar)</label>
                                <div class="row">
                                    <div class="item col-md-12">
                                        <div class="mask-lg row">
                                            <?php foreach (json_decode($our_food['image']) as $key => $value): ?>
                                                <div class="col-md-2">
                                                    <span onclick="active_avatar('our_food', '<?php echo $value ?>')" style="cursor: pointer;">
                                                        <img src="<?php echo base_url('assets/upload/our_food/'.$value) ?>" alt="Image Detail" width="150px">
                                                        <?php echo ($value == $our_food['avatar'])? '<i class="fa fa-check" aria-hidden="true"></i>' : '' ?>
                                                    </span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 100px">Slug: </th>
                                        <td><?php echo $our_food['slug'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
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
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="vi">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <tbody>
                                                <tr>
                                                    <th style="width: 100px">Tiêu đề: </th>
                                                    <td><?php echo $our_food['title_vi'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Nội dung: </th>
                                                    <td><?php echo $our_food['content_vi'] ?></td>
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
                                                    <td><?php echo $our_food['title_en'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Content: </th>
                                                    <td><?php echo $our_food['content_en'] ?></td>
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
                                                    <td><?php echo $our_food['title_cn'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">内容: </th>
                                                    <td><?php echo $our_food['content_cn'] ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="<?php echo base_url('admin/our_food/edit') ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
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
