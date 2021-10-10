<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Peminjaman Buku">
  <meta name="author" content="Peminjaman Buku">
  <link href="<?= base_url() ?>assets/img/logo/logo.png" rel="icon">
  <title>Peminjaman Buku</title>
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url() ?>assets/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Form Tamu</h1>
                  </div>

                  <?php if ($this->session->flashdata('sukses')) { ?>
                  <div class="alert alert-success " role="alert">
                    <?= $this->session->flashdata('sukses') ?>
                  </div>
                  <?php }elseif ($this->session->flashdata('gagal')) { ?>
                  <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('gagal') ?>
                  </div>
                  <?php } ?>

                  <form class="user" action="<?= site_url('tamu/insert') ?>" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" required="" name="nama_tamu" placeholder="Masukan Nama Anda">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>assets/js/ruang-admin.min.js"></script>
</body>

</html>