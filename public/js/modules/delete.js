const deleteData = (href, link, name) => {
    swal({
        title: "Apakan anda yakin!",
        text: "Anda tidak dapat mengembalikan data ini!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#1da1f2",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
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
                            title:"Data berhasil dihapus!",
                            type: "success"
                        }, () =>{
                            window.location=`${link}/${name}`;
                        });
                    } else {
                        swal({
                            title:"Data gagal dihapus!",
                            type: "error"
                        }, () => {
                            window.location=`${link}/${name}`;
                        });
                    }
                }, 2000);
            },
            error: () => {
                setTimeout(() => {
                    swal("Error", "Tolong cek koneksi internet anda!", "error");
            }, 2000);}
        });
    });
}
export { deleteData };