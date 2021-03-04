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
                          <h1 class="m-0">Petugas / Pengguna</h1>
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
                                  <h5 class="card-title">Daftar Petugas / Pengguna</h5>
                                  <br />

                                  <div>
                                      <table class="table table-striped">
                                          <thead>
                                              <tr>
                                                  <th scope="col">No</th>
                                                  <th scope="col">Username</th>
                                                  <th scope="col">Name</th>
                                                  <th scope="col">Level</th>
                                                  <th scope="col">Aksi</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach($listPetugas as $lp) : ?>
                                              <tr>
                                                  <th scope="row"><?= $no++?></th>
                                                  <td><?= $lp->username?></td>
                                                  <td><?=$lp->nama_petugas?></td>
                                                  <td><?= $lp->level?></td>
                                                  <td>
                                                    <a class="btn btn-sm btn-primary" href="<?= base_url('/admin/Petugas/updatePetugas/').$lp->id_petugas?>">Ubah</a>
                                                    <a class="btn btn-sm btn-danger" href="<?= base_url('/admin/Petugas/deleteDataPetugas/').$lp->id_petugas?>">Hapus</a>
                                                  </td>
                                              </tr>
                                              <?php endforeach ?>
                                          </tbody>
                                      </table>
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