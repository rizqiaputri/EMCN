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
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables">
<thead>
<tr>
<th>No Transaksi</th>
<th>Tanggal</th>
<th>Total</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php foreach($pembelian as $pb){ ?>
<tr>
<td><?php echo $pb['no_transaksi'] ?></td>
<td><?php echo $pb['tanggal'] ?></td>
<td><?php echo number_format($pb['total']) ?></td>
<td style="text-align: center;">
<a href="<?php echo site_url('PembelianController/getDetail')?>/<?php echo $pb['no_transaksi'];?>" class="btn btn-info btn-md">Detail</a>
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

<script>
  $(document).ready(function() {
    $('#dataTables').DataTable({
      responsive: true
      });
    });
</script>