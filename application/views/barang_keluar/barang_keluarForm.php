	<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Barang Keluar</h1>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card">
                <div class="card-header">
                <?php
                    if (isset($barang_keluarId->id_keluar)) {
                      // jika update jalankan
                      echo form_open('barang_keluar/update/'.$barang_keluarId->id_keluar);
                      echo '<h4>Edit barang keluar</h4>';
                    }else{
                      // tambah barang
                      echo form_open('barang_keluar/simpanbarang_keluar');   
                      echo '<h4>Tambah Barang Keluar</h4>';
                    }
                 ?>
                </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12">
                      <?php 
                        if (@$sukses) {
                          echo $sukses;
                        }elseif (@$error) {
                          echo $error;
                        }
                       ?>
                      </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select class="form-control select2 text-capitalize" name="id_barang">

                          <?php if (isset($barang_keluarId->id_barang)): ?>
                            <option value="<?= $barang_keluarId->id_barang; ?>"><?= $barang_keluarId->nama_barang; ?></option>
                            <option disabled>-</option>
                          <?php endif ?>
                          
                          <?php foreach ($nama_barang as $data): ?>
                            <option value="<?= isset($data->id_barang)?$data->id_barang:''; ?>"><?= isset($data->nama_barang)?$data->nama_barang:''; ?></option>
                          <?php endforeach ?>
	                      </select>
	                    </div>
                      <div class="form-group">
                        <label>Jumlah Keluar</label>
                        <input name="jml_keluar" type="number" class="form-control" value="<?= isset($barang_keluarId->jml_keluar)?$barang_keluarId->jml_keluar:''; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Penerima</label>
                        <input name="penerima" type="text" class="form-control" value="<?= isset($barang_keluarId->penerima)?$barang_keluarId->penerima:''; ?>">
                      </div>
                      <div class="form-group">
                        <label>Lokasi</label>
                        <textarea class="form-control" name="lokasi"><?= isset($barang_keluarId->lokasi)?$barang_keluarId->lokasi:''; ?></textarea>
                      </div>
                    <div class="form-group text-right">
                      <button class="btn btn-info mr-1" type="submit">Simpan</button>
                      <a href="<?php echo site_url('barang_keluar'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
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