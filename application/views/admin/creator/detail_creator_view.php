<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detailbanner.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                Thành viên
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Thành viên
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
                            <div class="detail-image col-md-6">
                                <label>Hình ảnh</label>
                                <?php if (!empty($detail['image'])): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-sm-4 col-xs-6 remove_img" style="position: relative;padding-right:10px;padding-left: 0px; margin-bottom: 10px;">
                                                <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$detail['image']); ?>" alt="anh-mo-ta" width=200>
                                                <i class="fa-2x fa fa-times" style="cursor: pointer; position: absolute;color:red; top:0px;left: 170px;" onclick="remove_one('<?php echo $controller;?>','<?php echo $detail['image']; ?>','<?php echo $detail['id']; ?>')"></i>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    : Chưa có hình ảnh
                                <?php endif ?>
                            </div>
                            <div class="col-md-12" style="margin-top: 5px;">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                                <tr>
                                                    <th style="width: 150px">Status: </th>
                                                    <td>
                                                        <?php if ($detail['is_activated'] == 0): ?>
                                                            <a class="btn btn-success btn-xs" title="Thành viên đang bật">Đang  sử dụng </a>
                                                        <?php else: ?>
                                                            <a class="btn btn-warning btn-xs" title="Thành viên không sử dụng">Không sử dụng</a>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 150px">Họ tên: </th>
                                                    <td><?php echo $detail['name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 150px">Công việc: </th>
                                                    <td><?php echo $detail['job'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 150px">Link facebook: </th>
                                                    <td><?php echo $detail['facebook'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 150px">Link youtube: </th>
                                                    <td><?php echo $detail['youtube'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 150px">Link instagram: </th>
                                                    <td><?php echo $detail['instagram'] ?></td>
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
                            Thành viên
                         này?</h3>
                    </div>
                    <div class="box-body">
                        <a href="<?php echo base_url('admin/'.$controller.'/edit/'.$detail['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
            <div id="encypted_ppbtn_all"></div>
            <div id="myModal" class="modal" style="overflow-y: auto">
                <img class="modal-content" id="img01">
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script src="<?php echo site_url('assets/js/admin/') ?>showmodalimg.js"></script>
<script src="<?php echo site_url('assets/js/admin/') ?>detail-banner.js"></script>
<script type="text/javascript">
    function remove_one(controller, image,id){
        if(confirm('Chắc chắn xóa ảnh này?')){
            let data = new FormData();
            data.append('csrf_seafood_token', document.getElementById('csrf_seafood_token').value);
            data.append('image', image);
            data.append('id', id);
            var url = HOSTNAMEADMIN + '/' + controller + '/remove_img';
            fetch(url,{method: "POST",body: data}
            ).then(
                response => response.json()
            ).then(
                html => {
                    if(html.status == 200){
                        $(`.remove_img`).fadeOut();
                    }
                    alert(html.message);
                    location.reload();
                }

            );
        }
    }
</script>