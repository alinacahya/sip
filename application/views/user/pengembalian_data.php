<div class="container-fluid">
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
    <th>Total Denda</th>
    <th colspan="1">Aksi</th>
  </tr>
  

  <?php 
  $no=1;
  foreach ($laporan as $pjm) : ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $pjm->id_user ?></td>
      <td>BK-00<?php echo $pjm->id_buku ?></td>
      <td><?php echo $pjm->tgl_pinjam ?></td>
      <td><?php echo $pjm->tgl_kembali ?></td>
      <td><?php echo $pjm->pengembalian ?></td>
      <td><?php echo $pjm->status ?></td>
      <td><?php echo $pjm->total_denda ?></td>
      <td><?php echo anchor('user/data_pinjam/update_pinjam/' .$pjm->id_laporan, '<div class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Kembalikan Buku</div>') ?></td>
    </tr>
  <?php endforeach; ?>

  </table>
   <?php echo anchor('user/pengembalian' , '<div class="btn btn_sm btn-danger">Kembali</div>')?>
</div>
 </div>