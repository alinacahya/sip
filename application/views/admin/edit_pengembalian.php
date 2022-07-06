<div class="container-fluid">
  <h3><i class="fas fa-edit"></i>  Edit Data Pinjam</h3>

  <?php foreach ($laporan as $dnd) : ?>

    <form method="post" action="<?php echo base_url(). 'admin/data_pengembalian/update_pengembalian_aksi'?>" enctype="multipart/form-data">
      <div class="form-group">
            <label>ID Laporan</label>
            <input type="text" name="id_laporan" class="form-control" value="<?php echo $dnd->id_laporan ?>" readonly>
            </div>

      <div class="form-group">
            <label>ID User</label>
            <input type="text" name="id_user" class="form-control" value="<?php echo $dnd->id_user ?>">
            </div>

            <div class="form-group">
            <label>ID Buku</label>
            <input type="text" name="id_buku" class="form-control" value="<?php echo $dnd->id_buku ?>">
            </div>

          <div class="form-group">
            <label>Tanggal Pinjam</label>
            <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo $dnd->tgl_pinjam ?>" readonly>
          </div>
          <div class="form-group">
            <label>Tanggal Kembali</label>
            <input type="text" name="tgl_kembali" class="form-control" value="<?php echo $dnd->tgl_kembali ?>" readonly>
          </div>
          <div class="form-group">
            <label>Tanggal Pengembalian</label>
            <input type="date" name="pengembalian" class="form-control" value="<?php echo $dnd->pengembalian ?>">
          </div>

         <div class="form-group">
            <label>Status</label>
            <span class="text-danger"> *) Wajib Diubah</span>
            <input type="hidden" name="id_laporan" class="form-control" value="<?php echo $dnd->id_laporan?>">
            <select class="form-control" name="status" value="<?php echo $dnd->status?>">
            <option>--</option>
            <option>Dikembalikan</option>
            <option>Dipinjam</option>  
            </select>
           </div>

          <div class="form-group">
            <label>Denda</label>
            <span class="text-danger"> *) Jika Tanggal Pengembalian < Tanggal Kembali isikan 0 pada Denda</span>
            <input type="text" name="denda" class="form-control" value="<?php echo $dnd->denda ?>">
          </div>

      <br>
      <button type="submit" class="btn btn-info btn">Simpan</button>
      <?php echo anchor('admin/data_user' , '<div class="btn btn_sm btn-danger">Kembali</div>')?>
    </form>

  <?php endforeach ; ?>
</div>