<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "livesrc";
$koneksi = new mysqli($host,$user,$pass,$database);
if($koneksi->connect_error){
  die('Koneksi Gagal'. $koneksi->connect_error);
}