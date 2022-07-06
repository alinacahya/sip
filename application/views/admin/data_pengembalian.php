<div class="container-fluid">
	
	<button class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm "></i> Tambah Data</button>
  <a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/data_pengembalian/print_pengembalian') ?>"><i class="fas fa-print fa-sm "></i> Print</a>
 <div class="table-responsive">
	<table class="table table-bordered">
	<tr>
		<th>No</th>
    <th>ID User</th>
    <th>ID Buku</th>
    <th>Tanggal pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Tanggal Pengembalian</th>
    <th>Status</th>
    <th>Denda</th>
    <th>Total Denda</th>
    <th colspan="3">Aksi</th>
	</tr>
	

	<?php 
  $no=1;
  foreach ($laporan as $pjm) : ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $pjm->id_user ?></td>
      <td><?php echo $pjm->id_buku ?></td>
      <td><?php echo $pjm->tgl_pinjam ?></td>
      <td><?php echo $pjm->tgl_kembali ?></td>
      <td><?php echo $pjm->pengembalian ?></td>
      <td><?php echo $pjm->status ?></td>
      <td>Rp. <?php echo $pjm->denda ?></td>
      <td>Rp. <?php echo $pjm->total_denda ?></td>
      <td><?php echo anchor('admin/data_pengembalian/detail_pengembalian/' .$pjm->id_laporan, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>
			<td><?php echo anchor('admin/data_pengembalian/update_pengembalian/' .$pjm->id_laporan, '<div class="btn btn-info btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
			<td><?php echo anchor('admin/data_pengembalian/delete_pengembalian/' .$pjm->id_laporan, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
		</tr>
	<?php endforeach; ?>

	</table>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Data Peminjaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_pengembalian/tambah_pengembalian_aksi' ; ?>" method="post" enctype="multipart/form-data">
        	
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
            <label>Tanggal Pengembalian</label>
            <input type="date" id="pengembalian" name="pengembalian" class="form-control">
            </div>

          <div class="form-grup">
            <label>Status</label>
            <select class="form-control" name="status">
            <option>--</option>
            <option>Dikembalikan</option>
            <option>Dipinjam</option>  
            </select>
           </div>

          <div class="form-grup">
            <label>Denda</label>
            <input type="text" name="denda" class="form-control" >
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>