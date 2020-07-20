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
                    <input type="text" name="kode" class="form-control" id="" placeholder="Kode Rule">
                </div>
                <hr>

                <div class="form-group">
                    <label for=""><?php echo "IF" ?></label>
                </div>
                <?php
                include 'src/koneksi.php';

                $sqlInput = $kon->query("SELECT * FROM variabel WHERE tipe_variabel='Input'");

                while ($dataInput = $sqlInput->fetch_array()) {
                    $sqlHimpunan = $kon->query("SELECT * FROM himpunan WHERE id_variabel='$dataInput[id_variabel]'");
                ?>



                    <div class="form-group">
                        <label for=""><?php echo $dataInput['nama_variabel'] ?></label>
                        <select name="<?php echo $dataInput['id_variabel'] ?>" id="" class="form-control">
                            <?php

                            while ($dataHimpunan = $sqlHimpunan->fetch_array()) {
                            ?>
                                <option value="<?php echo $dataHimpunan['id_himpunan'] ?>"><?php echo $dataHimpunan['nama_himpunan'] ?></option>
                            <?php
                            }
                            ?>


                        </select>
                    </div>

                <?php
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
                            <?php

                            while ($dataHimpunan = $sqlHimpunan->fetch_array()) {
                            ?>
                                <option value="<?php echo $dataHimpunan['id_himpunan'] ?>"><?php echo $dataHimpunan['nama_himpunan'] ?></option>
                            <?php
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
                    $ins = $kon->query("INSERT INTO `rule`(`id_rule`, `kode_rule`, `if_rule`, `then_rule`) VALUES (NULL,'$kode',' $if',' $then')");
                    echo "<script>
                    window.location='index.php?page=viewRule';
                    </script>";
                }
            }


            ?>

        </form>
    </div>
</div>