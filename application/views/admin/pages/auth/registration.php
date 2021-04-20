<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/ubold/layouts/light/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Apr 2020 14:27:05 GMT -->

<head>
	<meta charset="utf-8" />
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/images/pbb.png">

	<!-- App css -->
	<link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/admin/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern">

	<div class="account-pages mt-5 mb-5">

		<div class="container">

			<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
								</div>
								<?= $this->session->flashdata('message'); ?>
								<form class="user" method="post" action="<?= base_url('admin/auth/registration') ?>">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
										<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
										<?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<select class="form-control" name="gender" id="gender">
											<option value="" disabled selected>Select Gender</option>
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
										<?= form_error('gender', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="place_of_birth" name="place_of_birth" placeholder="Place of Birth" value="<?= set_value('place_of_birth') ?>">
										<?= form_error('place_of_birth', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<input type="date" class="form-control form-control-user" id="birthday" name="birthday" placeholder="Birth Day" value="<?= set_value('birthday') ?>">
										<?= form_error('birthday', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<input type="number" class="form-control form-control-user" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?= set_value('phone_number') ?>">
										<?= form_error('phone_number', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<textarea class="form-control form-control-user" id="address" name="address" rows="3" placeholder="Address"><?= set_value('address') ?></textarea>
										<?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<select class="form-control" name="religion_id" id="religion_id">
											<option value="">Select Religion</option>
											<?php foreach ($agama as $row) : ?>
												<option value="<?= $row['id'] ?>"><?= $row['agama'] ?></option>
											<?php endforeach ?>
										</select>
										<?= form_error('religion_id', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<select class="form-control" name="role_id" id="role_id">
											<option value="">Select Role</option>
											<?php foreach ($user_role as $row) : ?>
												<option value="<?= $row['id'] ?>"><?= ucwords($row['role']) ?></option>
											<?php endforeach ?>
										</select>
										<?= form_error('role_id', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group row">
										<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
											<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
										</div>
										<div class="col-sm-6">
											<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
											<?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
										</div>
									</div>
									<button typer="submit" class="btn btn-primary btn-user btn-block">
										Register Account
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url('admin/sauth/forgotPassword') ?>">Forgot Password?</a>
								</div>
								<div class="text-center">
									<a class="small" href="<?= base_url('admin/sauth'); ?>">Already have an account? Login!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<footer class="footer footer-alt">
			2015 - 2019 &copy; UBold theme by <a href="#" class="text-white-50">Coderthemes</a>
		</footer>

		<!-- Vendor js -->
		<script src="<?php echo base_url() ?>assets/admin/js/vendor.min.js"></script>

		<!-- App js -->
		<script src="<?php echo base_url() ?>assets/admin/js/app.min.js"></script>

</body>


</html>
