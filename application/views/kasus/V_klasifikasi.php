<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
        <a href="<?= base_url('klasifikasi/tambah'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"></i> Tambah</a>
    </div>

    <!-- notifikasi -->
    <?= $this->session->flashdata('info'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $sub_judul; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Kasus</th>
                            <th style="width:100px">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($klas as $row) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_jenis']; ?></td>
                                <td>
                                    <a title="Detail Kasus" href="<?= base_url('klasifikasi/detail/') . $row['id_jenis']; ?>" class="btn btn-circle btn-outline-warning mr-2"><i class="fas fa-info"></i></a>

                                    <a title="Hapus Basis Kasus" href="<?= base_url('klasifikasi/hapus/') . $row['id_jenis']; ?>" class="btn btn-circle btn-outline-danger" onclick="return confirm('Anda yakin menghapus data ini ?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->