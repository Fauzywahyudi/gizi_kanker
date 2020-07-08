<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Data Himpunan</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p></p>
        <div style="width:20%"><a href="?page=addHimpunan" class="btn btn-block btn-default">Tambah Data</a></div>
        <p></p>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Variabel</th>
                    <th>Nama Himpunan</th>
                    <th>Min Range</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'src/koneksi.php';
                $sql = $kon->query("SELECT * FROM himpunan a INNER JOIN variabel b ON a.id_variabel= b.id_variabel ORDER BY kode_variabel ASC");
                $no = 1;
                while ($data = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['nama_variabel']  ?></td>
                        <td><?php echo $data['nama_himpunan'] ?></td>
                        <td><?php echo $data['range_himpunan'] ?></td>
                        <td><a href='?page=editHimpunan&id=<?php echo $data['id_himpunan'] ?>' class='btn btn-default'>Edit</a>
                            <a href="?page=aksi&aksi=delHimpunan&id=<?php echo $data['id_himpunan'] ?>" class='btn btn-default'>Hapus</a></td>
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