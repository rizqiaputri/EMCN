<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="table-responsive">
<form action="<?php echo site_url('/KeuanganController/hpproduksiPer')?>" method="get">
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
<?php if(!empty($beli) || !empty($btkl) || !empty($bop)) { ?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr>
<th colspan="3">Persediaan Awal Dalam Proses</th>
<th><?php echo number_format(0) ?></th>
</tr>
<tr>
<th colspan="4">Biaya Bahan Baku :</th>
</tr>
<tr>
<th>Persediaan Awal Bahan Baku</th>
<th colspan="3"><?php echo number_format(0) ?></th>
</tr>
<tr>
<th>Pembelian Bahan Baku</th>
<th style="border-bottom: 1px solid black"><?php echo number_format($beli['subtotal']) ?></th>
<th></th>
<th></th>
</tr>
<tr>
<th>Bahan Baku Tersedia</th>
<th colspan="3"><?php echo number_format(0 + $beli['subtotal']) ?></th>
</tr>
<tr>
<tr>
<th>Persediaan Akhir Bahan Baku</th>
<th style="border-bottom: 1px solid black"><?php echo number_format(0) ?></th>
<th></th>
<th></th>
</tr>
<tr>
<th>Bahan Baku yang Dipakai</th>
<th></th>
<th><?php echo number_format(0 + $beli['subtotal']) ?></th>
<th></th>
</tr>
<tr>
<th>Biaya Tenaga Kerja Langsung</th>
<th></th>
<th><?php echo number_format($btkl['btkl']) ?></th>
<th></th>
</tr>
<tr>
<th>Biaya Overhead Pabrik</th>
<th></th>
<th style="border-bottom: 1px solid black"><?php echo number_format($bop['bop']) ?></th>
<th></th>
</tr>
<tr>
<th>Biaya Produksi</th>
<th></th>
<th></th>
<th style="border-bottom: 1px solid black"><?php echo number_format($bop['bop'] + $btkl['btkl'] + $beli['subtotal']) ?></th>
</tr>
<tr>
<th>Total Biaya Dalam Proses</th>
<th></th>
<th></th>
<th><?php echo number_format($bop['bop'] + $btkl['btkl'] + $beli['subtotal']) ?></th>
</tr>
<tr>
<th>Persediaan Akhir Dalam Proses</th>
<th></th>
<th></th>
<th style="border-bottom: 1px solid black"><?php echo number_format(0) ?></th>
</tr>
<tr>
<th>Harga Pokok Produksi</th>
<th></th>
<th></th>
<th><?php echo number_format($bop['bop'] + $btkl['btkl'] + $beli['subtotal']) ?></th>
</tr>
</thead>
</table>
<?php } ?>
</div>

</div>
</div>