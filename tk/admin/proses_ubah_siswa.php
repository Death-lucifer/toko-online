<?php
if($_POST){
    $id_pembeli=$_POST['id_pembeli'];
    $nama_pembeli=$_POST['nama_pembeli'];
    $tanggal_lahir=$_POST['tanggal_lahir'];
    $alamat=$_POST['alamat'];
    $usernamee=$_POST['usernamee'];
    $password=$_POST['passwordd'];
    if(empty($nama_pembeli)){
        echo "<script>alert('nama pembeli tidak boleh kosong');location.href='tambah_pembeli.php';</script>";

    } elseif(empty($usernamee)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_pembeli.php';</script>";
    } else {
        include "koneksi.php";
        if(empty($password)){
            $update=mysqli_query($koneksi,"update user set nama_pembeli='".$nama_pembeli."',tanggal_lahir='".$tanggal_lahir."', alamat='".$alamat."', usernamee='".$usernamee."' where id_pembeli = '".$id_pembeli."' ") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update pembeli');location.href='tampil_member.php';</script>";
            } else {
                echo "<script>alert('Gagal update pembeli');location.href='ubah_siswa.php?id_pembeli=".$id_pembeli."';</script>";
            }
        } else {
            $update=mysqli_query($koneksi,"update user set nama_pembeli='".$nama_pembeli."',tanggal_lahir='".$tanggal_lahir."', alamat='".$alamat."', usernamee='".$usernamee."', password='".md5($password)."' where id_pembeli = '".$id_pembeli."'") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update pembeli');location.href='tampil_member.php';</script>";
            } else {
                echo "<script>alert('Gagal update pembeli');location.href='ubah_siswa.php?id_pembeli=".$id_pembeli."';</script>";
            }
        }
        
    } 
}
?>
