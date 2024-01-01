<div class="all">
      <!-- content -->
      	<div class="content-wrapper">
			<!-- headerContent -->
				
			<?php if ($this->session->flashdata('success')): ?>
				<p class="success"><?= $this->session->flashdata('success') ?></p>
			<?php endif; ?>

			<?php if ($this->session->flashdata('error')): ?>
				<p class="error"><?= $this->session->flashdata('error') ?></p>
				
			<?php endif; ?>
			
			<!-- Main content -->
			<section class="content-data">
			<button><a href="<?= site_url('tambah_kendaraan') ?>">Tambah</a></button>
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
										<td>
											<button > <a href="<?= site_url('data_mobil/edit/'.$mobil['plat']) ?>">Update</a></button>
											<button > <a href="<?= site_url('data_mobil/delete/'.$mobil['plat']) ?>">Delete</a></button>
										</td>
									</tr>
								<?php 
								$no++;
									}
								?>
						</tbody>
					</table>

					
</body>
</html>