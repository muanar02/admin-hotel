

$(document).ready(function() {
	const link = 'http://localhost/admin/public';
	
	
	$('#page-petugas').on('click', '.hapus', function(e){
		e.preventDefault();
        var href = $(this).attr('href');
		swal({
            title: "Konfirmasi Hapus Data",
            text: "Semua Data Akan di Hapus dari Database",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#1da1f2",
            confirmButtonText: "Yakin, dong!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },() => { //apabila sweet alert d confirm maka akan mengirim data ke simpan.php melalui proses ajax
            $.ajax({
                url: href,
                dataType: "html",
                success: (data) => {
                    setTimeout(() => {
					  	if(data > 0) {
							swal({
								title:"Data Berhasil Dihapus",
								type: "success"
							}, () =>{
								window.location=`${link}/petugas`;
							});
						} else {
							swal({
								title:"Data Gagal Dihapus",
								type: "error"
							}, () => {
								window.location=`${link}/petugas`;
							});
						}
                    }, 2000);
                },
                error: () => {
                    setTimeout(() => {
                        swal("Error", "Tolong Cek Koneksi Lalu Ulangi", "error");
                }, 2000);}
            });
        });
	});
});