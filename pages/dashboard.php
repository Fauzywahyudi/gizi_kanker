<?php
include "src/koneksi.php";

$sqlPasien = $kon->query("SELECT id_pasien FROM pasien");
$pasien = $sqlPasien->num_rows;

$sqlVariabel = $kon->query("SELECT id_variabel FROM variabel");
$variabel = $sqlVariabel->num_rows;

$sqlHimpunan = $kon->query("SELECT id_himpunan FROM himpunan");
$himpunan = $sqlHimpunan->num_rows;

$sqlSolusi = $kon->query("SELECT id_solusi FROM solusi");
$solusi = $sqlSolusi->num_rows;

$sqlHasil = $kon->query("SELECT id_hasil FROM hasil_cek");
$cekHasil = $sqlHasil->num_rows;

$sqlRule = $kon->query("SELECT id_rule FROM rule");
$cekRule = $sqlRule->num_rows;

?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Gizi Kanker Kulit</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
          <!-- <li class="breadcrumb-item active">Home</li> -->
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $variabel ?></h3>

            <p>Variabel</p>
          </div>
          <div class="icon">
            <i class="fas fa-th-large"></i>
          </div>
          <a href="?page=viewVariabel" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $himpunan ?><sup style="font-size: 20px"></sup></h3>

            <p>Himpunan</p>
          </div>
          <div class="icon">
            <i class="fas fa-th-large"></i>
          </div>
          <a href="?page=viewHimpunan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo $pasien ?></h3>

            <p>Pasien</p>
          </div>
          <div class="icon">
            <i class="fas fa-th-large"></i>
          </div>
          <a href="?page=viewPasien" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $cekHasil ?></h3>

            <p>Hasil Cek</p>
          </div>
          <div class="icon">
            <i class="fas fa-th-large"></i>
          </div>
          <a href="?page=viewCekHasil" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $cekRule ?></h3>

            <p>Rule</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-line"></i>
          </div>
          <a href="?page=viewRule" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>