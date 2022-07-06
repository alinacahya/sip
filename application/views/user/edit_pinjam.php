<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>  Edit Data Pinjam</h3>

	<?php foreach ($laporan as $pjm) : ?>

		<form method="post" action="<?php echo base_url(). 'user/data_pinjam/update_pinjam_aksi'?>" enctype="multipart/form-data">
			<div class="form-group">
            <label>ID Laporan</label>
            <input type="text" name="id_laporan" class="form-control" value="<?php echo $pjm->id_laporan?>" readonly>
          	</div>

			<div class="form-grup">
            <label>ID User</label>
            <input type="text" name="id_user" class="form-control" value="<?php echo $pjm->id_user?>" readonly>
          	</div>

            <div class="form-grup">
            <label>ID Buku</label>
            <input type="text" name="id_buku" class="form-control" value="<?php echo $pjm->id_buku?>" readonly>
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
                <label>Tanggal Pengembalian</label>
                <input type="date" name="pengembalian" class="form-control" value="<?php echo $pjm->pengembalian?>">
            </div>

        	<div class="form-grup">
            <label>Status</label>
            <span class="text-danger"> *) Wajib Diubah</span>
            <input type="hidden" name="id_laporan" class="form-control" value="<?php echo $pjm->id_laporan?>">
            <select class="form-control" name="status" value="<?php echo $pjm->status?>">
            <option>--</option>
            <option>Dikembalikan</option>
            <option>Dipinjam</option>  
            </select>
           </div>

        	<div class="form-grup">
            <label>Denda</label>
            <span class="text-danger"> *) Jika Tanggal Pengembalian < Tanggal Kembali isikan 0 pada Denda</span>
            <input type="text" name="denda" class="form-control" value="<?php echo $pjm->denda?>">
         

			<br>
			<button type="submit" class="btn btn-info btn">Simpan</button>
			<?php echo anchor('user/pengembalian' , '<div class="btn btn_sm btn-danger">Kembali</div>')?>
		</form>

	<?php endforeach ; ?>
</div>