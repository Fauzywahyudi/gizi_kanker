<div class="container">
    <div class="card card-primary mt-2">
        <div class="card-header bg-pink">
            <h3 class="card-title">Tambah Variabel</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Kode Variabel</label>
                    <input type="text" name="kode" class="form-control" id="" placeholder="Kode Variabel">
                </div>
                <div class="form-group">
                    <label for="">Nama Variabel</label>
                    <input type="text" name="nama" class="form-control" id="" placeholder="Nama Variabel">
                </div>
                <div class="form-group">
                    <label for="">Tipe Variabel</label>
                    <select name="tipe" id="" class="form-control">
                        <option value="Input">Input</option>
                        <option value="Output">Output</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="simpan">Simpan</button>
            </div>

            <?php

            if (isset($_POST['simpan'])) {
                include 'src/koneksi.php';
                $kode = $_POST['kode'];
                $nama = $_POST['nama'];
                $tipe = $_POST['tipe'];
                $ins = $kon->query("INSERT INTO `variabel`(`id_variabel`, `kode_variabel`, `nama_variabel`, `tipe_variabel`) 
            VALUES (NULL,'$kode','$nama','$tipe')");
                echo "<script>
            window.location='index.php?page=viewVariabel';
            </script>";
            }


            ?>

        </form>
    </div>
</div>