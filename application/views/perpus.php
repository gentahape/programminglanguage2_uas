<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">

        <div class="table-responsive p-3">

          <?php if ($this->session->flashdata('sukses')) { ?>
          <div class="alert alert-success " role="alert">
            <?= $this->session->flashdata('sukses') ?>
          </div>
          <?php }elseif ($this->session->flashdata('gagal')) { ?>
          <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('gagal') ?>
          </div>
          <?php } ?>

          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Penulis Buku</th>
                <th>Penerbit Buku</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              <?php
                $no = 1;
                foreach ($data as $key => $r) {
              ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $r->kode_buku ?></td>
                <td><?= $r->judul_buku ?></td>
                <td><?= $r->penulis_buku ?></td>
                <td><?= $r->penerbit_buku ?></td>
                <td>
                  <form action="<?= site_url('perpus/insertPesanan') ?>" method="post">
                    <input type="hidden" name="id_buku" value="<?= $r->id_buku ?>" required="">
                    <input type="hidden" name="id_anggota" value="<?= $this->session->userdata('id_anggota') ?>" required="">
                    <input type="submit" class="btn btn-primary" value="Pinjam">
                  </form>
                </td>
              </tr>
              <?php $no++; } ?>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</div>