<?php //include_once('_header.php'); 
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Proses Penentuan Gizi Menggunakan Fuzzy Mamdani</b></h3>
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group row">
                <label class="col-sm-2">Nama</label>
                <div class="col-sm-10">
                    <input type="Text" name="nama" step=0.01 class="form-control" placeholder="Masukkan Nama Anda" value="<?php if (isset($_POST["submit"])) echo $_POST["nama"]
                                                                                                                            ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Umur</label>
                <div class="col-sm-10">
                    <input type="number" name="umur" step=0.01 class="form-control" placeholder="Masukkan Umur Anda" value="<?php if (isset($_POST["submit"])) echo $_POST["umur"]
                                                                                                                            ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Berat Badan</label>
                <div class="col-sm-10">
                    <input type="number" name="berat" step=0.01 class="form-control" placeholder="Masukkan Berat Badan Anda" value="<?php if (isset($_POST["submit"])) echo $_POST["berat"]
                                                                                                                                    ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Tinggi Badan</label>
                <div class="col-sm-10">
                    <input type="number" name="tinggi" step=0.01 class="form-control" placeholder="Masukkan Tinggi Badan Anda" value="<?php if (isset($_POST["submit"])) echo $_POST["tinggi"]
                                                                                                                                        ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2">Stadium</label>
                <div class="col-sm-10">
                    <input type="number" name="stadium" step=0.01 class="form-control" placeholder="Masukkan Stadium Penyakit Anda" value="<?php if (isset($_POST["submit"])) echo $_POST["stadium"]
                                                                                                                                            ?>" required autocomplete="off">
                </div>
            </div>


            <!-- <div class="form-group row">
            <label class="col-sm-2">Suhu</label>
            <div class="col-sm-10">
                <input type="number" name="suhu" step=0.01 class="form-control" placeholder="Masukkan Suhu 1-100 °C" value="<?php //if (isset($_POST["submit"])) echo $_POST["suhu"]
                                                                                                                            ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Kelembapan</label>
            <div class="col-sm-10">
                <input type="number" name="kelembapan" step=0.01 class="form-control" placeholder="Masukkan Kelembapan 1-100 %" value="<?php //if (isset($_POST["submit"])) echo $_POST["kelembapan"]
                                                                                                                                        ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Tinggi Air</label>
            <div class="col-sm-10">
                <input type="number" name="tinggiair" step=0.01 class="form-control" placeholder="Masukkan Tinggi Air 1-15 cm" value="<?php //if (isset($_POST["submit"])) echo $_POST["tinggiair"]
                                                                                                                                        ?>" required>
            </div>
        </div> -->
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn bg-pink">Proses</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include "_fuzzy.php";

if (isset($_POST["submit"])) {
?>
    <div class="card card-body">
        <?php
        //grafik suhu
        grafikfungsikeanggotaanumur();
        nilaigrafikumur($_POST["umur"]);

        //grafik kelembapan
        grafikfungsikeanggotaanberatbadan();
        nilaigrafikberatbadan($_POST["berat"]);

        //grafik tinggi air
        grafikfungsikeanggotaantinggibadan();
        nilaigrafiktinggibadan($_POST["tinggi"]);

        //grafik stadium
        grafikfungsikeanggotaanstadium();
        nilaigrafikstadium($_POST["stadium"]);


        //output
        grafikoutput();
        // gambarrules();


        hasilfuzzifikasi($_POST["umur"], $_POST["berat"], $_POST["tinggi"], $_POST["stadium"]);

        $final = inferensi($_POST["umur"], $_POST["berat"], $_POST["tinggi"], $_POST["stadium"]);

        include 'src/koneksi.php';

        $sqlins = $kon->query("INSERT INTO `hasil_cek`(`id_hasil`, `nama`, `umur`, `beratbadan`, `tinggibadan`, `stadium`, `hasil`) VALUES (NULL,'$_POST[nama]','$_POST[umur]','$_POST[berat]','$_POST[tinggi]','$_POST[stadium]',$final)");

        ?>
        <br>
        <h4><b>Solusi</b></h4>
        <div class="card">
            <?php
            $sqlSolusi = $kon->query("SELECT * FROM solusi");
            while ($dataSolusi = $sqlSolusi->fetch_array()) {
            ?>
                <div class="card-header bg-pink">
                    <b><?php echo $dataSolusi['tipe'] ?></b>
                </div>
                <div class="card-body">
                    <p><b><?php echo $dataSolusi['solusi'] ?></b></p>
                    <p><?php echo str_replace(";", "<br>", $dataSolusi['ket']) ?></p>
                </div>
            <?php
            }

            ?>

        </div>

    <?php

    echo "</div>";
}

// include_once('_foother.php');
    ?>