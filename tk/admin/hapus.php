<?php 
    if($_GET['id_pembeli']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi,"delete from user where id_pembeli='".$_GET['id_pembeli']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus user');location.href='tampil_member.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus user');location.href='tampil_member.php';</script>";
        }
    }
?>
