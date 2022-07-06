<div class="container-fluid">
	<div class="card">
		<h5 class="card-header">Detail Peminjaman</h5>
		<div class="card-body">

			<?php foreach($peminjaman as $pinjam) :?>
			<div class="row">

				<div class="col-md-8">
					<table class="table">
						<tr>
							<td>ID Peminjaman</td>
							<td><strong><?php echo $pinjam->id_pinjam ?></strong></td>
						</tr>
						<tr>
							<td>Tanggal Pinjam</td>
							<td><strong><?php echo $pinjam->tanggal_pinjam ?></strong></td>
						</tr>
						<tr>
							<td>ID Pegawai</td>
							<td><strong><?php echo $pinjam->id_pegawai ?></strong></td>
						</tr>
						<tr>
							<td>ID Buku</td>
							<td><strong><?php echo $pinjam->id_buku ?></strong></td>
						</tr>
						<tr>
							<td>Tanggal Kembali</td>
							<td><strong><?php echo $pinjam->tanggal_kembali ?></strong></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><strong><?php echo $pinjam->is_kembali ?></strong></td>
						</tr>

					</table>
					<td><?php echo anchor('admin/dashboard_admin/','<div class="btn btn-success">Halaman Utama</div>') ?></td>
					<?php echo anchor('admin/data_peminjaman' , '<div class="btn btn_sm btn-danger">Kembali</div>') ?>
				</div>

			</div>

		<?php endforeach; ?>
		</div>
	</div> 
</div>
