<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Data Petugas</h1>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-body">

          <?php if ($this->session->flashdata('gagal')) { ?>
          <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('gagal') ?>
          </div>
          <?php } ?>
          
          <?php if ($this->uri->segment(2) == 'add') { ?>
          <form method="post" action="<?= site_url('petugas/insert') ?>">

            <div class="form-group">
              <label>Nama Petugas</label>
              <input name="nama_petugas" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>No Telp</label>
              <input name="notelp_petugas" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat_petugas" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label>Level</label>
              <select name="level" class="form-control" required="">
                <option value="">Pilih Level</option>
                <option value="Petugas">Petugas Perpustakaan</option>
                <option value="Kepala">Kepala Perpustakaan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input name="username" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Passsword</label>
              <input name="password" class="form-control" type="password" required="">
            </div>
            
            <center>
              <a href="<?= site_url('petugas') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </center>

          </form>
          <?php }elseif ($this->uri->segment(2) == 'edit') { ?>
          <form method="post" action="<?= site_url('petugas/update/'.$data->id_petugas) ?>">

            <div class="form-group">
              <label>Nama Petugas</label>
              <input name="nama_petugas" class="form-control" required="" value="<?= $data->nama_petugas ?>">
            </div>
            <div class="form-group">
              <label>No Telp</label>
              <input name="notelp_petugas" class="form-control" required="" value="<?= $data->notelp_petugas ?>">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat_petugas" class="form-control"><?= $data->alamat_petugas ?></textarea>
            </div>
            <div class="form-group">
              <label>Level</label>
              <select name="level" class="form-control" required="">
                <option value="">Pilih Level</option>
                <option value="Petugas" <?= ($data->level == 'Petugas' ? 'selected' : '') ?>>Petugas Perpustakaan</option>
                <option value="Kepala" <?= ($data->level == 'Kepala' ? 'selected' : '') ?>>Kepala Perpustakaan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input name="username" class="form-control" required="" value="<?= $data->username ?>">
            </div>
            <div class="form-group">
              <label>Passsword</label>
              <input name="password" class="form-control" type="password">
              <small>*Kosongkan jika tidak diedit</small>
            </div>
            
            <center>
              <a href="<?= site_url('petugas') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </center>

          </form>

          <?php } ?>


        </div>
      </div>
    </div>
  </div>

</div>