<div class="row">
  <div class="col-md-12">
  <h1 class="page-header"><?php echo $nav; ?></h1>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <?php echo $sub; ?>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables">
                <thead>
                  <tr>
                    <th>Kode Bahan</th>
                    <th>Nama Bahan</th>
                    <th>Stok</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($data as $dt){ ?>
                    <tr>
                      <td><?php echo $dt['kd_bahan'] ?></td>
                      <td><?php echo $dt['nama_bahan'] ?></td>
                      <td><?php echo $dt['stok'] ?> <?php echo $dt['satuan'] ?></td>
                      <td><?php echo $dt['jenis'] ?></td>
                      <td style="text-align: center;">
                      <a href="<?php echo site_url('BahanController/getDataEdit')?>/<?php echo $dt['kd_bahan'];?>" class="btn btn-info btn-md">Edit</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            </div>
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

<script>
  $(document).ready(function() {
    $('#dataTables').DataTable({
      responsive: true
      });
    });
</script>