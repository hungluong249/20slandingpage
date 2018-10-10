switch(window.location.origin){
    case 'http://20s.dragongate.vn':
        var HOSTNAME = 'http://20s.dragongate.vn/';
        break;
    default:
        var HOSTNAME = 'http://localhost/20slandingpage/';
}

for (var i = 0; i < document.querySelectorAll('#paragraph-sm-none p').length; i++) { 
	document.querySelectorAll('#paragraph-sm-none p')[i].classList.add('d-block'); 
	document.querySelectorAll('#paragraph-sm-none p')[i].classList.add('d-sm-none'); 
}

function isNumberKey(evt){
   var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode > 31 && (charCode < 48 || charCode > 57) || charCode == 190 || charCode == 196)
      return false;
   return true;
}
 function check_validate(ev){
    if(ev.querySelector('input').value.trim() == ''){
        ev.closest('.required').classList.add("has-error");
        ev.closest('.required').querySelector('span.help-block').classList.remove("hidden");
    }else{
        ev.closest('.required').querySelector('span.help-block').classList.add("hidden");
        ev.closest('.required').classList.remove("has-error");
    }
}
function send_mail(){
    for (var i = 0; i < document.querySelectorAll('div.form-group.required').length; i++) {
        if(document.querySelectorAll('div.form-group.required')[i].querySelector('input').value.trim() == ''){
            document.querySelectorAll('div.form-group.required')[i].classList.add("has-error");
            document.querySelectorAll('div.form-group.required')[i].setAttribute('oninput',`check_validate(this)`);
            document.querySelectorAll('div.form-group.required')[i].querySelector('span.help-block').classList.remove("hidden");
        }
    }
    if(document.querySelectorAll('div.form-group.required.has-error').length > 0){
        document.querySelectorAll('div.form-group.required.has-error input')[0].focus();
        return false;
    }
	active = [];
	for (var i = 0; i < document.querySelectorAll('#step-02 .btn.btn-link.active').length; i++) {
		active[i] = Number(document.querySelectorAll('#step-02 .btn.btn-link.active')[i].value);
	}
    var url = HOSTNAME+'homepage/send_mail';

    $.ajax({
        method: "post",
        url: url,
        data: {
            contact_name : document.querySelector('#contact_name').value,
            contact_mail : document.querySelector('#contact_mail').value,
            contact_phone : document.querySelector('#contact_phone').value,
            contact_address : document.querySelector('#contact_address').value,
            contact_message : document.querySelector('#contact_message').value,
            active : active,
            team : document.querySelector('#step-03 .btn.btn-link.active').value,
            csrf_seafood_token : document.getElementById('csrf_sitecom_token').value
        },
        beforeSend:function (){
            document.getElementById('sendmail').setAttribute('disabled','disabled');
        },
        success: function(response){
            document.getElementById('csrf_sitecom_token').value = response.reponse.csrf_hash;
            alert(response.message);
            document.getElementById('sendmail').removeAttribute('disabled');
        },
        error: function(response){
            alert(response.responseJSON.message);
            document.getElementById('csrf_sitecom_token').value = response.reponse.csrf_hash;
            document.getElementById('sendmail').removeAttribute('disabled');
        }
    });
}