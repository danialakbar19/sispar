<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $sub_judul; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form class="form-group" method="post" action="">
                    <input type="hidden" name="id_ciri" id="id_ciri" value="<?= $gejala['id_ciri']; ?>">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Gejala</label>
                        <input type="text" class="form-control" name="gejala" id="gejala" placeholder="Masukkan Gejala" value="<?= $gejala['nama_ciri']; ?>">
                        <?= form_error('gejala', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Bobot</label><br>
                        <small class="text-danger">Masukkan Nilai dari 1 - 5 !</small>
                        <input type="number" class="form-control col-md-4" name="bobot" id="bobot" placeholder="Nilai Bobot" value="<?= $gejala['bobot']; ?>">
                        <?= form_error('bobot', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>

                    <br><br>

                    <div class="form-group">
                        <span class="text-danger">* Semakin besar nilai bobot, semakin besar pengaruh gejala terhadap penyakit.</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
