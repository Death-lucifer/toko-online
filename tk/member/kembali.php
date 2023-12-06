<?php 
if($_GET['id']){
    include "koneksi.php";
    $id_pembelian_barang=$_GET['id'];
    $cek_terlambat=mysqli_query($koneksi, "select * from pembelian_barang where id_pembelian_barang = '".$id_pembelian_barang."' ");
    $dt_pinjam=mysqli_fetch_array($cek_terlambat);
    if(strtotime($dt_pinjam['tanggal_sampai'])>=strtotime(date('Y-m-d'))){
        $denda=0;
    } else{
        $harga_denda_perhari=5000;
        $tanggal_sampai = new DateTime();
        $tgl_harus_kembali = new DateTime($dt_pinjam['tanggal_sampai']); 
        $selisih_hari = $tanggal_sampai->diff($tgl_harus_kembali)->d;
        $denda=$selisih_hari*$harga_denda_perhari;
    }
    mysqli_query($koneksi, "insert into pengantaran_barang (id_pembelian_barang, tanggal_pembelian,denda) value('".$id_pembelian_barang."','".date('Y-m-d')."','".$denda."')");
    header('location: history.php');
}
?>
