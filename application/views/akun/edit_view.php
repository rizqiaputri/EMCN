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
            <form action="<?php echo site_url('/AkunController/updateData');?>" method="post" role="form">
              <div class="form-group">
                <label for="kode_akun">Kode Akun</label>
                <input type="text" name="kode_akun" class="form-control" placeholder="Kode Akun" value="<?php echo $data['no_akun'] ?>" readonly>
              </div>
              <div class="form-group">
                <label for="nama_akun">Nama Akun</label>
                <input type="text" name="nama_akun" class="form-control" placeholder="Nama Akun" value="<?php echo $data['nama_akun'] ?>" required>
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