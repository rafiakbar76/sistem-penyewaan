<?php
include('includes/config.php');
error_reporting(0);
$plat=$_POST['plat'];
$merk_type=$_POST['merk_type'];
$harga=$_POST['harga'];
$tahun=$_POST['tahun'];
$id_owner=$_POST['id_owner'];

$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"img/vehicleimages/".$_FILES["img5"]["name"]);
$sql = "INSERT INTO `mobil` (`plat`, `merk_type`, `harga`, `tahun`, `id_owner`, `image1`, `image2`, `image3`, `image4`, `image`)
 VALUES ('$plat', '$merk_type', '$harga', '$tahun', '$id_owner', '$vimage1', '$vimage2', '$vimage3', '$vimage4', '$vimage5');";
$query = mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'mobil.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'mobil.php'; 
		</script>";
}

?>