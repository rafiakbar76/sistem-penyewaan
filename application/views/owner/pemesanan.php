<div class="all">
      <!-- content -->
      	<div class="content-wrapper">
			<!-- headerContent -->
				

			<!-- Main content -->
			<section class="content-data">
				
					<table  class="table-pesanan">
						<thead>
							<tr>
								<th>Customer Name</th>
								<th>ID</th>
								<th>Kendaraan</th>
								<th>Plat Mobil</th>
							</tr>
						</thead>
						<tbody >
								<?php 
								$no=1;
									foreach ($dataPemesanan as $pemesanan){?>
										
									<tr>
										<!-- <td><?php echo $no; ?></td> -->
										<td><?php echo $pemesanan->nama; ?></td>
										<td><?php echo $pemesanan->id_pemesanan; ?></td>
										<td><?php echo $pemesanan->merk_type; ?></td>
										<td><?php echo $pemesanan->plat; ?></td>
										
									</tr>
								<?php 
								$no++;
									}
								?>
						</tbody>
					</table>
					</div>
			</section>
		</div> <!-- headerContent --><!-- mainContent -->
		</div>
      <!-- footer -->
      
      <div class="control-sidebar-bg"></div>
    </div>
</script>  </body>
</html>
