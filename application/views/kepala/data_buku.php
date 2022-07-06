<div class="container-fluid">
  <div class="table-responsive">
  <table class="table table-bordered table-striped">
  <tr>
    <th>No</th>
    <th>Sampul</th>
    <th>ISBN</th>
    <th>Title</th>
    <th>Penerbit</th>
    <th>Pengarang</th>
    <th>Tahun Buku</th>
    <th>Stok Buku</th>
    <th>Tanggal Masuk</th>
    <th>Kode Rak</th>
    <th colspan="3">Aksi</th>
  </tr>
  

  <?php 
  $no=1;
  foreach ($buku as $bk) : ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td>
       <img width="60px" src="<?php echo base_url().'uploads/'.$bk->sampul ?>">
      </td>
      <td><?php echo $bk->isbn ?></td>
      <td><?php echo $bk->title ?></td>
      <td><?php echo $bk->penerbit ?></td>
      <td><?php echo $bk->pengarang ?></td>
      <td><?php echo $bk->thn_buku ?></td>
      <td><?php echo $bk->jml ?></td>
      <td><?php echo $bk->tgl_masuk ?></td>
      <td><?php echo $bk->kode_rak ?></td>
      <td><?php echo anchor('kepala/data_buku/detail_buku/' .$bk->id_buku, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>
      <tr>
  <?php endforeach; ?>

  </table>
  </div>
</div>
