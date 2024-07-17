
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
              <div class="card-header"><h4>bantuan</h4></div>


              <div class="card-body">
                  <div class="form-group text-center">
                    <label class="text-center">Silahkan Hubungi Administrator</label>
                  </div>
                  <div class="form-group text-center">
                    <a href="<?php echo base_url('login') ?>">Login</a>
                  </div>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Belum Punya Akun? <a href="#">Contact Admin</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; By <a href="https://github.com/ryfazrin">Ryfazrin</a> 2019
            </div>
          </div>

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
