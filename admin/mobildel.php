<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0){	
header('location:index.php');
}
else{
	
if(isset($_GET['id'])){
	$id	= $_GET['id'];
	$mySql	= "DELETE FROM mobil WHERE mobil.plat = '$id'";
	$myQry	= mysqli_query($koneksidb, $mySql);
	echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = 'mobil.php'; 
		</script>";
	redirect('mobil.php');
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'mobil.php'; 
		</script>";
}
}
?>