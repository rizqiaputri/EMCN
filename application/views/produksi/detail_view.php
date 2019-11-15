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
<th>BBB</th>
<th><?php echo number_format($produksi['bbb']); ?></th>
</tr>
<tr>
<th>BTKL</th>
<th><?php echo number_format($produksi['btkl']); ?></th>
</tr>
<tr>
<th>BOP</th>
<th><?php echo number_format($produksi['bop']); ?></th>
</tr>
<tr>
<th>Biaya Produksi</th>
<th><?php echo number_format($produksi['total']); ?></th>
</tr>
</thead>
</table>
</div>
</div>
</div>

</div>
</div>