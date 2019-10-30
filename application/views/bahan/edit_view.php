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
            <form action="<?php echo site_url('/BahanController/updateData');?>" method="post" role="form">
            <div class="form-group">
                <label for="kode_bahan">Kode Bahan</label>
                <input type="text" name="kode_bahan" class="form-control" placeholder="Kode Bahan" value="<?php echo $data['kd_bahan']; ?>" readonly>
              </div>  
            <div class="form-group">
                <label for="nama_bahan">Nama Bahan</label>
                <input type="text" name="nama_bahan" class="form-control" placeholder="Nama Bahan" value="<?php echo $data['nama_bahan']; ?>" required>
              </div>
              <div class="form-group">
                <label for="satuan">Satuan Bahan</label>
                <input type="text" name="satuan" class="form-control" placeholder="Satuan Bahan" value="<?php echo $data['satuan']; ?>">
              </div>
              <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" id="jenis" class="form-control">
                  <option value="">Jenis Bahan</option>
                  <option value="Utama">Bahan Utama</option>
                  <option value="Penolong">Bahan Penolong</option>
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