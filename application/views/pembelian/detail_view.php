<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="panel panel-default">
<div class="panel-heading"><?php echo $sub; ?></div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<thead>
<tr>
<th>No</th>
<th>Kode Bahan</th>
<th>Nama Bahan</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Subtotal</th>
</tr>
</thead>
<tbody>
<?php
$no=1; 
$total = 0;
foreach($data as $dt){ ?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $dt['kd_bahan']; ?></td>
<td><?php echo $dt['nama_bahan']; ?></td>
<td><?php echo $dt['jumlah']; ?></td>
<td><?php echo number_format($dt['harga']); ?></td>
<td><?php echo number_format($dt['subtotal']); ?></td>
</tr>
<?php
$total = $total + $dt['subtotal']; 
$no++;
} ?>
<tr>
<td colspan="5">Total</td>
<td><?php echo number_format($total); ?></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

</div>
</div>