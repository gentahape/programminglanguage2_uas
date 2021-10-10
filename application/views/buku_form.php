<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Data Buku</h1>
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
          <form method="post" action="<?= site_url('buku/insert') ?>">

            <div class="form-group">
              <label>Kode Buku</label>
              <input name="kode_buku" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Judul Buku</label>
              <input name="judul_buku" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Penulis Buku</label>
              <input name="penulis_buku" class="form-control" required="">
            </div>
            <div class="form-group">
              <label>Penerbit Buku</label>
              <input name="penerbit_buku" class="form-control" required="">
            </div>
            
            <center>
              <a href="<?= site_url('buku') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </center>

          </form>
          <?php }elseif ($this->uri->segment(2) == 'edit') { ?>
          <form method="post" action="<?= site_url('buku/update/'.$data->id_buku) ?>">

            <div class="form-group">
              <label>Kode Buku</label>
              <input name="kode_buku" class="form-control" required="" value="<?= $data->kode_buku ?>">
            </div>
            <div class="form-group">
              <label>Judul Buku</label>
              <input name="judul_buku" class="form-control" required="" value="<?= $data->judul_buku ?>">
            </div>
            <div class="form-group">
              <label>Penulis Buku</label>
              <input name="penulis_buku" class="form-control" required="" value="<?= $data->penulis_buku ?>">
            </div>
            <div class="form-group">
              <label>Penerbit Buku</label>
              <input name="penerbit_buku" class="form-control" required="" value="<?= $data->penerbit_buku ?>">
            </div>
            
            <center>
              <a href="<?= site_url('buku') ?>" class="btn btn-danger">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </center>

          </form>

          <?php } ?>


        </div>
      </div>
    </div>
  </div>

</div>