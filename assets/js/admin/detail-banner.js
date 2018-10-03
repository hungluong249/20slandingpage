for (var i = 0; i < document.querySelectorAll('[id^="demo"]').length; i++) {
    value = document.querySelectorAll('[id^="demo"]')[i].querySelector('.color').innerHTML;
    document.querySelectorAll(`[data-target^="#demo"] b`)[i].innerHTML = value;
}
switch(window.location.origin){
    case 'http://20s.dragongate.vn':
        var HOSTNAMEADMIN = 'http://20s.dragongate.vn/admin';
        break;
    default:
        var HOSTNAMEADMIN = 'http://localhost/20slandingpage/admin';
}
html_modal = `<div class="modal" role="dialog" style="display: block; opacity: 0.5">
    <div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">
        <i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>
    </div>
</div>`;
function remove_image_banner(controller, image, key){
    if(confirm('Chắc chắn xóa ảnh này?')){
        let data = new FormData(document.querySelector('form.form-horizontal'));
        data.append('csrf_seafood_token', document.getElementById('csrf_seafood_token').value);
        data.append('image', image);
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
function activated_image(controller, image, key){
    let data = new FormData(document.querySelector('form.form-horizontal'));
    data.append('csrf_seafood_token', document.getElementById('csrf_seafood_token').value);
    data.append('image', image);
    var url = HOSTNAMEADMIN + '/' + controller + '/img_activated';
    fetch(url,{method: "POST",body: data}
    ).then(
        response => {
            document.getElementById('encypted_ppbtn_all').innerHTML = html_modal;
            return response.json();
        }
    ).then(
        html => {
            document.getElementById('encypted_ppbtn_all').innerHTML = '';
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