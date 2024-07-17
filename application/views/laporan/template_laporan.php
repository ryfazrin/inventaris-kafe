
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>laporan &mdash; Inventaris</title>

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

    // jalankan fungsi cetak laporan
    window.print();
  </script>
<!-- /END GA --></head>

<body>
  <div id="laporan">
    <section class="section">
      <div class="container-fluid mt-2">
        <div class="row">
          <div class="col-lg-12">
            <div class="login-brand">Inventaris</div>
              <!-- content -->
              <?php
              if (isset($barang)) {
                $this->load->view('laporan/laporan_barang');
              } else if (isset($suplier)) {
                $this->load->view('laporan/laporan_suplier');
              } else if (isset($barang_masuk)) {
                $this->load->view('laporan/laporan_barang_masuk');
              } else if (isset($barang_keluar)) {
                $this->load->view('laporan/laporan_barang_keluar');
              } else if (isset($pinjam_barang)) {
                $this->load->view('laporan/laporan_pinjam_barang');
              } else {
                echo "<div class='alert alert-danger text-center'><strong>data tidak ditemukan</strong></div>";
              }

              ?>
              <!-- end content -->
            <div class="mt-5 text-muted text-right">
              Cetak LAPORAN by <span class="text-primary">@<?= $this->session->userdata('username'); ?></span>
            </div>
            <div class="simple-footer">
              Copyright &copy; <span class="text-primary">App INVENTARIS RPL</span> 2019
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
