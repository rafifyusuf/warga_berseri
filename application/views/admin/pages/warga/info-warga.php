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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Info Warga</a></li>
							</ol>
						</div>
						<h4 class="page-title">Info Warga</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-12">
					<div class="card-box">
						<div class="mb-2">
							<div class="row">
								<div class="col-12 text-sm-center form-inline">
									<div class="form-group mr-2">
										<select id="demo-foo-filter-status" class="custom-select custom-select-sm">
											<option value="">Tampilkan Semua</option>
											<option value="Kepala Keluarga">Kepala Keluarga</option>
											<option value="Anggota Keluarga">Anggota Keluarga</option>
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
										<th>Nama Lengkap</th>
										<th>NIK</th>
										<th>No Rumah</th>
										<th>Status</th>
										<th>File KTP</th>
										<th>Detail</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($pendataan_warga as $warga) :	 ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $warga->nama_warga ?></td>
											<td><?php echo $warga->nik ?></td>
											<td><?php echo $warga->no_rumah ?></td>
											<td><?php echo $warga->status ?></td>
											<td>
												<button data-toggle="modal" data-target="#viewDetail<?php echo $warga->id_detail_warga ?>" class="ladda-button btn btn-info" data-style="slide-up">
													<i class="mdi mdi-eye-outline"></i> Lihat
												</button>
											</td>
											<td>
												<a href="<?= base_url('admin/warga/detail_hunian/' . $warga->id_detail_warga) ?>" class="ladda-button btn btn-primary" data-style="slide-up">
													<i class="mdi mdi-information-outline"></i> Detail
												</a>
											</td>
											<td width='260px'>
												<center>
													<?php if ($warga->status_verifikasi == 1) {  ?>
														<a href="<?= base_url('admin/warga/verifikasi_warga_info/' . $warga->id_detail_warga) ?>" class="ladda-button btn btn-warning" data-style="slide-up">
															<i class="mdi mdi-account-check-outline"></i>
															Verifikasi
														</a>
													<?php } else { ?>
														<button disabled class="ladda-button btn btn-success" data-style="slide-up">
															<i class="mdi mdi-account-check-outline"></i>
															Terverifikasi
														</button>
													<?php		} ?>
													<a href="<?= base_url('admin/warga/delete_warga/' . $warga->id_detail_warga) ?>" class="ladda-button btn btn-danger" data-style="slide-up">
														<i class="mdi mdi-delete"></i> Hapus
													</a>
												</center>
											</td>
										</tr>
										<!-- START Modal view Anggota Keluarga -->
										<div class="modal fade" id="viewDetail<?php echo $warga->id_detail_warga ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Detail Data Warga
														</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
													</div>
													<div class="modal-body">
														<div class="form-group">
															<label>Nama Lengkap</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->nama_warga ?>">
														</div>
														<div class="form-group">
															<label>NIK</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->nik ?>">
														</div>
														<div class="form-group">
															<label>No Hp</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->no_hp ?>">
														</div>
														<div class="form-group">
															<label>Tempat, Tanggal Lahir</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->tempat_lahir ?>, <?php echo $warga->tanggal_lahir ?>">
														</div>
														<div class="form-group">
															<label>Agama</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->agama ?>">
														</div>
														<div class="form-group">
															<label>Jenis Kelamin</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->jenis_kelamin ?>">
														</div>
														<div class="form-group">
															<label>Status Perkawinan</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->status_perkawinan ?>">
														</div>
														<div class="form-group">
															<label>Hubungan Keluarga</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->hubungan_keluarga ?>">
														</div>
														<div class="form-group">
															<label>Status</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->status ?>">
														</div>
														<div class="form-group">
															<label>Pekerjaan</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->pekerjaan ?>">
														</div>
														<div class="form-group">
															<label>Pendidikan</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->pendidikan ?>">
														</div>
														<div class="form-group">
															<label>Status Hunian</label>
															<input disabled style="height:40px" class="form-control input-sm" type="text" value="<?php echo $warga->status_hunian ?>">
														</div>
													</div>
													<div class="modal-body">
														<div class="form-group ">
															<label>File Identitas</label>
															<img src="<?php echo base_url('uploads/') . $warga->file_ktp ?>" alt="..." class="img-thumbnail mb-2">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										<!-- END Modal view Anggota Keluarga -->
									<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr class="active">
										<td colspan="9">
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
			<!-- end row-->
		</div> <!-- container -->
	</div> <!-- content -->
