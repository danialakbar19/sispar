<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
    </div>

    <!-- Data Penyakit -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Gejala Yang Ada</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <h5 class="card-title text-center" style="font-weight:lighter"><strong><?= $penyakit['nama_jenis']; ?></strong></h5><br>
                <?php foreach ($detail as $row) { ?>
                    <p class="card-text text-justify" style="font-weight:400">
                        G-<?= $row['id_ciri'] . " : " . $row['nama_ciri']; ?>
                    </p>
                <?php }; ?>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $sub_judul . " " . $penyakit['nama_jenis']; ?></h6>
        </div>
        <div class="card-body">
            <h5 class="card-title text-center" style="font-weight:lighter"><strong>Silahkan Masukkan Gejala</strong></h5>
            <form class="form-group" method="post" action="">
                <input type="hidden" name="id_jenis" id="id_jenis" value="<?= $penyakit['id_jenis']; ?>">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Gejala</label>
                    <select class="form-control" id="id_gejala" name="id_gejala">
                        <option value="" selected>-- Pilih Gejala --</option>
                        <?php foreach ($gejala as $row) { ?>
                            <option value="<?= $row['id_ciri']; ?>">
                                G-<?= $row['id_ciri'] . " : " . $row['nama_ciri']; ?>
                            </option>
                        <?php }; ?>
                    </select>
                    <?= form_error('id_gejala', '<small class="text-danger mt-2 pl-2">', '</small><br>'); ?>
                    <br>
                    <small class="text-danger">** Silahkan Masukkan Gejala Yang Belum Ada Pada Basis Kasus</small>
                </div>

                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-sm btn-outline-success"><i class="fas fa-paper-plane"></i> Tambah</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->