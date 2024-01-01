<div class="all">
      <!-- content -->
      	<div class="content-wrapper">
			<!-- headerContent -->
				<section class="content-header">
					
					<p>DASHBOARD</p>
					<p style="font-size: 24px;">Hi Owner, Welcome in Dashboard</p>
				</section>  

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-lg-4 col-xs-6">
						<div class="small-box bg-aqua">
							<div class="s-box">
								<div class="isi">
									<img src="http://localhost/sistem-penyewaan/assets/img/shopping.png" class="isi">
								</div>
								<div class="inner">
									<h3>022</h3>

									<p>Total Pesanan</p>
								</div>
							
								<input type="date" class="date">
							</div>
							
						</div>
					</div>
					<div class="col-lg-4 col-xs-6">
						<div class="small-box bg-green">
							<div class="s-box">
								<div class="isi">
									<img src="http://localhost/sistem-penyewaan/assets/img/vector.png" class="isi">
								</div>
								<div class="inner">
									<h3>$048</h3>

									<p>Total Pemasukan</p>
								</div>
							
								<input type="date" class="date">
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xs-6">
						<div class="small-box bg-yellow">
							<div class="s-box">
								<div class="isi">
									<img src="http://localhost/sistem-penyewaan/assets/img/mdi_account-group.png" class="isi">
								</div>
								<div class="inner">
									<h3>020</h3>

									<p>Total Pelanggan</p>
								</div>
							
								<input type="date" class="date">
							</div>
						</div>
					</div>
					
					<div class="daftar">Daftar Pelanggan</div>
					<table  class="table-header">
						<thead>
							<tr>
								<th>Nama</th>
								<th>No Tlp</th>
								<th>Email</th>
								<th>NIK</th>
								<th>Alamat</th>
							</tr>
						</thead>
						<tbody >
								<?php 
								$no=1;
									foreach ($dataPenyewa as $penyewa){?>
										
									<tr>
										<!-- <td><?php echo $no; ?></td> -->
										<td><?php echo $penyewa['nama']; ?></td>
										<td><?php echo $penyewa['telpon']; ?></td>
										<td><?php echo $penyewa['email']; ?></td>
										<td><?php echo $penyewa['nik']; ?></td>
										<td><?php echo $penyewa['alamat']; ?></td>
									</tr>
								<?php 
								$no++;
									}
								?>
						</tbody>
						<!-- <tbody id="data-pembayaran"> -->
						
						<!-- </tbody> -->
					</table>
				</div>
			</section>
		</div> <!-- headerContent --><!-- mainContent -->
		</div>
      <!-- footer -->
      
      <div class="control-sidebar-bg"></div>
    </div>

   
 </body>
</html>