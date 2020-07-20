<?php
include 'src/koneksi.php';
?>
<div class="container">
    <div class="card card-primary mt-2">
        <div class="card-header bg-pink">
            <h3 class="card-title">Tambah Himpunan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama Variabel</label>
                    <select name="variabel" class="form-control">
                        <option value="">-Pilih Variabel-</option>
                        <?php
                        $var = $kon->query("SELECT * FROM variabel ORDER BY kode_variabel ASC");
                        while ($data = $var->fetch_assoc()) {
                            echo "<option value='$data[id_variabel]'> ($data[tipe_variabel]) $data[nama_variabel] </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama Himpunan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Himpunan">
                </div>
                <div class="form-group">
                    <label for="">Range</label>
                    <input type="text" name="range" class="form-control" placeholder="Range ( ex: 30,50 or 30,50,70 )">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="simpan">Simpan</button>
            </div>

            <?php

            if (isset($_POST['simpan'])) {

                $variabel   = $_POST['variabel'];
                $nama       = $_POST['nama'];
                $range      = $_POST['range'];

                $ins = $kon->query("INSERT INTO `himpunan`(`id_himpunan`, `id_variabel`, `nama_himpunan`, `range_himpunan`) 
                VALUES (NULL,'$variabel','$nama','$range')");
                echo "<script>
            window.location='index.php?page=viewHimpunan';
            </script>";
            }


            ?>

        </form>
    </div>
</div>