<link href="<?php echo base_url(); ?>assets/user/css/tambahdataPenggunaan.css" rel="stylesheet">
<div class="main-wrapper">

	<section class="page-title bg-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<ul class="list-inline mb-0">
						<li class="list-inline-item"><a href="<?php echo base_url(); ?>user/" class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
						<li class="list-inline-item"><span class="text-white">|</span></li>
						<li class="list-inline-item"><a href="#" class="text-color text-uppercase text-sm letter-spacing">Iuran Warga</a></li>
					</ul>
					<h1 class="text-lg text-white mt-2">Info Penggunaan Iuran</h1>
				</div>
			</div>
		</div>
	</section>

	<div class="container-fluid">
		<div class="card mt-4">
			<div class="card-header">
				Detail Penggunaan Uang Iuran
			</div>
			<div class="card-body">
				<div class="container">

					<label for="nama">Nama Petugas</label>
					<input type="text" id="fname" value="<?php echo $admin[0]->name; ?>" readonly>
					<label for="nama">Nama Kebutuhan</label>
					<input type="text" id="fname" name="no_tagihan" value="<?php echo $penggunaan[0]->nama_kebutuhan; ?>" readonly>
					<label for="nama">Jumlah Pengeluaran</label>
					<input type="text" id="fname" name="nama" value="<?php echo 'Rp ' . number_format($penggunaan[0]->jumlah_pengeluaran, 0, '', '.'); ?>" readonly>

					<br><br>
					<label for="pembayaran">Tanggal Pembayaran</label>
					<br>
					<input type="date" name="tanggal_pembayaran" required="" value="<?php echo $penggunaan[0]->tanggal_penggunaan; ?>" readonly>
					<br><br>
					<label for="pembayaran">Bukti Pengeluaran</label>
					<br>
					<img src="<?php echo base_url($penggunaan[0]->bukti_pengeluaran) ?>" style="width: 50%; height: 30%;">
					<br><br>
					<label for="bukti">Keterangan</label>
					<br>
					<textarea readonly><?php echo $penggunaan[0]->keterangan;  ?></textarea>
					<br><br>
					<a href="<?php echo base_url('WargaController/data_penggunaan') ?>"><button class="btn"> ⬅︎ Kembali</button></a>

				</div>
			</div>
		</div>
	</div>
</div>
