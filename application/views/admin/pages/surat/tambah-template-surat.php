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
								<li class="breadcrumb-item">
									<a href="javascript: void(0);">UBold</a>
								</li>
								<li class="breadcrumb-item">
									<a href="javascript: void(0);">Forms</a>
								</li>
								<li class="breadcrumb-item active">Summernote</li>
							</ol>
						</div>
						<h4 class="page-title">Summernote</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<h4 class="header-title">Default Editor</h4>
							<p class="sub-header">
								Super simple wysiwyg editor on Bootstrap
							</p>

							<textarea id="content" name="content" rows="10"></textarea>
							<!-- end summernote-editor-->
						</div>
						<!-- end card-body-->
					</div>
					<!-- end card-->
				</div>
				<!-- end col -->
			</div>
			<!-- end row -->


		</div>
		<!-- container -->
	</div>
	<!-- content -->


</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#content').summernote({
			height: "300px",
			styleWithSpan: false
		});
	});
</script>
