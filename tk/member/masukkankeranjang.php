<?php 
session_start();
    if($_POST){
        include "koneksi.php";
        
        $qry_get_buku=mysqli_query($koneksi,"select * from barang where id_barang = '".$_GET['id_barang']."'");
        $dt_buku=mysqli_fetch_array($qry_get_buku);
        $_SESSION['cart'][]=array(
            'id_barang'=>$dt_buku['id_barang'],
            'nama_barang'=>$dt_buku['nama_barang'],
            'qty'=>$_POST['jumlah_beli']
        );
    }
    header('location: keranjang.php');
?>
