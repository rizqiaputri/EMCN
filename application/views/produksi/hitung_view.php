<?php
$taksiranJumlah = $this->session->userdata('jumlah');
$taksiranBop     = $this->session->userdata('bop');
$bopS  = $taksiranBop / $taksiranJumlah;
$bopF  = $bopS * $jumlah['jumlah'];
$total = $bbb['subtotal'] + $btkl + $bopF;
$biayaBahan   = $bbb['subtotal'];
$this->session->set_userdata('bopF',$bopF);
$this->session->set_userdata('total',$total);
$this->session->set_userdata('bbb',$biayaBahan);
?>

<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading"><?php echo $sub; ?>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<thead>
<tr>
<th>BBB</th>
<th><?php echo number_format($bbb['subtotal']); ?></th>
</tr>
<tr>
<th>BTKL</th>
<th><?php echo number_format($btkl); ?></th>
</tr>
<tr>
<th>BOP</th>
<th><?php echo number_format($bopF); ?></th>
</tr>
<tr>
<th>Biaya Produksi</th>
<th><?php echo number_format($total); ?></th>
</tr>
</thead>
</table>
<a href="<?php echo site_url('/ProduksiController/konfProduksi');?>" class="btn btn-block btn-primary">Simpan</a>
</div>

</div>
</div>

</div>
</div>