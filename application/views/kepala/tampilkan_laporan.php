<div class="container-fluid">
    <section class="section">
        <div class="section-header">
            <h2>Laporan Perpustakaan Berdasarkan Bulan</h2>
         </div>
     </section>

     <form method="POST" action="<?php echo base_url('kepala/laporan')?>">
     	<div class="form-group">
     		<label>Dari Tanggal</label>
     		<input type="date" name="dari" class="form-control">
     		<?php echo form_error('dari', '<span class="text-small text-danger">','</span>') ?>
     	</div>

     	<div class="form-group">
     		<label>Sampai Tanggal</label>
     		<input type="date" name="sampai" class="form-control">
     		<?php echo form_error('sampai', '<span class="text-small text-danger">','</span>') ?>
     	</div>

     	<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>Tampilkan Data</button>
     </form><hr>

     <div class="btn-group">
     	<a class="btn btn-sm btn-warning" target="_blank" href="<?php echo base_url().'kepala/laporan/print_laporan/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><i class="fas fa-print"></i> Print</a>
     </div>


			<div class="table-responsive">
			<table class="table table-bordered table-striped">

				<tr>
					<th>No</th>
					<th>NRP</th>
					<th>Nama</th>
			        <th>Tanggal Peminjaman</th>
			        <th>Judul Buku</th>
			        <th>Tanggal Pengembalian</th>
			        <th>Status</th>
			        <th>Denda</th>			        			        
			        <th>Kode Rak</th>
				</tr>
				
				<?php $no=1;
				foreach($laporan as $tr) : ?>
					<tr>
						<td><?php echo $no++?></td>
						<td><?php echo $tr->nrp ?></td>
						<td><?php echo $tr->nama ?></td>
						<td><?php echo date('d/m/Y', strtotime($tr->tgl_pinjam)); ?></td>
						<td><?php echo $tr->title ?></td>
						<td>
							<?php
								if($tr->pengembalian == "0000-00-00")
								{
									echo "-";
								}else{
									echo date('d/m/Y', strtotime($tr->pengembalian));
								}
							?>
						</td>
						<td><?php echo $tr->status ?></td>
						<td>Rp. <?php echo $tr->total_denda ?></td>
						<td><?php echo $tr->kode_rak ?></td>
					</tr>
				<?php endforeach;  ?>
			</table>
		</div>
	</div>