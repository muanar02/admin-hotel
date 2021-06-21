<div id="page-petugas">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $data['judul']; ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <a href="<?= BASEURL; ?>/petugas/tampilFormTambah" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Tambah Data Petugas
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Petugas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>No. Telp/HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($data['petugas'] as $dt) : 
                        ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $dt['username']; ?></td>
                                <td><?= $dt['email']; ?></td>
                                <td><?= $dt['nama']; ?></td>
                                <td><?= $dt['no_telp']; ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/petugas/tampilFormUbah/<?= $dt['id_user']; ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </a>
                                    <a href="<?= BASEURL; ?>/petugas/hapus/<?= $dt['id_user']; ?>" class="btn btn-sm btn-danger hapus">
                                        <i class="fas fa-trash-alt fa-fw"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php 
                            $i++;
                            endforeach; 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>