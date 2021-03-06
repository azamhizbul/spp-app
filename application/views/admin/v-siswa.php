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
                          <h1 class="m-0">Spp</h1>
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
                                  <h5 class="card-title">Daftar Siswa</h5>
                                  <br />

                                  <div>
                                      <table class="table table-striped">
                                          <thead>
                                              <tr>
                                                  <th scope="col">No</th>
                                                  <th scope="col">Nisn</th>
                                                  <th scope="col">Nis</th>
                                                  <th scope="col">Nama</th>
                                                  <th scope="col">Kelas</th>
                                                  <th scope="col">Alamat</th>
                                                  <th scope="col">No Telepon</th>
                                                  <th scope="col">Tahun Spp</th>
                                                  <th scope="col">Aksi</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach($siswa as $si) : ?>
                                              <tr>
                                                  <th scope="row"><?= $no++?></th>
                                                  <td><?= $si->nisn?></td>
                                                  <td><?= $si->nis?></td>
                                                  <td><?= $si->nama?></td>
                                                  <td><?= $si->namaKelas?></td>
                                                  <td><?= $si->alamat?></td>
                                                  <td><?= $si->no_telp?></td>
                                                  <td><?= $si->tahunSpp?></td>
                                                  <td>
                                                    <a class="btn btn-sm btn-primary" href="<?= base_url('/admin/Siswa/editSiswa/').$si->nisn?>">Ubah</a>
                                                    <a class="btn btn-sm btn-danger" href="<?= base_url('/admin/Siswa/hapusSiswa/').$si->nisn?>">Hapus</a>
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