<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                <?php if ($this->uri->segment(3) == 'list_food'): ?>
                    MENU
                <?php elseif($this->uri->segment(3) == 'list_floor'): ?>
                    FLOOR
                <?php endif ?>
            </h3>
            <?php if ($this->session->flashdata('message_error')): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> alert!</h4>
                    <?php echo $this->session->flashdata('message_error'); ?>
                </div>
            <?php endif ?>
            <?php if ($this->session->flashdata('message_success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> alert!</h4>
                    <?php echo $this->session->flashdata('message_success'); ?>
                </div>
            <?php endif ?>
            <div class="row">
                <?php if ($this->uri->segment(3) == 'list_food'): ?>
                    <a type="button" href="<?php echo site_url('admin/upload/create_food'); ?>" class="btn btn-primary">THÊM MỚI</a>
                <?php elseif($this->uri->segment(3) == 'list_floor'): ?>
                    <a type="button" href="<?php echo site_url('admin/upload/create_floor'); ?>" class="btn btn-primary">THÊM MỚI</a>
                <?php endif ?>
                
            </div>
            <div>
                <br>
                <br>

                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />

            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top: 10px;">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th style="width: 100px"><b><a href="#">Link</a></b></th>
                            <th style="width: 100px"><b><a href="#">Active</a></b></th>
                            <th style="width: 100px"><b>Operations</b></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if ($result): ?>
                            <?php foreach ($result as $key => $value): ?>
                                <tr class="remove_<?php echo $value['id'] ?>" >
                                    <td style="width: 100px">
                                        <?php echo base_url('assets/upload/pdf/'. $value['link']) ?>
                                    </td>
                                    <td>
                                        <?php if ($this->uri->segment(3) == 'list_food'): ?>
                                            <?php if ($value['is_activated'] == 0): ?>
                                                <span class="label label-warning" onclick="active('upload', <?php echo $value['id'] ?>, 'Chắc chắn sử dụng Menu này?', 'Hiện có 1 menu đang được sử dụng. Vui lòng tắt sự kiện đó rồi thực hiện lại thao tác!')">Không sử dụng</span>
                                            <?php else: ?>
                                                <span class="label label-success" onclick="deactive('upload', <?php echo $value['id'] ?>, 'Chắc chắn tắt Menu này?')">Đang sử dụng</span>
                                            <?php endif ?>
                                        <?php elseif($this->uri->segment(3) == 'list_floor'): ?>
                                            <?php if ($value['is_activated'] == 0): ?>
                                                <span class="label label-warning" onclick="active('upload', <?php echo $value['id'] ?>, 'Chắc chắn sử dụng Floor này?', 'Hiện có 1 Flow đang được sử dụng. Vui lòng tắt sự kiện đó rồi thực hiện lại thao tác!')">Không sử dụng</span>
                                            <?php else: ?>
                                                <span class="label label-success" onclick="deactive('upload', <?php echo $value['id'] ?>, 'Chắc chắn tắt Floor này?')">Đang sử dụng</span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" title="Xóa" class="btn-remove" onclick="remove('upload', <?php echo $value['id'] ?>)" >
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="<?php echo base_url('assets/upload/pdf/'. $value['link']) ?>" title="Xem" target="_blank">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="<?php echo base_url('assets/upload/pdf/'. $value['link']) ?>" title="Tải" download>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="col-md-6 col-md-offset-5 page">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
