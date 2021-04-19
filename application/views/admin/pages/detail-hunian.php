<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->


<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Warga Berseri</a></li>
								<li class="breadcrumb-item"><a href="javascript: void(0);">Detail Warga</a></li>
							</ol>
						</div>
						<h4 class="page-title">Profile Warga</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-lg-4 col-xl-4">
					<div class="card-box text-center">
						<?php if ($hunian->foto_profile == '' || $hunian->foto_profile == NULL) { ?>
							<img src="<?php echo base_url('assets/admin/images/users/default.jpg') ?>" class="rounded-circle avatar-xxl img-thumbnail" alt="profile-image">
						<?php } else { ?>
							<img src="<?php echo base_url('uploads/profile/' . $hunian->foto_profile) ?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
						<?php } ?>

						<h4 class="mb-0"><?php echo $hunian->nama_warga ?></h4>

						<button type="button" class="btn btn-success btn-xs waves-effect mb-2 mt-3 waves-light">Ubah Foto</button>
						<button type="button" class="btn btn-danger btn-xs waves-effect mb-2 mt-3 waves-light">Hapus Foto</button>

						<div class="text-left mt-3">

							<p class="text-muted mb-2 font-14"><strong style="width: 105px; display: inline-block;">Nama Lengkap</strong>
								<span class="ml-2">
									<strong>:</strong> <?php echo $hunian->nama_warga ?>
								</span>
							</p>

							<p class="text-muted mb-2 font-14"><strong style="width: 105px; display: inline-block;">Jenis Kelamin</strong>
								<span class="ml-2">
									<strong>:</strong> <?php echo $hunian->jenis_kelamin ?>
								</span>
							</p>

							<p class="text-muted mb-2 font-14"><strong style="width: 105px; display: inline-block;">Agama</strong>
								<span class="ml-2">
									<strong>:</strong> <?php echo $hunian->agama ?>
								</span>
							</p>

							<p class="text-muted mb-2 font-14"><strong style="width: 105px; display: inline-block;">No Telepon</strong>
								<span class="ml-2">
									<strong>:</strong> <?php echo $hunian->no_hp ?>
								</span>
							</p>

							<p class="text-muted mb-2 font-14"><strong style="width: 105px; display: inline-block;">Status Keluarga</strong>
								<span class="ml-2">
									<strong>:</strong> <?php echo $hunian->status ?>
								</span>
							</p>

						</div>
						<?php if ($hunian->status_verifikasi != 2) : ?>
							<div class="alert alert-danger" role="alert">
								Belum Terverifkasi
							</div>
						<?php else : ?>
							<div class="alert alert-success" role="alert">
								Terverifikasi
							</div>
						<?php endif; ?>


					</div> <!-- end card-box -->


				</div> <!-- end col-->

				<div class="col-lg-8 col-xl-8">
					<div class="card-box">
						<div class="tab-content">

							<div>
								<h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Data personal</h5>
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="firstname">Nama Lengkap</label>
											<input class="form-control" disabled value="<?php echo $hunian->nama_warga ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="firstname">Nomor Induk Keluarga</label>
											<input class="form-control" disabled value="<?php echo $hunian->nik ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="firstname">Status Hunian</label>
											<input class="form-control" disabled value="<?php echo $hunian->status_hunian ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="firstname">Status Tinggal</label>
											<input class="form-control" disabled value="<?php echo $hunian->hubungan_keluarga ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="firstname">Status Perkawinan</label>
											<input class="form-control" disabled value="<?php echo $hunian->status_perkawinan ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label for="firstname">Tempat</label>
											<input class="form-control" disabled value="<?php echo $hunian->tempat_lahir ?>">
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label for="firstname">Tanggal Lahir</label>
											<input class="form-control" disabled value="<?php echo $hunian->tanggal_lahir ?>">
										</div>
									</div>
								</div>

								<h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Info Pekerjaan</h5>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="companyname">Pendidikan</label>
											<input disabled class="form-control" id="companyname" value="<?php echo $hunian->pendidikan ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="cwebsite">Pekerjaan</label>
											<input disabled class="form-control" id="cwebsite" value="<?php echo $hunian->pekerjaan ?>">
										</div>
									</div> <!-- end col -->
								</div>

								</form>
							</div>
							<!-- end settings content-->

						</div> <!-- end tab-content -->
					</div> <!-- end card-box-->

				</div> <!-- end col -->
			</div>
			<!-- end row-->

		</div> <!-- container -->

	</div> <!-- content -->
