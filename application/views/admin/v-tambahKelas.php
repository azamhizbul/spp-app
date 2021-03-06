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
                          <h1 class="m-0">Kelas</h1>
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
                                  <h5 class="card-title">Tambah Kelas</h5>
                                  <br />

                                  <div>
                                      <form action="<?= base_url('/admin/Kelas/tambahDataKelas');?>" method="POST">
                                          <div class="form-group">
                                              <label for="username">Nama Kelas</label>
                                              <input type="text" class="form-control" placeholder="nama keals" name="namaKelas">
                                          </div>
                                          <div class="form-group">
                                              <label for="namapetugas">Kompetensi Keahlian</label>
                                              <input type="text" class="form-control" placeholder="Kompetensi Keahlian" name="kompetensiKeahlian">
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