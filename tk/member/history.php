<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: ../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
	rel="stylesheet" 
	integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
	crossorigin="anonymous">
	<style>
		body{
  background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat-back.svg');
  background-position: center;
  background-repeat: repeat;
  background-size: 4%;
  background-color: #1f2029;	
		    }
  .section-center{
  position: absolute;
  top: 15%;
  left: 0;
  display: block;
  width: 100%;
  padding: 0;
  margin: 0;
  z-index: 6;
  text-align: center;
  transform: translateY(-50%);
}
h1{
  font-family: 'Montserrat', sans-serif;
  font-weight: 800;
  font-size: 3vw;
  line-height: 1;
  color: #ffeba7;
  text-align: center;
  -webkit-text-stroke: 2px #ffeba7;
  text-stroke: 2px #ffeba7;
  -webkit-text-fill-color: transparent;
  text-fill-color: transparent;
  color: transparent;
}
	</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg bg-body-tertiary-bg-rgb navbar-dark bg-dark">
  <div class="container-fluid">
    <h6 class="navbar-brand">Toko Online</h6>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="history.php">History</a>
          <li>
        <a class="nav-link" href="keranjang.php">Keranjang</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="../logout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container text-center">

<div class="section-center">
  		<h1 class="mb-0">History</h1>
		  </div>
<br><br><br><br>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th><th>Tanggal Pinjam</th><th>Tanggal harus Kembali</th><th>Nama Buku</th><th>Status</th><th>Aksi</th>
    </thead>
    <tbody>
        <?php 
        include "koneksi.php";
        $qry_histori=mysqli_query($koneksi,"select * from pembelian_barang order by id_pembelian_barang desc");
        $no=0;
        while($dt_histori=mysqli_fetch_array($qry_histori)){
            $no++;
            //menampilkan barang yang dipinjam apalah
            $buku_dipinjam="<ol>";
            $qry_buku=mysqli_query($koneksi,"select * from  detail_pembelian_barang join barang on barang.id_barang=detail_pembelian_barang.id_barang where id_pembelian_barang = '".$dt_histori['id_pembelian_barang']."'");
            while($dt_buku=mysqli_fetch_array($qry_buku)){
                $buku_dipinjam.="<li>".$dt_buku['nama_barang']."</li>";
            }
            $buku_dipinjam.="</ol>";
            //menampilkan status sudah kembali atau belum
            $qry_cek_kembali=mysqli_query($koneksi,"select * from pengantaran_barang where id_pembelian_barang = '".$dt_histori['id_pembelian_barang']."'");
            if(mysqli_num_rows($qry_cek_kembali)>0){
                $dt_kembali=mysqli_fetch_array($qry_cek_kembali);
                $denda="denda Rp. ".$dt_kembali['denda'];
                $status_kembali="<label class='alert alert-success'>Barang telah sampai Dan sudah Di bayar<br>".$denda."</label>";
                $button_kembali="";
            } else {
                $status_kembali="<label class='alert alert-danger'>Barang Belum Sampai</label>";
                $button_kembali="<a href='kembali.php?id=".$dt_histori['id_pembelian_barang']."' class='btn btn-warning' onclick='return confirm(\"Apakah Andaa Yakin Barang Sudah Sampai?\")'>Barang Sampai</a>";
            }
        ?>
            <tr>
                <td><?=$no?></td><td><?=$dt_histori['tanggal_beli']?></td><td><?=$dt_histori['tanggal_sampai']?></td><td><?=$buku_dipinjam?></td><td><?=$status_kembali?></td><td><?=$button_kembali?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

</body>
</html>