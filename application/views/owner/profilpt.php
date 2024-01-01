<div class="all">
      <!-- content -->
      	<div class="content-wrapper">
			<!-- headerContent -->
				

			<!-- Main content -->
			<section class="content-tambahkendaraan">
			<div class="profil">Profil PT</div>
				<div class="row-profil">
					<div class="box-left">
						<img src="<?= base_url('assets/img/profil/'.$dataOwner->foto) ?>" alt="user image" class="user-image">
						
						<div class="updateProfil"><a href="<?= site_url('profil_pt/edit/'.$dataOwner->id_owner) ?>">Update</a> </div>
						<!-- <input type="text"> -->
						

					</div>
					<div class="box-right">
					<table  class="table-profil">
							
							<tr>
								<th>nama</th>
								<th><input type="text" class="profilpt" value="<?= $dataOwner->nama_pt ?>" name="nama_pt" readonly></th>
							</tr>
							<tr>
								<th>alamat</th>
								<th><input type="text" class="profilpt" value="<?= $dataOwner->alamat ?>" name="alamat" readonly></th>
							</tr>
							<tr>
								<th>email</th>
								<th><input type="text" class="profilpt" value="<?= $dataOwner->email ?>" name="email" readonly></th>
							</tr>
							<tr>
								<th>nomor telepon</th>
								<th><input type="text" class="profilpt" value="<?= $dataOwner->telpon ?>" name="telpon" readonly></th>
							</tr>
					</table>
					</div>
					
				</div>
				<tr>
					<th><input type="text" class="profilpt" value="<?= $dataOwner->id_owner ?>" name="id_owner" hidden></th>
				</tr>
			</section>
		</div> <!-- headerContent --><!-- mainContent -->
		</div>
      <!-- footer -->
      
      <div class="control-sidebar-bg"></div>
    </div>

    


</script>  </body>
</html>