<!-- Start Modal Update kk -->
<div class="modal fade overflow-auto" id="updateKK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?= form_open_multipart('user/warga/update_kk', array('method' => 'POST')) ?>
			<input type="hidden" name="id_warga" value="<?= $warga->id_warga ?>">
			<input type="hidden" name="old_kk" value="<?= $warga->file_kk ?>">
			<div class="modal-header">
				<h5 class="modal-title">Update Foto Kartu Keluarga</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Foto KK</label>
					<input type="file" name="file_kk" class="form-control dropify" data-max-file-size="1M">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" name="submit" class="btn btn-primary">Upload</button>
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>
<!-- End Modal Update kk -->

<div class="main-wrapper">
	<section class="page-title bg-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<ul class="list-inline mb-0">
						<li class="list-inline-item"><a href="index.html" class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
						<li class="list-inline-item"><span class="text-white">|</span></li>
						<li class="list-inline-item"><a href="#" class="text-color text-uppercase text-sm letter-spacing">Info Warga</a></li>
					</ul>
					<h1 class="text-lg text-white mt-2">Info Warga</h1>
				</div>
			</div>
		</div>
	</section>

	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<?php unset($_SESSION['flash']); ?>

	<div class="container py-5">
		<div class="row gutters">
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="account-settings">
							<div class="user-profile">
								<div class="user-avatar">
									<?php if ($warga->file_kk == '' || $warga->file_kk == NULL) { ?>
										<img src="<?php echo base_url('assets/admin/images/users/default.jpg') ?>" class="rounded w-100 img-thumbnail">
									<?php } else { ?>
										<img src="<?php echo base_url('uploads/kk/' . $warga->file_kk) ?>" class="rounded w-100 img-thumbnail">
									<?php } ?>
								</div>
								<div class="d-flex justify-content-center mt-2">
									<button data-toggle="modal" data-target="#updateKK" class="btn btn-primary btn-sm">Ubah</button>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<?= form_open_multipart('user/warga/proses_update_warga', array('method' => 'POST')) ?>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<h6 class="mb-2 text-primary">Data Rumah</h6>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="firstname">No Rumah</label>
									<input type="text" class="form-control" name="no_rumah" value="<?php echo $warga->no_rumah ?>">
									<span class="form-text text-danger"><?= form_error('no_rumah'); ?></span>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="firstname">Nomor Induk Keluarga</label>
									<input type="number" class="form-control" name="no_kk" value="<?php echo $warga->no_kk ?>">
									<span class="form-text text-danger"><?= form_error('no_kk'); ?></span>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="firstname">Rt</label>
									<input type="number" class="form-control" name="rt" value="<?php echo $warga->rt ?>">
									<span class="form-text text-danger"><?= form_error('rt'); ?></span>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="firstname">Rw</label>
									<input type="number" class="form-control" name="rw" value="<?php echo $warga->rw ?>">
									<span class="form-text text-danger"><?= form_error('rw'); ?></span>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="firstname">Jumlah Keluarga</label>
									<input type="number" class="form-control" name="jumlah_keluarga" value="<?php echo $warga->jumlah_keluarga ?>">
									<span class="form-text text-danger"><?= form_error('jumlah_keluarga'); ?></span>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="firstname">Status Tempat Tinggal</label>
									<input type="hidden" name="status_rumah" value="<?php echo $warga->status_rumah ?>">
									<select class="form-control" name="status_rumah">
										<?php if ($warga->status_rumah) { ?>
											<option disabled selected><?php echo $warga->status_rumah ?></option>
										<?php } else { ?>
											<option disabled selected>Status Tempat Tinggal</option>
										<?php } ?>
										<option value="Rumah Usaha" <?php echo set_select('status_rumah', 'Rumah Usaha', (!empty($data) && $data == "Rumah Usaha" ? TRUE : FALSE)); ?>>Rumah Usaha</option>
										<option value="Rumah Tinggal" <?php echo set_select('status_rumah', 'Rumah Tinggal', (!empty($data) && $data == "Rumah Tinggal" ? TRUE : FALSE)); ?>>Rumah Tinggal</option>
										<option value="Rumah Kosong" <?php echo set_select('status_rumah', 'Rumah Kosong', (!empty($data) && $data == "Rumah Kosong" ? TRUE : FALSE)); ?>>Rumah Kosong</option>
									</select>
									<span class="form-text text-danger"><?= form_error('status_rumah'); ?></span>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="firstname">Alamat</label>
									<textarea class="form-control" name="alamat" cols="20" rows="5"><?php echo $warga->alamat ?></textarea>
									<span class="form-text text-danger"><?= form_error('jumlah_keluarga'); ?></span>
								</div>
							</div>
						</div>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="text-right">
									<input type="hidden" name="id_warga" value="<?= $warga->id_warga ?>">
									<button type="submit" class="btn btn-primary ml-3">Update</button>
								</div>
							</div>
						</div>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?php echo base_url('assets/js/sweetalert2.all.min.js') ?>"></script>
	<script>
		const flashData = $('.flash-data').data('flashdata');
		console.log(flashData);
		if (flashData) {
			Swal.fire({
				icon: 'success',
				title: 'Data Warga',
				text: 'Berhasil ' + flashData
			});
		}
	</script>
