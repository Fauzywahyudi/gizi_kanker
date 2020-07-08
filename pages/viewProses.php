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
                <div class="form-group">
                    <label for="">Berat Badan</label>
                    <input type="number" name="berat" class="form-control" placeholder="Berat Badan">
                </div>
                <div class="form-group">
                    <label for="">Tinggi Badan</label>
                    <input type="number" name="tinggi" class="form-control" placeholder="Tinggi Badan">
                </div>
                <div class="form-group">
                    <label for="">Stadium</label>
                    <select name="stadium" class="form-control">
                        <option value="">-Pilih Stadium-</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>

                    </select>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="simpan">Simpan</button>
            </div>

            <?php

            if (isset($_POST['simpan'])) {

                $pasien   = $_POST['pasien'];

                $variabel = $kon->query("SELECT * FROM variabel WHERE tipe_variabel='Input' ORDER BY id_variabel");

                // $berat       = $_POST['berat'];
                // $tinggi      = $_POST['tinggi'];
                // $stadium      = $_POST['stadium'];

                $sqlPasien = $kon->query("SELECT * FROM `pasien` WHERE id_pasien='$pasien'");

                $dataPasien = $sqlPasien->fetch_assoc();
                $now = date('Y');
                $year = substr($dataPasien['tgl_lahir'], 0, 4);
                $umur = $now - $year;

                step1($umur, $berat, $tinggi, $stadium);
            }


            ?>

        </form>
    </div>
</div>


<?php

function step1($umur, $berat, $tinggi, $statium)
{
    include 'src/koneksi.php';


    $variabel = $kon->query("SELECT * FROM variabel WHERE tipe_variabel='Input' ORDER BY id_variabel");
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
            if($unionArr)


        } else if ($jumDataUnion == 4) {

        }
    }
    return null;
}

?>