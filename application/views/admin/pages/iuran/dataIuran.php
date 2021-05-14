
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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Warga Berseri</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Iuran Warga</a></li>
                  </ol>
                </div>
                <h4 class="page-title" ">Data Iuran Warga</h4>
               
              </div>
            </div>
          </div>
          <!-- end page title -->

          <div class="row">
            <div class="col-12">
              <div class="card-box">
              

                <div class="mb-2">
                  <div class="row">
                    <div class="col-12 text-sm-center form-inline">
                      <div class="form-group mr-2">
                        <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                          <option value="">Tampilkan Semua</option>
                          <option value="Verifikasi">Belum Terverifikasi</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                      </div>
                      <div class="form-group mr-2" style="float: right;">
                        <h6 class="m-0 font-weight-bold text-primary"> <a href="<?php echo base_url(); ?>IuranController/tambah_iuran"><input class="btn btn-primary" type="submit" value=" Tambah Iuran +"></a></h6>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="table-responsive">
                  <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                    <thead>
                      <tr>
                                    <th>No.</th>
                                    <th>No Rumah</th>
                                    <th data-toggle="true">No Tagihan</th>
                                    <th>Bulan Iuran</th>
                                    <th>Tahun Iuran</th>
                                    <th>Nama</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($iuran as $warga): ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $warga->id_warga; ?></td>
                          <td><?php echo $warga->no_tagihan; ?></td>
                          <td><?php echo $warga->bulan_iuran; ?></td>
                          <td><?php echo $warga->tahun_iuran; ?></td>
                          <td><?php echo $warga->nama; ?></td>
                          <?php if($warga->tanggal_pembayaran == "0000-00-00"): ?>
                            <td>-</td>
                          <?php endif; ?>

                          <?php if($warga->tanggal_pembayaran != "0000-00-00"): ?>
                            <td><?php echo $warga->tanggal_pembayaran; ?></td>
                          <?php endif; ?>
                          <?php if($warga->bukti_pembayaran == ""): ?>
                            <td>-</td>
                          <?php endif; ?>
                           <?php if($warga->bukti_pembayaran != ""): ?>
                             <td><center>
                            <img src="http://localhost:8080/warga_berseri/<?php echo $warga->bukti_pembayaran; ?>" style= "width: 35%; height: 20%;"></center>
                          </td>
                          <?php endif; ?>
                         
                      
                     <?php if($warga->status_iuran == "Belum Diverifikasi"): ?>
                      <td> <table>
                      <tr>
                      <center> <td><a href="<?php echo base_url(); ?>IuranController/verifikasi_iuran/<?php echo $warga->no_tagihan; ?>"><button type="button" class="btn btn-primary">Verifikasi Iuran</button></a> </td>
                      <td><a href="<?php echo base_url(); ?>IuranController/verifikasi_iuran/<?php echo $warga->no_tagihan; ?>"><button type="button" class="btn btn-primary">Tolak</button></a></td></center>
                      </tr>
                      </table>
                      </td>
                      <?php endif; ?>

                      <?php if($warga->status_iuran == "Belum Lunas"): ?>
                        <td>
                          <center><a href="<?php echo base_url(); ?>IuranController/bayar_iuran_langsung/<?php echo $warga->no_tagihan; ?>"><button type="button" class="btn btn-primary">Bayar Langsung</button></center>
                        </td>
                      <?php endif; ?>
          
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr class="active">
                        <td colspan="12">
                          <div class="text-right">
                            <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                          </div>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div> <!-- end .table-responsive-->
              </div> <!-- end card-box -->
            </div> <!-- end col -->
          </div>
          <!-- end row -->

        </div> <!-- container -->

      </div> <!-- content -->
