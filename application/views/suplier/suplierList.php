<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Suplier List</h1>
          </div>
          
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data supliers</h4>
                    <div class="card-header-action"><a href="<?php echo site_url('suplier/tambahSuplier/'); ?>"><button class="btn btn-lg btn-info mb-3" type="submit"><i class="fas fa-plus"></i> Tambah Baru</button></a></div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              ID
                            </th>
                            <th>Nama Suplier</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>action</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                  		<?php 
                  		if (!empty($supliers)) {
                  			foreach ($supliers as $data) {
                  				// $id 		= $data['id_suplier'];
                  				// $nama 		= $data['nama_suplier'];
                  				// $alamat 	= $data['alamat_suplier'];
                  				// $telp 		= $data['telp_suplier'];
                  	 	?>
                          <tr>
                            <td class="text-center"><?= $data->id_suplier; ?></td>
                            <td>
	                            <span class="text-Capitalize font-weight-bold"><?= $data->nama_suplier; ?></span>
	                             <div class="table-links">
	                              <a href="<?php echo site_url('suplier/ubah/'.$data->id_suplier);?>"><span class="badge badge-primary">Edit <i class="fas fa-pencil-alt"></i></span></a>
	                            </div>
	                        </td>
                            <td><?= $data->alamat_suplier; ?></td>
                            <td class="text-capitalize"><div class="badge badge-light"><?= $data->telp_suplier; ?></div></td>
                            <td>
                               <a href="<?php echo site_url('suplier/ubah/'.$data->id_suplier);?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit">
                               	 <i class="fas fa-pencil-alt"></i>
                               </a>
                               <a href="<?= site_url('suplier/hapus/'.$data->id_suplier); ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin Hapus Suplier <?= $data->nama_suplier ?>?')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
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