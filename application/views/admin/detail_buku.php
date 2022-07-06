<div class="container-fluid">
	<div class="card">
		<h5 class="card-header">Detail Buku</h5>
		<div class="card-body">

			<?php foreach($detail as $bk) :?>
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo base_url(). '/uploads/'. $bk->sampul ?>" class="card-img-top">
				</div>

				<div class="col-md-8">
					<table class="table">

						<tr>
							<td>ID Buku</td>
							<td><strong><?php echo $bk->id_buku ?></strong></td>
						</tr>
						<tr>
							<td>Kode Buku</td>
							<td><strong>BK-0<?php echo $bk->kode_buku?></strong></td>
						</tr>
						<tr>
							<td>Kode Rak</td>
							<td><strong>Rak-0<?php echo $bk->kode_rak ?></strong></td>
						</tr>
						<tr>
							<td>Sampul</td>
							<td><strong><?php echo $bk->sampul ?></strong></td>
						</tr>
						<tr>
							<td>ISBN</td>
							<td><strong><?php echo $bk->isbn ?></strong></td>
						</tr>
						<tr>
							<td>Title</td>
							<td><strong><?php echo $bk->title ?></strong></td>
						</tr>
						<tr>
							<td>Penerbit</td>
							<td><strong><?php echo $bk->penerbit ?></strong></td>
						</tr>
						<tr>
							<td>Pengarang</td>
							<td><strong><?php echo $bk->pengarang ?></strong></td>
						</tr>
						<tr>
							<td>Tahun Buku</td>
							<td><strong><?php echo $bk->thn_buku ?></strong></td>
						</tr>
						<tr>
							<td>Jumlah</td>
							<td><strong><?php echo $bk->jml ?></strong></td>
						</tr>
						<tr>
							<td>Tanggal Masuk</td>
							<td><strong><?php echo $bk->tgl_masuk ?></strong></td>
						</tr>


					</table>
					<td><?php echo anchor('admin/dashboard/','<div class="btn btn-success">Halaman Utama</div>') ?></td>
					<?php echo anchor('admin/data_buku' , '<div class="btn btn_sm btn-danger">Kembali</div>') ?>
				</div>

			</div>

		<?php endforeach; ?>
		</div>
	</div> 
</div>