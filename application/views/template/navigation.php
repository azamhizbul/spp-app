      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Petugas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= base_url('/admin/Petugas/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Petugas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/admin/Petugas/addDataPetugas')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Petugas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Kelas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= base_url('/admin/Kelas/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/admin/Kelas/tambahKelas')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Kelas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Spp
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= base_url('/admin/Spp/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Spp</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/admin/Spp/tambahSpp')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Spp</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Siswa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= base_url('/admin/Siswa/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/admin/Siswa/tambahSiswa')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pembayaran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= base_url('/admin/Pembayaran/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/admin/Pembayaran/tambahPembayaran')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pembayaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>