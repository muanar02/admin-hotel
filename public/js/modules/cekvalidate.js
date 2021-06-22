//fungsi cek text
const valid_text = (text) => {
    var pola= new RegExp(/^[a-z A-Z]+$/);
    return pola.test(text);
}

//fungsi cek nomor 
const valid_nomor = (nomor) => {
    var pola = new RegExp(/^[0-9-+]+$/);
    return pola.test(nomor);
}

//fungsi cek email
const valid_email = (email) => {
    var pola= new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
    return pola.test(email);
}

//menerapkan gaya validasi form bootstrap saat terjadi eror
const apply_feedback_error = (textbox) => {
    $(textbox).addClass('no-valid'); //menambah class no valid
    $(textbox).parent().find('.text-warning').show();
    $(textbox).closest('div').removeClass('has-success');
    $(textbox).closest('div').addClass('has-warning');
    $(textbox).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-ok');
    $(textbox).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-warning-sign');
}

//untuk mendapat eror teks saat textbox kosong, digunakan saat submit form dan blur fungsi
const get_error_text = (textbox) => {
    $(textbox).parent().find('.text-warning').text("");
    $(textbox).parent().find('.text-warning').text("Tidak Boleh Kosong");
    return apply_feedback_error(textbox);
}

export { valid_text, valid_nomor, valid_email, apply_feedback_error, get_error_text };