<?php
include 'src/koneksi.php';

$id = $_GET['id'];
$sql = $kon->query("SELECT * FROM `rule` WHERE id_rule='$id'");
$data = $sql->fetch_assoc();
$if_rule = json_decode($data['if_rule']);
$namaHimpunan = array();
foreach ($if_rule as $key) {
    $sqlNama = $kon->query("SELECT nama_himpunan FROM himpunan WHERE id_himpunan='$key'");
    $dataNama = $sqlNama->fetch_assoc();
    $namaHimpunan[] = $dataNama['nama_himpunan'];
}

?>
<div class="container">
    <div class="card card-primary mt-2">
        <div class="card-header bg-pink">
            <h3 class="card-title">Tambah Rule</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Kode Rule</label>
                    <input type="text" name="kode" value="<?php echo $data['kode_rule'] ?>" class="form-control" id="" placeholder="Kode Rule">
                </div>
                <hr>

                <div class="form-group">
                    <label for=""><?php echo "IF" ?></label>
                </div>
                <?php
                include 'src/koneksi.php';

                $sqlInput = $kon->query("SELECT * FROM variabel WHERE tipe_variabel='Input'");

                $index = 0;
                while ($dataInput = $sqlInput->fetch_array()) {
                    $sqlHimpunan = $kon->query("SELECT * FROM himpunan WHERE id_variabel='$dataInput[id_variabel]'");
                ?>
                    <div class="form-group">
                        <label for=""><?php echo $dataInput['nama_variabel'] ?></label>
                        <select name="<?php echo $dataInput['id_variabel'] ?>" id="" class="form-control">
                            <option value="<?php echo $if_rule[$index] ?>"> <?php echo $namaHimpunan[$index] ?></option>
                            <?php

                            while ($dataHimpunan = $sqlHimpunan->fetch_array()) {
                                if ($if_rule[$index] != $dataHimpunan['id_himpunan']) {
                            ?>
                                    <option value="<?php echo $dataHimpunan['id_himpunan'] ?>"><?php echo $dataHimpunan['nama_himpunan'] ?></option>
                            <?php
                                }
                            }
                            ?>


                        </select>
                    </div>

                <?php
                    $index++;
                }
                ?>
                <hr>
                <div class="form-group">
                    <label for=""><?php echo "THEN" ?></label>
                </div>
                <?php

                $sqlOutput = $kon->query("SELECT * FROM variabel WHERE tipe_variabel='Output'");

                while ($dataOutput = $sqlOutput->fetch_array()) {
                    $sqlHimpunan = $kon->query("SELECT * FROM himpunan WHERE id_variabel='$dataOutput[id_variabel]'");
                ?>

                    <div class="form-group">
                        <label for=""><?php echo $dataOutput['nama_variabel'] ?></label>
                        <select name="then" id="" class="form-control">
                            <?php $getNamaHim = $kon->query("SELECT nama_himpunan FROM himpunan WHERE id_himpunan='$data[then_rule]'");
                            $dataGetNamaHim = $getNamaHim->fetch_assoc();
                            ?>
                            <option value="<?php echo $data['then_rule']; ?>"><?php echo $dataGetNamaHim['nama_himpunan']; ?></option>
                            <?php

                            while ($dataHimpunan = $sqlHimpunan->fetch_array()) {
                                if ($data['then_rule'] != $dataHimpunan['id_himpunan']) {
                            ?>
                                    <option value="<?php echo $dataHimpunan['id_himpunan'] ?>"><?php echo $dataHimpunan['nama_himpunan'] ?></option>
                            <?php
                                }
                            }
                            ?>


                        </select>
                    </div>

                <?php
                }

                ?>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="simpan">Simpan</button>
            </div>

            <?php

            if (isset($_POST['simpan'])) {
                include 'src/koneksi.php';

                $sqlInput = $kon->query("SELECT * FROM variabel WHERE tipe_variabel='Input'");
                $data = array();
                while ($dataInput = $sqlInput->fetch_array()) {
                    $data[] = $_POST[$dataInput['id_variabel']];
                }

                $kode = $_POST['kode'];
                $if = json_encode($data);
                $then = $_POST['then'];
                if (empty($kode) || empty($if) || empty($then)) {
                    echo "<script>
                    alert('Harap isi semua data');
                </script>";
                } else {
                    $ins = $kon->query("UPDATE `rule` SET 
                    `kode_rule`='$kode',
                    `if_rule`='$if',
                    `then_rule`='$then' 
                    WHERE id_rule='$data[id_rule]'");
                    echo "<script>
                    window.location='index.php?page=viewRule';
                    </script>";
                }
            }


            ?>

        </form>
    </div>
</div>