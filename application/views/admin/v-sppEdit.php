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
                          <h1 class="m-0">Ubah Data Spp</h1>
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
                                  <h5 class="card-title">Data Spp</h5>
                                  <br />

                                  <div>
                                  <form action="<?= base_url('/admin/Spp/editDataSpp');?>" method="POST">
                                        <?php foreach($listSpp as $ls) : ?>
                                            <input value="<?= $ls->id_spp?>" name="idSpp"  hidden/>
                                          <div class="form-group">
                                              <label for="username">Tahun</label>
                                              <input value="<?= $ls->tahun?>" type="number" class="form-control" placeholder="tahun" name="tahun">
                                          </div>
                                          <div class="form-group">
                                              <label for="namapetugas">Nominal</label>
                                              <input value="<?= $ls->nominal?>" type="number" class="form-control" placeholder="nominal" name="nominal">
                                          </div>

                                          <button type="submit" class="btn btn-primary">Submit</button>
                                          <?php endforeach ?>
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