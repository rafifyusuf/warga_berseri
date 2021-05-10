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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Tambah Kendaraan</a></li>
							</ol>
						</div>
						<h4 class="page-title">Tambah Data Kendaraan <?= $this->uri->segment(5) ?></h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<!-- Form row -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<?= form_open_multipart('admin/kendaraan/proses_tambah_kendaraan', array('method' => 'POST')) ?>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Tipe Kendaraan</label>
									<select class="form-control" name="tipe_kendaraan">
										<option disabled selected>Tipe Kendaraan</option>
										<option value="Roda Dua" <?php echo set_select('tipe_kendaraan', 'Roda Dua', (!empty($data) && $data == "Roda Dua" ? TRUE : FALSE)); ?>>Roda Dua</option>
										<option value="Roda Tiga" <?php echo set_select('tipe_kendaraan', 'Roda Tiga', (!empty($data) && $data == "Roda Tiga" ? TRUE : FALSE)); ?>>Roda Tiga</option>
										<option value="Roda Empat" <?php echo set_select('tipe_kendaraan', 'Roda Empat', (!empty($data) && $data == "Roda Empat" ? TRUE : FALSE)); ?>>Roda Empat</option>
										<option value="Lebih dari Roda Empat" <?php echo set_select('tipe_kendaraan', 'Lebih dari Roda Empat', (!empty($data) && $data == "Lebih dari Roda Empat" ? TRUE : FALSE)); ?>>Lebih dari Roda Empat</option>
									</select>
									<span class="form-text text-danger"><?= form_error('tipe_kendaraan'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Merk Kendaraan</label>
									<input type="text" class="form-control" placeholder="Merk Kendaraan" name="merk_kendaraan" value="<?php echo set_value('merk_kendaraan') ?>">
									<span class="form-text text-danger"><?= form_error('merk_kendaraan'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Nama Pemilik si STNK</label>
									<input type="text" class="form-control" placeholder="Nama Pemilik" name="nama_stnk" value="<?php echo set_value('nama_stnk') ?>">
									<span class="form-text text-danger"><?= form_error('nama_stnk'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Nomor PolisiK</label>
									<input type="text" class="form-control" placeholder="Nomor Polisi" name="no_polisi" value="<?php echo set_value('no_polisi') ?>">
									<span class="form-text text-danger"><?= form_error('no_polisi'); ?></span>
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-8">
									<label class="col-form-label">Foto Kendaraan</label>
									<input type="file" class="form-control dropify" name="foto_kendaraan" value="<?php echo set_value('foto_kendaraan') ?>">
									<span class="form-text text-danger"><?= form_error('foto_kendaraan'); ?></span>
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
