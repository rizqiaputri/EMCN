<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="panel panel-green">
<div class="panel-heading"><?php echo $sub; ?></div>
<div class="panel-body">
<form action="<?php echo site_url('/ProduksiController/pilihPakaian');?>" method="get">
<div class="form-group">
<label for="pesanan">Pesanan</label>
<div class="form-group input-group">
<select name="pesanan" class="form-control" required>
<option value="">--Pesanan--</option>
<?php foreach($pesanan as $ps){ ?>
<option value="<?php echo $ps['kd_pesanan']; ?>"><?php echo $ps['kd_pesanan']; ?> (<?php echo $ps['nama_pemesan']; ?>)</option>
<?php } ?>
</select>
<span class="input-group-btn">
<button class="btn btn-default" type="submit">Pilih</button>
</span>
</div>
</div>
</form>
<form action="<?php echo site_url('/ProduksiController/hitungProduksi');?>" method="post">
<div class="form-group">
<label for="pakaian">Pakaian</label>
<select name="pakaian" class="form-control" required>
<option value="">--Pakaian--</option>
<?php foreach($pakaian as $pk){ ?>
<option value="<?php echo $pk['kd_produk']; ?>"><?php echo $pk['nama_produk']; ?> (<?php echo $pk['ukuran']; ?>)</option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="btkl">BTKL</label>
<input type="number" class="form-control" name="btkl" required>
</div>
<div class="form-group">
<label for="bop">Taksiran BOP</label>
<input type="number" name="bop" class="form-control" required>
</div>
<div class="form-group">
<label for="jumlah">Taksiran Pakaian yang Dihasilkan</label>
<input type="number" name="jumlah" class="form-control">
</div>
<button type="submit" class="btn btn-block btn-success">Hitung</button>
</form>
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