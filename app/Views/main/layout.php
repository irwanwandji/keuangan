<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Finance</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">
  <!-- jQuery -->
  <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>

  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.min.css">
  <script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->


        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= site_url('main/index'); ?>" class="brand-link">
        <img src="<?= base_url() ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Finance App</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
       
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
            <li class="nav-item">
              <a href="<?= site_url('utility/gantipassword'); ?>" class="nav-link">
                <i class="nav-icon fa fa-lock text-white"></i>
                <p class="text">Transaksi</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= site_url('login/keluar'); ?>" class="nav-link">
                <i class="nav-icon fa fa-sign-out-alt text-danger"></i>
                <p class="text">Logout</p>
              </a>
            </li> -->




          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>

      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>
                asasas
              </h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <?= $this->renderSection('subjudul') ?>
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <!-- <?= $this->renderSection('isi') ?> -->

            
    <div class="container mt-5">
        <h1>Data Transaksi</h1>
        <a href="/transaksi/create" class="btn btn-primary mb-3">Tambah Transaksi</a>
        <form action="/transaksi" method="get" class="form-inline mb-3">
    <input type="text" name="keyword" class="form-control mr-2" placeholder="Cari keterangan...">
    <input type="date" name="date" class="form-control mr-2">
    <button type="submit" class="btn btn-primary">Cari</button>
        <table class="table table-bordered">
        <thead class="text-center">
    <tr>
        <th>No</th>
        <th>Keterangan</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo</th>
        <th>Tanggal</th>
    </tr>
</thead>
<tbody>
    <?php $no = 1; ?>
    <?php foreach ($transaksi as $item): ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $item['keterangan'] ?></td>
            <td>Rp. <?= number_format($item['debet']) ?></td>
            <td>Rp. <?= number_format($item['kredit']) ?></td>
            <td>Rp. <?= number_format($item['saldo']) ?></td>
            <td><?= $item['created_at'] ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>

        </table>
        <h3>Saldo Akhir: Rp <?= number_format($saldo) ?>,-</h3>
    </div>
    

</form>

<div class="mt-3">
    <?= $pager->links() ?>
</div>



          </div>
          <!-- /.container-fluid -->
          <!-- /.card-body -->

          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; Wandji </strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>/dist/js/demo.js"></script>
</body>

</html>