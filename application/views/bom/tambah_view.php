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
            <form action="<?php echo site_url('/BomController/TambahBom');?>" method="post" role="form">
            <div class="form-group">
                <label for="kd_produk">Produk</label>
                <select name="kd_produk" id="kd_produk" class="form-control">
                  <option value="">Produk</option>
                  <?php foreach($data as $dt){ ?>
                    <option value="<?php echo $dt['kd_produk'] ?>"><?php echo $dt['nama_produk'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="bahan">Bahan</label>
                <select name="bahan" id="bahan" class="form-control">
                  <option value="">Bahan</option>
                  <?php foreach($bahan as $b){ ?>
                    <option value="<?php echo $b['kd_bahan'] ?>"><?php echo $b['nama_bahan'] ?></option>
                  <?php } ?>
                </select>
              </div>  
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
              </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
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
                            <th>No</th>
                            <th>Produk</th>
                            <th>Bahan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tr>
                        <?php  
                        $no = 1;
                        foreach($this->cart->contents() as $bom){ ?>
                        <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $bom['kd_produk'] ?></td>
                        <td><?php echo $bom['id'] ?></td>
                        <td><?php echo $bom['qty'] ?></td>
                        <td><a type="button" id="<?php echo $bom['id'];?>" class="btn btn-md btn-danger" href="<?php echo site_url('/BomController/hapus/');?><?php echo $bom['rowid'];?>">Hapus</a></td>
                        </tr>
                        <?php 
                        $no++;
                        } ?>
                        </tbody>
                    </table>
                </div>
                <br/>
                <a href="<?php echo site_url('/BomController/SimpanBom') ?>" class="btn btn-success">Simpan</a>
            </div>
        </div>
    </div>
</div>