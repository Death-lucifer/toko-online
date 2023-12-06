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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ubah2.css">
</head>
<body>
<?php 
    include "koneksi.php";
    $qry_get_siswa=mysqli_query($koneksi,"select * from user where id_pembeli = '".$_GET['id_pembeli']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
    
<div class="box">
        <h2>Ubah User</h2>
        <form action="proses_ubah_siswa.php" method="post">
        <input type="hidden" name="id_pembeli" value= 
        "<?=$dt_siswa['id_pembeli']?>">
        <div class="user-box">
                <input type="text" name="nama_pembeli" value="<?=$dt_siswa['nama_pembeli']?>" required="">
                <label>Nama Pembeli</label>
            </div>
            <div class="user-box">
                <input type="date" name="tanggal_lahir" value="<?=$dt_siswa['tanggal_lahir']?>" >
                <label>Tanggal Lahir</label>
            </div>
            <div class="user-box">
                <input type="text" name="alamat" rows="4" <?=$dt_siswa['alamat']?> required="">
                <label>Alamat</label>
            </div>
            <div class="user-box">
                <input type="text" name="usernamee" value="<?=$dt_siswa['usernamee']?>" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="passwordd" value="" >
                <label>Password</label>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary" value="Tambah Siswa" >
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Ubah User
            </button>
            <br>
            <br>
            <div class="user-box">
        <a href="tampil_member.php" class="btn btn-danger">Kembali</a>
            </div>
        </form>
        
    </div> 

</body>
</html>
