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
  		<h1 class="mb-0">Selamat datang <?=$_SESSION['nama_pembeli']?> di website Toko Online</h1>
		  </div>
<br><br><br><br>
<div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-6">
    <?php 
    include "koneksi.php";
    $qry_buku=mysqli_query($koneksi,"select * from barang");
    while($dt_buku=mysqli_fetch_array($qry_buku)){
        ?>
        <div class="col">
          <div class="p-3">
            <div class="card" style="width: 18rem;">
              <img src="../assets/foto_produk/<?=$dt_buku['foto']?>" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title"><?=$dt_buku['nama_barang']?></h5>
                <h6 class="card-subtitle">harga : <?=substr($dt_buku['harga'], 0,255)?></h6>
                <p class="card-text"><?=substr($dt_buku['deskripsi'], 0,255)?></p>
                <a href="beli_barang.php?id_barang=<?=$dt_buku['id_barang']?>" class="btn btn-primary">Beli Barang</a>
              </div>
            </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
  </div>

</body>
</html>