<?php 
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    if(count($cart)>0){
        $lama_bayar=5; //satuan hari
        $tgl_harus_bayar=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$lama_bayar),date('Y')));
        mysqli_query($koneksi,"insert into pembelian_barang (id_pembeli,tanggal_beli,tanggal_sampai) value('".$_SESSION['id_pembeli']."','".date('Y-m-d')."','".$tgl_harus_bayar."')");
         $id=mysqli_insert_id($koneksi);
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($koneksi,"insert into detail_pembelian_barang (id_pembelian_barang,id_barang,qty) value('".$id."','".$val_produk['id_barang']."','".$val_produk['qty']."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Anda berhasil Membeli Barangnya");location.href="history.php"</script>';
    }
?>
