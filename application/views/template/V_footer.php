<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span style="font-size:14px; font-weight:300">Copyright &copy; Website Sistem Pakar 2021 | Credit By : Sistem CBR</span>
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
            <div class="modal-body">Select "Logout" jika ingin keluar dari sistem.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>

<script type="text/javascript">
    const url = window.location.href.split('/').slice(0, 4).join('/');
    const pathname = window.location.pathname.split('/')[2];
    const link = url + '/' + pathname;

    $('.navbar-nav li').find('a').each(function() {
        const href = $(this).attr('href');
        if (link == href || document.location.href == href) {
            $(this).parents().addClass("active");
            $(this).addClass("active");
            // add class as you need ul or li or a
        }
    });
</script>

<script type="text/javascript">
    function tambahGejala() {
        var idf = document.getElementById("idf").value;
        var stre;
        stre =
            `<div class="form-group" id="srow${idf}">
                <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Gejala</label>
                     </div>
                     <select class="custom-select" id="gejala[]" name="gejala[]">
                        <option selected>Pilih Gejala...</option>
                        <?php foreach ($gejala as $row) { ?>
                           <option value="<?= $row['id_ciri']; ?>"><?= $row['nama_ciri']; ?></option>
                        <?php }; ?>
                     </select>
                     <a class="btn btn-danger ml-2" href="#" onclick="hapusElemen('#srow${idf}')"><i class="fas fa-trash"></i></a>
                </div>
            </div>`;

        $("#divGejala").append(stre);
        idf = (idf - 1) + 2;
        document.getElementById("idf").value = idf;
    }

    function hapusElemen(idf) {
        $(idf).remove();
    }
</script>

</body>

</html>
