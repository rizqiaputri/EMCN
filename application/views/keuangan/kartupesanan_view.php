<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div class="table-responsive">

<table class="table table-bordered table-striped table-hover">
<tr>
                <th colspan="11" style="text-align: center">Kartu Harga Pokok Pesanan</th>
                </tr>
                <tr>
                <th>No. Pesanan</th>
                <th>: <?php echo $produksi['kd_pesanan'] ?></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Pemesan</th>
                <th>: <?php echo $produksi['nama_pemesan'] ?></th>
                </tr>
                <tr>
                <th>Tgl. Pesan</th>
                <th>: <?php echo $produksi['tanggal_pesan'] ?></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Jumlah</th>
                <th>: <?php echo number_format($produksi['jumlah']) ?></th>
                </tr>
                <tr>
                <th>Tgl. Selesai</th>
                <th>: <?php echo $produksi['tanggal'] ?></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Harga Jual</th>
                <th>: <?php echo number_format($produksi['harga']) ?></th>
                </tr>
                <tr>
                <th style="text-align: center" colspan="3">Biaya Bahan Baku</th>
                <th style="text-align: center" colspan="2">Biaya Tenaga Kerja</th>
                <th style="text-align: center" colspan="2">Biaya Overhead Pabrik</th>
                </tr>
                <tr>
                <th>Tgl</th>
                <th>Ket.</th>
                <th>Jumlah</th>
                <th>Tgl</th>
                <th>Jumlah</th>
                <th>Tgl</th>
                <th>Jumlah</th>
                </tr>
                <tr>
                    <th>-</th>
                    <th>-</th>
                    <th><?php echo number_format($produksi['bbb']) ?></th>
                    <th>-</th>
                    <th><?php echo number_format($produksi['btkl']) ?></th>
                    <th>-</th>
                    <th><?php echo number_format($produksi['bop']) ?></th>
                </tr>
                <tr>
                <th colspan="6">Total Biaya Produksi</th>
                <th><?php echo number_format($produksi['bbb'] + $produksi['btkl'] + $produksi['bop']) ?></th>
                </tr>
</table>
</div>

</div>
</div>