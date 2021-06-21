import {deleteData} from './modules/delete.js';

$(document).ready(function() {
	const link = 'http://localhost/admin/public';

	$('.text-warning').hide();
	//untuk mengecek bahwa semua textbox tidak boleh kosong
	$('input, textarea').each(function(){ 
		$(this).blur(function(){ //blur function itu dijalankan saat element kehilangan fokus
			if (! $(this).val()){ //this mengacu pada text box yang sedang fokus
				return get_error_text(this); //function get_error_text ada di bawah
			} else {
				$(this).removeClass('no-valid'); 
				$(this).parent().find('.text-warning').hide();//cari element dengan class has-warning dari element induk text yang sedang focus
				$(this).closest('div').removeClass('has-warning');
				$(this).closest('div').addClass('has-success');
				$(this).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-warning-sign');
				$(this).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-ok');
			}
		});
	});
	console.log('eeee');
	$('#page-petugas').on('click', '.hapus', function(e){
		e.preventDefault();
        var href = $(this).attr('href');
		deleteData(href, link, 'petugas');
		console.log(href);
	});

	$('#tambah-petugas').ready(function(){
		console.log('ggggg');
	});

	//fungsi cek nama
	function valid_nama(nama) {
		var pola= new RegExp(/^[a-z A-Z]+$/);
		return pola.test(nama);
	}
	//fungsi cek phone 
	function valid_no_telp(no_telp){
		var pola = new RegExp(/^[0-9-+]+$/);
		return pola.test(no_telp);
	}
	//fungsi cek email
	function valid_email(email){
		var pola= new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
		return pola.test(email);
	}
	//menerapkan gaya validasi form bootstrap saat terjadi eror
	function apply_feedback_error(textbox){
		$(textbox).addClass('no-valid'); //menambah class no valid
		$(textbox).parent().find('.text-warning').show();
		$(textbox).closest('div').removeClass('has-success');
		$(textbox).closest('div').addClass('has-warning');
		$(textbox).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-ok');
		$(textbox).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-warning-sign');
	}

	//untuk mendapat eror teks saat textbox kosong, digunakan saat submit form dan blur fungsi
	function get_error_text(textbox){
		$(textbox).parent().find('.text-warning').text("");
		$(textbox).parent().find('.text-warning').text("Tidak Boleh Kosong");
		return apply_feedback_error(textbox);
	}


});
