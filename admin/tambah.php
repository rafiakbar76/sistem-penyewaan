<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>RentalMobil | Admin Kelola User</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Daftar Penyewa</h2>
						<div style="width: 100%; height: 100%; position: relative">
    <div style="width: 1008px; height: 476px; left: 0px; top: 0px; position: absolute; background: #FAFAFA; box-shadow: 8px 13px 10px rgba(0, 0, 0, 0.10); border-radius: 10px"></div>
    <div style="width: 358px; height: 54px; left: 270px; top: 41px; position: absolute; background: #D9D9D9; border-radius: 20px"></div>
    <div style="width: 358px; height: 54px; left: 270px; top: 125px; position: absolute; background: #D9D9D9; border-radius: 20px"></div>
    <div style="width: 358px; height: 54px; left: 270px; top: 209px; position: absolute; background: #D9D9D9; border-radius: 20px"></div>
    <div style="width: 358px; height: 54px; left: 270px; top: 293px; position: absolute; background: #D9D9D9; border-radius: 20px"></div>
    <div style="width: 358px; height: 54px; left: 270px; top: 383px; position: absolute; background: #D9D9D9; border-radius: 20px"></div>
    <div style="width: 190px; height: 27px; left: 63px; top: 55px; position: absolute; color: black; font-size: 20px; font-family: Montserrat; font-weight: 800; word-wrap: break-word">nama penyewa</div>
    <div style="width: 190px; height: 27px; left: 64px; top: 133px; position: absolute; color: black; font-size: 20px; font-family: Montserrat; font-weight: 800; word-wrap: break-word">NIK</div>
    <div style="width: 190px; height: 27px; left: 63px; top: 307px; position: absolute; color: black; font-size: 20px; font-family: Montserrat; font-weight: 800; word-wrap: break-word">email</div>
    <div style="width: 190px; height: 27px; left: 63px; top: 397px; position: absolute; color: black; font-size: 20px; font-family: Montserrat; font-weight: 800; word-wrap: break-word">alamat</div>
    <div style="width: 190px; height: 27px; left: 63px; top: 217px; position: absolute; color: black; font-size: 20px; font-family: Montserrat; font-weight: 800; word-wrap: break-word">nomor telepon</div>
    <div style="width: 107px; height: 37px; left: 663px; top: 400px; position: absolute">
        <div style="width: 107px; height: 33px; left: 0px; top: 0px; position: absolute; background: #64E844; border-radius: 20px"></div>
        <div style="width: 87px; height: 33px; left: 12px; top: 4px; position: absolute; color: black; font-size: 20px; font-family: Montserrat; font-weight: 800; word-wrap: break-word">tambah</div>
    </div>
    <div style="width: 69px; height: 37px; left: 802px; top: 400px; position: absolute">
        <div style="width: 69px; height: 33px; left: 0px; top: 0px; position: absolute; background: #FED500; border-radius: 20px"></div>
        <div style="width: 57px; height: 33px; left: 12px; top: 4px; position: absolute; color: black; font-size: 20px; font-family: Montserrat; font-weight: 800; word-wrap: break-word">edit</div>
    </div>
</div>

<!-- Loading Scripts -->
<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
    <script>
		var app = {
			code: '0'
		};
		$('[data-load-code]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-code');
					if(code) {
						$($this.data('remote-target')).load('userview.php?code='+code);
						app.code = code;
						
					}
		});
    </script>
</body>
</html>
<?php } ?>