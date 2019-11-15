<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="panel panel-default">
<div class="panel-heading">Pilih Pesanan</div>
<div class="panel-body">
<form action="<?php echo site_url('/PembelianController/pilihPesanan')?>" method="get">
<div class="form-group">
<label for="pesanan">Pesanan</label>
<select name="pesanan" class="form-control">
<option value="">--Pesanan--</option>
<?php foreach($pesanan as $ps){ ?>
<option value="<?php echo $ps['kd_pesanan'] ?>"><?php echo $ps['kd_pesanan']; ?> (<?php echo $ps['nama_pemesan'] ?>)</option>
<?php } ?>
</select>
</div>
<button type="submit" class="btn btn-block btn-outline btn-primary">Lanjut</button>
</form>
</div>
</div>

</div>
</div>