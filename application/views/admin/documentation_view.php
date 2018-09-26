<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Mato Creative | Documentation</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url('assets/lib/') ?>fontAwesome/css/font-awesome.min.css">
    <!-- Google Font -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,700,700i" rel="stylesheet">
    <!-- Documentation Style -->
    <link rel="stylesheet" href="<?php echo site_url('assets/') ?>sass/admin/documentation.css">

    <!-- jQuery 3 -->
    <script src="<?php echo site_url('assets/lib/') ?>jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo site_url('assets/lib/') ?>bootstrap/js/bootstrap.min.js"></script>

</head>
<body>

<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Admin Controller</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="http://matocreative.vn" target="_blank">Mato Creative</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>


	<section class="main-content container-fluid">
		<div class="row">
			<div class="left col-md-3 col-sm-4 col-xs-12">

				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading"><b>User</b>Guide</div>
					<div class="panel-body">
						<p>Hướng dẫn sử dụng trang quản lý Admin website ngochuong.vn</p>
					</div>

					<!-- List group -->
					<ul class="list-group">
						<li class="list-group-item">
							<a href="#1">Đăng nhập</a>
						</li>
						<li class="list-group-item">
							<a href="#2">Giới thiệu</a>
						</li>
						<li class="list-group-item">
							<a href="#3">Slider</a>
						</li>
						<li class="list-group-item">
							<a href="#4">Món ăn của chúng tôi</a>
						</li>
						<li class="list-group-item">
							<a href="#5">Sự kiện</a>
						</li>
						<li class="list-group-item">
							<a href="#6">Thư viện ảnh </a>
						</li>
						<li class="list-group-item">
							<a href="#7">Break Edit </a>
						</li>
						<li class="list-group-item">
							<a href="#8">Đặt bàn </a>
						</li>
						<li class="list-group-item">
							<a href="#9">Upload Menu </a>
						</li>
						<li class="list-group-item">
							<a href="#10">Upload Floor Plan </a>
						</li>
						<li class="list-group-item">
							<a href="#11">Thắc mắc khác</a>
						</li>
					</ul>
					<div class="panel-footer">
						<a href="<?php echo base_url('admin/documentation/printfile') ?>" class="btn btn-default" role="button" target="_blank">
							<i class="fa fa-print" aria-hidden="true"></i> In tài liệu
						</a>
					</div>
				</div>
			</div>
			<div class="right col-md-9 col-sm-8 col-xs-12">
				<div class="content">
					<div class="main-title" id="top">
						<h1>User Guide</h1>
						<h3>Website: ngochuong.vn</h3>
						<h4>Author: Mato Creative | Email: hello@matocreative.vn</h4>
						<p>Date Created: 20/04/2018</p>
					</div>
					<ol>
						<li id="1">Đăng nhập</li>
							<p>User nhập vào thanh địa chỉ trên trình duyệt đường dẫn</p>
							<a href="http://ngochuong.vn/admin" target="_blank">ngochuong.vn/admin</a>
							<p>Hiển thị trên trang:</p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>login.png" alt="ảnh đăng nhập">
							<p>User nhập thông tin đăng nhập như sau:</p>
							<p>Username: <b>admin@admin.com</b></p>
							<p>Password: <b>password</b></p>
							<p>Sau khi đăng nhập thanhf công, sẽ chuyển sang trang <a href="#2">Giới thiệu</a></p>


						<li id="2">Giới thiệu</li>
							<p>Hiển thị trên trang:</p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>about.png" alt="ảnh màn hình giới thiệu">
							<p>Phần Giới thiệu gồm các mục chính</p>
								<ul>
									<li><b>Hình ảnh</b>: Gồm các ảnh được sử dụng làm ảnh nền trên website. Có thể upload được nhiều hình, sử dụng 01 ảnh để làm ảnh trên site.</li>
									<li><b>Nội dung</b>: Gồm các bài viết sử dụng giới thiệu gồm 03 thứ tiếng được chia trong các Tab.</li>
								</ul>
							<br>
							<p><b>Chỉnh sửa Giới thiệu</b>: Click vào button "Chỉnh sửa" để tới trang Cỉnh sửa </p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>edit_about.png" alt="ảnh chỉnh sửa giới thiệu">
							<p>Như đã thấy trên ảnh, ở từng phần chúng ta có các mục để chỉnh sửa lại nội dung trên trang. Sau khi thay đổi, click <b>OK</b> để lưu lại</p>

						<li id="3">Slider</li>
							<p>Hiển thị trên trang:</p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>banner1.png" alt="ảnh màn hình slider">
							<p>Trong mục này sẽ là list danh sách các ảnh được sử dụng làm slider trình chiếu trên website.</p>
							<p>Để thêm mới, click <b>"Thêm mới"</b></p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>create_banner.png" alt="ảnh màn hình tạo thêm slider">
							<p>Thao tác như hướng dẫn trên ảnh để có thể tạo thêm slide mới</p>
							<p class="note">Lưu ý: Ảnh upload lên không quá 1200kb</p>
							<p>Để xoá ảnh, click vào icon <b><i class="fa fa-trash-o" aria-hidden="true"></i></b> (như trên ảnh)</p>

						<li id="4">Món ăn của chúng tôi</li>
							<p>Các thao tác tương tư với <b><a href="#2">Giới thiệu</a></b></p>

						<li id="5">Sự kiện</li>
							<p>Hiển thị trên trang:</p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>event.png" alt="ảnh màn hình event">
							<p>Để thêm Sự kiện chọn "Thêm mới"</p>
								<ul>
									<li>Bước 1: Chọn "Thêm mới"</li>
									<li>Bước 2: Điền các thông tin cần thiết</li>
									<li>Bước 3: Chọn OK</li>
								</ul>
							<p>Để chọn Sự kiện nào chạy hoặc đặt chế độ Pending (chờ), ấn chọn vào mục Status ở mỗi sự kiện</p>
							<p class="note">Lưu ý: Chỉ có thể cho 01 sự kiện được sử dụng</p>
							<p>Để xem chi tiết Sự kiện, chọn button "See detail"</p>
							<p>Để chỉnh sửa nhanh hoặc xoá sự kiện, chọn button <b><i class="fa fa-pencil" aria-hidden="true"></i></b> hoặc icon <b><i class="fa fa-remove" aria-hidden="true"></i></b></p>

						<li id="6">Thư viện ảnh</li>
							<p>Hiển thị trên trang</p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>library.png" alt="ảnh màn hình thư viện ảnh">
							<p>Để thêm ảnh vào Thư viện, chọn "Thêm mới"</p>
							<ul>
								<li>Bước 1: Chọn "Thêm mới"</li>
								<li>Bước 2: Chọn các ảnh để up lên <p class="note">Có thể up nhiều ảnh một lúc</p> <p class="note">Lưu ý: Mỗi ảnh upload không được có dung lượng quá 1200kb</p></li>
							</ul>
							<p>Để xoá nhanh toàn bộ ảnh, chọn "Xoá hết ảnh", còn nếu muốn xoá từng ảnh, chọn icon <b><i class="fa fa-trash-o" aria-hidden="true"></i></b></p>
							<p>Để chỉnh sửa tiêu đề cho mỗi ảnh, chọn nút "Sửa" ở cuối dòng mỗi ảnh, cần viết thông tin tiêu đề ảnh bằng đầy đủ ngôn ngữ để đạt kết quả hiển thị tốt nhất. Sau khi thay xong tiêu đề, ấn OK để hoàn thành</p>

						<li id="7">Break Edit (Chỉnh sửa các khoảng nghỉ)</li>
							<p>Phần chỉnh sửa, upload ảnh tương tự với <a href="#3">Chỉnh sửa Slider</a></p>
							<p>Ở dưới mỗi phần chỉnh sửa Break, điền tiêu đề bằng các ngôn ngữ để hiển thị trên trang</p>

						<li id="8">Đặt bàn</li>
							<p>Hiển thị trên trang</p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>order.png" alt="ảnh màn hình list đặt bàn">
							<p>Ở đây ta sẽ có list danh sách các khách hàng đã đặt bàn qua chế độ đặt bàn qua trang.</p>
							<p>Danh sách đặt bàn được chia làm 03 phần:</p>
							<ul>
								<li><b>Chờ xác nhận:</b> Gồm danh sách các khách hàng mới đăng ký qua website, người của nhà hàng sẽ gọi điện xác nhận với khách hàng. Nếu đơn hàng được xác nhận thành công, click vào button trong cột Tình trạng để chuyển chế độ "Chờ xác nhận" sang "Đã xác nhận" và đơn đặt hàng này của khách hàng này sẽ được chuyển sang danh sách <b>Xác nhận</b>. Nếu khách hàng huỷ bỏ đặt bàn, hoặc người của nhà hàng huỷ đặt bàn của khách hàng, đơn đặt bàn sẽ được chuyển sang danh sách <b>Đã huỷ bỏ</b></li>
								<li><b>Đã xác nhận:</b> Gồm danh sách các khách hàng đặt bàn đã được xác nhận thành công bởi người của nhà hàng.</li>
								<li><b>Đã huỷ bỏ:</b> Gồm danh sách các khách hàng đặt bàn ở mục "Chờ xác nhận" đã huỷ bỏ đơn đặt bàn, hoặc bị huỷ bỏ đặt bàn bởi người của nhà hàng.</li>
							</ul>

						<li id="9">Upload Menu</li>
							<p>Hiển thị trên trang:</p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>menu.png" alt="ảnh màn hình menu">
							<p>Ở đây, ta có thể xem được menu (dưới dạng file pdf) đã được mã hoá tên. Chỉ có thể kích hoạt 01 menu để có thể xem trên trang. Ngoài ra, các hành động khác đã được liệt kê trên ảnh.</p>
							<p>Để có thể thêm menu, click "Thêm mới". Sau đó, trên trang sẽ thể hiện như sau:</p>
							<img src="<?php echo site_url('assets/img/admin/ug/') ?>create_menu.png" alt="ảnh màn hình menu">
							<p>Thực hiện các thao tác như trên hình ảnh, ta có thể upload được file menu mới lên trên hosting để sử dụng.</p>
							<p class="note">Lưu ý: File menu (dưới dạng pdf) upload lên có dung lượng không quá 20mb</p>

						<li id="10">Upload Floor Plan</li>
							<p>Các thao tác và hiển thị tương tự với mục <a href="#9">Upload Menu</a></p>

						<li id="11">Thắc mắc khác</li>
							<p>Mọi thắc mắc hay sự cố nào khác trên trang, xin vui lòng liên hệ với Mato Creative qua email <a href="mailto:hello@matocreative.vn?Subject=[ngochuong.vn]">hello@matocreative.vn</a> </p>

					</ol>
				</div>
			</div>
		</div>
	</section>

</body>

<script>
	$(document).ready(function(){

	});

    $(window).scroll(function () {

        'use strict';
        if ($(window).scrollTop() > 150) {
            $('.left').addClass('sticky');
        }
        if ($(window).scrollTop() < 150) {
            $('.left').removeClass('sticky');
        }
    });
</script>

</html>