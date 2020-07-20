<?php
include 'src/koneksi.php';
?>
<div class="container">
    <div class="card card-primary mt-2">
        <div class="card-header bg-pink">
            <h3 class="card-title">Proses Fuzzy</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama Variabel</label>
                    <select name="pasien" class="form-control">
                        <option value="">-Pilih Pasien-</option>
                        <?php
                        $var = $kon->query("SELECT * FROM pasien ");
                        while ($data = $var->fetch_assoc()) {
                            $now = date('Y');
                            $year = substr($data['tgl_lahir'], 0, 4);
                            $tgl = $now - $year;
                            echo "<option value='$data[id_pasien]'> $data[nama] ($tgl tahun) </option>";
                        }
                        ?>
                    </select>
                </div>
                <?php
                $formVariabel = $kon->query("SELECT * FROM variabel WHERE tipe_variabel='Input' ORDER BY id_variabel");
                while ($dataFormVariabel = $formVariabel->fetch_array()) {
                ?>
                    <div class="form-group">
                        <label for=""><?php echo $dataFormVariabel['nama_variabel'] ?></label>
                        <input type="number" name="<?php echo $dataFormVariabel['id_variabel'] ?>" class="form-control" placeholder="<?php echo $dataFormVariabel['nama_variabel'] ?>">
                    </div>
                <?php
                }

                ?>

                <!-- <div class="form-group">
                    <label for="">Berat Badan</label>
                    <input type="number" name="berat" class="form-control" placeholder="Berat Badan">
                </div>
                <div class="form-group">
                    <label for="">Tinggi Badan</label>
                    <input type="number" name="tinggi" class="form-control" placeholder="Tinggi Badan">
                </div> -->


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="simpan">Simpan</button>
            </div>

            <?php

            if (isset($_POST['simpan'])) {

                $pasien   = $_POST['pasien'];

                $variabel = $kon->query("SELECT * FROM variabel WHERE tipe_variabel='Input' ORDER BY id_variabel");
                $jumVariabel = $variabel->num_rows;
                $dataForm = array();

                while ($dataVariabel = $variabel->fetch_array()) {
                    $dataForm[] = $_POST[$dataVariabel['id_variabel']];
                }

                $jsonData = json_encode($dataForm);

                $sqlPasien = $kon->query("SELECT * FROM `pasien` WHERE id_pasien='$pasien'");

                $dataPasien = $sqlPasien->fetch_assoc();
                $now = date('Y');
                $year = substr($dataPasien['tgl_lahir'], 0, 4);
                $umur = $now - $year;

                step1($jsonData);
            }


            ?>

        </form>
    </div>
</div>


<?php

function step1($data)
{
    include 'src/koneksi.php';

    $arrData = json_decode($data);
    print_r($arrData);
    exit;
    $variabel = $kon->query("SELECT * FROM variabel WHERE tipe_variabel='Input' ORDER BY id_variabel");
    $index = 0;
    while ($dataVariabel = $variabel->fetch_array()) {
        $idVariabel = $dataVariabel['id_variabel'];

        $himpunan = $kon->query("SELECT * FROM himpunan WHERE id_variabel='$idVariabel' ORDER BY id_himpunan");
        $objHimpunan = array();
        $unionArr = array();
        $strRange = "";
        $i = 0;
        while ($dataHimpunan = $himpunan->fetch_array()) {
            $objHimpunan[] = $dataHimpunan;
            $strRange = str_replace(' ', '', $dataHimpunan['range_himpunan']);
            $arrRange = explode(',', $strRange);
            if (count($arrRange) > 2) {
                $unionArr = $arrRange;
            }
            $i++;
        }
        $jumHimpunan = count($objHimpunan);
        $jumDataUnion = count($unionArr);

        if ($jumDataUnion == 3) {

            if ($arrData[$index] > $unionArr[0] && $arrData[$index] < $unionArr[1]) {
                # code...
            }
        }
    }
    return null;
}

?>