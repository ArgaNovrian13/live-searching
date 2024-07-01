<?php
require 'koneksi.php';
$allData = [];
$query = "SELECT * FROM livesearching";
$result = mysqli_query($koneksi, $query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $allData[] = $row;
    }
  }
// Searching Data
if (isset($_POST['cari'])) {
  $cariData = $_POST['cariData'];
  $kataKunci = mysqli_real_escape_string($koneksi, $cariData);
  $query = "SELECT * FROM livesearching WHERE nama LIKE '%$kataKunci%' OR umur LIKE '%$kataKunci%' OR email LIKE '%$kataKunci%'";
  $result = mysqli_query($koneksi, $query);
  $allData = [];
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $allData[] = $row;
      }
  }
}