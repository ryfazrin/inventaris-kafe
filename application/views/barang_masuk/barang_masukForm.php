	<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Barang Masuk</h1>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card">
                <div class="card-header">
                <?php
                    if (isset($barang_masukId->id_masuk)) {
                      // jika update jalankan
                      echo form_open('barang_masuk/update/'.$barang_masukId->id_masuk);
                      echo '<h4>Edit barang masuk</h4>';
                    }else{
                      // tambah barang
                      echo form_open('barang_masuk/simpanbarang_masuk');
                      echo '<h4>Tambah Barang masuk</h4>';
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
                          <?php if (isset($barangId->nama_barang)): ?>
                            <option value="<?= $barangId->id_barang; ?>"><?= $barangId->nama_barang; ?></option>
                            <option disabled>-</option>
                          <?php endif ?>
                          <?php if (isset($barang_masukId->id_barang)): ?>
                            <option value="<?= $barang_masukId->id_barang; ?>"><?= $barang_masukId->nama_barang; ?></option>
                            <option disabled>-</option>
                          <?php endif ?>

                          <?php foreach ($nama_barang as $data): ?>
                            <option value="<?= isset($data->id_barang)?$data->id_barang:''; ?>"><?= isset($data->nama_barang)?$data->nama_barang:''; ?></option>
                          <?php endforeach ?>
	                      </select>
	                    </div>
                      <div class="form-group">
                        <label>Jumlah Masuk</label>
                        <input name="jml_masuk" type="number" class="form-control" value="<?= isset($barang_masukId->jml_masuk)?$barang_masukId->jml_masuk:''; ?>">
                      </div>
                      <div class="form-group">
                        <label>Spesifikasi</label>
                        <textarea class="form-control" name="spesifikasi"><?= isset($barang_masukId->spesifikasi)?$barang_masukId->spesifikasi:''; ?></textarea>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Suplier</label>
                        <select class="form-control select2 text-capitalize" name="id_suplier">
                        <?php if (isset($barang_masukId->nama_suplier)): ?>
                            <option value="<?= $barang_masukId->id_suplier; ?>"><?= $barang_masukId->nama_suplier; ?></option>
                            <option disabled>-</option>
                          <?php endif ?>

                          <?php foreach ($nama_suplier as $data): ?>
                            <option value="<?= isset($data->id_suplier)?$data->id_suplier:''; ?>"><?= isset($data->nama_suplier)?$data->nama_suplier:''; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
	                    <div class="form-group">
	                      <label>Lokasi</label>
	                      <input name="lokasi" type="text" class="form-control" value="<?= isset($barang_masukId->lokasi)?$barang_masukId->lokasi:''; ?>">
	                    </div>
	                    <div class="form-group">
	                      <label>Kondisi</label>
	                      <input name="kondisi" type="text" class="form-control" value="<?= isset($barang_masukId->kondisi)?$barang_masukId->kondisi:''; ?>">
	                    </div>
	                    <div class="form-group">
	                      <label>Sumber Dana</label>
	                      <input name="sumber_dana" type="text" class="form-control" value="<?= isset($barang_masukId->sumber_dana)?$barang_masukId->sumber_dana:''; ?>">
	                    </div>
                    <div class="form-group text-right">
                      <button class="btn btn-info mr-1" type="submit">Simpan</button>
                      <a href="<?php echo site_url('barang_masuk'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
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
