import {valid_nama, valid_no_telp, valid_email, apply_feedback_error, get_error_text} from './cekvalidate.js';

const linkCekUsername = 'http://localhost/admin/public/username';

const cekNama = (text) => {
	const nama= $(text).val();
    const len= nama.length;
    if(len>0){ //jika ada isinya
        if(!valid_nama(nama)){ //jika nama tidak valid
            $(text).parent().find('.text-warning').text("");
            $(text).parent().find('.text-warning').text("Nama Tidak Valid");
            return apply_feedback_error(text);
        } else {
            if (len>30){ //jika karakter >30
                $(text).parent().find('.text-warning').text("");
                $(text).parent().find('.text-warning').text("Maximal Karakter 30");
                return apply_feedback_error(text);
            }
        }
    }
}

const cekTelp = (text) => {
    const no_telp=$(text).val();
    const len=no_telp.length;
    if (len>0 && len<=10){
        $(text).parent().find('.text-warning').text("");
        $(text).parent().find('.text-warning').text("Nomer Telp/HP terlalu pendek");
        return apply_feedback_error(text);
    } else {
        if(!valid_no_telp(no_telp) && len>0){
            $(text).parent().find('.text-warning').text("");
            $(text).parent().find('.text-warning').text("Format nomer Telp/HP tidak sah.(ex: +6285736262623)");
            return apply_feedback_error(text);
        } else {
            if (len >13){
                $(text).parent().find('.text-warning').text("");
                $(text).parent().find('.text-warning').text("Nomer Telp/HP terlalu Panjang");
                return apply_feedback_error(text);
            }
        }
    }
}

const cekAlamat = (text) => {
    const alamat=$(text).val();
    const len=alamat.length;
    if (len>0 && len<8) {
        $(text).parent().find('.text-warning').text("");
        $(text).parent().find('.text-warning').text("alamat minimal 8 karakter");
        return apply_feedback_error(text);
    } else {
        if(len>50) {
            $(text).parent().find('.text-warning').text("");
            $(text).parent().find('.text-warning').text("alamat maximal 50 karakter");
            return apply_feedback_error(text);
        }
    }
}

//mengecek password
const cekPassword = (text) => {
    var password=$(text).val();
    var len=password.length;
    if (len>0 && len<5) {
        $(text).parent().find('.text-warning').text("");
        $(text).parent().find('.text-warning').text("password minimal 5 karakter");
        return apply_feedback_error(text);
    } else {
        if(len>15) {
            $(text).parent().find('.text-warning').text("");
            $(text).parent().find('.text-warning').text("password maximal 15 karakter");
            return apply_feedback_error(text);
        }
    }
}
//mengecek konfirmasi password
const cekConfimPass = (text) => {
    var k_password = $("#password").val();
    var conf=$(text).val();
    var len=conf.length;
    if (len>0 && k_password!==conf) {
        $(text).parent().find('.text-warning').text("");
        $(text).parent().find('.text-warning').text("Konfirmasi Password tidak sama dengan password");
        return apply_feedback_error(text);
    }
}

//mengecek text box email
const cekEmail = (text) => {
    var email= $(text).val();
    var len= email.length;
    if(len>0){ 
        if(!valid_email(email)){ 
            $(text).parent().find('.text-warning').text("");
            $(text).parent().find('.text-warning').text("E-mail Tidak Valid (ex: aaaa@yahoo.co.id)");
            return apply_feedback_error(text);
        } else {
            if (len>50){ 
                $(text).parent().find('.text-warning').text("");
                $(text).parent().find('.text-warning').text("Maximal Karakter 50");
                return apply_feedback_error(text);
            } 
        }
    } 
}

//mengecek username
const cekUsername = (text) => {
    var username=$(text).val();
    var len=username.length;
    if (len>0 && len<5) {
        $(text).parent().find('.text-warning').text("");
        $(text).parent().find('.text-warning').text("Username minimal 5 karakter");
        return apply_feedback_error(text);
    } else {
        if(len>15) {
            $(text).parent().find('.text-warning').text("");
            $(text).parent().find('.text-warning').text("Username maximal 15 karakter");
            return apply_feedback_error(text);
        } else {
            var valid = false;
            $.ajax({
                url: linkCekUsername,
                type: "POST",
                data: "username="+username,
                dataType: "text",
                success: function(data){
                    const dt = JSON.parse(data);
                    if (dt){ //pada file check username.php, apabila username sudah ada di database makan akan mengembalikan nilai 0
                        $('#username').parent().find('.text-warning').text("");
                        $('#username').parent().find('.text-warning').text("username sudah ada");
                        return apply_feedback_error('#username');
                    }
                }
            });
        }
    }
}

export { cekNama, cekTelp, cekAlamat, cekPassword, cekConfimPass, cekEmail, cekUsername };