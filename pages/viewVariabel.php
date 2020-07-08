<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Data Variabel</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p></p>
        <div style="width:20%"><a href="?page=addVariabel" class="btn btn-block btn-default">Tambah Data</a></div>
        <p></p>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Variabel</th>
                    <th>Nama Variabel</th>
                    <th>Tipe Variabel</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'src/koneksi.php';
                $sql = $kon->query("SELECT * FROM variabel ORDER BY kode_variabel ASC");
                $no = 1;
                while ($data = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['kode_variabel'] ?></td>
                        <td><?php echo $data['nama_variabel'] ?></td>
                        <td><?php echo $data['tipe_variabel'] ?></td>
                        <td><a href='?page=editVariabel&id=<?php echo $data['id_variabel'] ?>' class='btn btn-default'>Edit</a>
                            <a href="?page=aksi&aksi=delVariabel&id=<?php echo $data['id_variabel'] ?>" class='btn btn-default'>Hapus</a></td>
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