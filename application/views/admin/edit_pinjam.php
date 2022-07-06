<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>  Edit Data Pinjam</h3>

	<?php foreach ($laporan as $pjm) : ?>

		<form method="post" action="<?php echo base_url(). 'admin/data_pinjam/update_pinjam_aksi'?>" enctype="multipart/form-data">
			<div class="form-group">
            <label>ID Laporan</label>
            <input type="text" name="id_laporan" class="form-control" value="<?php echo $pjm->id_laporan?>" readonly>
          	</div>

			<div class="form-grup">
            <label>ID User</label>
            <input type="text" name="id_user" class="form-control" value="<?php echo $pjm->id_user?>">
          	</div>

            <div class="form-grup">
            <label>ID Buku</label>
            <input type="text" name="id_buku" class="form-control" value="<?php echo $pjm->id_buku?>">
          	</div>

            <div class="form-grup">
                <label>Tanggal Pinjam</label>
                <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo $pjm->tgl_pinjam?>" readonly>
            </div>

            <div class="form-grup">
                <label>Tanggal Kembali</label>
                <input type="text" name="tgl_kembali" class="form-control" value="<?php echo $pjm->tgl_kembali?>" readonly>
            </div>

        	<div class="form-grup">
            <label>Status</label>
            <input type="hidden" name="id_laporan" class="form-control" value="<?php echo $pjm->id_laporan?>">
            <select class="form-control" name="status" value="<?php echo $pjm->status?>">
            <option>Dikembalikan</option>
            <option>Dipinjam</option>  
            </select>
           </div>

			<br>
			<button type="submit" class="btn btn-info btn">Simpan</button>
			<?php echo anchor('admin/data_pinjam' , '<div class="btn btn_sm btn-danger">Kembali</div>')?>
		</form>

	<?php endforeach ; ?>
</div>