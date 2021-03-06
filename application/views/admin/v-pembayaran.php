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
                                  <h5 class="card-title"> Histori Pembayaran</h5>
                                  <br />

                                  <div>
                                      <table class="table table-striped">
                                          <thead>
                                              <tr>
                                                  <th scope="col">No</th>
                                                  <th scope="col">Petugas</th>
                                                  <th scope="col">Nisn / nama siswa</th>
                                                  <th scope="col">Tanggal Bayar</th>
                                                  <th scope="col">Bulan Bayar</th>
                                                  <th scope="col">Tahun Bayar</th>
                                                  <th scope="col">Tahun Spp</th>
                                                  <th scope="col">Nominal Spp</th>
                                                  <th scope="col">Jumlah Pembayaran</th>
                                                  <!-- <th scope="col">Aksi</th> -->
                                              </tr>
                                          </thead>
                                          <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach($pembayaran as $p) : ?>
                                              <tr>
                                                  <th scope="row"><?= $no++?></th>
                                                  <td><?= $p->nama_petugas?></td>
                                                  <td><?= $p->nisn?> / <?= $p->nama?></td>
                                                  <td><?= $p->tgl_bayar?></td>
                                                  <td><?= $p->bulan_dibayar?></td>
                                                  <td><?= $p->tahun_dibayar?></td>
                                                  <td><?= $p->tahun?></td>
                                                  <td><?= $p->nominal?></td>
                                                  <td><?= $p->jumlah_bayar?></td>
                                                  <!-- <td>
                                                    <a class="btn btn-sm btn-primary" href="<?= base_url('/admin/Siswa/editSiswa/').$p->id_pembayaran?>">Ubah</a>
                                                    <a class="btn btn-sm btn-danger" href="<?= base_url('/admin/Siswa/hapusSiswa/').$p->id_pembayaran?>">Hapus</a>
                                                  </td> -->
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