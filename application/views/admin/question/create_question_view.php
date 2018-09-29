<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf_sitecom_token" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới
            <small>
                Banner
            </small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if ($this->session->flashdata('message_error')): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('message_error'); ?>
                    </div>
                <?php endif ?>
                <div class="box box-default">
                    <div class="box-body">
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <div class="col-xs-12">
                            <h4 class="box-title">Thông tin cơ bản</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="col-xs-12">
                            <?php
                                echo form_label('Hình ảnh top', 'image_shared_top');
                                echo form_error('image_shared_top');
                                echo form_upload('image_shared_top', set_value('image_shared_top'), 'class="form-control"');

                                echo form_label('Hình ảnh bottom', 'image_shared_bottom');
                                echo form_error('image_shared_bottom');
                                echo form_upload('image_shared_bottom', set_value('image_shared_bottom'), 'class="form-control"');
                            ?>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-12" style="border: 1px solid gray;margin:5px 0px;padding-bottom: 10px;padding-top: 5px;">
                                <div class="required">
                                    <?php
                                        echo form_label('Câu hỏi 1', 'question');
                                        echo form_error('question');
                                        echo form_input('question[]', set_value('question'), 'class="form-control"');
                                    ?>
                                    <span class="help-block hidden">Vui lòng nhập trường này</span>
                                </div>
                                <div class="col-xs-6" style="padding-left: 0px;">
                                    <?php
                                        echo form_label('Lựa chọn 1', 'content1');
                                        echo form_error('content1');
                                        echo form_input('content1[]', set_value('content1'), 'class="form-control" id="content1"');
                                    ?>
                                </div>
                                <div class="col-xs-6" style="padding: 0px;">
                                    <?php
                                        echo form_label('Lựa chọn 2', 'content1');
                                        echo form_error('content1');
                                        echo form_input('content1[]', set_value('content1'), 'class="form-control" id="content1"');
                                    ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-12" style="border: 1px solid gray;margin:5px 0px;padding-bottom: 10px;padding-top: 5px;">
                                <div class="required">
                                    <?php
                                        echo form_label('Câu hỏi 2', 'question');
                                        echo form_error('question');
                                        echo form_input('question[]', set_value('question'), 'class="form-control"');
                                    ?>
                                    <span class="help-block hidden">Vui lòng nhập trường này</span>
                                </div>
                                <div class="col-xs-4" style="padding-left: 0px;">
                                    <?php
                                        echo form_label('Tiêu đề 1', 'title2');
                                        echo form_input('title2[]', set_value('title2'), 'class="form-control" id="title2"');

                                        echo form_label('Nội dung', 'content2');
                                        echo form_textarea('content2[]', set_value('content2'), 'class="form-control" rows="4"');
                                    ?>
                                </div>
                                <div class="col-xs-4" style="padding-left: 0px;">
                                    <?php
                                        echo form_label('Tiêu đề 2', 'title2');
                                        echo form_input('title2[]', set_value('title2'), 'class="form-control"');

                                        echo form_label('Nội dung', 'content2');
                                        echo form_textarea('content2[]', set_value('content2'), 'class="form-control" rows="4"');
                                    ?>
                                </div>
                                <div class="col-xs-4" style="padding: 0px;">
                                    <?php
                                        echo form_label('Tiêu đề 3', 'title2');
                                        echo form_input('title2[]', set_value('title2'), 'class="form-control"');

                                        echo form_label('Nội dung', 'content2');
                                        echo form_textarea('content2[]', set_value('content2'), 'class="form-control" rows="4"');
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-12" style="border: 1px solid gray;margin:5px 0px;padding-bottom: 10px;padding-top: 5px;">
                                <div class="required">
                                    <?php
                                        echo form_label('Câu hỏi 3', 'question');
                                        echo form_error('question');
                                        echo form_input('question[]', set_value('question'), 'class="form-control"');
                                    ?>
                                    <span class="help-block hidden">Vui lòng nhập trường này</span>
                                </div>
                                <label class="col-xs-12" for="" style="margin-top: 5px;padding: 0px;">Nhập số team hiện có</label>
                                <div class="col-md-10 col-xs-7" style="margin-top:5px;padding-left: 0px;">
                                    <?php 
                                        echo form_input("number", '', 'class="form-control" onpaste="return false;" onkeypress=" return isNumberKey(event)" id="numberdescription"');
                                    ?>
                                </div>
                                <div class="col-md-2 col-xs-5" style="margin-top:5px;padding: 0px;">
                                    <span class="btn btn-primary form-control append-date" id="button-numberdescription" onclick="add_team()">Xác nhận</span>
                                </div>
                                <div class="col-xs-12" id="add-team" style="padding: 0px;">

                                </div>
                                <div class="col-md-12" style="margin-top: 10px;padding: 0px;">
                                    <span class="append-date" id="append-date" style="float: right;cursor: pointer;"><i class="fa-2x fa fa-plus-square" onclick="add_one()"></i></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12">
                            <br>
                            <span type="button" data-toggle="modal" class="btn btn-primary" onclick="submit_shared(this)" >OK</span>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/script.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/common.js') ?>"></script>
<script type="text/javascript">
    function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if (charCode > 31 && (charCode < 48 || charCode > 57) || charCode == 190 || charCode == 196)
          return false;
       return true;
    }

    function add_team(){
        number = document.getElementById('numberdescription').value;
        html = '';
        if(typeof Number(number) == 'number'){
            for (var i = 0; i < number; i++) {
                paddings = (i%2 == 0) ? 'padding-left' : 'padding';
                html += `
                    <div class="col-md-6 col-xs-12 all-team" style="margin-top:10px;${paddings}:0px;">
                        <div class="col-xs-12" style="padding:0px;background:#00CC00;padding:2px;">
                            <label style="color:#FFFF00;padding-top:2px;" >Team số ${i+1}</label>
                            <i class="fa fa-times" style="cursor:pointer; float:right; font-size:1.3em; color:#FFFF00; padding-top:2px;" onclick = "remove_description(this)"></i>
                            <input type="text" name="content3[]" value="" class="form-control">
                        </div>
                    </div>
                `; 
            }
        }
        document.getElementById('add-team').innerHTML = html;
    }
    function add_one(){
        number = document.querySelectorAll('.all-team').length;
        paddings = (number%2 == 0) ? 'padding-left' : 'padding';
        html = `
            <div class="col-md-6 col-xs-12 all-team" style="margin-top:10px;${paddings}:0px;">
                <div class="col-xs-12" style="padding:0px;background:#00CC00;padding:2px;">
                    <label style="color:#FFFF00;padding-top:2px;" >Team số ${number+1}</label>
                    <i class="fa fa-times" style="cursor:pointer; float:right; font-size:1.3em; color:#FFFF00; padding-top:2px;" onclick = "remove_description(this)"></i>
                    <input type="text" name="content3[]" value="" class="form-control">
                </div>
            </div>
        `;
        document.getElementById('add-team').insertAdjacentHTML('beforeend', html);
        document.getElementById('numberdescription').value = document.querySelectorAll('.all-team').length;
    }
    function remove_description(ev){
        document.getElementById('add-team').removeChild(ev.closest('.all-team'));
        document.getElementById('numberdescription').value = (document.querySelectorAll('.all-team').length == 0) ? '' : document.querySelectorAll('.all-team').length;
        for (var i = 0; i < document.querySelectorAll('.all-team').length; i++) {
            document.querySelectorAll('.all-team')[i].style.padding="0px";
            if(i%2 == 0){
                document.querySelectorAll('.all-team')[i].style.paddingRight="10px";
            }
            document.querySelectorAll('.all-team label')[i].innerHTML = `Team số ${i+1}`;
        }
    }
    function check_validate(ev){
        if(ev.querySelector('input').value == ''){
            ev.closest('.required').classList.add("has-error");
            ev.closest('.required').querySelector('span.help-block').classList.remove("hidden");
        }else{
            ev.closest('.required').querySelector('span.help-block').classList.add("hidden");
            ev.closest('.required').classList.remove("has-error");
        }
    }
    function submit_shared(ev){
        for (var i = 0; i < document.querySelectorAll('div.required').length; i++) {
            if(document.querySelectorAll('div.required')[i].querySelector('input').value == ''){
                document.querySelectorAll('div.required')[i].classList.add("has-error");
                document.querySelectorAll('div.required')[i].setAttribute('oninput',`check_validate(this)`);
                document.querySelectorAll('div.required')[i].querySelector('span.help-block').classList.remove("hidden");
            }
        }
        if(document.querySelectorAll('div.required.has-error').length > 0){
            document.querySelectorAll(`.form-horizontal .required.has-error input`)[0].focus();
            return false;
        }
        let data = new FormData(document.querySelector('form.form-horizontal'));
        data.append('csrf_sitecom_token', document.getElementById('csrf_sitecom_token').value);
        var url = window.location.href;
        fetch(url,{method: "POST",body: data}
        ).then( response => {
            return response.json();
        }).then(
            html => {
                if(html.status == "200"){
                    alert(html.message);
                    if(window.location.pathname.indexOf("/question/edit/") != '-1'){
                        document.getElementById('csrf_sitecom_token').value = html.reponse.csrf_hash;
                    }else{
                        window.location.href=HOSTNAME+"admin/question";
                    }
                }else{
                    alert(html.message);
                    document.getElementById('csrf_sitecom_token').value = html.reponse.csrf_hash;
                }
                document.getElementById('encypted_ppbtn_all').innerHTML = '';
            }

        );

    }
</script>