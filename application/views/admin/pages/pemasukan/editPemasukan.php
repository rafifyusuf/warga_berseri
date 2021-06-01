<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">
			<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('pemasukan/update_data_pemasukan/') . $pemasukan[0]->id_pemasukan; ?>">

				<div class="container-fluid">
					<!-- Illustrations -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h4 class="m-0 font-weight-bold text-primary">Form Tambah Data pemasukan</h6>
						</div>
						<div class="card-body">
							<div class="text-center">
								<font color="red"><b>
										<?php if (!empty($this->session->flashdata('error'))) {
											echo $this->session->flashdata('error');
										} ?></b></font>


								<input type="hidden" name="jumlah_pemasukan_awal" value="<?php echo $pemasukan[0]->jumlah_pemasukan; ?>">
								<div class="form-group row">
									<label style="text-align: left" class="col-sm-2 col-form-label">Nama pemasukan</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="nama_pemasukan" required="" value="<?php echo $pemasukan[0]->nama_pemasukan; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label style="text-align: left" class="col-sm-2 col-form-label">Jumlah pemasukan</label>
									<div class="col-sm-10">
										<input type="number" name="jumlah_pemasukan" class="form-control" required="" value="<?php echo $pemasukan[0]->jumlah_pemasukan; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label style="text-align: left" class="col-sm-2 col-form-label">Tanggal pemasukan</label>
									<div class="col-sm-10">
										<input type="date" class="form-control" name="tanggal_pemasukan" required="" value="<?php echo $pemasukan[0]->tanggal_pemasukan; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label style="text-align: left" class="col-sm-2 col-form-label">Bukti pemasukan </label>
									<div class="col-sm-5">
										<a href="http://localhost:8080/warga_berserifix<?php echo $pemasukan[0]->bukti_pemasukan; ?>" target="_blank">
											<img src="http://localhost:8080/warga_berserifix<?php echo $pemasukan[0]->bukti_pemasukan; ?>" style="height: 70%; width: 50%; float: left;"></a>
									</div>
								</div>
								<div class="form-group row">
									<label style="text-align: left" class="col-sm-2 col-form-label">Bukti pemasukan Baru</label>
									<div class="col-sm-10">
										<input type="file" class="form-control-file" name="bukti_pemasukan">
									</div>
								</div>
								<div class="form-group row">
									<label style="text-align: left" class="col-sm-2 col-form-label">Keterangan</label>
									<div class="col-sm-10">
										<textarea class="form-control" rows="10" name="keterangan" required=""><?php echo $pemasukan[0]->keterangan; ?></textarea>
									</div>
								</div>
								<div style="text-align: right" class="col-sm-12">
									<button class="btn btn-primary">Ubah</button>
								</div>
			</form>
		</div>
	</div>
</div>
</div>
</form>
