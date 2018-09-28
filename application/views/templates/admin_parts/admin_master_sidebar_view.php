<?php
//if($this->ion_auth->logged_in()) {
//?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/img/logo.png') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><h4><b>20</b> section</h4></p>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php echo ($this->uri->segment(2) == '')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin') ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == '')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/banner/detail') ?>">
                        <i class="fa fa-dashboard"></i> <span>Banner</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == '')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/creator') ?>">
                        <i class="fa fa-dashboard"></i> <span>Creator</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == '')? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/customer/detail') ?>">
                        <i class="fa fa-dashboard"></i> <span>Customer</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'post_category' || $this->uri->segment(2) == 'post')? 'active' : 'treeview' ?>">
                    <a href="">
                        <i class="fa fa-newspaper-o"></i>
                        <span>Bài Viết</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo ($this->uri->segment(2) == 'post_category')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/post_category') ?>"><i class="fa fa-filter"></i> Danh Mục Bài Viêt</a>
                        </li>
                        <li class="<?php echo ($this->uri->segment(2) == 'post')? 'active' : '' ?>">
                            <a href="<?php echo base_url('admin/post') ?>"><i class="fa fa-list"></i> Danh Sách Bài Viêt</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php //} ?>



