<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-xl-5 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-12">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Selamat Datang! <br> Warga PBB</h1>
								</div>
								<?php if (!empty($this->session->flashdata('status'))) : ?>
									<div class="alert alert-danger">
										<?php echo $this->session->flashdata('status') ?>
									</div>
								<?php endif; ?>
								<?php echo form_open('user/auth/proses_login', array('method' => 'POST')) ?>
								<div class="form-group">
									<input type="text" name="no_hp" class="form-control form-control-user" placeholder="Nomer HandPhone">
								</div>
								<div class="form-group">
									<input type="number" name="no_kk" class="form-control form-control-user" placeholder="Nomer Kartu Keluarga">
								</div>
								<div class="form-group">
									<div class="custom-control custom-checkbox small">
										<input type="checkbox" class="custom-control-input" id="customCheck">
										<label class="custom-control-label" for="customCheck">Remember Me</label>
									</div>
								</div>
								<button class="btn btn-primary btn-user btn-block">
									Login
								</button>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
