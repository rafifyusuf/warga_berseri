<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

	<div class="slimscroll-menu">

		<!--- Sidemenu -->
		<div id="sidebar-menu">

			<ul class="metismenu" id="side-menu">

				<li class="menu-title">Navigation</li>

				<li>
					<a href="<?php echo base_url('admin/Dashboard') ?>">
						<i class="fe-pocket"></i>
						<span> Dashboard </span>
					</a>
				</li>

				<li>
					<a href="javascript: void(0);">
						<i class="fe-clipboard"></i>
						<span> Surat </span>
						<span class="menu-arrow"></span>
					</a>
					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo base_url('admin/surat/template_surat') ?>">
								<span> Template Surat </span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('admin/surat') ?>">
								<span> Pengajuan Surat </span>
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript: void(0);">
						<i class="fe-users"></i>
						<span> Pendataan Warga </span>
						<span class="menu-arrow"></span>
					</a>
					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo base_url('admin/warga/data_warga') ?>">
								</i>
								<span> Data Warga </span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('admin/warga/info_warga') ?>">
								</i>
								<span> Info Warga </span>
							</a>
						</li>
						<li>
							<a href="#">
								<span> Data Posyandu </span>
							</a>
						</li>
					</ul>
				</li>

			</ul>



		</div>
		<!-- End Sidebar -->

		<div class="clearfix"></div>

	</div>
	<!-- Sidebar -left -->

</div>
