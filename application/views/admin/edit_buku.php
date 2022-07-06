<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>  Edit Data Buku</h3>

		<?php foreach ($buku as $bk) : ?>
		<form method="POST" action="<?php echo base_url('admin/data_buku/update_buku_aksi') ?>" enctype="multipart/form-data">
			<div class="form-group">
				<label>Kode Buku</label>
				<input type="text" name="kode_buku" class="form-control" value="<?php echo $bk->kode_buku ?>">
			</div>

            <div class="form-group">
			<label>Rak Buku</label>
            <input type="hidden" name="id_buku" value="<?php echo $bk->id_buku ?>">
         	  <select name="kode_rak" class="form-control">
         		<option value="<?php echo $bk->kode_rak ?>"><?php echo $bk->kode_rak ?></option>
         		<?php foreach ($rak as $rk) : ?>
         		<option value="<?php echo $rk->kode_rak ?>"><?php echo $rk->nama_rak ?></option>
         		<?php endforeach; ?>
         	  </select>
         	  <?php echo form_error('kode_type','<div class="text-small text-danger">','</div>') ?>
         	</div>


			<div class="form-group">
				<label>ISBN</label>
				<input type="text" name="isbn" class="form-control" value="<?php echo $bk->isbn ?>">
				
			</div>

			<div class="form-grup">
        		<label>Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo $bk->title ?>">
			</div>


			<div class="form-grup">
        		<label>Penerbit</label>
			<input type="text" name="penerbit" class="form-control" value="<?php echo $bk->penerbit ?>">
			</div>

			<div class="form-grup">
        		<label>Pengarang</label>
			<input type="text" name="pengarang" class="form-control" value="<?php echo $bk->pengarang ?>">
			</div>

			<div class="form-grup">
        		<label>Tahun Buku</label>
			<input type="text" name="thn_buku" class="form-control" value="<?php echo $bk->thn_buku ?>">
			</div>

			<div class="form-grup">
        		<label>Jumlah</label>
			<input type="text" name="jml" class="form-control" value="<?php echo $bk->jml ?>">
			</div>

			<div class="form-grup">
        		<label>Tanggal Masuk</label>
			<input type="date" name="tgl_masuk" class="form-control" value="<?php echo $bk->tgl_masuk ?>">
			</div>

			<div class="form-group">
				<label>Sampul</label>
				<input type="file" name="sampul" class="form-control" value="<?php echo $bk->sampul ?>">
			</div>
			<br>

			<button type="submit" class="btn btn-info btn">Simpan</button>
			<?php echo anchor('admin/data_buku' , '<div class="btn btn_sm btn-danger">Kembali</div>')?>
		</form>

	<?php endforeach ; ?>
</div>