<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
            <small>
                Danh Mục
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Danh Mục
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
                            <div class="detail-info col-md-6">
                                <div class="table-responsive">
                                    <label>Thông tin</label>
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="2">Thông tin cơ bản</th>
                                        </tr>
                                        <tr>
                                            <th>Trạng thái</th>
                                            <td>
                                                <?php echo ($detail['is_activated'] == 0)? '<span class="label label-success">Đang sử dụng</span>' : '<span class="label label-warning">Không sử dụng</span>' ?>   
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Slug</th>
                                            <td><?php echo $detail['slug'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Danh Mục</th>
                                            <td><?php echo $detail['parent_title'] ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                                <tr>
                                                    <th style="width: 100px">Tiêu đề: </th>
                                                    <td><?php echo $detail['title'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Nội dung: </th>
                                                    <td><?php echo $detail['content'] ?></td>
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
                            <?php 
                                switch ($controller) {
                                    case 'post_category':
                                        echo "";
                                        break;
                                    case 'post':
                                        echo "Bài Viết";
                                        break;
                                    default:
                                        # code...
                                        break;
                                }
                             ?>
                         này?</h3>
                    </div>
                    <div class="box-body">
                        <a href="<?php echo base_url('admin/'.$controller.'/edit/'.$detail['id']) ?>" class="btn btn-warning" role="button">Chỉnh sửa</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script type="text/javascript">
    switch(window.location.origin){
        case 'http://20slandingpage.vn':
            var HOSTNAMEADMIN = 'http://20s.dragongate.vn/admin';
            break;
        default:
            var HOSTNAMEADMIN = 'http://localhost/20slandingpage/admin';
    }
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