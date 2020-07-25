<aside class="main-sidebar elevation-4 sidebar-light-fuchsia">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>Gizi Kanker</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php if ($_GET['page'] == "dashboard" || $_GET['page'] == "") {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        }
        if ($_GET['page'] == "viewPasien" || $_GET['page'] == "addPasien" || $_GET['page'] == "editPasien") {
        ?>
          <li class="nav-item">
            <a href="?page=viewPasien" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pasien
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item">
            <a href="?page=viewPasien" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pasien
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        <?php
        }
        if ($_GET['page'] == "viewVariabel" || $_GET['page'] == "addVariabel" || $_GET['page'] == "editVariabel" || $_GET['page'] == "viewHimpunan" || $_GET['page'] == "addHimpunan" || $_GET['page'] == "editHimpunan") {
        ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Variabel Fuzzy
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=viewVariabel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Variabel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=viewHimpunan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Himpunan</p>
                </a>
              </li>
            </ul>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Variabel Fuzzy
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=viewVariabel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Variabel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=viewHimpunan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Himpunan</p>
                </a>
              </li>
            </ul>
          </li>
        <?php
        }

        if ($_GET['page'] == "viewCekHasil") {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=viewCekHasil" class="nav-link active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Hasil Cek
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=viewCekHasil" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Hasil Cek
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        }

        if ($_GET['page'] == "viewRule" || $_GET['page'] == "addRule" || $_GET['page'] == "editRule") {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=viewRule" class="nav-link active">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Rule
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=viewRule" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Rule
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        }

        if ($_GET['page'] == "viewSolusi" || $_GET['page'] == "addSolusi" || $_GET['page'] == "editSolusi") {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=viewSolusi" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Solusi
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=viewSolusi" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Solusi
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        }
        if ($_GET['page'] == "viewProses") {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=viewProses" class="nav-link active">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Proses
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item has-treeview">
            <a href="?page=viewProses" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Proses
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        <?php
        }
        ?>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>