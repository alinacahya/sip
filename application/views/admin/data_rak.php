<div class="container-fluid">
	
	<button class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#tambah_rak"><i class="fas fa-plus fa-sm "></i> Tambah Data</button>

	<table class="table table-bordered">
	<tr>
		<th width="20px">No</th>
		<th>Kode Rak</th>
		<th>Nama Rak</th>
		<th colspan="2">Aksi</th>
	</tr>
	

	<?php 
	$no=1;
	foreach ($rak as $rk) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td>RAK-<?php echo $rk->kode_rak ?></td>
			<td><?php echo $rk->nama_rak ?></td>
			<td><?php echo anchor('admin/data_rak/update_rak/' .$rk->id_rak, '<div class="btn btn-info btn-sm"><i class="fas fa-edit"></i></div>') ?>
			<?php echo anchor('admin/data_rak/delete_rak/' .$rk->id_rak, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
		</tr>
	<?php endforeach; ?>

	</table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_rak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Rak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_rak/tambah_rak_aksi' ; ?>" method="post" enctype="multipart/form-data">
        	
        	<div class="form-grup">
        		<label>Kode Rak</label>
        		<input type="text" name="kode_rak" class="form-control">
        	</div>
        	<div class="form-grup">
        		<label>Nama Rak</label>
        		<input type="text" name="nama_rak" class="form-control">
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