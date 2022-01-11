<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4"><?= $sub_judul; ?></h1>
        <p class="lead">Silahkan masukkan gejala yang anda alami dan sispar akan <br> memberikan diagnosa terhadap penyakit Kucing anda.</p>
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-12 mb-4 info-konsul">
            <div class="col mr-2">
                <div class="text-xs text-center font-weight-bold text-uppercase mb-3">
                    <h5>
                        Silahkan Masukkan Gejala Yang Anda Alami ??
                    </h5>
                </div>
                <hr>

                <div class="col-md-lg">
                    <form class="user" method="post" action="<?= base_url('konsultasi/proses'); ?>">
                        <?php
                        $no = 1;
                        foreach ($ciri as $row) { ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="ciri[]" id="ciri[]" value="<?= $row['id_ciri']; ?>">
                                    </div>
                                </div>
                                <input readonly type="text" name="labelciri" class="form-control" value="<?= $row['nama_ciri']; ?>">
                            </div>
                        <?php }; ?>
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> &nbsp;Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-success mt-4">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Website Sistem Pakar 2021 | Credit By : Metode CBR</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
