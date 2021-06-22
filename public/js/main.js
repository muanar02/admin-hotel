import {valid_nama, valid_no_telp, valid_email, apply_feedback_error, get_error_text} from './modules/cekvalidate.js';
import {cekNama, cekTelp, cekAlamat, cekPassword, cekConfimPass, cekEmail, cekUsername} from './modules/cekForm.js';
import {deleteData} from './modules/delete.js';
import { tambahData } from './modules/tambah.js';
import { ubahData } from './modules/ubah.js';

$(document).ready(function() {
	const link = 'http://localhost/admin/public';

	//semua element dengan class text-warning akan di sembunyikan saat load
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

	$('#page-petugas').on('click', '.hapus', function(e){
		e.preventDefault();
		const name = 'petugas';
		deleteData(this, link, name);
	});

	// $('#page-petugas').on('click keyup keydown', '#dataTable_filter input', function(e){
	// 	e.preventDefault();
	// 	const value = $(this).val();
	// 	console.log(value);
	// });

	$('#tambah-petugas').ready(function(){
		$('#nama').blur(function(e){
			cekNama(this);
		});

		$('#telp').blur(function(){
			cekTelp(this);
		});

		$('#alamat').blur(function(){
			cekAlamat(this);
		});

		$('#password').blur(function(){
			cekPassword(this);
		});

		$('#confirmPass').blur(function(){
			cekConfimPass(this);
		});

		$('#email').blur(function(){
			cekEmail(this);
		});

		$('#username').blur(function(){
			cekUsername(this);
		});

		$('#formTambahPetugas').submit( function(e){
			e.preventDefault();
			const name = 'petugas';
			tambahData(this, link, name);
		});

		$('#formUbahPetugas').submit( function(e){
			e.preventDefault();
			const name = 'petugas';
			ubahData(this, link, name)
		});
	});
});

