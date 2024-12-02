<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Finance App</title>

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

<body>
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


</body>
</html>
