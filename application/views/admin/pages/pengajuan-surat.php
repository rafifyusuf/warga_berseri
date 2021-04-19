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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Pengajuan Surat</a></li>
							</ol>
						</div>
						<h4 class="page-title">Pengajuan Surat</h4>
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
										<th>Nama Warga</th>
										<th>No Rumah</th>
										<th>Rt / Rw</th>
										<th>Tanggal Pengajuan</th>
										<th>Keterangan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($pengajuan_surat as $surat) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $surat->nama_warga ?></td>
											<td><?= $surat->no_rumah ?></td>
											<td><?= 'Rt ' . $surat->rt . ' / ' ?> <?= 'Rw ' . $surat->rw ?> </td>
											<td style="width: 150px;"><?= date_indo($surat->tanggal_pengajuan) ?></td>
											<td><?= $surat->pengajuan ?></td>
											<td style="width: 300px;">
												<center>
													<?php if ($surat->status_verifikasi == "Diproses") {  ?>
														<?= form_open_multipart('admin/surat/verifikasi_surat/', array('method' => 'POST')) ?>
														<input type="hidden" name="id_pengajuan_surat" value="<?= $surat->id_pengajuan_surat ?>">
														<input type="hidden" name="rt" value="<?= $surat->rt ?>">
														<input type="hidden" name="rw" value="<?= $surat->rw ?>">
														<button type="submit" class="ladda-button btn btn-warning" data-style="slide-up">
															<i class="mdi mdi-account-remove-outline"></i>
															Diproses
														</button>
														<?= form_close() ?>
													<?php } elseif ($surat->status_verifikasi == "Disetujui") { ?>
														<button disabled class="ladda-button btn btn-success" data-style="slide-up">
															<i class="mdi mdi-account-check-outline"></i>
															Disetujui
														</button>
													<?php } ?>
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