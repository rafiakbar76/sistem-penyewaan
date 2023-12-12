<?php
include('includes/config.php');
error_reporting(0);
$nama_pt=$_POST['nama_pt'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];
$telpon=$_POST['telpon'];

$sql = "INSERT INTO `owner` (`nama_pt`, `alamat`, `email`, `telpon`)
 VALUES ('$nama_pt', '$alamat', '$email', '$telpon');";
$query = mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'car-owner.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'car-owner.php'; 
		</script>";
}

?>