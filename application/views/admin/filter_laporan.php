<div class="container-fluid">
    <section class="section">
        <div class="section-header">
            <h2>Filter Laporan Perpustakaan</h2>
         </div>
     </section>

     <form method="POST" action="<?php echo base_url('admin/laporan')?>">
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
     </form>
</div>