<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>User List</h1>
          </div>
          
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data User</h4>
                    <div class="card-header-action">
                        <a href="<?php echo site_url('user/tambahUser/'); ?>"><button class="btn btn-lg btn-info" type="submit"><i class="fas fa-plus"></i> Tambah Baru</button></a>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              ID
                            </th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>action</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                  		<?php 
                  		if (!empty($users)) {
                  			foreach ($users as $data) {
                  				$id 		= $data['id_user'];
                  				$nama 		= $data['nama'];
                  				$username 	= $data['username'];
                  				$level 		= $data['level'];
                  	 	?>
                          <tr>
                            <td class="text-center"><?= $id; ?></td>
                            <td>
  	                            <span class="text-uppercase"><?= $nama; ?></span>
  	                             <div class="table-links">
  	                              <a href="<?php echo site_url('user/ubah/'.$id);?>"><span class="badge badge-primary">Edit <i class="fas fa-pencil-alt"></i></span></a>
  	                            </div>
  	                        </td>
                            <td>@<?= $username; ?></td>
                            <td class="text-capitalize"><div class="badge badge-secondary"><?= $level; ?></div></td>
                            <td>
                               <a href="<?php echo site_url('user/ubah/'.$id);?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit">
                               	 <i class="fas fa-pencil-alt"></i>
                               </a>
                               <a href="<?= site_url('user/hapus/'.$id); ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin Hapus user <?= $username ?>?')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
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