            <div class="card card-primary">
              <div class="card-body">
                <!-- table laporan -->
                  <div class="card-header">
                    <h1 class="text-center">Laporan Barang Keluar</h1>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama barang</th>
                          <th scope="col">Jumlah Keluar</th>
                          <th scope="col">Penerima</th>
                          <th scope="col">Lokasi</th>
                          <th scope="col">Tanggal Keluar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $no = 1;
                         foreach ($barang_keluar as $data): ?>
                          <tr>
                            <td scope="row"><?= $no++; ?></td>
                            <td class="text-capitalize"><?= $data->nama_barang; ?></td>
                            <td><?= $data->jml_keluar; ?></td>
                            <td><?= $data->penerima; ?></td>
                            <td><?= $data->lokasi; ?></td>
                            <td><?= nice_date($data->tgl_keluar, 'd-m-Y'); ?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                <!-- end table laporan -->
              </div>
            </div>