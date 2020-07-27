<?php

include 'src/koneksi.php';

$aksi = $_GET['aksi'];

if ($aksi == "delPasien") {
    $id = $_GET['id'];
    $sql = $kon->query("DELETE FROM `pasien` WHERE id_pasien='$id'");
    echo "<script>
    window.location='?page=viewPasien'
    </script>";
} else if ($aksi == "delHimpunan") {
    $id = $_GET['id'];
    $sql = $kon->query("DELETE FROM `himpunan` WHERE id_himpunan='$id'");
    echo "<script>
    window.location='?page=viewHimpunan'
    </script>";
} else if ($aksi == "delVariabel") {
    $id = $_GET['id'];
    $sql = $kon->query("DELETE FROM `variabel` WHERE id_variabel='$id'");
    echo "<script>
    window.location='?page=viewVariabel'
    </script>";
} else if ($aksi == "delRule") {
    $id = $_GET['id'];
    $sql = $kon->query("DELETE FROM `rule` WHERE id_rule='$id'");
    echo "<script>
    window.location='?page=viewRule'
    </script>";
} else if ($aksi == "delSolusi") {
    $id = $_GET['id'];
    $sql = $kon->query("DELETE FROM `solusi` WHERE id_solusi='$id'");
    echo "<script>
    window.location='?page=viewSolusi'
    </script>";
} else if ($aksi == "delHasil") {
    $id = $_GET['id'];
    $sql = $kon->query("DELETE FROM `hasil_cek` WHERE id_hasil='$id'");
    echo "<script>
    window.location='?page=viewCekHasil'
    </script>";
}
