<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Đặt Bàn
            <small>Danh sách đặt bàn</small>
        </h1>
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Đặt bàn</a></li>
            <li class="active">
                <?php
                    switch ($this->uri->segment(3)) {
                        case 'success':
                            echo 'Thành công';
                            break;
                        case 'cancel':
                            echo 'Hủy bỏ';
                            break;
                        default:
                            echo 'Chờ xác nhận';
                            break;
                    }
                ?>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <?php
                                switch ($this->uri->segment(3)) {
                                    case 'success':
                                        echo 'Thành công';
                                        break;
                                    case 'cancel':
                                        echo 'Hủy bỏ';
                                        break;
                                    default:
                                        echo 'Chờ xác nhận';
                                        break;
                                }
                            ?>
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo base_url('admin/order/'.$this->uri->segment(3)) ?>" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="search" value="">
                                    <span class="input-group-btn">
                                        <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Thời gian</th>
                                        <th>Số điện thoại</th>

                                        <th>Số người</th>
                                        <th>Tình trạng</th>
                                        <th>Hủy bỏ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($order): ?>
                                        <?php foreach ($order as $key => $value): ?>
                                        <?php $i = 1 ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $value['name'] ?></td>
                                                <td><?php echo $value['email'] ?></td>
                                                <td><?php echo $value['time'] ?></td>
                                                <td><?php echo $value['phone'] ?></td>
												<!--
												<td><?php echo $value['address'] ?></td>
												-->
                                                <td><?php echo $value['quantity'] ?></td>
                                                <td>
                                                    <?php if ($value['status'] == 0): ?>
                                                        <span class="label label-warning" onclick="active('order', <?php echo $value['id'] ?>, 'Xác nhận đặt bàn?')">Chờ xác nhận</span>
                                                    <?php elseif($value['status'] == 1): ?>
                                                        <span class="label label-success">Đã xác nhận</span>
                                                    <?php else: ?>
                                                        <span class="label label-danger">Đã hủy bỏ</span>
                                                    <?php endif ?>
                                                    
                                                </td>
                                                <td>
                                                    <?php if ($value['status'] == 2): ?>
                                                        <span class="label label-danger" onclick="deactive('order', <?php echo $value['id'] ?>, 'Hủy đặt bàn?')" style="pointer-events: none" >Hủy bỏ</span>
                                                    <?php else: ?>
                                                        <span class="label label-danger" onclick="deactive('order', <?php echo $value['id'] ?>, 'Hủy đặt bàn?')" >Hủy bỏ</span>
                                                    <?php endif ?>
                                                    
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            Chưa có khách đặt hàng
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <th>No.</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Thời gian</th>
                                        <th>Số điện thoại</th>

                                        <th>Số người</th>
                                        <th>Tình trạng</th>
                                        <th>Hủy bỏ</th>
                                    </tr>
                                </tfooter>
                            </table>
                        </div>
						<div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links ?>
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

<!-- DataTables -->
<script>
    $(function () {
        $('#table').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>