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
						<h4 class="page-title">Tambah Data Warga</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<!-- Form row -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<?= form_open_multipart('admin/warga/proses_tambah_warga', array('method' => 'POST')) ?>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4" class="col-form-label">Nomor Rumah</label>
									<input type="text" class="form-control" placeholder="Nomor Rumah" name="no_rumah" value="<?php echo set_value('no_rumah') ?>">
									<span class="form-text text-danger"><?= form_error('no_rumah'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4" class="col-form-label">Nomor Kartu Keluarga</label>
									<input type="number" class="form-control" placeholder="No KK" name="no_kk" value="<?php echo set_value('no_kk') ?>">
									<span class="form-text text-danger"><?= form_error('no_kk'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label for="inputCity" class="col-form-label">Alamat</label>
									<input type="text" name="alamat" class="form-control" placeholder="Alamat Rumah" value="<?php echo set_value('alamat') ?>">
									<span class="form-text text-danger"><?= form_error('alamat'); ?></span>
								</div>
								<div class="form-group col-md-1">
									<label class="col-form-label">RT</label>
									<input type="text" class="form-control" name="rt" value="<?php echo set_value('rt') ?>">
									<span class="form-text text-danger"><?= form_error('rt'); ?></span>
								</div>
								<div class="form-group col-md-1">
									<label class="col-form-label">RW</label>
									<input type="text" class="form-control" name="rw" value="<?php echo set_value('rw') ?>">
									<span class="form-text text-danger" style=" width:200px"><?= form_error('rw'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label class="col-form-label">Jumlah Keluarga</label>
									<input type="text" class="form-control" name="jumlah_keluarga" value="<?php echo set_value('jumlah_keluarga') ?>">
									<span class="form-text text-danger"><?= form_error('jumlah_keluarga'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label class="col-form-label">Status Rumah</label>
									<select class="form-control" name="status_rumah">
										<option disabled selected>Status Tinggal</option>
										<option value="Rumah Usaha">Rumah Usaha</option>
										<option value="Rumah Tinggal">Rumah Tinggal</option>
										<option value="Rumah Kosong">Rumah Kosong</option>
									</select>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label class="col-form-label">File Kartu Keluarga</label>
									<input type="file" class="form-control dropify" name="file_kk" value="<?php echo set_value('file_kk') ?>">
									<span class="form-text text-danger"><?= form_error('file_kk'); ?></span>
								</div>
							</div>

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
