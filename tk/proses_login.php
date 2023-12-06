<?php
 session_start();
 include "koneksi.php";
if($_POST){
    $usernamee = $_POST['usernamee'];
    $passwordd = $_POST['passwordd'];
    if (empty($usernamee)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
    } else if (empty($passwordd)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
    }else{
        $qry_login=mysqli_query($koneksi,"select * from user where usernamee = '".$usernamee."' and passwordd = '".md5($passwordd)."'");
        $cek = mysqli_num_rows($qry_login);
            if($cek > 0){
            $data = mysqli_fetch_assoc($qry_login);
            $_SESSION['id_pembeli']=$data['id_pembeli'];
            $_SESSION['nama_pembeli']=$data['nama_pembeli'];
                if($data['level']=="admin"){
                   session_start();
                     $_SESSION['usernamee'] = $usernamee;
                     $_SESSION['passwordd'] = $passwordd;
                     $_SESSION['level'] = "admin";
                     $_SESSION['status_login']=true;
                    header("location: ../tk/admin/halaman_admin.php");
        
                  } else if($data['level']=="member"){
                    session_start();
                    $_SESSION['usernamee'] = $usernamee;
                    $_SESSION['passwordd'] = $passwordd;
                    $_SESSION['level'] = "member";
                    $_SESSION['status_login']=true;
                    header("location: ../tk/member/home.php");
        
                    }
                    }else{
                    header("location:login.php");   
                }
          }
    }
?>