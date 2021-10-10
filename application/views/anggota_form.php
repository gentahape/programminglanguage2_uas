<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Data Anggota</h1>
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
          <form method="post" action="<?= site_url('anggota/insert') ?>">

            <div class="form-group">
              <label>Nama Anggota</label>
              <input name="nama_anggota" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jk_anggota" class="form-control">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>No Telp</label>
              <input name="notelp_anggota" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat_anggota" class="form-control"></textarea>
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
              <a href="<?= site_url('anggota') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </center>

          </form>
          <?php }elseif ($this->uri->segment(2) == 'edit') { ?>
          <form method="post" action="<?= site_url('anggota/update/'.$data->id_anggota) ?>">

            <div class="form-group">
              <label>Nama Anggota</label>
              <input name="nama_anggota" class="form-control" required="" value="<?= $data->nama_anggota ?>">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jk_anggota" class="form-control">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?= ($data->jk_anggota == 'Laki-laki' ? 'selected' : '') ?>>Laki-laki</option>
                <option value="Perempuan" <?= ($data->jk_anggota == 'Perempuan' ? 'selected' : '') ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>No Telp</label>
              <input name="notelp_anggota" class="form-control" required="" value="<?= $data->notelp_anggota ?>">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat_anggota" class="form-control"><?= $data->alamat_anggota ?></textarea>
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
              <a href="<?= site_url('anggota') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </center>

          </form>

          <?php } ?>


        </div>
      </div>
    </div>
  </div>

</div>