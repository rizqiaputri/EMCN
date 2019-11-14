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
<th>Kode Pesanan</th>
<th>Nama Pemesan</th>
<th>Tanggal Pesan</th>
<th>Total</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php 
$no=1; 
foreach($pesanan as $ps){
?>
<tr>
<td><?php echo $ps['kd_pesanan']; ?></td>
<td><?php echo $ps['nama_pemesan']; ?></td>
<td><?php echo $ps['tanggal_pesan']; ?></td>
<td><?php echo number_format($ps['total']); ?></td>
<td style="text-align: center;">
<a href="<?php echo site_url('PesananController/getDetail')?>/<?php echo $ps['kd_pesanan'];?>" class="btn btn-info btn-md">Detail</a>
</td>
</tr>
<?php $no++;
} ?>
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