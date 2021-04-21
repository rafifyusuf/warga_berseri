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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Data Warga</a></li>
							</ol>
						</div>
						<h4 class="page-title">Data Warga</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-12">
					<div class="card-box">
						<div class="mb-2">
							<div class="row">
								<div class="col">
									<div class="form-group mr-2">
										<a href="<?= base_url('admin/warga/tambah_warga') ?>" class="btn btn-secondary"><i class="mdi mdi-plus-circle mr-2"></i> Tambah Data Warga</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 text-sm-center form-inline">
									<div class="form-group mr-2">
										<select id="demo-foo-filter-status" class="custom-select custom-select-sm">
											<option value="">Tampilkan Semua</option>
											<option value="Rumah Pribadi">Rumah Usulan</option>
											<option value="Pemilik Kost">Rumah Tinggal</option>
											<option value="Pemilik Kontrakan">Rumah Kosong</option>
										</select>
									</div>
									<div class="form-group">
										<input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
								<thead>
									<tr>
										<th>No.</th>
										<th>No Rumah</th>
										<th>No KK</th>
										<th>Alamat</th>
										<th>Jml Keluarga</th>
										<th>Status Rumah</th>
										<th style="width: 80px;">Rt / Rw</th>
										<th>Pemilik Rumah</th>
										<th>File KK</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($pendataan_warga as $warga) : ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $warga->no_rumah ?></td>
											<td><?php echo $warga->no_kk ?></td>
											<td><?php echo $warga->alamat ?></td>
											<td><?php echo $warga->jumlah_keluarga ?></td>
											<td><?php echo $warga->status_rumah ?></td>
											<td><?php echo $warga->rt ?> / <?php echo $warga->rw ?></td>
											<td><?php echo $warga->nama_warga ?></td>
											<td width='110px'>
												<button data-toggle="modal" data-target="#openImageKK<?php echo $warga->id_warga ?>" class="ladda-button btn btn-info" data-style="slide-up">
													<i class="mdi mdi-eye-outline"></i> Lihat
												</button>
											</td>
											<td width='310px'>
												<center>
													<a href=" <?php echo base_url('admin/warga/detail_warga/' . $warga->id_warga) ?>" class="ladda-button btn btn-primary" data-style="slide-up">
														<i class="mdi mdi-information-outline"></i> Info Warga
													</a>
													<a href=" <?php echo base_url('admin/kendaraan/index/' . $warga->id_warga . '/' . $warga->no_rumah) ?>" class="ladda-button btn btn-warning" data-style="slide-up">
														<i class="mdi mdi-information-outline"></i> Info Kendaraan
													</a>
													<!-- <a href="<?php echo base_url('Warga/delete_warga/' . $warga->id_warga) ?>" class="ladda-button btn btn-danger" data-style="slide-up">
														<i class="mdi mdi-delete"></i> Hapus
													</a> -->
												</center>
											</td>
										</tr>
										<!-- START Modal Lihat File KK -->
										<div class="modal fade overflow-auto" id="openImageKK<?php echo $warga->id_warga ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Foto Ktp</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
													</div>
													<div class="modal-body">
														<div class="form-group d-flex justify-content-center">
															<img src="<?php echo 'http://localhost/warga_berseri/user/uploads/' . $warga->file_kk ?>" alt="..." class="img-thumbnail mb-2">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Modal Lihat File KK -->
									<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr class="active">
										<td colspan="10">
											<div class="text-right">
												<ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0">
												</ul>
											</div>
										</td>
									</tr>
								</tfoot>
							</table>
						</div> <!-- end .table-responsive-->
					</div> <!-- end card-box -->
				</div> <!-- end col -->
			</div>
			<!-- end row -->
		</div> <!-- container -->
	</div> <!-- content -->


	<!-- <?php if ($warga->status == "Terverifikasi") : ?>
		<td><span class="badge label-table badge-success"><?php echo $warga->status ?></span></td>
	<?php else : ?>
		<td><span class="badge label-table badge-danger"><?php echo $warga->status ?></span></td>
	<?php endif; ?>

	<center>
		<?php if ($warga->status != 'Terverifikasi') : ?>
			<a href="<?= base_url('Dashboard/verifikasi_warga/' . $warga->id_warga) ?>" class="ladda-button btn btn-success" data-style="slide-up"><i class="mdi mdi-account-check-outline"></i> Verifikasi</a>
		<?php endif; ?>
		<a href=" <?php echo base_url('Dashboard/detail_warga/' . $warga->id_warga) ?>" class="ladda-button btn btn-primary" data-style="slide-up">
			<i class="mdi mdi-information-outline"></i> Info
		</a>
		<a href="<?php echo base_url('Dashboard/delete_warga/' . $warga->id_warga) ?>" class="ladda-button btn btn-danger" data-style="slide-up">
			<i class="mdi mdi-delete"></i> Hapus
		</a>
	</center> -->