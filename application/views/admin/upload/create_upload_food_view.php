<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if ($this->uri->segment(3) == 'create_food'): ?>
                Thêm Menu
                <small>Menu</small>
            <?php elseif($this->uri->segment(3) == 'create_floor'): ?>
                Thêm FLOOR
                <small>FLOOR</small>
                
            <?php endif ?>
            
        </h1>
        <?php if ($this->session->flashdata('message_error')): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> alert!</h4>
                <?php echo $this->session->flashdata('message_error'); ?>
            </div>
        <?php endif ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-body">
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <div class="col-xs-12">
                            <h4 class="box-title">
                                <?php if ($this->uri->segment(3) == 'create_food'): ?>
                                    Menu
                                <?php elseif($this->uri->segment(3) == 'create_floor'): ?>
                                    FLOOR
                                <?php endif ?>
                            </h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('PDF', 'link_shared');
                            echo form_error('link_shared');
                            echo form_upload('link_shared', '', 'class="form-control"');
                            ?>
                            <p class="help-block">Click để upload</p>
                        </div>

                        <?php echo form_submit('submit_shared', 'OK', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
