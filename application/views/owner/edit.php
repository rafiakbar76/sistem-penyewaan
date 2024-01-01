<?php include('owner/header.php'); 
  include('owner/sidebar.php');?>
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit plat</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form Edit plat</div>
									<div class="panel-body">
										<form method="post" name="theform" class="form-horizontal" action="edit.php">	
												<?php
												// $id=$_GET['plat'];
												// $sql ="SELECT * FROM mobil WHERE plat='$id'";
												// $query = mysqli_query($koneksidb,$sql);
												// $result = mysqli_fetch_array($query);
												?>
													<div class="form-group">
														<label class="col-sm-4 control-label">Nomor Plat</label>
															<div class="col-sm-8">
																<input type="text" class="form-control" name='plat' id='plat'>
																<input type="hidden" class="form-control" name='plat' id='plat'>
															</div>
															<div class="col-sm-8 col-sm-offset-4">
																<button class="btn btn-primary" type="submit">Submit</button>
															</div>
													</div>
											<div class="hr-dashed"></div>
										</form>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>  