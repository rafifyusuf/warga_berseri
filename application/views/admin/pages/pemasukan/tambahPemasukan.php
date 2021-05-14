<Link rel = "stylesheet" href = "https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src = "https://code.jquery.com/jquery-1.9.1.js"> </ script>
  <Script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"> </ script>
    <Script src = "http://jqueryui.com/resources/demos/datepicker/jquery.ui.datepicker-id.js"> </script>
    <Link rel = "stylesheet" href = "http://jqueryui.com/resources/demos/style.css">
  <script>
  $ (Function () {
    $ ( "#datepicker") .datepicker ($.datepicker.regional [ "Id"]);
  });
  </script>
<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">


<form action="<?= base_url('pemasukan/input_data_pemasukan') ?>" enctype="multipart/form-data" method="post">
    <div class="container-fluid">
        <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="page-title">Form Tambah Pemasukan</h4>
                </div>
                <div class="card-body">
                  <div class="text-center"><font color="red"><b>
                    <?php if(!empty($this->session->flashdata('error'))){
                          echo $this->session->flashdata('error');
                    } ?></b></font>
                    <form>
                      <div class="form-group row">
                        <label style="text-align: left" class="col-sm-2 col-form-label">Nama Kebutuhan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_pemasukan" required="">
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
                        <label style="text-align: left" class="col-sm-2 col-form-label">Jumlah Pemasukan</label>
                        <div class="col-sm-10">
                          <input min="4" type="number" name="jumlah_pemasukan" class="form-control" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label style="text-align: left" class="col-sm-2 col-form-label">Tanggal Pemasukan</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control"  name="tanggal_pemasukan" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label style="text-align: left" class="col-sm-2 col-form-label">Bukti Pemasukan</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control-file" name="bukti_pemasukan" required="">
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
