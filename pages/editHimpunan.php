<?php
include 'src/koneksi.php';

$id = $_GET['id'];
$sql = $kon->query("SELECT * FROM `himpunan` a INNER JOIN variabel b ON a.id_variabel=b.id_variabel WHERE id_himpunan='$id'");
$data = $sql->fetch_assoc();

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
                        <option value="<?php echo $data['id_variabel'] ?>"><?php echo '(' . $data['tipe_variabel'] . ') ' . $data['nama_variabel'] ?></option>

                        <?php
                        $var = $kon->query("SELECT * FROM variabel ORDER BY kode_variabel ASC");
                        while ($variabel = $var->fetch_assoc()) {
                            if ($data['id_variabel'] != $variabel['id_variabel']) {
                                echo "<option value='$variabel[id_variabel]'> ($variabel[tipe_variabel]) $variabel[nama_variabel] </option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama Himpunan</label>
                    <input type="text" name="nama" value="<?php echo $data['nama_himpunan'] ?>" class="form-control" placeholder="Nama Himpunan">
                </div>
                <div class="form-group">
                    <label for="">Range</label>
                    <input type="text" name="range" value="<?php echo $data['range_himpunan'] ?>" class="form-control" placeholder="Range ( ex: 30,50 or 30,50,70 )">
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

                $ins = $kon->query("UPDATE `himpunan` SET `id_variabel`='$variabel',
                `nama_himpunan`='$nama',
                `range_himpunan`='$range'
                 WHERE id_himpunan='$data[id_himpunan]'");
                echo "<script>
            window.location='index.php?page=viewHimpunan';
            </script>";
            }


            ?>

        </form>
    </div>
</div>