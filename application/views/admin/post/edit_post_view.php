<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf_sitecom_token" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
            <small>
                Bài Viết
            </small>
        </h1>
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
                            <h4 class="box-title">Basic Information</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <label for="image_shared" class="col-xs-12">Hình ảnh đang dùng</label>
                        <?php $detail['image'] = json_decode($detail['image']); ?>
                        <?php if (!empty($detail['image'])): ?>
                            <?php foreach ($detail['image'] as $key => $value): ?>
                                <div class="col-md-4">
                                    <img src="<?php echo base_url('assets/upload/'.$controller.'/'. $value ) ?>" alt="Image Detail" width=100% height=140px>
                                </div>
                            <?php endforeach ?>
                        <?php else: ?>
                            Chưa có hình ảnh
                        <?php endif ?>
                            
                        <div class="col-xs-12">
                            <?php
                                echo form_label('Hình ảnh', 'image_shared');
                                echo form_error('image_shared');
                                echo form_upload('image_shared[]', set_value('image_shared'), 'multiple class="form-control"');
                            ?>
                            <br>
                        </div>
                        <div class="col-xs-12">
                            <?php
                                echo form_label('Slug', 'slug_shared');
                                echo form_error('slug_shared');
                                echo form_input('slug_shared', $detail['slug'], 'class="form-control" id="slug_shared" readonly');
                            ?>
                        </div>

                        <div class="col-xs-12 required">
                            <?php
                                echo form_label('Danh mục', 'parent_id_shared');
                                echo form_error('parent_id_shared');
                            ?>
                            <select name="parent_id_shared" class="form-control">
                                <?php build_new_category($category, 0, $detail['post_category_id'], '') ?>
                            </select>
                            <span class="help-block hidden">Vui lòng chọn trường này</span>
                        </div>

                        <div class="col-xs-12 required">
                            <?php
                                echo form_label('Tiêu đề', 'title');
                                echo form_input('title', $detail['title'], 'class="form-control" id="title"');
                            ?>
                            <span class="help-block hidden">Vui lòng nhập trường này</span>
                        </div>
                        <div class="col-xs-12">
                            <?php
                                echo form_label('Nội dung', 'content');
                                echo form_textarea('content', $detail['content'], 'class="tinymce-area form-control" rows="5"');
                            ?>
                        </div>

                        <label class="col-md-12" for="" style="margin-top: 20px;">
                                Nhập số thông tin nếu có
                        </label>
                        <div class="col-md-12" style="margin-top:5px;">
                            <?php 
                                $detail['description'] = json_decode($detail['description'],true);
                                echo form_input("number", empty($detail['description']) ? '' : count($detail['description']), 'class="form-control" onpaste="return false;" readonly onkeypress=" return isNumberKey(event)" id="numberdescription"');
                            ?>
                        </div>
                        <!-- <div class="col-md-2" style="margin-top:5px;">
                            <span class="btn btn-primary form-control append-date" id="button-numberdescription" onclick="add_description()">Xác nhận </span>
                        </div> -->
                        <div id="add-all-description">
                            <?php foreach ($detail['description'] as $key => $value): ?>
                                <div class="col-md-6 col-xs-12 all-description" style="margin-top:10px;">
                                    <div class="col-xs-12" style="padding:0px;background:#00CC00;padding:2px;">
                                        <label style="color:#FFFF00;padding-top:2px;" >Thông tin <?php echo $key+1; ?></label>
                                        <i class="fa fa-times" style="cursor:pointer; float:right; font-size:1.3em; color:#FFFF00; padding-top:2px;" onclick = "remove_description(this)"></i>
                                    </div>
                                    <textarea name="description[]" style="width:100%" rows=5><?php echo $value?></textarea>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="col-md-12 tab-content" style="margin-top: 10px;">
                            <span class="append-date" id="append-date" style="float: right;cursor: pointer;"><i class="fa-2x fa fa-plus-square" onclick="add_one()"></i></span>
                        </div>
                        <div class="col-xs-12" style="margin-top:10px;">
                            <span type="button" data-toggle="modal" class="btn btn-primary" onclick="submit_shared(this)" >OK</span>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function isNumberKey(evt)
    {
       var charCode = (evt.which) ? evt.which : event.keyCode;
       if (charCode > 31 && (charCode < 48 || charCode > 57) || charCode == 190 || charCode == 196)
          return false;
       return true;
    }

    function add_description(){
        number = document.getElementById('numberdescription').value;
        html = '';
        if(typeof Number(number) == 'number'){
            for (var i = 0; i < number; i++) {
                html += `
                    <div class="col-md-6 col-xs-12 all-description" style="margin-top:10px;">
                        <div class="col-xs-12" style="padding:0px;background:#00CC00;padding:2px;">
                            <label style="color:#FFFF00;padding-top:2px;" >Thông tin ${i+1}</label>
                            <i class="fa fa-times" style="cursor:pointer; float:right; font-size:1.3em; color:#FFFF00; padding-top:2px;" onclick = "remove_description(this)"></i>
                        </div>
                        <textarea name="description[]" style="width:100%" rows=5></textarea>
                    </div>
                `; 
            }
        }
        document.getElementById('add-all-description').innerHTML = html;
    }
    function add_one(){
        number = document.querySelectorAll('.all-description').length;
        html = `
            <div class="col-md-6 col-xs-12 all-description" style="margin-top:10px;">
                <div class="col-xs-12" style="padding:0px;background:#00CC00;padding:2px;">
                    <label style="color:#FFFF00;padding-top:2px;" >Thông tin ${number+1}</label>
                    <i class="fa fa-times" style="cursor:pointer; float:right; font-size:1.3em; color:#FFFF00; padding-top:2px;" onclick = "remove_description(this)"></i>
                </div>
                <textarea name="description[]" style="width:100%" rows=5></textarea>
            </div>
        `; 
        document.getElementById('add-all-description').insertAdjacentHTML('beforeend', html);
    }
    function remove_description(ev){
        document.getElementById('add-all-description').removeChild(ev.closest('.all-description'));
        document.getElementById('numberdescription').value = (document.querySelectorAll('.all-description').length == 0) ? '' : document.querySelectorAll('.all-description').length;
        for (var i = 0; i < document.querySelectorAll('.all-description').length; i++) {
            document.querySelectorAll('.all-description label')[i].innerHTML = `Thông tin ${i+1}`;
        }
    }
    function check_validate(ev,type){
        if(type == 'title'){
            value = (ev.querySelector('input').value == '') ? true : false;
        }else{
            value = (ev.value == '') ? true : false;
        }
        if(value){
            ev.closest('.required').classList.add("has-error");
            ev.closest('.required').querySelector('span.help-block').classList.remove("hidden");
        }else{
            ev.closest('.required').querySelector('span.help-block').classList.add("hidden");
            ev.closest('.required').classList.remove("has-error");
        }
    }
    function submit_shared(ev){
        for (var i = 0; i < document.querySelectorAll('div.required').length; i++) {
            let type = document.querySelectorAll('div.required')[i].querySelector('label').getAttribute('for');
            if(type == 'title'){
                if(document.querySelectorAll('div.required')[i].querySelector('input').value == ''){
                    document.querySelectorAll('div.required')[i].classList.add("has-error");
                    document.querySelectorAll('div.required')[i].setAttribute('oninput',`check_validate(this,'${type}')`);
                    document.querySelectorAll('div.required')[i].querySelector('span.help-block').classList.remove("hidden");
                }
            }else{
                if(document.querySelectorAll('div.required')[i].querySelector('select').value == ''){
                    document.querySelectorAll('div.required')[i].classList.add("has-error");
                    document.querySelectorAll('div.required ')[i].querySelector('select').setAttribute('onchange',`check_validate(this,'${type}')`);
                    document.querySelectorAll('div.required')[i].querySelector('span').classList.remove("hidden");
                }
            }
        }
        if(document.querySelectorAll('div.required.has-error').length > 0){
            if(document.querySelectorAll(`.form-horizontal .required.has-error select`).length == 0){
                document.querySelectorAll(`.form-horizontal .required.has-error input`)[0].focus();
            }else{
                document.querySelectorAll(`.form-horizontal .required.has-error select`)[0].focus();
            }
            return false;
        }
        let data = new FormData(document.querySelector('form.form-horizontal'));
        data.append('csrf_sitecom_token', document.getElementById('csrf_sitecom_token').value);
        data.append('content', tinymce.get('content').getContent({format:'html'}));
        var url = window.location.href;
        fetch(url,{method: "POST",body: data}
        ).then( response => {
            return response.json();
        }).then(
            html => {
                if(html.status == "200"){
                    alert(html.message);
                    window.location.href=HOSTNAME+"admin/post";
                }else{
                    alert(html.message);
                    document.getElementById('csrf_sitecom_token').value = html.reponse.csrf_hash;
                }
            }

        );

    }
</script>
<?php 
    function build_new_category($categorie, $parent_id = 0, $detail_id, $char = ''){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        if ($cate_child){
            foreach ($cate_child as $key => $value){
            ?>
            <option value="<?php echo $value['id'] ?>" <?php echo($value['id'] == $detail_id)? 'selected' : ''?> ><?php echo $char.$value['title'] ?></option>
            <?php build_new_category($categorie, $value['id'], $detail_id, $char.'---|') ?>
            <?php
            }
        }
    }
?>