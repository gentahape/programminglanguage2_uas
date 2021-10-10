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
  
          <?php if ($this->session->userdata('level') == 'Petugas') { ?>
          <a href="<?= site_url('buku/add') ?>" class="btn btn-primary">Tambah</a> <br><br>
          <?php } ?>
  
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Penulis Buku</th>
                <th>Penerbit Buku</th>
                <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                <th>Aksi</th>
                <?php } ?>
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
                <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                <td align="center">
                  <a href="<?= site_url('buku/edit/'.$r->id_buku) ?>" class="btn btn-warning">Edit</a> |
                  <a href="<?= site_url('buku/delete/'.$r->id_buku) ?>" class="btn btn-danger">Hapus</a>
                </td>
                <?php } ?>
              </tr>
              <?php $no++; } ?>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</div>