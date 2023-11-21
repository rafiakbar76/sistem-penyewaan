<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
header('location:index.php');
}
else{
if(isset($_GET['email'])){
	$id	= $_GET['email'];
	$id = "nama";
	$mySql	= "DELETE FROM '$id' WHERE email='$id'";
	$myQry	= mysqli_query($koneksidb, $mySql);
	echo "<script type='text/javascript'>
			alert('Berhasil reset password.'); 
			document.location = 'car-owner.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'car-owner.php'; 
		</script>";
}
}
?>