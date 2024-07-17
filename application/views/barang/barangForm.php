<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Barang</h1>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card">
                <div class="card-header">
                <?php
                    if (isset($barangId->id_barang)) {
                      // jika update jalankan
                      echo form_open('barang/update/'.$barangId->id_barang);
                      echo '<h4>Edit Barang</h4>';
                    }else{
                      // tambah barang
                      echo form_open('barang/simpanbarang');   
                      echo '<h4>Tambah Barang</h4>';
                    }
                 ?>
                </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                      <?php 
                        if (@$sukses) {
                          echo $sukses;
                        }elseif (@$error) {
                          echo $error;
                        }
                       ?>
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input name="nama_barang" type="text" class="form-control" value="<?= isset($barangId->nama_barang)?$barangId->nama_barang:''; ?>">
                      </div>
                    <div class="form-group text-right">
                     <?php if (isset($barangId->id_barang)): ?>
                        <button class="btn btn-info mr-1" type="submit">Simpan</button>
                     <?php else: ?>
                        <button class="btn btn-info mr-1" type="submit">Simpan & Lanjut</button>
                     <?php endif ?>
                      <a href="<?php echo site_url('barang'); ?>"> <button type="button" class="btn btn-danger" name="batal">Kembali</button></a>
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