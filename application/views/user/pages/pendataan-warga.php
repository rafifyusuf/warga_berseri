<!-- START Modal Update Data Keluarga -->
<div class="modal fade" id="updateKeluarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= form_open_multipart('PendataanWarga/updateWarga', array('method' => 'POST')) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Data Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>No Rumah</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="no_rumah"
                        value="<?= $warga->no_rumah ?>">
                    <!-- <small class="form-text text-danger"><?= form_error('no_rumah'); ?></small> -->
                </div>
                <div class="form-group">
                    <label>No KK</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="no_kk"
                        value="<?= $warga->no_kk ?>">
                </div>
                <div class=" form-group">
                    <label>Alamat</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="alamat"
                        value="<?= $warga->alamat ?>">
                </div>
                <div class=" form-group">
                    <label>Rt</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="rt"
                        value="<?= $warga->rt ?>">
                </div>
                <div class=" form-group">
                    <label>Rw</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="rw"
                        value="<?= $warga->rw ?>">
                </div>
                <div class=" form-group">
                    <label>Jumlah Keluarga</label>
                    <input style="height:40px" class="form-control input-sm" type="number" name="jumlah_keluarga"
                        value="<?= $warga->jumlah_keluarga ?>">
                </div>
                <div class=" form-group">
                    <label>Status Rumah</label>
                    <input disabled style="height:40px" class="form-control input-sm"
                        value="<?= $warga->status_rumah ?>">
                </div>
                <div class="form-group">
                    <label>Status Rumah</label>
                    <select id="inputState" class="form-control" name="status_rumah">
                        <option disabled selected>Status Rumah</option>
                        <option value="Rumah Pribadi">Rumah Pribadi</option>
                        <option value="Pemilik Kost">Pemilik Kost</option>
                        <option value="Pemilik Kontrakan">Pemilik Kontrakan</option>
                        <option value="Penghuni Kost">Penghuni Kost</option>
                        <option value="Penghuni Kontrakan">Penghuni Kontrakan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Foto KK</label>
                    <input type="file" name="file_kk" class="form-control" value="<?= $warga->file_kk ?>">
                    <input type="hidden" name="old" value="<?php echo $warga->file_kk   ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
<!-- END Modal Update Data Keluarga -->

<!-- START Modal tambah Data Kendaraan -->
<div class="modal fade overflow-auto" id="addKendaraan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= form_open_multipart('user/kendaraan/proses_tambah_kendaraan', array('method' => 'POST')) ?>
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tipe Kendaraan</label>
                    <select class="form-control" name="tipe_kendaraan">
                        <option value="-1"></option>
                        <option value="Roda Dua">Roda Dua</option>
                        <option value="Roda Tiga">Roda Tiga</option>
                        <option value="Roda Empat">Roda Empat</option>
                        <option value="Lebih dari Roda Empat">Lebih dari Roda Empat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Merk Kendaraan</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="merk_kendaraan">
                    <small class="form-text text-danger"><?= form_error('merk_kendaraan'); ?></small>
                </div>
                <div class="form-group">
                    <label>Nama Pemilik di STNK</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="nama_stnk">
                </div>
                <div class="form-group">
                    <label>Nomor Polisi</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="no_polisi">
                </div>
                <div class="form-group">
                    <label>Foto Kendaraan</label>
                    <input type="file" name="foto_kendaraan" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
        <input type="hidden" name="id_warga" value="<?= $this->session->id_warga ?>">
        <?= form_close() ?>
    </div>
</div>
<!-- End Modal tambah Data Kendaraan -->

<!-- START Modal Tambah Anggota Keluarga -->
<div class="modal fade" id="formUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= form_open_multipart('user/warga/proses_tambah_anggota_warga', array('method' => 'POST')) ?>
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="nama_warga">
                    <small class="form-text text-danger"><?= form_error('nama_warga'); ?></small>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="nik">
                    <small class="form-text text-danger"><?= form_error('nik'); ?></small>
                </div>
                <div class="form-group">
                    <label>No Hp</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="no_hp">
                    <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="tempat_lahir">
                    <small class="form-text text-danger"><?= form_error('tempat_lahir'); ?></small>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input style="height:40px" class="form-control input-sm" type="date" name="tanggal_lahir">
                    <small class="form-text text-danger"><?= form_error('tanggal_lahir'); ?></small>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control" name="agama">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('agama'); ?></small>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('jenis_kelamin'); ?></small>
                </div>
                <div class="form-group">
                    <label>Status Perkawinan</label>
                    <select class="form-control" name="status_perkawinan">
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Janda">Janda</option>
                        <option value="Duda">Duda</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('status_perkawinan'); ?></small>
                </div>
                <div class="form-group">
                    <label>Hubungan Keluarga</label>
                    <select class="form-control" name="hubungan_keluarga">
                        <option value="Anak">Anak</option>
                        <option value="Istri">Istri</option>
                        <option value="Suami">Suami</option>
                        <option value="Kerabat">Kerabat</option>
                        <option value="Adik">Adik</option>
                        <option value="Kaka">Kaka</option>
                        <option value="Orang Tua">Orang Tua</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('hubungan_keluarga'); ?></small>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="Anggota Keluarga">Anggota Keluarga</option>
                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('status'); ?></small>
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <select class="form-control" name="pekerjaan">
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
                        <option value="Pegawai Negeri">Pegawai Negeri</option>
                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                        <option value="Guru">Guru</option>
                        <option value="Petani">Petani</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('pekerjaan'); ?></small>
                </div>
                <div class="form-group">
                    <label>Pendidikan</label>
                    <select class="form-control" name="pendidikan">
                        <option value="Belum Sekolah">Belum Sekolah</option>
                        <option value="TK">TK</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="Diploma">Diploma</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('pendidikan'); ?></small>
                </div>
                <div class="form-group">
                    <label>Status Hunian</label>
                    <select class="form-control" name="status_hunian">
                        <option value="KTP lengkong tinggal di Lengkong">KTP lengkong tinggal di Lengkong</option>
                        <option value="KTP luar tinggal di Lengkong">KTP luar tinggal di Lengkong</option>
                        <option value="KTP lengkong tinggal di luar">KTP lengkong tinggal di luar</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('status_hunian'); ?></small>
                </div>
                <div class="form-group">
                    <label>Foto Ktp atau Foto Identitas</label>
                    <input type="file" name="file_ktp" class="form-control">
                    <small class="form-text text-danger"><?= form_error('file_ktp'); ?></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="submit" id="form-submit-button" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
<!-- END Modal Tambah Anggota Keluarga -->

<!-- START Modal Lihat File KK -->
<div class="modal fade overflow-auto" id="openImageKK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Kartu Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <div class="form-group d-flex justify-content-center">
                    <img src="<?php echo base_url('uploads/' . $this->session->file_kk) ?>" alt="..."
                        class="img-thumbnail mb-2">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Lihat File KK -->

<!-- START Modal Lengkapi Data Keluarga -->
<div class="modal fade" id="lengkapiKeluarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= form_open_multipart('PendataanWarga/lengkapiWarga', array('method' => 'POST')) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>No KK</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="no_kk"
                        value="<?= $warga->no_kk ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="alamat"
                        value="<?= $warga->alamat ?>">
                </div>
                <div class="form-group">
                    <label>Rt</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="rt"
                        value="<?= $warga->rt ?>">
                </div>
                <div class="form-group">
                    <label>Rw</label>
                    <input style="height:40px" class="form-control input-sm" type="text" name="rw"
                        value="<?= $warga->rw ?>">
                </div>
                <div class="form-group">
                    <label>Jumlah Keluarga</label>
                    <input style="height:40px" class="form-control input-sm" type="number" name="jumlah_keluarga"
                        value="<?= $warga->jumlah_keluarga ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
<!-- END Modal Lengkapi Data Keluarga -->

<div class="main-wrapper">
    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="index.html"
                                class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
                        <li class="list-inline-item"><span class="text-white">|</span></li>
                        <li class="list-inline-item"><a href="#"
                                class="text-color text-uppercase text-sm letter-spacing">Pendataan Warga</a></li>
                    </ul>
                    <h1 class="text-lg text-white mt-2">Pendataan Warga</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-6 ml-4 my-4">
                <!-- START Tabel Detail Keluarga -->
                <div class="table-responsive" style="overflow-y: auto;">
                    <table class="table table-striped table-hover table-md">
                        <thead>
                            <tr>
                                <td class="font-weight-bold" scope="col" width="50%">
                                    Data Keluarga
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>No Rumah</td>
                                <td><?= $warga->no_rumah ?></td>
                            </tr>
                            <tr>
                                <td>No KK</td>
                                <td><?= $warga->no_kk ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $warga->alamat ?></td>
                            </tr>
                            <tr>
                                <td>Rt / Rw</td>
                                <td><?= $warga->rt ?> / <?= $warga->rw ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Keluarga</td>
                                <td><?= $warga->jumlah_keluarga ?></td>
                            </tr>
                            <tr>
                                <td>Status Tempat Tinggal</td>
                                <td><?= $warga->status_rumah ?></td>
                            </tr>
                            <tr>
                                <td>Foto KK</td>
                                <!-- <td><img src="<?php echo base_url('uploads/' . $warga->file_kk) ?>" alt="..." class="img-thumbnail mb-2"></td> -->
                                <td>
                                    <button class="btn btn-primary btn-sm btn-edit" data-toggle="modal"
                                        data-target="#openImageKK">
                                        <i class=" fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END Tabel Detail Keluarga -->
            </div>

            <?php
			if ($warga->jumlah_keluarga == 0 || $warga->no_kk == NULL || $warga->alamat == NULL || $warga->rt == NULL || $warga->rw == NULL) { ?>
            <div class="col-md-5 text-center my-4 ml-4 d-flex flex-column justify-content-center">
                <div>
                    <h3>
                        <div class="tooltip-icon"><i class="fa fa-exclamation"></i></div>
                        Lengkapi Data
                    </h3>
                </div>
                <div>
                    <p>Sepertinya data keluarga anda masih belum lengkap, untuk melengkapi silahkan klik tombol dibawah
                        ini.</p>
                </div>
                <div>
                    <button class="btn btn-main" style="width: 200px;" data-target="#lengkapiKeluarga"
                        data-toggle="modal">Lengkapi Data</button>
                </div>
            </div>
            <?php	} else { ?>
            <div class="col-md-5 text-center my-4 ml-4 d-flex flex-column justify-content-center">
                <div>
                    <h3>
                        <div class="tooltip-icon"><i class="fa fa-check"></i></div>
                        Data Sudah Lengkap
                    </h3>
                </div>
                <div>
                    <p>Silahkan edit data jika </p>
                </div>
                <div>
                    <button class="btn btn-main" style="width: 200px;" data-target="#updateKeluarga"
                        data-toggle="modal">Edit Data</button>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php if ($this->session->status == "Kepala Keluarga") : ?>
        <?php if ($jumlah_hunian >= $this->session->jumlah_keluarga) { ?>
        <div class="row ml-4 mt-5">
            <button type="button" class="btn btn btn-primary" id="tambah">
                <i class=" fas fa-plus mr-2"></i>
                Tambah Anggota Hunian
            </button>
        </div>
        <?php } else { ?>
        <div class="row ml-4 mt-5">
            <button type="button" class="btn btn btn-primary" data-target="#formUpload" data-toggle="modal">
                <i class=" fas fa-plus mr-2"></i>
                Tambah Anggota Hunian
            </button>
        </div>
        <?php	} ?>
        <?php endif ?>
        <!-- START Tabel Anggota Keluarga -->
        <div class="row justify-content-center">
            <div class="col-md-12 ml-4 my-4">
                <div class="card">
                    <div class="card-header font-weight-bold text-dark">
                        Anggota Hunian
                    </div>
                    <div class="card-body">
                        <div class="table-responsive " style="overflow-y: auto;">
                            <table class="table table-striped table-hover table-sm table-bordered">
                                <thead class="font-weight-bold text-dark">
                                    <tr>
                                        <td>
                                            No
                                        </td>
                                        <td>
                                            Nama Lengkap
                                        </td>
                                        <td>
                                            Nik
                                        </td>
                                        <td width="9%">
                                            J.Kelamin
                                        </td>
                                        <td>
                                            Ttl
                                        </td>
                                        <td>
                                            Status
                                        </td>
                                        <td>
                                            Pekerjaan
                                        </td>
                                        <td>
                                            Pendidikan
                                        </td>
                                        <td>
                                            Agama
                                        </td>
                                        <td>
                                            No Hp
                                        </td>
                                        <td>
                                            File Ktp
                                        </td>
                                        <td>
                                            Verified
                                        </td>
                                        <?php if ($this->session->status == "Kepala Keluarga") : ?>
                                        <td width="6%">
                                            Aksi
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
									foreach ($pendataan_warga as $warga) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $warga->nama_warga ?></td>
                                        <td><?= $warga->nik ?></td>
                                        <td><?= $warga->jenis_kelamin ?></td>
                                        <td><?= $warga->tempat_lahir ?>, <?= $warga->tanggal_lahir ?></td>
                                        <td><?= $warga->status ?></td>
                                        <td><?= $warga->pekerjaan ?></td>
                                        <td><?= $warga->pendidikan ?></td>
                                        <td><?= $warga->agama ?></td>
                                        <td><?= $warga->no_hp ?></td>
                                        <td class="d-flex justify-content-center">
                                            <button class="btn btn-primary btn-sm btn-edit" data-toggle="modal"
                                                data-target="#exampleModalCenter<?= $warga->id_detail_warga ?>">
                                                <i class=" fas fa-eye"></i>
                                            </button>
                                        </td>
                                        <?php if ($warga->status_verifikasi == "1") : ?>
                                        <td><span class="badge badge-warning">Belum Terverifikasi</span></td>
                                        <?php else : ?>
                                        <td><span class="badge badge-success">Terverifikasi</span></td>
                                        <?php endif; ?>
                                        <?php if ($this->session->status == "Kepala Keluarga") : ?>
                                        <td>
                                            <button class="btn btn-primary btn-sm btn-edit"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm btn-delete"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <!-- START Modal Lihat File KTP -->
                                    <div class="modal fade overflow-auto"
                                        id="exampleModalCenter<?= $warga->id_detail_warga ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Foto Ktp</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <img src="<?php echo base_url('uploads/' . $warga->file_ktp) ?>"
                                                            alt="..." class="img-thumbnail mb-2">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- START Modal Lihat File KTP -->
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Tabel Anggota Keluarga -->

        <?php if ($this->session->status == "Kepala Keluarga") : ?>
        <div class="row ml-4 mt-5">
            <button type="button" class="btn btn btn-primary" data-target="#addKendaraan" data-toggle="modal"><i
                    class=" fas fa-plus mr-2"></i>Tambah Data Kendaraan</button>
        </div>
        <?php endif ?>
        <!-- START Tabel Data Kendaraan -->
        <div class="row justify-content-center">
            <div class="col-md-12 ml-4 my-4">
                <div class="card">
                    <div class="card-header font-weight-bold text-dark">
                        Data Kendaraan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: auto; width:80%;">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="font-weight-bold text-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Merk Kendaraan</th>
                                        <th>Nama Pemilik di STNK</th>
                                        <th>Nomor Polisi</th>
                                        <th>Foto Kendaraan</th>
                                        <?php if ($this->session->status == "Kepala Keluarga") : ?>
                                        <td>
                                            Aksi
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
									foreach ($info_kendaraan as $kendaraan) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kendaraan->tipe_kendaraan ?></td>
                                        <td><?= $kendaraan->merk_kendaraan ?></td>
                                        <td><?= $kendaraan->nama_stnk ?></td>
                                        <td><?= $kendaraan->no_polisi ?></td>
                                        <td>
                                            <center>
                                                <button class="btn btn-primary btn-sm btn-edit" data-toggle="modal"
                                                    data-target="#exampleModalCenter<?= $kendaraan->id_kendaraan ?>">
                                                    <i class=" fas fa-eye"></i>
                                                </button>
                                            </center>
                                        </td>
                                        <?php if ($this->session->status == "Kepala Keluarga") : ?>
                                        <td>
                                            <center>
                                                <button class="btn btn-primary btn-sm btn-edit"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm btn-delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </center>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <!-- START Modal Lihat File Kendaraan -->
                                    <div class="modal fade overflow-auto"
                                        id="exampleModalCenter<?= $kendaraan->id_kendaraan ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Foto Kendaraan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group d-flex justify-content-center">
                                                        <img src="<?php echo base_url('uploads/' . $kendaraan->foto_kendaraan) ?>"
                                                            alt="..." class="img-thumbnail mb-2">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- START Modal Lihat File KTP -->
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Tabel Data Kendaraan -->
    </div>
</div>


<script>
document.querySelector("#tambah").addEventListener('click', function() {
    Swal.fire({
        icon: "error",
        title: "Maaf",
        text: "Anda hanya bisa menambah anggota hunian sebanyak <?= $jumlah_hunian ?> hunian",
    });
});
</script>