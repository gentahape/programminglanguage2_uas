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
  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url() ?>">
        <div class="sidebar-brand-text mx-3">Peminjaman Buku</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?= ($this->uri->segment(1) == 'buku' ? 'active' : '') ?>">
        <a class="nav-link" href="<?= site_url('buku') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Data Buku</span></a>
      </li>
      <li class="nav-item <?= ($this->uri->segment(1) == 'anggota' ? 'active' : '') ?>">
        <a class="nav-link" href="<?= site_url('anggota') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Daftar Anggota</span></a>
      </li>
      <li class="nav-item <?= ($this->uri->segment(1) == 'peminjaman' ? 'active' : '') ?>">
        <a class="nav-link" href="<?= site_url('peminjaman') ?>">
          <i class="fas fa-fw fa-address-book"></i>
          <span>Peminjaman Buku</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin" hidden=""></div>
    </ul>
    <!-- Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
       
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            
          </ul>
        </nav>
        <!-- Topbar -->

        <?php $this->load->view($view); ?>

      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b>Genta Haetami Putra</b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>assets/js/ruang-admin.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>