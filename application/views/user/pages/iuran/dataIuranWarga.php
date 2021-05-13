<div class="main-wrapper">

	<section class="page-title bg-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<ul class="list-inline mb-0">
						<li class="list-inline-item"><a href="index.html" class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
						<li class="list-inline-item"><span class="text-white">|</span></li>
						<li class="list-inline-item"><a href="#" class="text-color text-uppercase text-sm letter-spacing">Pendataan Warga</a></li>
					</ul>
					<h1 class="text-lg text-white mt-2">Info Aspirasi Warga</h1>
				</div>
			</div>
		</div>
	</section>

	<!-- Begin Page Content -->
	<div class="container-fluid">
		<?php $warga = $this->session->all_userdata(); ?>

		<!-- DataTales Example -->
		<div class="container">
			<div class="table-responsive">
				<div class="card mt-4">
					<div class="card-header">Data Iuran <?php echo $warga['nama_warga']; ?><?php echo  " | " . $warga['id_detail_warga']; ?>
					</div>

					<div class="card-body">
						<table class="table" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>No Tagihan</th>
									<th>Bulan</th>
									<th>Tahun</th>
									<th>Nama</th>
									<th>Status Iuran</th>
									<th>Tagihan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$a = 100000;

								foreach ($iuran as $pengguna) {
								?>
									<tr>
										<th><?php echo $no++; ?></th>
										<th> <?php echo $pengguna->no_tagihan; ?></th>
										<th><?php echo $pengguna->bulan_iuran; ?></th>
										<th><?php echo $pengguna->tahun_iuran; ?></th>
										<th> <?php echo $pengguna->nama; ?></th>
										<th> <?php echo $pengguna->status_iuran; ?></th>
										<th><?php echo number_format($a, 0, '', '.'); ?></th>
										<?php if ($pengguna->status_iuran == "Belum Diverifikasi") : ?>
											<th>Sudah Bayar</th>
										<?php endif; ?>
										<?php if ($pengguna->status_iuran == "Belum Lunas") : ?>
											<th>
												<a href="<?php echo base_url(); ?>user/iuran/tambah_data_pembayaran/<?php echo $pengguna->no_tagihan; ?>">
													<button class="btn btn-primary">Bayar</button>
												</a>
											</th>
										<?php endif; ?>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<div class="right">
							<b>
								<?php $b = $no - 1;
								echo  "Total Tagihan Rp. " . number_format($a * $b, 0, '', '.'); ?>
							</b>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
