<div class="row">
  <div class="col-md-12">
  <h1 class="page-header"><?php echo $nav; ?></h1>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
          Form <?php echo $sub; ?>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <form action="<?php echo site_url('/ProdukController/simpanData');?>" method="post" role="form">
              <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk">
              </div>
              <div class="form-group">
                <label for="ukuran">Ukuran</label>
                <select name="ukuran" id="ukuran" class="form-control">
                  <option value="">Ukuran Produk</option>
                  <option value="S">S</option>
                  <option value="M">M</option>
                  <option value="L">L</option>
                  <option value="XL">XL</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php if($this->session->flashdata('notif_text')){ ?>
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-red">
        <div class="panel-heading">
        Notifikasi
        </div>
        <div class="panel-body">
        <p><?php echo $this->session->flashdata('notif_text'); ?></p>
        </div>
        </div>
    <?php } ?>
  </div>
</div>