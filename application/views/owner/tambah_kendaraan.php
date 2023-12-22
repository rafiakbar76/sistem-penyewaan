<div class="all">
      <!-- content -->
      	<div class="content-wrapper">
			<!-- headerContent -->

				

			<!-- Main content -->
			<section class="content-tambahkendaraan">
				<div class="row">
					<form action="<?= base_url('data_mobil/insert') ?>" method="post"class="tambah-kendaraan" enctype="multipart/form-data">
						<table  class="table-tambahkendaraan">
							<thead>
								<!-- <tr>
									<th>Nama Kendaraan</th>
									<th>:</th>
									<th><input for type="text" class="input-kendaraan" name="nama"></th>
								</tr> -->
								<tr>
									<th>Merek dan Type</th>
									<th>:</th>
									<th><input type="text" class="input-kendaraan" name="merk_type" required=""></th>
								</tr>
								<tr>
									<th>Plat Nomor</th>
									<th>:</th>
									<th><input type="text" class="input-kendaraan" name="plat" required=""></th>
								</tr>
								<tr>
									<th>Tahun Kendaraan</th>
									<th>:</th>
									<th><input type="text" class="input-kendaraan" name="tahun" required=""></th>
								</tr>
								<tr>
									<th>Harga</th>
									<th>:</th>
									<th><input type="text" class="input-kendaraan" name="harga" required=""></th>
								</tr>
								<tr>
									<th>ID Owner</th>
									<th>:</th>
									<th><input type="text" class="input-kendaraan" name="id_owner" value="<?= $dataOwner->id_owner ?>" readonly></th>
									<th>
										<!-- <select name="nama_pt" id="nama_pt" class="input-kendaraan" style="width: 100%" aria-describedby="sizing-addon2">        
										<?php
											foreach ($dataMobil as $mobil) {
											?>
												<option value="<?php echo $mobil->nama_pt; ?>">
													<?php echo $mobil->nama_pt; ?>
												</option>
											<?php
											}
											?>
										</select> -->
									</th>
								</tr>
								<tr>
								<th>Gambar</th>
								<th>:</th>
								<th><input size="20" type="file" class="input-kendaraan" name="foto"  required="" accept="image"></th>
								</tr>
								<!-- <tr class="foto">
									<th >foto kendaraan</th>
									<th ><input type="image" class="input-kendaraan"></th>
								</tr> -->
							</thead>
							<!-- <tbody id="data-pembayaran"> -->
							
							<!-- </tbody> -->
						</table>
						<button class="tombol-tambah">Tambah</button>
					</form>
					
					
				</div>
			</section>
		</div> <!-- headerContent --><!-- mainContent -->
	</div>
      <!-- footer -->
      
    </div>

    

</script>  </body>
</html>