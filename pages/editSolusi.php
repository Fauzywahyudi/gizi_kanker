<?php
include 'src/koneksi.php';
$id = $_GET['id'];
$sql = $kon->query("SELECT * FROM `solusi` WHERE id_solusi='$id'");
$data = $sql->fetch_assoc();
?>
<div class="container">
    <div class="card card-primary mt-2">
        <div class="card-header bg-pink">
            <h3 class="card-title">Tambah Solusi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Tipe Solusi</label>
                    <input type="text" name="tipe" class="form-control" placeholder="Tipe Solusi" value="<?php echo $data['tipe'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama Solusi</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Solusi" value="<?php echo $data['solusi'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="ket" class="form-control" cols="30" rows="10" placeholder="Keterangan"><?php echo $data['ket'] ?></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="simpan">Simpan</button>
            </div>

            <?php

            if (isset($_POST['simpan'])) {
                $tipe   = $_POST['tipe'];
                $nama   = $_POST['nama'];
                $ket     = $_POST['ket'];
                $ins = $kon->query("UPDATE `solusi` SET `tipe`='$tipe',`solusi`='$nama',`ket`='$ket' WHERE id_solusi='$id'");
                echo "<script>
            window.location='index.php?page=viewSolusi';
            </script>";
            }


            ?>

        </form>
    </div>
</div>