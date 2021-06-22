import {get_error_text} from './cekvalidate.js';

const tambahData = (text, link, name) => {
    const href = $(text).attr('action');
    let valid = true;		
    $(text).find('.textbox').each(function(){
        if (! $(this).val()){
            get_error_text(this);
            valid = false;
            $(text).animate({scrollTop: 0},"slow");
        } 
        if ($(this).hasClass('no-valid')){
            valid = false;
            $(text).animate({scrollTop: 0},"slow");
        }
    });
    if (valid){
        swal({
            title: "Konfirmasi Simpan Data",
            text: "Data Akan di Simpan Ke Database",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#1da1f2",
            confirmButtonText: "Yakin, dong!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },function () { //apabila sweet alert d confirm maka akan mengirim data ke simpan.php melalui proses ajax
            $.ajax({
                url: href,
                type: "POST",
                data: $(text).serialize(), //serialize() untuk mengambil semua data di dalam form
                dataType: "html",
                success: function(){                
                    setTimeout(function(){
                    swal({
                        title:"Data Berhasil Disimpan",
                        text: "Terimakasih",
                        type: "success"
                    }, function(){
                        window.location=`${link}/${name}`;
                    });
                    }, 2000);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    setTimeout(function(){
                        swal("Error", "Tolong Cek Koneksi Lalu Ulangi", "error");
                }, 2000);}
            });
        });
    }
}


export { tambahData };