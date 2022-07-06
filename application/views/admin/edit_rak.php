<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>  Edit Rak Buku</h3>

	<?php foreach ($rak as $rk) : ?>

		 <form method="POST" action="<?php echo base_url('admin/data_rak/update_rak_aksi')?>"enctype="multipart/form-data">
		 <div class="form-group">
		 </div>
		 <div>
			<label>Kode Rak</label>
            <input type="hidden" name="id_rak" value="<?php echo $rk->id_rak?>">
         	<input type="text" name="kode_rak" class="form-control" value="<?php echo $rk->kode_rak?>">
         </div>

         <div class="form-group">
         	<label>Nama Rak</label>
         	<input type="text" name="nama_rak" class="form-control" value="<?php echo $rk->nama_rak ?>">
         </div>
			<br>

			<button type="submit" class="btn btn-info btn">Simpan</button>
			<?php echo anchor('admin/data_rak' , '<div class="btn btn_sm btn-danger">Kembali</div>')?>
		</form>

	<?php endforeach ; ?>
</div>