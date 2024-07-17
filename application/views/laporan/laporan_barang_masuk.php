            <div class="card card-primary">
              <div class="card-body">
                <!-- table laporan -->
                  <div class="card-header">
                    <h1 class="text-center">Laporan Barang Masuk</h1>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama barang</th>
                          <th scope="col">Spesifikasi</th>
                          <th scope="col">Jumlah Masuk</th>
                          <th scope="col">Tanggal Masuk</th>
                          <th scope="col">Suplier</th>
                          <th scope="col">Lokasi</th>
                          <th scope="col">Kondisi</th>
                          <th scope="col">Sumber Dana</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $no = 1;
                         foreach ($barang_masuk as $data): ?>
                          <tr>
                            <td scope="row"><?= $no++; ?></td>
                            <td class="text-capitalize"><?= $data->nama_barang; ?></td>
                            <td><?= $data->spesifikasi; ?></td>
                            <td><?= $data->jml_masuk; ?></td>
                            <td><?= nice_date($data->tgl_masuk, 'd-m-Y'); ?></td>
                            <td><?= $data->nama_suplier; ?></td>
                            <td><?= $data->lokasi; ?></td>
                            <td><?= $data->kondisi; ?></td>
                            <td><?= $data->sumber_dana; ?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                <!-- end table laporan -->
              </div>
            </div>