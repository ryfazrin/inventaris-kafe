<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Suplier</h1>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                
              	<div class="card">
              	<div class="card-header">
                <?php
                    if (isset($suplierId->id_suplier)) {
                      // jika update jalankan
                      echo form_open('suplier/update/'.$suplierId->id_suplier);
                      echo '<h4>Edit seuplier</h4>';
                    }else{
                      // tambah suplier
                      echo form_open('suplier/simpanSuplier');   
                      echo '<h4>Tambah suplier</h4>';
                    }
                 ?>
                </div>
                  <div class="card-body">
                      <?php 
                        if (@$sukses) {
                          echo $sukses;
                        }elseif (@$error) {
                          echo $error;
                        }
                       ?>
                  	<div class="row">
                  		<div class="col-lg-6">
	                    <div class="form-group">
	                      <label>Nama Suplier</label>
	                      <input name="nama_suplier" type="text" class="form-control" value="<?= isset($suplierId->nama_suplier)?$suplierId->nama_suplier:''; ?>">
	                    </div>
	                    <div class="form-group">
	                      <label>telpon</label>
	                      <input name="telp_suplier" type="text" class="form-control" value="<?= isset($suplierId->telp_suplier)?$suplierId->telp_suplier:''; ?>">
	                    </div>
                      </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat_suplier"><?= isset($suplierId->alamat_suplier)?$suplierId->alamat_suplier:''; ?></textarea>
                      </div>
						        <div class="form-group text-right">
		                  <button class="btn btn-info mr-1" type="submit">Simpan</button>
                      <a href="<?php echo site_url('suplier'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
		                </div>
                    </div>
	                    </div>
	                </div>	
				  </div>
              	</form>
				</div>

              </div>
            </div>          
          </div>
        </section>
      </div>