<div class="all">
      <!-- content -->
      	<div class="content-wrapper">
			<!-- headerContent -->
				

			<!-- Main content -->
			<section class="content-data">
				
					<table  class="table-mobil">
						<thead>
							<tr>
								<th>Nomer Plat</th>
								<th>Harga</th>
								<th>Tahun Kendaraan</th>
								<th>Merk dan Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody >
								<?php 
								$no=1;
									foreach ($dataMobil as $mobil){?>
										
									<tr>
										<!-- <td><?php echo $no; ?></td> -->
										<td><?php echo $mobil['plat']; ?></td>
										<td><?php echo $mobil['harga']; ?></td>
										<td><?php echo $mobil['tahun']; ?></td>
										<td><?php echo $mobil['merk_type']; ?></td>
										<td class="text-center" style="min-width:230px;">
											<button class="btn btn-warning update-dataPelanggan" data-id="<?php echo $mobil['plat']; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
											<button class="btn btn-danger konfirmasiHapus-pelanggan" data-id="<?php echo $mobil['plat'] ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
										</td>
									</tr>
								<?php 
								$no++;
									}
								?>
						</tbody>
						<!-- <tbody id="data-pembayaran"> -->
						
						<!-- </tbody> -->
					</table>

					<!-- <div class="col-lg-6 col-xs-12">
						<div class="box box-info">
						<div class="box-header with-border">
							<i class="fa fa-briefcase"></i>
							<h3 class="box-title">Statistik <small>Data Rent</small></h3>

							<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<canvas id="data-posisi" style="height:250px"></canvas>
						</div>
						</div>
					</div>

					<div class="col-lg-6 col-xs-12">
						<div class="box box-primary">
						<div class="box-header with-border">
							<i class="fa fa-briefcase"></i>
							<h3 class="box-title">Statistik <small>Data Film Category</small></h3>

							<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<canvas id="data-kota" style="height:250px"></canvas>
						</div>
						</div>
					</div> -->
				</div>
			</section>
		</div> <!-- headerContent --><!-- mainContent -->
		</div>
      <!-- footer -->
      
      <div class="control-sidebar-bg"></div>
    </div>

    <!-- js -->
    <!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.6 -->
<script src="http://localhost/eplusgo_penjualan/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="http://localhost/eplusgo_penjualan/assets/plugins/select2/select2.full.min.js"></script>
<script src="http://localhost/eplusgo_penjualan/assets/plugins/iCheck/icheck.min.js"></script>
<script src="http://localhost/eplusgo_penjualan/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="http://localhost/eplusgo_penjualan/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/eplusgo_penjualan/assets/dist/js/app.min.js"></script>

<!-- My Ajax -->
<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {		
		viewCategory();
		viewProduct();
		viewPelanggan();
		viewPembayaran();
		viewPenjualan();
		viewPenjualan_detail();
		viewProduk();
		viewSupplier();
		
			}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	//begin category film
	function viewCategory() {
		$.get('http://localhost/eplusgo_penjualan/category/tampil', function(data) {
			MyTable.fnDestroy();
			$('#data-category').html(data);
			refresh();
		});
	}

	var category_id;
	$(document).on("click", ".konfirmasiHapus-category", function() {
		category_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataCategory", function() {
		var id = category_id;
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/category/delete",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewCategory();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataCategory", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/category/update",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-category').modal('show');
		})
	})

	$('#form-tambah-category').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/category/prosesTambah',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewCategory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-category").reset();
				$('#tambah-category').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-category', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/category/prosesUpdate',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewCategory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-category").reset();
				$('#update-category').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-category').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-category').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end category 

	// begin products
	function viewProduct() {
		$.get('http://localhost/eplusgo_penjualan/product/tampil', function(data) {
			MyTable.fnDestroy();
			$('#data-product').html(data);
			refresh();
		});
	}

	var id_product;
	$(document).on("click", ".konfirmasiHapus-product", function() {
		id_product = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataProduct", function() {
		var id = id_product;
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/product/delete",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewProduct();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataProduct", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/product/update",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-product').modal('show');
		})
	})

	$('#form-tambah-product').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/product/prosesTambah',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewProduct();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-product").reset();
				$('#tambah-product').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-product', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/product/prosesUpdate',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewProduct();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-product").reset();
				$('#update-product').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-product').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-product').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	// end products
	
	//begin pelanggan film
	function viewPelanggan() {
		$.get('http://localhost/eplusgo_penjualan/pelanggan/tampil', function(data) {
			MyTable.fnDestroy();
			$('#data-pelanggan').html(data);
			refresh();
		});
	}

	var pelanggan_id;
	$(document).on("click", ".konfirmasiHapus-pelanggan", function() {
		pelanggan_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPelanggan", function() {
		var id = pelanggan_id;
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/pelanggan/delete",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewPelanggan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPelanggan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/pelanggan/update",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pelanggan').modal('show');
		})
	})

	$('#form-tambah-pelanggan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/pelanggan/prosesTambah',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPelanggan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pelanggan").reset();
				$('#tambah-pelanggan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pelanggan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/pelanggan/prosesUpdate',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPelanggan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pelanggan").reset();
				$('#update-pelanggan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pelanggan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pelanggan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end pembayaran 

	//begin pembayaran film
	function viewPembayaran() {
		$.get('http://localhost/eplusgo_penjualan/pembayaran/tampil', function(data) {
			MyTable.fnDestroy();
			$('#data-pembayaran').html(data);
			refresh();
		});
	}

	var pembayaran_id;
	$(document).on("click", ".konfirmasiHapus-pembayaran", function() {
		pembayaran_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPembayaran", function() {
		var id = pembayaran_id;
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/pembayaran/delete",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewPembayaran();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPembayaran", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/pembayaran/update",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pembayaran').modal('show');
		})
	})

	$('#form-tambah-pembayaran').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/pembayaran/prosesTambah',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPembayaran();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pembayaran").reset();
				$('#tambah-pembayaran').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pembayaran', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/pembayaran/prosesUpdate',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPembayaran();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pembayaran").reset();
				$('#update-pembayaran').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pembayaran').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pembayaran').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end pembayaran 


	//begin penjualan_detail film
	function viewPenjualan_detail() {
		$.get('http://localhost/eplusgo_penjualan/penjualan_detail/tampil', function(data) {
			MyTable.fnDestroy();
			$('#data-penjualan_detail').html(data);
			refresh();
		});
	}

	var penjualan_detail_id;
	$(document).on("click", ".konfirmasiHapus-penjualan_detail", function() {
		penjualan_detail_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPenjualan_detail", function() {
		var id = penjualan_detail_id;
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/penjualan_detail/delete",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewPenjualan_detail();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPenjualan_detail", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/penjualan_detail/update",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-penjualan_detail').modal('show');
		})
	})

	$('#form-tambah-penjualan_detail').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/penjualan_detail/prosesTambah',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPenjualan_detail();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-penjualan_detail").reset();
				$('#tambah-penjualan_detail').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-penjualan_detail', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/penjualan_detail/prosesUpdate',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPenjualan_detail();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-penjualan_detail").reset();
				$('#update-penjualan_detail').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-penjualan_detail').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-penjualan_detail').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end penjualan_detail

	//begin penjualan film
	function viewPenjualan() {
		$.get('http://localhost/eplusgo_penjualan/penjualan/tampil', function(data) {
			MyTable.fnDestroy();
			$('#data-penjualan').html(data);
			refresh();
		});
	}

	var penjualan_id;
	$(document).on("click", ".konfirmasiHapus-penjualan", function() {
		penjualan_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPenjualan", function() {
		var id = penjualan_id;
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/penjualan/delete",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewPenjualan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPenjualan", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/penjualan/update",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-penjualan').modal('show');
		})
	})

	$('#form-tambah-penjualan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/penjualan/prosesTambah',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPenjualan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-penjualan").reset();
				$('#tambah-penjualan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-penjualan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/penjualan/prosesUpdate',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewPenjualan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-penjualan").reset();
				$('#update-penjualan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-penjualan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-penjualan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end penjualan

	//begin supplier film
	function viewSupplier() {
		$.get('http://localhost/eplusgo_penjualan/supplier/tampil', function(data) {
			MyTable.fnDestroy();
			$('#data-supplier').html(data);
			refresh();
		});
	}

	var supplier_id;
	$(document).on("click", ".konfirmasiHapus-supplier", function() {
		supplier_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSupplier", function() {
		var id = supplier_id;
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/supplier/delete",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewSupplier();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSupplier", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/supplier/update",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-supplier').modal('show');
		})
	})

	$('#form-tambah-supplier').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/supplier/prosesTambah',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewSupplier();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-supplier").reset();
				$('#tambah-supplier').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-supplier', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/supplier/prosesUpdate',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewSupplier();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-supplier").reset();
				$('#update-supplier').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-supplier').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-supplier').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end supplier 

	//begin produk film
	function viewProduk() {
		$.get('http://localhost/eplusgo_penjualan/produk/tampil', function(data) {
			MyTable.fnDestroy();
			$('#data-produk').html(data);
			refresh();
		});
	}

	var produk_id;
	$(document).on("click", ".konfirmasiHapus-produk", function() {
		produk_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataProduk", function() {
		var id = produk_id;
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/produk/delete",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			viewProduk();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataProduk", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "http://localhost/eplusgo_penjualan/produk/update",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-produk').modal('show');
		})
	})

	$('#form-tambah-produk').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/produk/prosesTambah',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewProduk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-produk").reset();
				$('#tambah-produk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-produk', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: 'http://localhost/eplusgo_penjualan/produk/prosesUpdate',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			viewProduk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-produk").reset();
				$('#update-produk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-produk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-produk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
	// end produk 


</script>  </body>
</html>