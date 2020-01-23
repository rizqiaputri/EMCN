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
                    <th>Pesanan</th>
                    <th>Produk</th>
                    <th>Lihat Kartu Pesanan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($pesanan as $ps){ ?>
                    <tr>
                    <td><?php echo $ps['kd_pesanan'] ?></td>
                    <td><?php echo $ps['kd_produk'] ?></td>
                    <td style="text-align: center;">
                    <a href="<?php echo site_url('KeuanganController/getKartu')?>/<?php echo $ps['kd_pesanan'];?>/<?php echo $ps['kd_produk'];?>" class="btn btn-info btn-md">Lihat</a>
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
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#dataTables').DataTable({
      responsive: true
      });
    });
</script>