      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
              <div class="container-fluid">
                    <div class="col-md-12">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-0">Pembayaran</h1>
                      </div><!-- /.col -->
                  </div><!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <div class="content">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body">
                                  <h5 class="card-title">Tambah Pembayaran</h5>
                                  <br />

                                  <div>
                                      <form action="<?= base_url('/admin/Pembayaran/tambahDataPembayaran');?>" method="POST">
                                          <div class="form-group">
                                              <label for="username">Petugas</label>
                                              <select class="form-control" name="idPetugas">
                                                <?php foreach($petugas as $p) :  ?>
                                                  <option value="<?= $p->id_petugas?>"><?= $p->nama_petugas?></option>
                                                  <?php endforeach ?>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="username">Nisn / nama siswa</label>
                                              <select class="form-control" name="nisn">
                                                <?php foreach($siswa as $s) :  ?>
                                                  <option value="<?= $s->nisn?>"><?= $s->nisn?> - <?= $s->nama?></option>
                                                  <?php endforeach ?>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="username">Tanggal Bayar</label>
                                              <input type="text" class="form-control" id="tanggal" placeholder="Tanggal Bayar"  name="tanggalBayar">
                                          </div>
                                          <div class="form-group">
                                              <label for="username">Bulan Bayar</label>
                                              <input type="text" class="form-control" placeholder="Bulan Bayar" name="bulanBayar">
                                          </div>
                                          <div class="form-group">
                                              <label for="username">Tahun Bayar</label>
                                              <input type="text" class="form-control" placeholder="Tahun Bayar" name="tahunBayar">
                                          </div>
                                          <div class="form-group">
                                              <label for="namapetugas">Spp / Tahun spp</label>
                                              <select class="form-control" name="spp">
                                                <?php foreach($spp as $s) :  ?>
                                                  <option value="<?= $s->id_spp?>"><?= $s->tahun?></option>
                                                  <?php endforeach ?>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="username">Jumlah Bayar</label>
                                              <input type="number" class="form-control" placeholder="jumlah bayar" name="jumlahBayar">
                                          </div>

                                          <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                  </div>


                              </div>
                          </div>
                      </div>
                      <!-- /.col-md-6 -->
                  </div>
                  <!-- /.row -->
              </div><!-- /.container-fluid -->
          </div>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->