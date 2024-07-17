            <div class="card card-primary">
              <div class="card-body">
                <!-- table laporan -->
                  <div class="card-header">
                    <h1 class="text-center">Laporan Pinjam Barang</h1>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Peminjam</th>
                          <th scope="col">Tanggal Pinjam</th>
                          <th scope="col">Barang yang Dipinjam</th>
                          <th scope="col">Jumlah</th>
                          <th scope="col">Kondisi</th>
                          <th scope="col">Tanggal Kembali</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $no = 1;
                         foreach ($pinjam_barang as $data): ?>
                          <tr>
                            <td scope="row"><?= $no++; ?></td>
                            <td class="text-capitalize"><?= $data->peminjam; ?></td>
                            <td><?= nice_date($data->tgl_pinjam, 'd-m-Y'); ?></td>
                            <td><?= $data->nama_barang; ?></td>
                            <td><?= $data->jml_barang; ?></td>
                            <td><?= $data->kondisi; ?></td>
                            <td><?= nice_date($data->tgl_kembali, 'd-m-Y'); ?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                <!-- end table laporan -->
              </div>
            </div>
