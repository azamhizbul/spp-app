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
                                  <h5 class="card-title">Daftar kelas</h5>
                                  <br />

                                  <div>
                                      <table class="table table-striped">
                                          <thead>
                                              <tr>
                                                  <th scope="col">No</th>
                                                  <th scope="col">Nama kelas</th>
                                                  <th scope="col">Kompetensi Keahlian</th>
                                                  <th scope="col">Aksi</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach($listKelas as $ls) : ?>
                                              <tr>
                                                  <th scope="row"><?= $no++?></th>
                                                  <td><?= $ls->nama_kelas?></td>
                                                  <td><?=$ls->kompetensi_keahlian?></td>
                                                  <td>
                                                    <a class="btn btn-sm btn-primary" href="<?= base_url('/admin/Kelas/editKelas/').$ls->id_kelas?>">Ubah</a>
                                                    <a class="btn btn-sm btn-danger" href="<?= base_url('/admin/Kelas/hapusKelas/').$ls->id_kelas?>">Hapus</a>
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