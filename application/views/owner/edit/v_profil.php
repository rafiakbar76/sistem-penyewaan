<div class="content-wrapper">
			<!-- headerContent -->
				

			<!-- Main content -->
			<section class="content-tambahkendaraan">
                <form action="<?= base_url('profil_pt/update') ?>" method="post" enctype="multipart/form-data">
			<div class="profil">Edit Profil</div>
					<!-- <?php
					echo "<pre>";
					print_r($dataOwner);
					echo "</pre>";
					?> -->
				<div class="row-profil">
					<div class="box-left">
						<img src="<?= base_url('assets/img/profil/'.$dataOwner->foto) ?>" alt="user image" class="user-image">
						<input type="file" accept="image/jpeg,image/png,image/jpg" name="foto">
                      
						<div class="updateProfil"><button type="submit">Update Profil</button> </div>
						<!-- <input type="text"> -->
						

					</div>
					<div class="box-right">
					<table  class="table-profil">
							
							<tr>
								<th>nama</th>
								<th><input type="text" class="profilpt" value="<?= $dataOwner->nama_pt ?>" name="nama_pt" ></th>
							</tr>
							<tr>
								<th>alamat</th>
								<th><input type="text" class="profilpt" value="<?= $dataOwner->alamat ?>" name="alamat" ></th>
							</tr>
							<tr>
								<th>email</th>
								<th><input type="text" class="profilpt" value="<?= $dataOwner->email ?>" name="email" ></th>
							</tr>
							<tr>
								<th>nomor telepon</th>
								<th><input type="text" class="profilpt" value="<?= $dataOwner->telpon ?>" name="telpon" ></th>
							</tr>
					</table>
					</div>
					
				</div>
                <tr>
					<th><input type="text" class="profilpt" value="<?= $dataOwner->id_owner ?>" name="id_owner" hidden></th>
				</tr>
				<tr>
					<th><input type="text" class="profilpt" value="<?= $dataOwner->foto ?>" name="foto" hidden></th>
				</tr>
                </form>
			</section>
		</div> <!-- headerContent --><!-- mainContent -->