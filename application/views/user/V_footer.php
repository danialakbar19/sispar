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
    $('#basis-kasus').hide();
    $('#gejala-dipilih').hide();
    $('#hasil-konsul').hide();
    $('#hide-btn').hide();

    const url = window.location.href.split('/').slice(0, 4).join('/');
    const pathname = window.location.pathname.split('/')[2];
    const link = url + '/' + pathname;

    $('.navbar-nav').find('a').each(function() {
        const href = $(this).attr('href');
        if (link == href || document.location.href == href) {
            $(this).parents().addClass("active");
            $(this).addClass("active");
            // add class as you need ul or li or a 
        }
    });

    function lihathasil() {
        $('#basis-kasus').show();
        $('#gejala-dipilih').show();
        $('#hasil-konsul').show();
        $('#show-btn').hide();
        $('#hide-btn').show();
    }

    function tutuphasil() {
        $('#basis-kasus').hide();
        $('#gejala-dipilih').hide();
        $('#hasil-konsul').hide();
        $('#show-btn').show();
        $('#hide-btn').hide();
    }
</script>

</body>

</html>