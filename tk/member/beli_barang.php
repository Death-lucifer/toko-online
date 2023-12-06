<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: ../login.php');
    }
    
include "koneksi.php";
    $qry_buku=mysqli_query($koneksi,"select * from barang where id_barang = '".$_GET['id_barang']."'");
    $dt_buku=mysqli_fetch_array($qry_buku);
    

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
  background-size: 0%;
  background-color: #1f2029;	
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


<div>
    <table class="table table-dark table-hover table-condensed">
            <form action="masukkankeranjang.php?id_barang=<?=$dt_buku['id_barang']?>" method="post">
                <thead>
                    <tr>
                        
                    <td  class="item-align-center" colspan="2">
                      <figure>
                      <img src="../assets/foto_produk/<?=$dt_buku['foto']?>" class="position-relative container-fluid bottom-100 start-50 translate-middle-x" style="width: 700px;" >
                      </figure>
                        </td>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <tr>
                        
                        <td>Nama Buku</td><td><?=$dt_buku['nama_barang']?></td>
                    </tr>
                    <tr><
                        <td>Deskripsi</td><td><?=$dt_buku['deskripsi']?></td>
                    </tr>
                    <tr><
                        <td>Jumlah Beli</td><td><input type="number" name="jumlah_beli" value="1"></td>
                    </tr>
                    <tr>
                        <td>harga</td><td><?=$dt_buku['harga']?></td>
                    </tr>
                    <tr><
                        <td colspan="2"><input class="btn btn-success" type="submit" value="BELI"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="home.php" class="btn btn-danger">KEMBALI</a></td>
                    </tr>
                    </tbody>
                    </form>
            </table>
            </div>
</body>
</html>