<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->


<div class="modal fade overflow-auto" id="addTemplate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?= form_open_multipart('admin/surat/tambah_template_surat', array('method' => 'POST')) ?>
			<div class="modal-header">
				<h5 class="modal-title">Tambah Template Surat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Judul Surat</label>
					<input style="height:40px" class="form-control input-sm" type="text" name="judul">
					<!-- <small class="form-text text-danger"><?= form_error('nama_warga'); ?></small> -->
				</div>
				<div class="form-group">
					<label>Keterangan Surat</label>
					<input style="height:40px" class="form-control input-sm" type="text" name="keterangan_surat">
					<!-- <small class="form-text text-danger"><?= form_error('nama_warga'); ?></small> -->
				</div>
				<div class="form-group">
					<label>File Surat</label>
					<input type="file" name="file_surat" class="form-control">
					<!-- <small class="form-text text-danger"><?= form_error('file_ktp'); ?></small> -->
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" name="submit" id="form-submit-button" class="btn btn-primary">Tambah</button>
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>

<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
			<?php unset($_SESSION['flash']); ?>

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Warga Berseri</a></li>
								<li class="breadcrumb-item"><a href="javascript: void(0);">Template Surat</a></li>
							</ol>
						</div>
						<h4 class="page-title">Template Surat</h4>
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
										<button data-toggle="modal" data-target="#addTemplate" class="btn btn-secondary">
											<i class="mdi mdi-plus-circle mr-2"></i>
											Tambah Template Surat
										</button>
									</div>
								</div>
								<div class="col-12 text-sm-center form-inline">
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
										<th>Judul</th>
										<th>Keterangan Surat</th>
										<th>File Surat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($template_surat as $surat) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $surat->judul ?></td>
											<td><?= $surat->keterangan_surat ?></td>
											<td>
												<?= str_replace('_', ' ', $surat->file_surat)  ?>
											</td>
											<td style="width: 300px;">
												<center>
													<a href="<?= base_url('admin/surat/download_template_surat/' . $surat->id_surat) ?>">
														<button class="ladda-button btn btn-success" data-style="slide-up">
															<i class="mdi mdi-download"></i>
															Unduh
														</button>
													</a>
													<a href="<?= base_url('admin/surat/hapus_template_surat/' . $surat->id_surat) ?>" class="hapus">
														<button class="ladda-button btn btn-danger" data-style="slide-up">
															<i class="mdi mdi-delete"></i>
															Hapus
														</button>
													</a>
												</center>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr class="active">
										<td colspan="9">
											<div class="text-right">
												<ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
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

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?php echo base_url('assets/js/sweetalert2.all.min.js') ?>"></script>

	<script>
		const flashData = $('.flash-data').data('flashdata');
		console.log(flashData);
		if (flashData) {
			Swal.fire({
				icon: 'success',
				title: 'Template Surat',
				text: 'Berhasil ' + flashData
			});
		}
	</script>
	<script>
		$('.hapus').on('click', function(e) {
			e.preventDefault();
			const href = $(this).attr('href');
			Swal.fire({
				title: 'Anda yakin ingin menghapus surat?',
				text: "Data tidak dapat kembali setelah dihapus!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, hapus data!'
			}).then((result) => {
				if (result.isConfirmed) {
					document.location.href = href;
				}
			});
		});
	</script>
