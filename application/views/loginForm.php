<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Inventaris</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/fontawesome/css/all.min.css')?>">


  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/bootstrap-social/bootstrap-social.css')?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css')?>">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-2">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand"><img src="<?php echo site_url('assets/img/logo.png'); ?>" style="width: 50px;"> Inventaris</div>
            <?php
              if (@$keluar) {
                echo $keluar;
              }
             ?>
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>


              <div class="card-body">
                <?php echo form_open('login/cekLogin', 'class="needs-validation" novalidate=""') ?>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">@</div>
                        </div>
                      <input type="text" class="form-control" name="username" tabindex="1" required autofocus>
                      <div class="invalid-feedback">
                        Username tidak boleh Kosong!
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    	<label for="password" class="control-label">Password</label>
                    <input type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Password tidak boleh Kosong!
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="text-small text-center">
                      <a href="<?php echo base_url('login/lupaPass') ?>">Lupa Password?</a>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Belum Punya Akun? <a href="#">Contact Admin</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; By <a href="https://ryfazrin.github.io/">Ryfazrin</a> 2019
            </div>
          </div>

          <!-- <div class="col-lg-3">
            <h2>Login</h2>
            <ul>
              <li>
                <b>Level: admin</b> <br>
                Username: admin<br>
                Pass: admin<br>
              </li>
              <li>
                <b>Level: manajemen</b> <br>
                Username: manajemen<br>
                Pass: manajemen<br>
              </li>
              <li>
                <b>Level: peminjam</b> <br>
                Username: peminjam1<br>
                Pass: peminjam1<br>
              </li>
              <li>
                <b>Level: peminjam</b> <br>
                Username: peminjam2<br>
                Pass: peminjam2<br>
              </li>
            </ul>
          </div> -->

        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url('assets/modules/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/popper.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/tooltip.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/nicescroll/jquery.nicescroll.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/moment.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/stisla.js')?>"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/js/page/modules-datatables.js')?>"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
</html>
