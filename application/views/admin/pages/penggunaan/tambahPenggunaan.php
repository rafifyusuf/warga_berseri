<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
    <link href="<?php echo base_url(); ?>asset_iuran/css/tambahdataPenggunaan.css" rel="stylesheet" href="https://apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
  <script src="https://apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jqueryui/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({maxDate: "D" });
  });
  </script>

<form action="<?= base_url('Penggunaan/input_data_penggunaan') ?>" enctype="multipart/form-data" method="post">
    <div class="container-fluid">
        <!-- Illustrations -->
              
                <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Warga Berseri</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Penggunaan/');?>"<a href="javascript: void(0);">Data Pengeluaran</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Form</a></li>
                  </ol>
                </div>
                <h4 class="page-title"> Form Tambah Data Penggunaan</h4>
              </div>
            </div>
          </div>
               
                 
                <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="text-center"><font color="red"><b>
                    <?php if(!empty($this->session->flashdata('error'))){
                          echo $this->session->flashdata('error');
                    } ?></b></font>
                    <form>
                      <div class="form-group row">
                        <label style="text-align: left" class="col-sm-2 col-form-label">Nama Kebutuhan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_kebutuhan" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label style="text-align: left" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="kategori" required>
                          <option value="Kebersihan">Kebersihan</option>
                          <option value="Keamanan">Keamanan</option>
                          <option value="Kesehatan">Kesehatan</option>
                          <option value="Fasilitas">Fasilitas</option>
                          <option value="SDM">SDM</option>
                        </select>
                      </div>
                        </div>
                        </div>
                      <div class="form-group row">
                        <label style="text-align: left" class="col-sm-2 col-form-label">Jumlah Pengeluaran</label>
                        <div class="col-sm-10">
                          <input min="4" type="number" name="jumlah_pengeluaran" class="form-control" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label style="text-align: left" class="col-sm-2 col-form-label">Tanggal Penggunaan</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="datepicker" name="tanggal_penggunaan" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label style="text-align: left" class="col-sm-2 col-form-label">Bukti Penggunaan</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control-file" name="bukti_penggunaan" required="">
                        </div>
                      </div>
                       <div class="form-group row">
                        <label style="text-align: left" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" rows="10" name="keterangan" required=""></textarea>
                        </div>
                      </div>
                        <div style="text-align: right" class="col-sm-12">
                        <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
  </div>
  </form>
