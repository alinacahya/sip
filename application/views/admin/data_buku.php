<div class="container-fluid">
  
  <button class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#tambah_buku"><i class="fas fa-plus fa-sm "></i> Tambah Data</button>
  <div class="table-responsive">
  <table class="table table-bordered table-striped">
  <tr>
    <th>No</th>
    <th>Sampul</th>
    <th>ISBN</th>
    <th>Title</th>
    <th>Penerbit</th>
    <th>Pengarang</th>
    <th>Tahun Buku</th>
    <th>Stok Buku</th>
    <th>Tanggal Masuk</th>
    <th colspan="3">Aksi</th>
  </tr>
  

  <?php 
  $no=1;
  foreach ($buku as $bk) : ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td>
       <img width="60px" src="<?php echo base_url().'uploads/'.$bk->sampul ?>">
      </td>
      <td><?php echo $bk->isbn ?></td>
      <td><?php echo $bk->title ?></td>
      <td><?php echo $bk->penerbit ?></td>
      <td><?php echo $bk->pengarang ?></td>
      <td><?php echo $bk->thn_buku ?></td>
      <td><?php echo $bk->jml ?></td>
      <td><?php echo $bk->tgl_masuk ?></td>
      <td><?php echo anchor('admin/data_buku/detail_buku/' .$bk->id_buku, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
      <?php echo anchor('admin/data_buku/update_buku/' .$bk->id_buku, '<div class="btn btn-info btn-sm"><i class="fas fa-edit"></i></div>') ?>
      <?php echo anchor('admin/data_buku/delete_buku/' .$bk->id_buku, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
    </tr>
  <?php endforeach; ?>

  </table>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_buku/tambah_buku_aksi' ; ?>" method="post" enctype="multipart/form-data">
          <div class="form-grup">
            <label>Kode Buku</label>
            <input type="text" name="kode_buku" class="form-control">
          </div>
           <div class="form-grup">
            <label>Sampul</label>
            <input type="file" name="sampul" class="form-control">
          </div>
          <div class="form-grup">
            <label>Rak</label>
                  <select name="kode_rak" class="form-control">
                    <option value="">--Pilih Rak--</option>
                    <?php foreach ($rak as $rk) : ?>
                      <option value="<?php echo $rk->kode_rak ?>"><?php echo $rk->nama_rak ?></option>
                    <?php endforeach; ?>
                  </select>
          </div>        
          <div class="form-grup">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control">
          </div>
          <div class="form-grup">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="form-grup">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control">
          </div>
          <div class="form-grup">
            <label>Pengarang</label>
            <input type="text" name="pengarang" class="form-control">
          </div>
          <div class="form-grup">
            <label>Tahun Buku</label>
            <input type="text" name="thn_buku" class="form-control">
          </div>
          <div class="form-grup">
            <label>Jumlah Buku</label>
            <input type="text" name="jml" class="form-control">
          </div>
          <div class="form-grup">
            <label>Tanggal Masuk</label>
            <input type="date" name="tgl_masuk" class="form-control">
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>