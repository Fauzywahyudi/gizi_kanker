<?php
include 'src/koneksi.php';

$id = $_GET['id'];
$sql = $kon->query("SELECT * FROM `pasien` WHERE id_pasien='$id'");
$data = $sql->fetch_assoc();

?>
<div class="container">
    <div class="card card-primary mt-2">
        <div class="card-header bg-pink">
            <h3 class="card-title">Tambah Pasien</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama Pasien</label>
                    <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control" placeholder="Nama Pasien">
                </div>
                <div class="form-group">
                    <label for="">Nama Variabel</label>
                    <select name="jk" class="form-control">
                        <?php if ($data['jk'] == 'Laki-laki') {
                        ?>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        <?php
                        } else {
                        ?>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki-laki">Laki-laki</option>
                        <?php
                        } ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" value="<?php echo $data['tgl_lahir'] ?>" name="tgl" class="form-control" placeholder="Tanggal Lahir">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="simpan">Simpan</button>
            </div>

            <?php

            if (isset($_POST['simpan'])) {
                $nama   = $_POST['nama'];
                $jk     = $_POST['jk'];
                $tgl    = $_POST['tgl'];
                $ins = $kon->query("UPDATE `pasien` SET `nama`='$nama',`jk`='$jk',`tgl_lahir`='$tgl' WHERE id_pasien='$data[id_pasien]'");
                echo "<script>
                window.location='index.php?page=viewPasien';
                </script>";
            }


            ?>

        </form>
    </div>
</div>