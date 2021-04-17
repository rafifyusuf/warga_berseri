<div class="main-wrapper ">
	<!-- Section Menu End -->

	<!-- Section Slider Start -->
	<!-- Slider Start -->
	<section class="slider">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<span class="h6 d-inline-block mb-4 subhead text-uppercase">Warga Berseri</span>
					<h1 class="text-uppercase text-white mb-5">Perumahan <span class="text-color">Permata</span><br>Buah Batu</h1>
					<?php if (!$this->session->no_rumah) : ?>
						<a href="<?php echo base_url('user/auth') ?>" class="btn btn-main btn-lg">Masuk Sekarang <i class="ti-angle-right ml-3"></i></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- Section Slider End -->

	<!-- Section Intro Start -->
	<section class="mt-80px">
		<div class="container">
			<div class="row ">
				<div class="col-lg-4 col-md-6">
					<div class="card p-5 border-0 rounded-top border-bottom position-relative hover-style-1">
						<span class="number">01</span>
						<h3 class="mt-3">Pendataan Warga</h3>
						<p class="mt-3 mb-4">Untuk melakukan pendataan silahkan klik halaman ini.</p>
						<a href="<?= base_url('user/warga') ?>" class="text-color text-uppercase font-size-13 letter-spacing font-weight-bold"><i class="ti-minus mr-2 "></i>lakukan pendataan</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card p-5 border-0 rounded-top hover-style-1">
						<span class="number">02</span>
						<h3 class="mt-3">Pendataan Dana Iuran</h3>
						<p class="mt-3 mb-4">Untuk melakukan pembayaran dana iuran silahkan klik halaman ini.</p>
						<a href="<?php echo base_url(); ?>WargaController/tambah_data_pembayaran" class="text-color text-uppercase font-size-13 letter-spacing font-weight-bold"><i class="ti-minus mr-2 "></i>more Details</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card p-5 border-0 rounded-top hover-style-1">
						<span class="number">03</span>
						<h3 class="mt-3">Fasilitas Warga</h3>
						<p class="mt-3 mb-4">Untuk melihat fasilitas yang tersedia silahkan klik halaman ini.</p>
						<a href="about.html" class="text-color text-uppercase font-size-13 letter-spacing font-weight-bold"><i class="ti-minus mr-2 "></i>Lihat Fasilitas</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Section Intro End -->

	<!-- Section About start -->
	<br>
	<section class="map1 cid-qv5AtTlAOw" id="map1-4y" data-rv-view="10734">
		<div class="google-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.305551337187!2d107.6361689142461!3d-6.973232094962348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9b3dbad8a1f%3A0x89ae734cc4aba80b!2sJl.%20Komp.%20Permata%20Buah%20Batu%2C%20Lengkong%2C%20Kec.%20Bojongsoang%2C%20Bandung%2C%20Jawa%20Barat%2040287!5e0!3m2!1sid!2sid!4v1584367442855!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
	</section>
	<section class="section about">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<img src="<?php echo base_url('assets/user/') ?>images/bg/covid.jpg" alt="" class="img-fluid rounded shadow w-100">
				</div>

				<div class="col-lg-6">
					<div class="pl-3 mt-5 mt-lg-0">
						<h2 class="mt-1 mb-3">Berita <br>Hari Ini <span class="text-color">COVID19</span> </h2>

						<p class="mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam lorem ante, dapibus in.</p>

						<a href="<?php echo base_url('home/berita') ?>" class="btn btn-main">Lihat Berita<i class="fa fa-angle-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Berita -->

	<section class="section about">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<img src="<?php echo base_url('assets/user/') ?>images/bg/bg-7.jpeg" alt="" class="img-fluid rounded shadow w-100">
				</div>

				<div class="col-lg-6">
					<div class="pl-3 mt-5 mt-lg-0">
						<h2 class="mt-1 mb-3">Pengumuman <br>Pengajian <span class="text-color">Bulanan</span> </h2>

						<p class="mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam lorem ante, dapibus in.</p>

						<a href="<?php echo base_url('home/informasi') ?>" class="btn btn-main">Lihat Pengumuman<i class="fa fa-angle-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Section About End -->

	<!-- section Call To action start -->
	<section class="section cta">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12 col-sm-12">
					<div class="text-center">
						<span class="h6 letter-spacing text-white">Selamat datang</span>
						<h2 class="text-lg mt-4 mb-5 text-white">
							Warga Pemata <span class="text-color">Buah Batu</span>
						</h2>
	</section>


	<!-- Section Footer Start -->
