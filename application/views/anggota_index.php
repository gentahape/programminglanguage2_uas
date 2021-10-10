<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
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
  
          <a href="<?= site_url('anggota/add') ?>" class="btn btn-primary">Tambah</a> <br><br>
  
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Jenis Kelamin</th>
                <th>No Telp</th>
                <th>Alamat</th>
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
                <td><?= $r->nama_anggota ?></td>
                <td><?= $r->jk_anggota ?></td>
                <td><?= $r->notelp_anggota ?></td>
                <td><?= $r->alamat_anggota ?></td>
                <td align="center">
                  <a href="<?= site_url('anggota/edit/'.$r->id_anggota) ?>" class="btn btn-warning">Edit</a> |
                  <a href="<?= site_url('anggota/delete/'.$r->id_anggota) ?>" class="btn btn-danger">Hapus</a>
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