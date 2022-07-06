<div class="container-fluid">
	<div class="card">
		<h5 class="card-header">Detail User</h5>
		<div class="card-body">

			<?php foreach($detail as $dt) :?>
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo base_url(). '/uploads/'. $dt->foto ?>" class="card-img-top">
				</div>

				<div class="col-md-8">
					<table class="table">

						<tr>
							<td>ID User</td>
							<td><strong><?php echo $dt->id_user ?></strong></td>
						</tr>
						<tr>
							<td>NRP</td>
							<td><strong><?php echo $dt->nrp ?></strong></td>
						</tr>
						<tr>
							<td>Nama User</td>
							<td><strong><?php echo $dt->nama ?></strong></td>
						</tr>
						<tr>
							<td>TTL</td>
							<td><strong><?php echo $dt->tempat_lahir ?><?php echo $dt->tanggal_lahir ?></strong></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><strong><?php echo $dt->username ?></strong></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><strong><?php echo $dt->password ?></strong></td>
						</tr>
						<tr>
							<td>Level</td>
							<td><?php 
                                 if($dt->level  == "1"){
                                 	echo "Admin";
                                 }elseif($dt->level  == "2"){
                                    echo "Anggota";
                                 }else{
                                    echo "Kepala";
                                        }


                                    ?> 
                           </td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td><strong><?php echo $dt->jk ?></strong></td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td><strong><?php echo $dt->telp ?></strong></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><strong><?php echo $dt->alamat ?></strong></td>
						</tr>


					</table>
					<td><?php echo anchor('admin/data_user/','<div class="btn btn-success">Kembali</div>') ?></td>
				</div>

			</div>

		<?php endforeach; ?>
		</div>
	</div> 
</div>
