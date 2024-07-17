	<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Barang Masuk</h1>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card">
                <div class="card-header">
                <?php $data = $barang_masuk; ?>
                <h4 class="text-uppercase"><?= $data->nama_barang ?></h4>
                </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nama Barang</label>
                          <p><?= $data->nama_barang ?></p>
    	                  </div>
                        <div class="form-group">
                          <label>Spesifikasi</label>
                          <p><?= $data->spesifikasi ?></p>
                        </div>
  	                    <div class="form-group">
  	                      <label>Jumlah Masuk</label>
  	                      <p><?= $data->jml_masuk ?></p>
  	                    </div>
                        <div class="form-group">
                          <label>Tanggal Masuk</label>
                          <p><?= nice_date($data->tgl_masuk, 'd-m-Y') ?></p>
                        </div>
                      </div>
                      <div class="col-sm-6">
  	                    <div class="form-group">
  	                      <label>Suplier</label>
  	                      <p><?= $data->nama_suplier ?></p>
  	                    </div>
                        <div class="form-group">
                          <label>Lokasi</label>
                          <p><?= $data->lokasi ?></p>
                        </div>
                        <div class="form-group">
                          <label>Kondisi</label>
                          <p><?= $data->kondisi ?></p>
                        </div>
  	                    <div class="form-group">
  	                      <label>Sumber Dana</label>
  	                      <p><?= $data->sumber_dana ?></p>
  	                    </div>
                      </div>
                      <div class="col-sm-12">
                         <a href="<?php echo site_url('barang_masuk/ubah/'.$data->id_masuk);?>" data-toggle="tooltip"><button type="button" class="btn btn-primary">Edit <i class="fas fa-pencil-alt"></i></button></a>
                        <a href="<?php echo site_url('barang_masuk'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
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