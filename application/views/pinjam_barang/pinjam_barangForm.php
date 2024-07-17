	<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Pinjam Barang</h1>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card">
                <div class="card-header">
                <?php
                    if (isset($pinjam_barangId->id_pinjam)) {
                      // jika update jalankan
                      echo form_open('pinjam_barang/update/'.$pinjam_barangId->id_pinjam);
                      echo '<h4>Edit Pinjam Barang</h4>';
                    }else{
                      // tambah barang
                      echo form_open('pinjam_barang/simpanPinjam_barang');
                      echo '<h4>Tambah Pinjam Barang</h4>';
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

                    <?php if ($level->level == 'peminjam'): ?>
                      <input name="peminjam" type="hidden" class="form-control" value="<?= $level->username ?>">
                    <?php else: ?>
                      <div class="form-group">
                        <label>Nama Peminjam</label>
                        <select class="form-control select2 text-capitalize" name="peminjam">

                          <?php if (isset($pinjam_barangId->peminjam)): ?>
                            <option value="<?= $pinjam_barangId->peminjam; ?>"><?= $pinjam_barangId->peminjam; ?></option>
                            <option disabled>-</option>
                          <?php endif ?>

                          <?php foreach ($peminjam_user as $data): ?>
                            <option value="<?= isset($data->username)?$data->username:''; ?>"><?= isset($data->username)?$data->username:''; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    <?php endif; ?>

                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select onchange="stok()" id="barang" class="form-control select2 text-capitalize" name="id_barang">

                          <?php if (isset($pinjam_barangId->id_barang)): ?>
                            <option value="<?= $pinjam_barangId->id_barang; ?>"><?= $pinjam_barangId->nama_barang; ?></option>
                            <option disabled>-</option>
                          <?php endif ?>

                          <?php foreach ($nama_barang as $data): ?>
                            <option value="<?= isset($data->id_barang)?$data->id_barang:''; ?>" max="10"><?= isset($data->nama_barang)?$data->nama_barang:''; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Jumlah Pinjam Barang</label>
                        <input id="jumlah" name="jml_barang" type="number" class="form-control" value="<?= isset($pinjam_barangId->jml_barang)?$pinjam_barangId->jml_barang:''; ?>">
                        <div id="ket"></div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Tanggal Kembali</label>
                      <input name="tgl_kembali" type="text" class="form-control datepicker"  value="<?= isset($pinjam_barangId->tgl_kembali)?$pinjam_barangId->tgl_kembali:''; ?>">
                      </div>
                      <div class="form-group">
                        <label>Kondisi</label>
                        <input name="kondisi" type="text" class="form-control" value="<?= isset($pinjam_barangId->kondisi)?$pinjam_barangId->kondisi:''; ?>">
                      </div>
                    <div class="form-group text-right">
                      <button class="btn btn-info mr-1" type="submit">Simpan</button>

                      <?php if ($level->level == 'peminjam'): ?>
                        <a href="<?php echo site_url('pinjam_barang/by_user/'.$level->username); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
                      <?php else: ?>
                        <a href="<?php echo site_url('pinjam_barang'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
                      <?php endif; ?>

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
