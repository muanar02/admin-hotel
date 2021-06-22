<div id="page-bank">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $data['judul']; ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <a href="<?= BASEURL; ?>/bank/tampilFormTambah" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Tambah <?= $data['judul']; ?>
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $data['judul']; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bank</th>
                            <th>No. Rekening</th>
                            <th>Nama Nasabah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($data['bank'] as $dt) : 
                        ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $dt['bank']; ?></td>
                                <td><?= $dt['norek']; ?></td>
                                <td><?= $dt['nama_nas']; ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/bank/tampilFormUbah/<?= $dt['id_bank']; ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </a>
                                    <a href="<?= BASEURL; ?>/bank/hapus/<?= $dt['id_bank']; ?>" class="btn btn-sm btn-danger hapus">
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