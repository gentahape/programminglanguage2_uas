<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Data Peminjaman</h1>
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
          <form method="post" action="<?= site_url('peminjaman/insert') ?>">

            <div class="form-group">
              <label>Buku</label>
              <select name="id_buku" class="form-control" required="">
                <option value="">Pilih Buku</option>
                <?php foreach ($buku as $key => $b) { ?>
                <option value="<?= $b->id_buku ?>"><?= $b->judul_buku ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Anggota</label>
              <select name="id_anggota" class="form-control" required="">
                <option value="">Pilih Anggota</option>
                <?php foreach ($anggota as $key => $a) { ?>
                <option value="<?= $a->id_anggota ?>"><?= $a->nama_anggota ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Peminjaman</label>
              <input name="tanggal_peminjaman" type="date" class="form-control" required="">
            </div>
            
            <center>
              <a href="<?= site_url('peminjaman') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </center>

          </form>
          <?php }elseif ($this->uri->segment(2) == 'edit') { ?>
          <form method="post" action="<?= site_url('peminjaman/update/'.$data->id_peminjaman) ?>">

            <div class="form-group">
              <label>Buku</label>
              <select name="id_buku" class="form-control" required="">
                <option value="">Pilih Buku</option>
                <?php foreach ($buku as $key => $b) { ?>
                <option value="<?= $b->id_buku ?>" <?= ($b->id_buku == $data->id_buku ? 'selected' : '') ?>><?= $b->judul_buku ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Anggota</label>
              <select name="id_anggota" class="form-control" required="">
                <option value="">Pilih Anggota</option>
                <?php foreach ($anggota as $key => $a) { ?>
                <option value="<?= $a->id_anggota ?>" <?= ($a->id_anggota == $data->id_anggota ? 'selected' : '') ?>><?= $a->nama_anggota ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Peminjaman</label>
              <input name="tanggal_peminjaman" type="date" class="form-control" required="" value="<?= $data->tanggal_peminjaman ?>">
            </div>
            
            <center>
              <a href="<?= site_url('peminjaman') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </center>

          </form>

          <?php } ?>


        </div>
      </div>
    </div>
  </div>

</div>