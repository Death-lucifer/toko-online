<?php
if($_POST){
    $nama_pembeli=$_POST['nama_pembeli'];
    $tanggal_lahir=$_POST['tanggal_lahir'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $usernamee=$_POST['usernamee'];
    $passwordd= $_POST['passwordd'];
    $level = "member";
    $errors = [];

    if(empty($nama_pembeli)){
        $errors['nama_pembeli'] = "Nama pembeli tidak boleh kosong";
    } 
    if(empty($usernamee)){
        $errors['usernamee'] = "Usernamee tidak boleh kosong";
    }
    if(empty($passwordd)){
        $errors['passwordd'] = "Password tidak boleh kosong";
    }

    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        header("Location: login.php");
    } else {    
        include "koneksi.php";
        $insert=mysqli_query($koneksi,"insert into user (nama_pembeli, tanggal_lahir, gender, alamat, usernamee, passwordd, level) values 
        ('".$nama_pembeli."','".$tanggal_lahir."','".$gender."','".$alamat."','".$usernamee."','".md5($passwordd)."','".($level)."')") 
        or die(mysqli_connect_error($koneksi));
      
       if($insert){
            $_SESSION['message'] = "Sukses menambahkan pembeli";
            $_SESSION['msg_type'] = "success";
       } else {    
            $_SESSION['message'] = "Gagal menambahkan pembeli";
            $_SESSION['msg_type'] = "danger";
       }
       if($cek > 0){
        $data = mysqli_fetch_assoc($login);
        if($data['level']=="admin"){
            session_start();
            $_SESSION['usernamee'] = $usernamee;
            $_SESSION['passwordd'] = $passwordd;
            $_SESSION['level'] = "admin";
            header("location: ../toko/admin/halaman_admin.php");
            
        } else if($data['level']=="member"){
    
            $_SESSION['usernamee'] = $usernamee;
            $_SESSION['passwordd'] = $passwordd;
            $_SESSION['level'] = "member";
            header("location: ../toko/member/halaman_member.php");
            
        }
            }else{
            
            header("location:login.php");
            
        }
    }
}
?>