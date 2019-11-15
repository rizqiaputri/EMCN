<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">

<div class="col-md-12">

<div class="panel panel-green">
<div class="panel-heading">
<?php echo $sub; ?>
</div>
<div class="panel-body">
<form action="<?php echo site_url('/PembelianController/pilihBahan');?>" method="get">
<div class="form-group">
<label for="pakaian">Pakaian</label>
<div class="form-group input-group">
<select name="pakaian" class="form-control" required>
<option value="">--Pakaian--</option>
<?php foreach($pakaian as $pr){ ?>
<option value="<?php echo $pr['kd_produk'] ?>"><?php echo $pr['nama_produk']; ?> (<?php echo $pr['ukuran'] ?>)</option>
<?php } ?>
</select>
<span class="input-group-btn">
<button class="btn btn-default" type="submit">Pilih</button>
</span>
</div>
</div>
</form>
<form action="<?php echo site_url('/PembelianController/tambahPembelian');?>" method="post">
<div class="form-group">
<label for="bahan">Bahan</label>
<select name="bahan" class="form-control" required>
<option value="">--Bahan--</option>
<?php 
if(!empty($bahan)){
foreach($bahan as $bn){ ?>
<option value="<?php echo $bn['kd_bahan']; ?>"><?php echo $bn['nama_bahan']; ?></option>
<?php 
}
}
?>
</select>
</div>
<div class="form-group">
<label for="harga">Harga</label>
<input type="number" name="harga" class="form-control" required>
</div>
<button type="submit" class="btn btn-block btn-success">Tambah</button>
</form>
</div>
</div>

</div>

<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">Data Pembelian</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
<thead>
<tr>
<th>No</th>
<th>Kode bahan</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Subtotal</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php 
$no=1;
    foreach($this->cart->contents() as $pb){
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $pb['id']; ?></td>
<td><?php echo $pb['qty']; ?></td>
<td><?php echo number_format($pb['price']); ?></td>
<td><?php echo number_format($pb['subtotal']); ?></td>
<td>
<a type="button" id="<?php echo $pb['id'];?>" class="btn btn-md btn-danger" href="<?php echo site_url('/PembelianController/hapus/');?><?php echo $pb['rowid'];?>">Hapus</a>
</td>
</tr>
<?php 
$no++;
    }?>
<tr>
<td colspan="4">Total</td>
<td><?php echo number_format($this->cart->total()); ?></td>
</tr>
</tbody>
</table>
<a href="<?php echo site_url('/PembelianController/simpanPembelian');?>" class="btn btn-primary btn-md">Simpan</a>
</div>
</div>
</div>

</div>

<?php if($this->session->flashdata('beli_text')){ ?>
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-red">
        <div class="panel-heading">
        Notifikasi
        </div>
        <div class="panel-body">
        <p><?php echo $this->session->flashdata('beli_text'); ?></p>
        </div>
        </div>
    <?php } ?>

</div>