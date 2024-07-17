<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo site_url(); ?>"><img src="<?php echo site_url('assets/img/logo.png'); ?>" style="width: 30px;"> Inventaris</a>
          </div>
          <!-- sidebar -->
          <ul class="sidebar-menu">
            <li class="dropdown">
              <a href="" class="nav-link has-dropdown"><i class="fas fa-user text-danger"></i><span>Hai, <?php echo isset($level->nama)?$level->nama:'NULL'; ?></span></a>
              <ul class="dropdown-menu">
                <!-- <li><a class="nav-link" href="#"><i class="fas fa-lock"></i>Ubah Password</a></li> -->
                <li><a class="nav-link text-danger" href="<?php echo site_url('login/logout/'); ?>" onclick="return confirm('Yakin ingin Logout?')"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
              </ul>
            </li>
            <li class="menu-header"><b><?= $level->level ?></b></li>
            <li>
              <a href="<?php echo site_url(); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <!-- level admin -->
            <?php if ($level->level == 'administrator'): ?>
              <li><a href="<?php echo site_url('user/'); ?>" class="nav-link"><i class="fas fa-user"></i><span>Data User</span></a></li>
              <li><a class="nav-link" href="<?php echo site_url('suplier/'); ?>"><i class="fas fa-truck"></i> <span>Data Suplier</span></a></li>
              <li><a class="nav-link" href="<?php echo site_url('pinjam_barang/'); ?>"><i class="fas fa-book-open"></i> <span>Peminjaman Barang</span></a></li>

              <li class="menu-header"><b>Manajemen</b> Barang</li>
              <li><a class="nav-link" href="<?php echo site_url('barang/'); ?>"><i class="fas fa-archive"></i> <span>Data Barang</span></a></li>
              <li><a class="nav-link" href="<?php echo site_url('barang_masuk/'); ?>"><i class="fas fa-download"></i> <span>Barang Masuk</span></a></li>
              <li><a class="nav-link" href="<?php echo site_url('barang_keluar/'); ?>"><i class="fas fa-upload"></i> <span>Barang Keluar</span></a></li>
            <?php endif; ?>

            <?php if ($level->level == 'manajemen'): ?>
              <li><a class="nav-link" href="<?php echo site_url('laporan/'); ?>"><i class="fas fa-file"></i> <span>Cetak Laporan</span></a></li>
              <li class="menu-header"><b>Manajemen</b> Barang</li>
              <li><a href="<?php echo site_url('barang/'); ?>" class="nav-link"><i class="fas fa-user"></i><span>Data Barang</span></a></li>
              <li><a class="nav-link" href="<?php echo site_url('barang_masuk/'); ?>"><i class="fas fa-download"></i> <span>Barang Masuk</span></a></li>
              <li><a class="nav-link" href="<?php echo site_url('barang_keluar/'); ?>"><i class="fas fa-upload"></i> <span>Barang Keluar</span></a></li>
            <?php endif; ?>

            <?php if ($level->level == 'peminjam'): ?>
              <li><a href="<?php echo site_url('pinjam_barang/by_user/').$level->username; ?>" class="nav-link"><i class="fas fa-user"></i><span>Barang Yang Dipinjam</span></a></li>
            <?php endif; ?>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?php echo site_url('login/logout/'); ?>" class="btn btn-danger btn-lg btn-block btn-icon-split" onclick="return confirm('Yakin ingin Logout?')">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </div>

        </aside>
      </div>
