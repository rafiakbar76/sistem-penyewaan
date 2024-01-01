<?php
include('includes/config.php');
$id		= $_POST['id'];
$brand	= $_POST['plat'];
$sql 	= "UPDATE mobil SET plat='$brand' WHERE plat='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 
			document.location = 'data_mobil.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'data_mobil.php?id=$id'; 
		</script>";

}
?>