<?php
    $hostname ="localhost";
    $username ="root";
    $password ="";
    $database ="toko";

    $koneksi = mysqli_connect ($hostname, $username, $password, $database);
    if ($koneksi){
       
    }
    else{
        die("koneksi gagal").mysqli_connect_error();
        echo "walah wir raiso wir wir";
    }
?>