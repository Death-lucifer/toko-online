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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/tampil.css">
    <style>
        
    </style>
</head>
<body>
	
  	<input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
  	<label for="menu-icon"></label>
  	<nav class="nav"> 		
  		<ul class="pt-5">
            <li><a href="halaman_admin.php">Home</a></li>
  			<li><a href="tampil_member.php">List User</a></li>
  			<li><a href="../logout.php">logout</a></li>
  		</ul>
  	</nav>

  	<div class="section-center">
  		<h1 class="mb-0">List User</h1>
          <table class="table table-dark table-borderless table-hover table-condensed" aria-labelledby="studentTableCaption" role="table">
        <thead>
            <br>
            <tr>
                <th>NO</th><th>NAMA SISWA</th><th>TANGGAL LAHIR</th>
                <th>ALAMAT</th><th>GENDER</th>
                <th>USERNAME</th><th>ROLE</th><th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";
            $qry_siswa=mysqli_query($koneksi,"select * from user");
            $no=0;
            while($data_siswa=mysqli_fetch_array($qry_siswa)){
                $no++;
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$data_siswa['nama_pembeli']?></td>
                <td><?=$data_siswa['tanggal_lahir']?></td> 
                <td><?=$data_siswa['alamat']?></td>
                <td><?=$data_siswa['gender']?></td>
                <td><?=$data_siswa['usernamee']?></td> 
                <td><?=$data_siswa['level']?></td>
                <td>
                    <a href="ubah_siswa.php?id_pembeli=<?=$data_siswa['id_pembeli']?>" class="btn btn-success" aria-label="Ubah data siswa">Ubah</a> 
                    <a href="hapus.php?id_pembeli=<?=$data_siswa['id_pembeli']?>" onclick="return confirm('Apakah anda yakin menghapus user ini?')" 
                    class="btn btn-danger" aria-label="Hapus data siswa">Hapus</a>
                </td>    
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
		  </div>
  	
</body>
</html>