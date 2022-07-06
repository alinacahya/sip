<div class="container-fluid">
  <h3>Masukan Data Peminjaman</h3>
  <hr>

    <form action="<?php echo base_url().'user/data_pinjam/tambah_pinjam_aksi' ; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">

            <div class="form-grup">
            <label>ID User</label>
            <input type="text" name="id_user" class="form-control">
            </div>

             <div class="form-grup">
            <label>ID Buku</label>
                  <select name="id_buku" class="form-control">
                    <option value="">--Pilih Buku--</option>
                    <?php foreach ($buku as $bk) : ?>
                      <option value="<?php echo $bk->id_buku ?>"><?php echo $bk->title ?></option>
                    <?php endforeach; ?>
                  </select>
          </div>       

            <div class="form-grup">
            <label>Tanggal Pinjam</label>
            <input type="text" id="tgl_pinjam" name="tgl_pinjam" class="form-control" value="<?php echo $tgl_pinjam; ?>" readonly>
            </div>

            <div class="form-grup">
            <label>Tanggal Kembali</label>
            <input type="text" id="tgl_kembali" name="tgl_kembali" class="form-control" value="<?php echo $tgl_kembali; ?>" readonly>
            </div>

          <div class="form-grup">
            <label>Status</label>
            <select class="form-control" name="status">
            <option>--</option>
            <option>Dikembalikan</option>
            <option>Dipinjam</option>  
            </select>
           </div>

      <br>
      <button type="submit" class="btn btn-info btn">Simpan</button>
       <?php echo anchor('user/dashboard' , '<div class="btn btn_sm btn-danger">Kembali</div>')?>
    </form>
</div>
