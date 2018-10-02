<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detailbanner.css">


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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf_seafood_token" />
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="detail-info col-xs-12">
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
                                                <tr>
                                                    <th style="width: 100px">Tiêu đề: </th>
                                                    <td><?php echo $detail['title'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 100px">Nội dung: </th>
                                                    <td><?php echo $detail['content'] ?></td>
                                                </tr>
                                                <?php $detail['description'] = json_decode($detail['description']); ?>
                                                <?php if (!empty($detail['description'])): ?>
                                                    <?php foreach ($detail['description'] as $key => $value): ?>

                                                        <tr>
                                                            <th width="100px">Thông tin <?php echo $key+1;?></th>
                                                            <td><?php echo $value;?></td>
                                                        </tr>
                                                        
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="detail-image col-xs-12" style="padding: 5px;">
                                        <label class="col-xs-12">Hình ảnh </label>
                                        <?php $detail['image'] = json_decode($detail['image']); ?>
                                        <?php if (!empty($detail['image'])): ?>
                                            <?php foreach ($detail['image'] as $key => $value): ?>
                                                <div class="col-sm-4 col-xs-6 row_<?php echo $key;?>" style="position: relative;padding-right:10px; margin-bottom: 10px;">
                                                    <img src="<?php echo base_url('assets/upload/'.$controller.'/'.$value); ?>" alt="anh-mo-ta" width=100% height=200px>
                                                    <i class="fa-2x fa fa-check <?php echo ($detail['avatar'] == $value) ?'avata':''; ?>" style="cursor: pointer; position: absolute;color:<?php echo ($detail['avatar'] == $value) ?'green':'black'; ?>; top:0px;right:40px;" onclick="activated_image('<?php echo $controller;?>','<?php echo $value; ?>','<?php echo $key ?>','<?php echo $detail['id'] ?>')"></i>
                                                    <i class="fa-2x fa fa-times" style="cursor: pointer; position: absolute;color:red; top:0px;right: 15px;" onclick="remove_image_post('<?php echo $controller;?>','<?php echo $value; ?>','<?php echo $key ?>','<?php echo $detail['id'] ?>')"></i>
                                                </div>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <div class="col-md-6" style="margin-top: 10px;">
                                                Chưa có hình ảnh
                                            </div>
                                        <?php endif ?>
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
                    <div id="encypted_ppbtn_all"></div>
                    <div id="myModal" class="modal" style="overflow-y:auto;">
                        <img class="modal-content" id="img01">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script src="<?php echo site_url('assets/js/admin/') ?>showmodalimg.js"></script>
<script src="<?php echo site_url('assets/js/admin/') ?>detail-banner.js"></script>
<script type="text/javascript">
switch(window.location.origin){
    case 'http://20s.dragongate.vn':
        var HOSTNAMEADMIN = 'http://20slandingpage.vn/admin';
        break;
    default:
        var HOSTNAMEADMIN = 'http://localhost/20slandingpage/admin';
}
    function activated_image(controller, image, key, id){
        let data = new FormData(document.querySelector('form.form-horizontal'));
        data.append('csrf_seafood_token', document.getElementById('csrf_seafood_token').value);
        data.append('image', image);
        data.append('id', id);
        var url = HOSTNAMEADMIN + '/' + controller + '/img_activated';
        fetch(url,{method: "POST",body: data}
        ).then(
            response => {
                return response.json();
            }
        ).then(
            html => {
                if(html.status == "200"){
                    alert(html.message);
                    if(document.querySelector(`.avata`) != null){
                        document.querySelector(`.avata`).style.color = 'black';
                        document.querySelector(`.avata`).classList.remove('avata');
                    }
                    if(html.reponse.update_activated == '1'){
                        document.querySelector(`.row_${key} .fa-check`).style.color = 'green';
                        document.querySelector(`.row_${key} .fa-check`).classList.add('avata');
                    }
                    document.getElementById('csrf_seafood_token').value = html.reponse.csrf_hash;
                }else{
                    alert(html.message);
                    location.reload();
                }
            }

        );
    }
    function remove_image_post(controller, image, key, id){
        if(confirm('Chắc chắn xóa ảnh này?')){
            let data = new FormData(document.querySelector('form.form-horizontal'));
            data.append('csrf_seafood_token', document.getElementById('csrf_seafood_token').value);
            data.append('image', image);
            data.append('id', id);
            var url = HOSTNAMEADMIN + '/' + controller + '/remove_image';
            fetch(url,{method: "POST",body: data}
            ).then(
                response => response.json()
            ).then(
                html => {
                    console.log(html);
                    if(html.status == 200){
                        alert(html.message);
                        $(`.row_${key}`).fadeOut();
                        document.getElementById('csrf_seafood_token').value = html.reponse.csrf_hash;
                    }else{
                        alert(html.message);
                        location.reload();
                    }
                }

            );
        }
    }
</script>