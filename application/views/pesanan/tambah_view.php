<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">
<?php echo $sub; ?>
</div>
<div class="panel-body">
<form action="<?php echo site_url('/PesananController/tambahPesanan');?>" method="post">
<div class="form-group">
<label for="produk">Pakaian</label>
<select name="produk" class="form-control" required>
<option value="">--Pakaian--</option>
<?php foreach($pakaian as $pk){ ?>
<option value="<?php echo $pk['kd_produk'] ?>"><?php echo $pk['nama_produk'] ?> (<?php echo $pk['ukuran'] ?>)</option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="jumlah">Jumlah Pesanan</label>
<input type="number" name="jumlah" class="form-control" required>
</div>
<div class="form-group">
<label for="harga">Harga Taksiran Per Pcs</label>
<input type="number" name="harga" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary btn-block">Pesan</button>
</form>
</div>
</div>

</div>

<div class="col-md-12">

<div class="panel panel-green">
<div class="panel-heading">Data Pesanan</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>No</th>
<th>Pakaian</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Subtotal</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php 
$no = 1; 
foreach($this->cart->contents() as $ps){
?>
<td><?php echo $no; ?></td>
<td><?php echo $ps['id']; ?></td>
<td><?php echo $ps['qty']; ?></td>
<td><?php echo number_format($ps['price']); ?></td>
<td><?php echo number_format($ps['subtotal']); ?></td>
<td>
<a type="button" id="<?php echo $ps['id'];?>" style="color: white;" class="btn btn-danger" href="<?php echo site_url('/PesananController/hapus/');?><?php echo $ps['rowid'];?>">Hapus</a>
</td>
<?php } ?>
</tbody>
<tr>
<td colspan="4">Total</td>
<td><?php echo number_format($this->cart->total()); ?></td>
</tr>
</table>
<form action="<?php echo site_url('/PesananController/simpanPesanan');?>" method="post">
<div class="form-group">
<label for="nama">Nama Pemesan</label>
<input type="text" name="nama" class="form-control" required>
</div>
<div class="form-group">
<label for="selesai">Tanggal Selesai</label>
<input type="date" name="selesai" class="form-control" required>
</div>
<button type="submit" class="btn btn-success">Simpan</button>
</form>
</div>
</div>
</div>

</div>
<?php if($this->session->flashdata('error_text')){ ?>
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-red">
        <div class="panel-heading">
        Notifikasi
        </div>
        <div class="panel-body">
        <p><?php echo $this->session->flashdata('error_text'); ?></p>
        </div>
        </div>
    <?php } ?>
</div>