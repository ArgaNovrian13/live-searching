<?php
require 'koneksi.php';
require 'search.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Live Searching</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #4D869C;">
<div class="container">
<div class="mt-3">
  <h2 class="text-center">Live Searching</h2>
</div>
 <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
 <label for="text" class="form-label"></label>
  <input type="text" class="form-control w-100 mb-2" id="text" placeholder="Cari Data..." autofocus autocomplete="off" name="cariData">
  <button class="btn btn-primary" name="cari">Cari Data</button>
 </form>
  <div class="text-center mt-5 w-100">
  <table class="table table-dark table-striped">
    <thead class="table-success">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php if (count($allData) > 0): ?>
        <?php foreach ($allData as $data): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['umur'] ?></td>
          <td><?= $data['email'] ?></td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="4" class="text-center">Tidak Ada Data Yang Cocok</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table> 
  </div>
  </div>   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>