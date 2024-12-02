<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php if (session('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

    <div class="container mt-5">
        <h1>Tambah Transaksi</h1>
        <form action="/transaksi/store" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="debet">Debet</label>
                <input type="number" name="debet" id="debet" class="form-control" step="0.01">
            </div>
            <div class="form-group">
                <label for="kredit">Kredit</label>
                <input type="number" name="kredit" id="kredit" class="form-control" step="0.01">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/transaksi" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
