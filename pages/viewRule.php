<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Data Rule</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p></p>
        <div style="width:20%"><a href="?page=addRule" class="btn btn-block btn-default">Tambah Rule</a></div>
        <p></p>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Rule</th>
                    <th>Rule</th>
                    <th>Then</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'src/koneksi.php';
                $sql = $kon->query("SELECT * FROM rule a INNER JOIN himpunan b ON a.then_rule=b.id_himpunan ORDER BY a.kode_rule ASC");
                $no = 1;
                while ($data = $sql->fetch_assoc()) {
                    $rules = "IF ";
                    $dataRule = json_decode($data['if_rule']);
                    $index = 0;
                    foreach ($dataRule as $key) {
                        $sqlRule = $kon->query("SELECT b.nama_variabel,a.nama_himpunan FROM himpunan a INNER JOIN variabel b ON a.id_variabel=b.id_variabel WHERE a.id_himpunan=$key ORDER BY id_himpunan");
                        $dataNama = $sqlRule->fetch_assoc();
                        if ($index == 0) {
                            $rules = $rules . $dataNama['nama_variabel'] . " IS " . $dataNama['nama_himpunan'] . " ";
                        } else {
                            $rules = $rules . " AND " . $dataNama['nama_variabel'] . " IS " . $dataNama['nama_himpunan'];
                        }
                        $index++;
                    }

                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['kode_rule'] ?></td>
                        <td><?php echo  $rules ?></td>
                        <td><?php echo $data['nama_himpunan'] ?></td>
                        <td><a href='?page=editRule&id=<?php echo $data['id_rule'] ?>' class='btn btn-default'>Edit</a>
                            <a href="?page=aksi&aksi=delRule&id=<?php echo $data['id_rule'] ?>" class='btn btn-default'>Hapus</a></td>
                    </tr>
                <?php
                    $no++;
                }
                if ($sql->num_rows < 1) {
                ?>
                    <tr>
                        <th colspan="5">
                            <center>Data Kosong</center>
                        </th>
                    </tr>
                <?php
                }

                ?>


            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>