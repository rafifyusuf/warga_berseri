<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="modal fade overflow-auto" id="addWarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?= form_open_multipart('admin/warga/proses_tambah_anggota_warga', array('method' => 'POST'), array('id' => 'form', 'role' => 'form')) ?>
			<div class="modal-header">
				<h5 class="modal-title">Tambah Data Keluarga</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input style="height:40px" class="form-control input-sm" type="text" name="nama_warga">
					<small class="form-text text-danger"><?= form_error('nama_warga'); ?></small>
				</div>
				<div class="form-group">
					<label>NIK</label>
					<input style="height:40px" class="form-control input-sm" type="text" name="nik">
					<small class="form-text text-danger"><?= form_error('nik'); ?></small>
				</div>
				<div class="form-group">
					<label>No Hp</label>
					<input style="height:40px" class="form-control input-sm" type="text" name="no_hp">
					<small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input style="height:40px" class="form-control input-sm" type="text" name="tempat_lahir">
					<small class="form-text text-danger"><?= form_error('tempat_lahir'); ?></small>
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input style="height:40px" class="form-control input-sm" type="date" name="tanggal_lahir">
					<small class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></small>
				</div>
				<div class="form-group">
					<label>Agama</label>
					<select class="form-control" name="agama">
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Katolik">Katolik</option>
						<option value="Hindu">Hindu</option>
						<option value="Buddha">Buddha</option>
						<option value="Konghucu">Konghucu</option>
					</select>
					<small class="form-text text-danger"><?= form_error('agama'); ?></small>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="jenis_kelamin">
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
					<small class="form-text text-danger"><?= form_error('jenis_kelamin'); ?></small>
				</div>
				<div class="form-group">
					<label>Status Perkawinan</label>
					<select class="form-control" name="status_perkawinan">
						<option value="Belum Kawin">Belum Kawin</option>
						<option value="Kawin">Kawin</option>
						<option value="Janda">Janda</option>
						<option value="Duda">Duda</option>
					</select>
					<small class="form-text text-danger"><?= form_error('status_perkawinan'); ?></small>
				</div>
				<div class="form-group">
					<label>Hubungan Keluarga</label>
					<select class="form-control" name="hubungan_keluarga">
						<option value="Anak">Anak</option>
						<option value="Istri">Istri</option>
						<option value="Suami">Suami</option>
						<option value="Kerabat">Kerabat</option>
						<option value="Adik">Adik</option>
						<option value="Kaka">Kaka</option>
						<option value="Orang Tua">Orang Tua</option>
					</select>
					<small class="form-text text-danger"><?= form_error('hubungan_keluarga'); ?></small>
				</div>
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="status">
						<option value="Anggota Keluarga">Anggota Keluarga</option>
						<option value="Kepala Keluarga">Kepala Keluarga</option>
					</select>
					<small class="form-text text-danger"><?= form_error('status'); ?></small>
				</div>
				<div class="form-group">
					<label>Pekerjaan</label>
					<select class="form-control" name="pekerjaan">
						<option value="Wiraswasta">Wiraswasta</option>
						<option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
						<option value="Pegawai Negeri">Pegawai Negeri</option>
						<option value="Pegawai Swasta">Pegawai Swasta</option>
						<option value="Guru">Guru</option>
						<option value="Petani">Petani</option>
						<option value="Mahasiswa">Mahasiswa</option>
						<option value="Tidak Bekerja">Tidak Bekerja</option>
						<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
					</select>
					<small class="form-text text-danger"><?= form_error('pekerjaan'); ?></small>
				</div>
				<div class="form-group">
					<label>Pendidikan</label>
					<select class="form-control" name="pendidikan">
						<option value="Belum Sekolah">Belum Sekolah</option>
						<option value="TK">TK</option>
						<option value="SD">SD</option>
						<option value="SMP">SMP</option>
						<option value="SMA">SMA</option>
						<option value="Diploma">Diploma</option>
						<option value="S1">S1</option>
						<option value="S2">S2</option>
						<option value="S3">S3</option>
					</select>
					<small class="form-text text-danger"><?= form_error('pendidikan'); ?></small>
				</div>
				<div class="form-group">
					<label>Status Hunian</label>
					<select class="form-control" name="status_hunian">
						<option value="KTP lengkong tinggal di Lengkong">KTP lengkong tinggal di Lengkong</option>
						<option value="KTP luar tinggal di Lengkong">KTP luar tinggal di Lengkong</option>
						<option value="KTP lengkong tinggal di luar">KTP lengkong tinggal di luar</option>
					</select>
					<small class="form-text text-danger"><?= form_error('status_hunian'); ?></small>
				</div>
				<div class="form-group">
					<label>Foto Ktp atau Foto Identitas</label>
					<input type="file" name="file_ktp" class="form-control">
					<small class="form-text text-danger"><?= form_error('file_ktp'); ?></small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" name="submit" id="form-submit-button" class="btn btn-primary">Tambah</button>
			</div>
		</div>
		<input type="hidden" name="id_warga" value="<?= $id_warga ?>">
		<?= form_close() ?>
	</div>
</div>

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
						<h4 class="page-title">Profile Warga No Rumah
							<?= $warga->no_rumah ?>
						</h4>
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
										<?php if ($jumlah_hunian >= $warga->jumlah_keluarga) { ?>
											<button type="button" class="btn btn btn-primary" id="tambah">
												<i class=" fas fa-plus mr-2"></i>
												Tambah Anggota Hunian
											</button>
										<?php } else { ?>
											<button data-toggle="modal" data-target="#addWarga" class="btn btn-secondary">
												<i class="mdi mdi-plus-circle mr-2"></i>
												Tambah Anggota Warga
											</button>
										<?php	} ?>
									</div>
								</div>
							</div>
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
										<th>Status</th>
										<th>Pekerjaan</th>
										<th>File KTP</th>
										<th>Detail</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($pendataan_warga as $warga) : ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $warga->nama_warga ?></td>
											<td><?php echo $warga->nik ?></td>
											<td><?php echo $warga->status ?></td>
											<td><?php echo $warga->pekerjaan ?></td>
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
											<td>
												<center>
													<?php
													$no_rumah = $this->uri->segment(5);
													if ($warga->status_verifikasi == 1) {  ?>
														<?= form_open_multipart('admin/warga/verifikasi_warga', array('method' => 'POST')) ?>
														<input type="hidden" name="id_warga" value="<?= $warga->id_warga ?>">
														<input type="hidden" name="id_detail_warga" value="<?= $warga->id_detail_warga ?>">
														<input type="hidden" name="no_rumah" value="<?= $no_rumah ?>">
														<button type="submit" class="ladda-button btn btn-warning mb-1" data-style="slide-up">
															<i class="mdi mdi-account-check-outline"></i>
															Verifikasi
														</button>
														<?= form_close() ?>
													<?php } else { ?>
														<button disabled class="ladda-button btn btn-success" data-style="slide-up">
															<i class="mdi mdi-account-check-outline"></i>
															Terverifikasi
														</button>
													<?php		} ?>
													<a href="<?php echo base_url('admin/warga/delete_warga/' . $warga->id_detail_warga) ?>" class="ladda-button btn btn-danger" data-style="slide-up">
														<i class="mdi mdi-delete"></i> Hapus
													</a>
											</td>
											</center>
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

	<script>
		document.querySelector("#tambah").addEventListener('click', function() {
			Swal.fire({
				icon: "error",
				title: "Maaf",
				text: "Anda hanya bisa menambah anggota hunian sebanyak <?= $jumlah_hunian ?> hunian",
			});
		});
	</script>
