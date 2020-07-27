<div class="card">
    <div class="card-header">
        <h3 class="card-title"><b>Data Hasil Cek</b></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <p></p>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Berat Badan</th>
                    <th>Tinggi Badan</th>
                    <th>Stadium</th>
                    <th>Hasil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'src/koneksi.php';
                $sql = $kon->query("SELECT * FROM hasil_cek ORDER BY id_hasil ASC");
                $no = 1;
                while ($data = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['umur'] ?></td>
                        <td><?php echo $data['beratbadan'] ?></td>
                        <td><?php echo $data['tinggibadan'] ?></td>
                        <td><?php echo $data['stadium'] ?></td>
                        <td><?php echo $data['hasil'] ?></td>
                        <td>
                            <a href='?page=aksi&aksi=delHasil&id=<?php echo $data['id_hasil'] ?>' class='btn btn-default'>Hapus</a></td>
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