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
                          <h1 class="m-0">Siswa</h1>
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
                                  <h5 class="card-title">Tambah Siswa</h5>
                                  <br />

                                  <div>
                                      <form action="<?= base_url('/admin/Siswa/tambahDataSiswa');?>" method="POST">
                                          <div class="form-group">
                                              <label for="username">Nisn</label>
                                              <input type="text" class="form-control" placeholder="nisn" name="nisn">
                                          </div>
                                          <div class="form-group">
                                              <label for="username">Nis</label>
                                              <input type="text" class="form-control" placeholder="nis" name="nis">
                                          </div>
                                          <div class="form-group">
                                              <label for="username">Nama</label>
                                              <input type="text" class="form-control" placeholder="nama" name="nama">
                                          </div>
                                          <div class="form-group">
                                              <label for="namapetugas">Kelas</label>
                                              <select class="form-control" name="kelas">
                                                <?php foreach($kelas as $ke) :  ?>
                                                  <option value="<?= $ke->id_kelas?>">Kelas : <b><?= $ke->nama_kelas?> </b> Keahlian : <b><?= $ke->kompetensi_keahlian?></b> </option>
                                                  <?php endforeach ?>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="username">Alamat</label>
                                              <textarea class="form-control" name="alamat" rows="4" > </textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="username">No Telepon</label>
                                              <input type="number" class="form-control" placeholder="no telepon" name="noTelepon">
                                          </div>
                                          <div class="form-group">
                                              <label for="namapetugas">Spp</label>
                                              <select class="form-control" name="spp">
                                              <?php foreach($spp as $sp) :  ?>
                                                  <option value="<?= $sp->id_spp?>">Tahun : <b><?= $sp->tahun?> </b> nominal : <b><?= $sp->nominal?></b> </option>
                                                  <?php endforeach ?>
                                              </select>
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