            <div class="card card-primary">
              <div class="card-body">
                <!-- table laporan -->
                  <div class="card-header">
                    <h1 class="text-center">Laporan data Barang</h1>
                    <!-- <div class="section-title mt-0">Light</div> -->
                  </div>
                  <div class="card-body">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Barang</th>
                          <th scope="col">Jumlah Masuk</th>
                          <th scope="col">Jumlah Keluar</th>
                          <th scope="col">Jumlah Dipinjam</th>
                          <th scope="col">Sisa Stok</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $no = 1;
                         foreach ($barang as $data): ?>
                          <tr>
                            <td scope="row"><?= $no++; ?></td>
                            <td class="text-uppercase"><?= $data->nama_barang; ?></td>
                            <td><?= $data->jml_masuk; ?></td>
                            <td><?= $data->jml_keluar; ?></td>
                            <td><?= $data->jml_pinjam; ?></td>
                            <td><?= $data->sisa_stok; ?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                <!-- end table laporan -->
              </div>
            </div>
