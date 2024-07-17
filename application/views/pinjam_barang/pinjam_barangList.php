 	<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Daftar Pinjam Barang</h1>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Pinjam Barang</h4>
                      <div class="card-header-action"><a href="<?php echo site_url('pinjam_barang/tambahPinjam_barang/'); ?>"><button class="btn btn-lg btn-info" type="submit"><i class="fas fa-plus"></i> Tambah Baru</button></a></div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th>Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Barang yang Dipinjam</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                            <th>Tanggal Kembali</th>
                            <?php if ($level->level != 'peminjam'): ?>
                              <th>action</th>
                            <?php endif ?>
                          </tr>
                        </thead>
                        <tbody>
                     <?php
                      if (!empty($pinjam_barang)) {
                      	$no = 1;
                        foreach ($pinjam_barang as $data) {
                     ?>
                          <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td>
                                <span class="text-capitalize"><?= $data->peminjam; ?></span>
                                <?php if ($level->level != 'peminjam'): ?>
                                 <div class="table-links">
                                  <a href="<?php echo site_url('pinjam_barang/ubah/'.$data->id_pinjam);?>"><span class="badge badge-primary">Edit <i class="fas fa-pencil-alt"></i></span></a>
                                </div>
                                <?php endif; ?>
                            </td>
                            <td><?= nice_date($data->tgl_pinjam, 'd-m-Y'); ?></td>
                            <td><?= $data->nama_barang; ?></td>
                            <td><?= $data->jml_barang; ?></td>
                            <td><?= $data->kondisi; ?></td>
                            <td class="text-danger"><?= nice_date($data->tgl_kembali, 'd-m-Y'); ?></td>
                            <?php if ($level->level != 'peminjam'): ?>
                            <td>
                               <a href="<?php echo site_url('pinjam_barang/ubah/'.$data->id_pinjam);?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                               <!-- <a href="<?= site_url('pinjam_barang/hapus/'.$data->id_pinjam); ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin Hapus data peminjaman?')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a> -->
                            </td>
                            <?php endif; ?>
                          </tr>
                        <?php
                            }
                      }
                      ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
