 	<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Daftar Barang Masuk</h1>
          </div>
          <div class="section-body">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Barang Masuk</h4>
                      <div class="card-header-action"><a href="<?php echo site_url('barang_masuk/tambahBarang_masuk/'); ?>"><button class="btn btn-lg btn-info" type="submit"><i class="fas fa-plus"></i> Tambah Baru</button></a></div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">No</th>
                            <th>Nama Barang</th>
                            <th>Spesifikasi</th>
                            <th>Jumlah Masuk</th>
                            <th>Tanggal Masuk</th>
                            <th>action</th>
                          </tr>
                        </thead>
                        <tbody>
                     <?php 
                      if (!empty($barang_masuk)) {
                      	$no = 1;
                        foreach ($barang_masuk as $data) {
                     ?>
                          <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td>
                                <span class="text-capitalize"><?= $data->nama_barang; ?></span>
                                 <div class="table-links">
                                  <a href="<?php echo site_url('barang_masuk/ubah/'.$data->id_masuk);?>"><span class="badge badge-primary">Edit <i class="fas fa-pencil-alt"></i></span></a>
                                </div>
                            </td>
                            <td><?= $data->spesifikasi; ?></td>
                            <td class="text-capitalize"><div class="badge badge-light"><?= $data->jml_masuk; ?></div></td>
                            <td><div class="badge badge-light"><?= nice_date($data->tgl_masuk, 'd-m-Y'); ?></div></td>
                            <td>
                               <a href="<?php echo site_url('barang_masuk/detail/'.$data->id_masuk);?>" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                               <a href="<?= site_url('barang_masuk/hapus/'.$data->id_masuk); ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin Hapus barang?')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                            </td>
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