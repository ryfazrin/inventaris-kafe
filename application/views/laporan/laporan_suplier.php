            <div class="card card-primary">
              <div class="card-body">
                <!-- table laporan -->
                  <div class="card-header">
                    <h1 class="text-center">Laporan data Suplier</h1>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Suplier</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Telp</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         $no = 1;
                         foreach ($suplier as $data): ?>
                          <tr>
                            <td scope="row"><?= $no++; ?></td>
                            <td class="text-capitalize"><?= $data->nama_suplier; ?></td>
                            <td><?= $data->alamat_suplier; ?></td>
                            <td><?= $data->telp_suplier; ?></td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                <!-- end table laporan -->
              </div>
            </div>