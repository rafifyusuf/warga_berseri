<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<style>
	p {
		margin: 0px;
		padding: 0px;
		overflow-wrap: normal;
		word-break: normal;
	}
</style>
<?php $role = $this->session->userdata('role_id'); ?>
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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Tambah Hunian</a></li>
							</ol>
						</div>
						<h4 class="page-title">Tambah Data Hunian Warga</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<!-- Form row -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<?= form_open_multipart('admin/warga/proses_tambah_anggota_warga', array('method' => 'POST')) ?>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Nama Lengkap</label>
									<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_warga" value="<?php echo set_value('nama_warga') ?>">
									<span class="form-text text-danger"><?= form_error('nama_warga'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">NIK</label>
									<input type="text" class="form-control" placeholder="Nomor Induk Keluarga" name="nik" value="<?php echo set_value('nik') ?>">
									<span class="form-text text-danger"><?= form_error('nik'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Nomor HP</label>
									<input type="number" class="form-control" placeholder="Nomor HandPhone" name="no_hp" value="<?php echo set_value('no_hp') ?>">
									<span class="form-text text-danger"><?= form_error('no_hp'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="inputCity" class="col-form-label">Tempat Lahir</label>
									<input class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo set_value('tempat_lahir') ?>">
									<span class="form-text text-danger"><?= form_error('tempat_lahir'); ?></span>
								</div>
								<div class="form-group col-md-4">
									<label class="col-form-label">Tanggal Lahir</label>
									<input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir') ?>">
									<span class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Agama</label>
									<select class="form-control" name="agama">
										<option disabled selected>Agama</option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Katolik">Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Buddha">Buddha</option>
										<option value="Konghucu">Konghucu</option>
									</select>
									<span class="form-text text-danger"><?= form_error('agama'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Jenis Kelamin</label>
									<select class="form-control" name="jenis_kelamin">
										<option disabled selected>Jenis Kelamin</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
									<span class="form-text text-danger"><?= form_error('jenis_kelamin'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Status Perkawinan</label>
									<select class="form-control" name="status_perkawinan">
										<option disabled selected>Status Perkawinan</option>
										<option value="Belum Kawin">Belum Kawin</option>
										<option value="Kawin">Kawin</option>
										<option value="Janda">Janda</option>
										<option value="Duda">Duda</option>
									</select>
									<span class="form-text text-danger"><?= form_error('status_perkawinan'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Hubungan Keluarga</label>
									<select class="form-control" name="hubungan_keluarga">
										<option disabled selected>Hubungan Keluarga</option>
										<option value="Anak">Anak</option>
										<option value="Istri">Istri</option>
										<option value="Suami">Suami</option>
										<option value="Kerabat">Kerabat</option>
										<option value="Adik">Adik</option>
										<option value="Kaka">Kaka</option>
										<option value="Orang Tua">Orang Tua</option>
									</select>
									<span class="form-text text-danger"><?= form_error('hubungan_keluarga'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Pekerjaan</label>
									<select class="form-control" name="pekerjaan">
										<option disabled selected>Pekerjaan</option>
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
									<span class="form-text text-danger"><?= form_error('pekerjaan'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Pendidikan</label>
									<select class="form-control" name="pendidikan">
										<option disabled selected>Pendidikan</option>
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
									<span class="form-text text-danger"><?= form_error('pendidikan'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Status Hunian</label>
									<select class="form-control" name="status_hunian">
										<option disabled selected>Status Hunian</option>
										<option value="KTP lengkong tinggal di Lengkong">KTP lengkong tinggal di Lengkong</option>
										<option value="KTP luar tinggal di Lengkong">KTP luar tinggal di Lengkong</option>
										<option value="KTP lengkong tinggal di luar">KTP lengkong tinggal di luar</option>
									</select>
									<span class="form-text text-danger"><?= form_error('status_hunian'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Foto Ktp atau Foto Identitas</label>
									<input type="file" class="form-control dropify" name="file_ktp" value="<?php echo set_value('file_ktp') ?>">
									<span class="form-text text-danger"><?= form_error('file_ktp'); ?></span>
								</div>
							</div>
							<input type="hidden" name="id_warga" value="<?= $id_warga ?>">
							<button type="submit" class="btn btn-primary waves-effect waves-light">Tambah Data</button>

							<?= form_close() ?>

						</div> <!-- end card-body -->
					</div> <!-- end card-->
				</div> <!-- end col -->
			</div>
			<!-- end row -->

		</div> <!-- container -->

	</div> <!-- content -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->