<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="table-responsive">
<form action="<?php echo site_url('/KeuanganController/jurnalPer')?>" method="get">
<div class="form-group input-group">
<?php if(empty($periode)){ ?>
<input type="month" class="form-control" name="periode" id="periode" value="<?php echo date('Y-m') ?>">
<?php } else{ ?>
<input type="month" class="form-control" name="periode" id="periode" value="<?php echo $periode ?>">
<?php } ?>
<span class="input-group-btn">
<button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
</button>
</span>
</div>
</form>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr>
<th>Tanggal</th>
<th>No Akun</th>
<th>Nama Akun</th>
<th>Reff</th>
<th>Debet</th>
<th>Kredit</th>
</tr>
</thead>
<tbody>
<?php 
$debit = 0;
$kredit = 0;
if($jurnal){
foreach($jurnal as $j){ 
if($j['posisi_dr_cr'] == 'D'){
    $posisi = 'Debet';
    $debit = $debit + $j['nominal'];
?>
    <tr>
    <td><?php echo $j['tanggal']; ?></td>
    <td><?php echo $j['no_akun']; ?></td>
    <td><?php echo $j['nama_akun']; ?></td>
    <td><?php echo $j['no_transaksi']; ?></td>
    <td style="text-align:right;"><?php echo number_format($j['nominal']); ?></td>
    <td>-</td>
    </tr>
<?php 
    } else if($j['posisi_dr_cr'] == 'K'){ 
      $posisi = 'Kredit';
      $kredit = $kredit + $j['nominal'];
?>
    <tr>
    <td><?php echo $j['tanggal']; ?></td>
    <td><?php echo $j['no_akun']; ?></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $j['nama_akun']; ?></td>
    <td><?php echo $j['no_transaksi']; ?></td>
    <td>-</td>
    <td style="text-align:right;"><?php echo number_format($j['nominal']); ?></td>
    </tr>
<?php } ?>
<?php } ?>
<tr>
<td colspan="4">Total</td>
<td style="text-align:right;"><?php echo number_format($debit); ?></td>
<td style="text-align:right;"><?php echo number_format($kredit); ?></td>
</tr>
<?php } else { ?>
<tr>
<td colspan="6">&nbsp;</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

</div>
</div>