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
	<link rel="stylesheet" href="../css/home1.css">
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
  		<h1 class="mb-0">Halo Admin Afham</h1>
		  </div>
  	
</body>
</html>