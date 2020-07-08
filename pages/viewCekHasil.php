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
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'src/koneksi.php';
                $sql = $kon->query("SELECT * FROM pasien ORDER BY id_pasien ASC");
                $no = 1;
                while ($data = $sql->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$no</td>
                    <td>$data[nama]</td>
                    <td>$data[jk]</td>
                    <td>$data[tgl_lahir]</td>
                    <td><a href='' class='btn btn-default'>Edit</a>
                    <a href='' class='btn btn-default'>Hapus</a></td>
                    </tr>
                    ";
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