<div class="row">
  <div class="col-md-12">
  <h1 class="page-header"><?php echo $nav; ?></h1>
  </div>
</div>

<div class="row">
    <div class="col-md-6">

    <div class="panel panel-default">
      <div class="panel-heading">
          Form <?php echo $sub; ?>
      </div>
      <div class="panel-body">
            <form action="<?php echo site_url('/BomController/LihatBom');?>" method="post" role="form">
            <div class="form-group">
                <label for="kd_produk">Produk</label>
                <select name="kd_produk" id="kd_produk" class="form-control">
                  <option value="">Produk</option>
                  <?php foreach($data as $dt){ ?>
                    <option value="<?php echo $dt['kd_produk'] ?>"><?php echo $dt['nama_produk'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Lihat</button>
            </form>
        </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                    Tabel BOM
            </div>
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Bahan</th>
                            <th>Jumlah</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tr>
                        <?php
                        if(!empty($bom)){ 
                        foreach($bom as $b){ ?>
                        <tr>
                        <td><?php echo $b['nama_bahan'] ?></td>
                        <td><?php echo $b['jumlah'] ?> <?php echo $b['satuan'] ?></td>
                        </tr>
                        <?php 
                        }
                        }else{ 
                        ?>
                        <td>&nbsp;</td>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>