<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
        <a href="<?= base_url('konsultasi'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-undo-alt fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-8 mb-2">
            <div class="card shadow mb-4 alert">
                <?php
                // Nilai Perhitungan Terbesar
                $max = max(array_column($final, 'hasil'));
                $key = array_search($max, array_column($final, 'hasil'));
                ?>
                <h5 class="mt-3" style="font-weight:lighter; font-size:17px; text-transform:uppercase">Menurut Hasil Diagnosa, Kucing Anda Terserang
                    <span style="font-weight:bold" class="text-success ml-3"> Penyakit <?= $final[$key]['nama_jenis']; ?> </span>
                </h5>

                <h5 style="font-weight:lighter; font-size:17px; text-transform:uppercase">
                    Dengan Nilai Analisa Sebasar <span class="text-primary ml-3" style="font-weight:bold"><?= $final[$key]['hasil'] * 100; ?> %</span>
                </h5>
            </div>
        </div>

        <!-- Tabel Hasil Perhitungan Similarity -->
        <div class="col-xl-12 col-md-8 mb-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan Similarity Value</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Penyakit</th>
                                    <th scope="col">Nama Penyakit</th>
                                    <th scope="col">Hasil (Dalam Persen)</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Penyakit</th>
                                    <th scope="col">Nama Penyakit</th>
                                    <th scope="col">Hasil (Dalam Persen)</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = 1;
                                // Tampilkan ke tabel
                                foreach ($final as $row) { ?>
                                    <tr>
                                        <strong>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['id_jenis'] ?></td>
                                            <td><?= $row['nama_jenis']; ?></td>
                                            <td>
                                                <?php
                                                    $hasil = $row['hasil'] * 100;
                                                    echo $hasil . ' %';
                                                    ?>
                                            </td>
                                        </strong>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-md-8 mb-4">
            <input id="show-btn" title="Lihat Hasil Perhitungan" type="button" value="Hasil Perhitungan" class="btn btn-outline-primary" onclick="lihathasil()">

            <input id="hide-btn" title="Tutup Hasil Perhitungan" type="button" value="Tutup Perhitungan" class="btn btn-outline-primary" onclick="tutuphasil()">
        </div>

        <!-- Tabel Basis Pengetahuan -->
        <div class="col-xl-8 col-md-8 mb-2">
            <div id="basis-kasus" class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Basis Penyakit</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Gejala</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Gejala</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = 1;
                                $jum = 1;

                                foreach ($klas as $row) { ?>
                                    <tr>
                                        <?php if ($jum <= 1) { ?>
                                            <td align="center" rowspan="<?= $row['jumlah']; ?>"><?= $no++; ?></td>
                                            <td rowspan="<?= $row['jumlah']; ?>"><?= $row['nama_jenis'] ?></td>
                                            <?php $jum = $row['jumlah']; ?>
                                        <?php } else { ?>
                                            <?php $jum = $jum - 1; ?>
                                        <?php } ?>

                                        <td><?= $row['nama_ciri']; ?></td>
                                    </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Gejala Dipilih -->
        <div class="col-xl-4 col-md-8 mb-2">
            <div id="gejala-dipilih" class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gejala Yang Dipilih</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Id Gejala</th>
                                    <th scope="col">Nama Gejala</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">Id Gejala</th>
                                    <th scope="col">Nama Gejala</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = 1;
                                $jum = 1;

                                foreach ($ciri as $gejala) { ?>
                                    <?php
                                        $gej = $gejala;
                                        $row = $this->db->query("SELECT * FROM tb_ciri WHERE id_ciri = $gej")->row_array();
                                        ?>
                                    <tr>
                                        <td><?= $row['id_ciri']; ?></td>
                                        <td><?= $row['nama_ciri']; ?></td>
                                    </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Hasil Perhitungan Similarity -->
        <div class="col-xl-12 col-md-8 mb-2">
            <div id="hasil-konsul" class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan Similarity Value</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kasus</th>
                                    <th scope="col">Jumlah Gejala Sama</th>
                                    <th scope="col">Jumlah Gejala Kasus</th>
                                    <th scope="col">Jumlah Gejala Dipilih</th>
                                    <th scope="col">Bobot Gejala Sama</th>
                                    <th scope="col">Bobot Gejala Kasus</th>
                                    <th scope="col">Hasil</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kasus</th>
                                    <th scope="col">Jumlah Gejala Sama</th>
                                    <th scope="col">Jumlah Gejala Kasus</th>
                                    <th scope="col">Jumlah Gejala Dipilih</th>
                                    <th scope="col">Bobot Gejala Sama</th>
                                    <th scope="col">Bobot Gejala Kasus</th>
                                    <th scope="col">Hasil</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = 1;
                                // Tampilkan ke tabel
                                foreach ($final as $row) { ?>
                                    <tr>
                                        <strong>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_jenis'] ?></td>
                                            <td><?= $row['jml_cocok']; ?></td>
                                            <td><?= $row['jml_gejala']; ?></td>
                                            <td><?= $row['jml_dipilih']; ?></td>
                                            <td><?= $row['bobot_sama']; ?></td>
                                            <td><?= $row['total_bobot']; ?></td>
                                            <td><?= $row['hasil']; ?></td>
                                        </strong>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
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
            <span>Copyright &copy; Website Sistem Pakar 2021 | Credit By : Sistem CBR</span>
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
