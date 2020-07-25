<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Data Solusi</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p></p>
        <div style="width:20%"><a href="?page=addSolusi" class="btn btn-block btn-default">Tambah Solusi</a></div>
        <p></p>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tipe</th>
                    <th>Solusi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'src/koneksi.php';
                $sql = $kon->query("SELECT * FROM `solusi`");
                $no = 1;
                while ($data = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['tipe'] ?></td>
                        <td><?php echo $data['solusi'] ?></td>
                        <td><?php echo $data['ket'] ?></td>
                        <td><a href='?page=editSolusi&id=<?php echo $data['id_solusi'] ?>' class='btn btn-default'>Edit</a>
                            <a href="?page=aksi&aksi=delSolusi&id=<?php echo $data['id_solusi'] ?>" class='btn btn-default'>Hapus</a></td>
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