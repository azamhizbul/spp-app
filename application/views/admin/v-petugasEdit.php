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
                          <h1 class="m-0">Ubah Data Petugas</h1>
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
                                  <h5 class="card-title">Data Petugas</h5>
                                  <br />

                                  <div>
                                      <form action="<?= base_url('/admin/Petugas/updateDataPetugas');?>" method="POST">
                                        <?php foreach($listPetugas as $lp) : ?>
                                            <input value="<?= $lp->id_petugas?>" type="text" name="idPetugas" hidden>
                                          <div class="form-group">
                                              <label for="username">Username</label>
                                              <input value="<?= $lp->username?>" type="text" class="form-control" placeholder="username" name="username">
                                          </div>
                                          <div class="form-group">
                                              <label for="namapetugas">Nama Petugas</label>
                                              <input value="<?= $lp->nama_petugas?>" type="text" class="form-control" placeholder="namapetugas" name="nama">
                                          </div>
                                          <div class="form-group">
                                              <label for="namapetugas">Level / posisi</label>
                                              <select class="form-control" name="role">
                                                  <option value="admin" <?= $lp->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                  <option value="petugas" <?= $lp->level == 'petugas' ? 'selected' : '' ?>>Petugas</option>
                                                  <option value="siswa" <?= $lp->level == 'siswa' ? 'selected' : '' ?>>Siswa</option>
                                              </select>
                                          </div>
                                          <?php endforeach ?>


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