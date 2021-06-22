import {valid_text, valid_nomor, valid_email, apply_feedback_error, get_error_text} from './cekvalidate.js';

const linkCekUsername = 'http://localhost/admin/public/username';

const cekNama = (text) => {
	const nama= $(text).val();
    const len= nama.length;
    if(len>0){ //jika ada isinya
        if(!valid_text(nama)){ //jika nama tidak valid
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
        if(!valid_nomor(no_telp) && len>0){
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

//mengecek nama bank
const cekBank = (text) => {
    var bank= $(text).val();
    var len= bank.length;
    if (len>0 && len<3) {
        $(text).parent().find('.text-warning').text("");
        $(text).parent().find('.text-warning').text("Nama Bank minimal 3 karakter");
        return apply_feedback_error(text);
    } else {
        if(len>30) {
            $(text).parent().find('.text-warning').text("");
            $(text).parent().find('.text-warning').text("Nama Bank maximal 30 karakter");
            return apply_feedback_error(text);
        }
    }

}

//mengecek nama nasabah
const cekNamaNas = (text) => {
    var nama_nas= $(text).val();
    var len= nama_nas.length;
    if (len>0 && len<3) {
        $(text).parent().find('.text-warning').text("");
        $(text).parent().find('.text-warning').text("Nama Nasabah minimal 3 karakter");
        return apply_feedback_error(text);
    } else {
        if(len>30) {
            $(text).parent().find('.text-warning').text("");
            $(text).parent().find('.text-warning').text("Nama Nasabah maximal 30 karakter");
            return apply_feedback_error(text);
        }
    }
}

//mengecek no rekening
const cekNoRekening = (text) => {
    var norek=$(text).val();
    var len=norek.length;
    if (len>0){
        if(!valid_nomor(norek)){
            $(text).parent().find('.text-warning').text("");
            $(text).parent().find('.text-warning').text("Format No. Rekening tidak sah.(ex: 1520000440046 )");
            return apply_feedback_error(text);
        } else {
            if (len >16){
                $(text).parent().find('.text-warning').text("");
                $(text).parent().find('.text-warning').text("No. Rekening maximal 16 karakter");
                return apply_feedback_error(text);
            }
        }
    }
}

//upload gambar
const uploadGambar = (upload, img, link) => {
    new AjaxUpload(upload, {
        action: `${link}/petugas/image`,
        name: 'upload',
        onSubmit: function(file, ext){
            if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                // extension is not allowed
                alert('Hanya file JPG, PNG atau GIF yang diperbolehkan');
                return false;
            }
    
        }, onComplete: function(file, response){
            //Add uploaded file to list
            if(response==="success"){
                upload.innerHTML = '<img src="'+link+'/img/upload/'+file+'" class="img-thumbnail" alt="" width="150" /> '+file;
                img.value = file;
            } else{
                upload.innerHTML = '<img src="'+link+'/img/upload/noimage.png" alt="Upload" width="150"/> Failed';
                img.value = file;
            }
        }
    });
}


export { 
    cekNama, 
    cekTelp, 
    cekAlamat, 
    cekPassword, 
    cekConfimPass, 
    cekEmail, 
    cekUsername, 
    cekBank, 
    cekNamaNas, 
    cekNoRekening, 
    uploadGambar
};