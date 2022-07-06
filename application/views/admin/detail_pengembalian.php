<div class="container-fluid">
	<div class="card">
		<h5 class="card-header">Detail Pengembalian</h5>
		<div class="card-body">

			<?php foreach($detail as $dnd) :?>
			<div class="row">

				<div class="col-md-8">
					<table class="table">
						<tr>
							<td>ID Laporan</td>
							<td><strong><?php echo $dnd->id_laporan ?></strong></td>
						</tr>
						<tr>
							<td>ID User</td>
							<td><strong><?php echo $dnd->id_user ?></strong></td>
						</tr>
						<tr>
							<td>ID Buku</td>
							<td><strong><?php echo $dnd->id_buku ?></strong></td>
						</tr>
						<tr>
							<td>Tanggal Pinjam</td>
							<td><strong><?php echo $dnd->tgl_pinjam ?></strong></td>
						</tr>
						<tr>
							<td>Tanggal Kembali</td>
							<td><strong><?php echo $dnd->tgl_kembali ?></strong></td>
						</tr>
						<tr>
							<td>Tanggal Pengembalian</td>
							<td><strong><?php echo $dnd->pengembalian ?></strong></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><strong><?php echo $dnd->status ?></strong></td>
						</tr>
						<tr>
							<td>Denda</td>
							<td><strong><?php echo $dnd->denda ?></strong></td>
						</tr>
						

					</table>
					<td><?php echo anchor('admin/dashboard','<div class="btn btn-success">Halaman Utama</div>') ?></td>
					<?php echo anchor('admin/data_pengembalian/' , '<div class="btn btn_sm btn-danger">Kembali</div>') ?>
				</div>

			</div>

		<?php endforeach; ?>
		</div>
	</div> 
</div>
