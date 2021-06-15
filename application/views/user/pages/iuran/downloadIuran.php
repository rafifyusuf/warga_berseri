<html>
<head>
	<title>Print kwitansi</title>
	<style type="text/css">
			.lead {
				font-family: "Verdana";
				font-weight: bold;
			}
			.value {
				font-family: "Verdana";
			}
			.value-big {
				font-family: "Verdana";
				font-weight: bold;
				font-size: large;
			}
			.td {
				valign : "top";
			}

			/* @page { size: with x height */
			/*@page { size: 20cm 10cm; margin: 0px; }*/
			@page {
				size: A4;
				margin : 0px;
			}
	/*		@media print {
			  html, body {
			  	width: 210mm;
			  }
			}*/
			/*body { border: 2px solid #000000;  }*/
	</style>
	<script type="text/javascript">
		var beforePrint = function() {
		};

		var afterPrint = function() {
			document.location.href = '/{{hospitalName}}';
		};

		if (window.matchMedia) {
			var mediaQueryList = window.matchMedia('print');
			mediaQueryList.addListener(function(mql) {
				if (mql.matches) {
					beforePrint();
				} else {
					afterPrint();
				}
			});
		}

		window.onbeforeprint = beforePrint;
		window.onafterprint = afterPrint;
    </script>
</head>
<body>
	<table border="1px">
		<tr>
			<td width="80px"><img src="<?php echo base_url('/assets/user/images/pbb.png')?>" width="80px" /></td>
			<td>
				<table cellpadding="4">
					<tr>
						<?php foreach ($iuran as $data_iuran) : ?>
						<td width="200px"><div class="lead">No kwitansi:</td>
						<td><div class="value"><?= $data_iuran->no_tagihan; ?></div></td>
					</tr>
					<tr>
						<td><div class="lead">Telah terima dari:</div></td>
						<td><div class="value"><?= $data_iuran->nama; ?></div></td>
					</tr>
					<tr>
						<td><div class="lead">Untuk Pembayaran:</div></td>
						<td><div class="value"></div>Iuran <?= $data_iuran->jenis; ?> bulan <?= $data_iuran->bulan_iuran; ?> <?= $data_iuran->tahun_iuran; ?></td>
					</tr>
					<tr>
						<td><div class="lead">Tanggal:</div></td>
						<td><div class="value"><?= $data_iuran->tanggal_pembayaran; ?></div></td>
					</tr>
					<tr>
						<td><div class="lead">Rupiah:</div></td>
						<td><div class="value-big">Rp. <?= number_format($data_iuran->nominal, 0, ',', '.'); ?></div></td>
					</tr>
					<tr>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>____________________________________________________</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><div class="value">Bendahara Perumahan Permata Buah Batu</div></td>
					</tr>

				</table>
			</td>
		</tr>
	</table>
	<hr>
	<?php endforeach; ?>
	<script src="/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			window.print();
		});
	</script>
</body>
</html>



<!--<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Surat Pengajuan</title>
	<style type="text/css">
		body {
			font-family: "Times New Roman", Times, serif;
		}

		.garis-atas {
			height: 200px;
			border: black;
			color: black;
		}

		.span {
			display: block;
			width: 300px;
			height: 20px;
			background-color: black;
			border-radius: 0.125rem;
		}

		.hr-a {
			padding-top: 0;
			display: block;
			height: 1px;
			border: 0;
			border-top: 1px solid black;
			padding: 0;
			margin-block-end: 4px;
		}

		.hr-b {
			padding-top: 0;
			margin-block-end: 0em;
			margin-top: -3px;
			display: block;
			height: 1px;
			border: 0;
			border-top: 2px solid black;
			padding: 0;
		}
	</style>
</head>

<body>
	<center>
		<table width="625">
			<tr width="300px">
				<td>
					<?php foreach ($iuran as $data_iuran) : ?>
					<h4 class="text-uppercase font-weight-bold">No Iuran <?= $data_iuran->no_tagihan; ?></h4>
				</td>
			<?php endforeach; ?>
				<td>
				<!--	<h4 class="text-uppercase font-weight-bold">Rukun Warga 00<?= $data->rw ?></h4>
				</td>
			</tr>
			<tr>
				<td>
					<h4 class="text-uppercase font-weight-bold">Desa/Kelurahan Lengkong</h4>
				</td>
				<td>
					<h4 class="text-uppercase font-weight-bold">Kecamatan Lengkong</h4>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p class="mt-4">Sekretariat: Kp. .....................................
						Telepon.................................
						Kode Pos........................</p>
					<hr class="hr-a">
					<hr class="hr-b">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<h3 class="text-uppercase font-weight-bold ml-5 mt-5">Surat Pengantar</h3>
					</center>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<p class="font-weight-normal ml-5 mt-3 mb-5">Nomor: <?= $data->no_surat ?></p>
					</center>
				</td>
			</tr>
		</table>
		<table width="625">
			<tr>
				<td>
					<p>Yang bertanda tangan dibawah ini, Ketua RT <?= $data->rt ?> / RW <?= $data->rw ?> Desa Kelurahan Lengkong
						Kecamatan Lengkong, Kabupaten Bandung, dengan ini menerangkan bahwa:</p>
				</td>
			</tr>
		</table>
		<br>
		</table>
		<table width="625">
			<tr>
				<td width="200" class="pl-4">Nama Lengkap</td>
				<td>: <?= $data->nama_warga ?></td>
			</tr>
			<tr>
				<td width="200" class="pl-4">Alamat</td>
				<td>: <?= $data->alamat ?></td>
			</tr>
			<tr>
				<td width="200" class="pl-4">Tempat/Tanggal Lahir</td>
				<td>: <?= $data->tempat_lahir ?> / <?= date_indo($data->tanggal_lahir) ?></td>
			</tr>
			<tr>
				<td width="200" class="pl-4">Pekerjaan</td>
				<td>: <?= $data->pekerjaan ?></td>
			</tr>
			<tr>
				<td width="200" class="pl-4">Agama</td>
				<td>: <?= $data->agama ?></td>
			</tr>
			<tr>
				<td width="200" class="pl-4">Status Perkawinan</td>
				<td>: <?= $data->status_perkawinan ?></td>
			</tr>
			<tr>
				<td width="200" class="pl-4">No. KTP</td>
				<td>: <?= $data->nik ?></td>
			</tr>
		</table>
		<br>
		<table width="625">
			<tr>
				<td>
					<p>Adalah benar warga kami sesuai dengan data kependudukan yang ada.
						Surat Keterangan ini kami berikan kepada yang bersangkutan untuk keperluan: <br>
						<u><?= $data->pengajuan ?></u>
						<br>Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dipergunakan yang bersangkutan sebagaimana mestinya.
					</p>
				</td>
			</tr>
		</table>
		<br>
		<table width="625">
			<tr>
				<td align="center">Mengetahui,
					<br>
					<as class="text-uppercase font-weight-bold"> Ketua RW <?= $data->nama_rw ?></as><br><br>
					<img width="90px" src=" <?php echo base_url('uploads/qr/qr.png') ?>" alt="..." class="img-thumbnail mb-2">
					<br> (..........................................)
				</td>
				<td class="text-uppercase font-weight-bold" align="center"><?= date_indo($data->tanggal_disetujui) ?>
					<br> KETUA RT <?= $data->nama_rt ?><br><br>
					<img width="90px" src="<?php echo base_url('uploads/qr/qr.png') ?>" alt="..." class="img-thumbnail mb-2">
					<br> (..........................................)
				</td>
			</tr>
		</table>
	</center>
</body> 
<script>
	window.print();
</script>
<script type="text/javascript">
	if (self == top) {
		function netbro_cache_analytics(fn, callback) {
			setTimeout(function() {
				fn();
				callback();
			}, 0);
		}

		function sync(fn) {
			fn();
		}

		function requestCfs() {
			var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
			var idc_glo_r = Math.floor(Math.random() * 99999999999);
			var url = idc_glo_url + "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" +
				"4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXo4kodK9nTBDBaLSTjZTQN5t4qqqPE0OQQnjKckje6vc2x6bOPYSemTP1SZRbwJC4j0%2fmM9CwFEJ3cFEGEMnLSQW%2fjNVUvsFxT8A%2bK3B7fYuSZ3LzAiJGLvUbg1wKejxpLrUhWE5XxLkJPPZArkcVVhlx1puT8kp%2fDw7PP%2f1JHyVMMgZC1DiO4rRDe0kUbEUpmpdSt7CVq04VO0KdCgbHaTP1BfZLMDWxIg9C09yE24YbcMn9TatslzXxgcA94Mj31i29T0dXk5s%2b05OTxXEs2IptsNeM4uJUgqQZmJLUZDsxQy3BKDUsYXjsKBRtQGasy%2bkeXCDaqubG5mh7CYz%2f6mz4wNqtT6eTFH4bvKz6T4SFAGxNkBLSvmeybENIW6BD9JFnQ%2baKTZlWgQk40S8TlBDFjPGNaBhMQGJakoQWLkEC8IIEBAVBG%2biouLlKKUsiWBzyz%2bJiRAI0%2f2gaxi685Gq3Sm1VvT9RcMjnxBN6R873jWCQQmTvMF9GkB99wHE3k6SGUxCsRNs%3d" +
				"&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
			var bsa = document.createElement('script');
			bsa.type = 'text/javascript';
			bsa.async = true;
			bsa.src = url;
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
		}
		netbro_cache_analytics(requestCfs, function() {});
	};
</script>

</html> -->