      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
                <a href="<?= base_url('/petugas/Petugas/')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/petugas/Petugas/tambahPembayaran')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pembayaran</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>