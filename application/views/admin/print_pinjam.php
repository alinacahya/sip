<!DOCTYPE html>
<html>
<head>
	<title>SIP</title>
	<style>
		.line-title{
			border: 0;
			border-style: unset;
			border-top: 1px solid #000;
		}
	</style>
</head>
<body>

	<img src="<?php echo base_url()?>assets/img/logo.png" style="position: absolute; width: 60px; height: auto;">

	<table style="width: 100%">
		<tr>
			<td align="center">
				<span style="line-height: 1.6; font-weight: bold;">
					SISTEM INFORMASI PERPUSTAKAAN
					<br>KEJAKSAAN NEGERI CILACAP
				</span>
			</td>
		</tr>
	</table>


		<hr class="line-title">
		<p align="center">
			<b>Laporan Peminjaman Buku</b><br>
			<b>Tahun <?php echo date('M-Y')?></b>
		</p>
		<table class="table table-bordered table-striped">
		<tr>
		<th>No</th>
   	    <th>ID User</th>
   	    <th>Nama User</th>
        <th>ID Buku</th>
        <th>Judul Buku</th>
		<th>Tanggal pinjam</th>
		<th>Tanggal Kembali</th>
		<th>Kode Rak</th>
	</tr>
	

	<?php 
	$no=1;
	foreach ($laporan as $pjm) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
      		<td><?php echo $pjm->id_user ?></td>
      		<td><?php echo $pjm->nama ?></td>
			<td><?php echo $pjm->id_buku ?></td>
			<td><?php echo $pjm->title ?></td>
			<td><?php echo $pjm->tgl_pinjam ?></td>
			<td><?php echo $pjm->tgl_kembali ?></td>
			<td><?php echo $pjm->kode_rak ?></td>
	<?php endforeach; ?>

	</table>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>