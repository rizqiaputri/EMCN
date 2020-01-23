<div class="row">
<div class="col-md-12">
<h1 class="page-header"><?php echo $nav; ?></h1>
</div>
</div>

<div class="row">
<div class="col-md-12">


<form action="<?php echo site_url('/KeuanganController/bukbesPer')?>" method="get">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<select name="akun" class="form-control" required>
<option value="">--Akun--</option>
<?php 
if(!empty($akun)){
foreach($akun as $ak){ ?>
<option value="<?php echo $ak['no_akun']; ?>"><?php echo $ak['nama_akun']; ?></option>
<?php 
}
}
?>
</select>
</div>
</div>
<div class="col-md-6">
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
</div>
</div>

</form>
<?php if(!empty($buku)){ ?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr>
    <th>Tanggal</th>
	<th>Keterangan</th>
	<th>Debit</th>
	<th>Kredit</th>
	<th>Saldo</th>
</tr>
</thead>
<tbody>
<?php
				if(!empty($saldo['selisih']))
				{
				echo "
					<tr>
						<td>0000-00-00</td>
						<td>Saldo Awal</td>
						<td></td>
						<td></td>
						<td align = 'right'>".format_rp($saldo['selisih'])."</td>
					</tr>
				";
				$saldo_awal = $saldo['selisih'];
				}
				else{
				echo "
					<tr>
						<td>0000-00-00</td>
						<td>Saldo Awal</td>
						<td></td>
						<td></td>
						<td align = 'right'>".format_rp(0)."</td>
					</tr>
				";
				$saldo_awal = 0;
				}
				foreach($buku as $data){
					echo "
						<tr>
							<td>".$data['tanggal']."</td>
							<td>".$data['nama_akun']."</td>
						";
					if($data['posisi_dr_cr'] == 'D'){
						//if($dataakun['header_akun'] == d or $dataakun['header_akun'] == 5 or $dataakun['header_akun'] == 6){
		                if($data['header_akun'] == 1 || $data['header_akun'] == 5 || $data['header_akun'] == 6)
						{
							$saldo_awal = $saldo_awal + $data['nominal'];
						}
						else{
							$saldo_awal = $saldo_awal - $data['nominal'];	
						}
						echo "
							<td align = 'right'>".format_rp($data['nominal'])."</td>
							<td></td>
							<td align = 'right'>".format_rp($saldo_awal)."</td>
						</tr>
						";
					}else{
						if($data['header_akun'] == 1 || $data['header_akun'] == 5 || $data['header_akun'] == 6)
						{
						$saldo_awal = $saldo_awal - $data['nominal'];
						}
						else{
						$saldo_awal = $saldo_awal + $data['nominal'];	
						}
						echo "
							<td></td>
							<td align = 'right'>".format_rp($data['nominal'])."</td>
							<td align = 'right'>".format_rp($saldo_awal)."</td>
						</tr>
						";
					}
				}
				echo "
					<tr>
						<td>0000-00-00</td>
						<td>Saldo Akhir</td>
						<td></td>
						<td></td>
						<td align = 'right'>".format_rp($saldo_awal)."</td>
					</tr>
				";
			?>
</tbody>
</table>

<?php } ?>

</div>
</div>