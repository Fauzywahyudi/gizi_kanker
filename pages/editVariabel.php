<?php
include 'src/koneksi.php';

$id = $_GET['id'];
$sql = $kon->query("SELECT * FROM `variabel` WHERE id_variabel='$id'");
$data = $sql->fetch_assoc();

?>
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
                    <input type="text" name="kode" value="<?php echo $data['kode_variabel'] ?>" class="form-control" id="" placeholder="Kode Variabel">
                </div>
                <div class="form-group">
                    <label for="">Nama Variabel</label>
                    <input type="text" name="nama" value="<?php echo $data['nama_variabel'] ?>" class="form-control" id="" placeholder="Nama Variabel">
                </div>
                <div class="form-group">
                    <label for="">Tipe Variabel</label>
                    <select name="tipe" id="" class="form-control">
                        <?php
                        if ($data['tipe_variabel'] == "Output") {
                        ?>
                            <option value="Output">Output</option>
                            <option value="Input">Input</option>
                        <?php
                        } else {
                        ?>
                            <option value="Input">Input</option>
                            <option value="Output">Output</option>
                        <?php
                        }
                        ?>

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
                $ins = $kon->query("UPDATE `variabel` SET 
                `kode_variabel`='$kode',
                `nama_variabel`='$nama',
                `tipe_variabel`='$tipe' 
                WHERE id_variabel='$data[id_variabel]'");
                echo "<script>
            window.location='index.php?page=viewVariabel';
            </script>";
            }


            ?>

        </form>
    </div>
</div>