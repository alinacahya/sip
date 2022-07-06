<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>  Edit Data user</h3>

	<?php foreach ($user as $usr) : ?>

		<form method="post" action=" <?php echo base_url(). 'user/detail_user/update_user_aksi'?>" enctype="multipart/form-data">

			<div class="for-group">
				<label>ID User</label>
				<input type="text" name="id_user" class="form-control" value="<?php echo $usr->id_user ?>" readonly>
			</div>

			<div class="for-group">
				<label>NRP</label>
				<input type="text" name="nrp" class="form-control" value="<?php echo $usr->nrp ?>">
			</div>

			<div class="for-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $usr->username ?>">
			</div>

			<div class="form-grup">
        		<label>Password</label>
			<input type="text" name="password" class="form-control" value="<?php echo $usr->password ?>">
			</div>

			<div class="form-grup">
         	<label>Level</label>
         	  <input type="hidden" name="id_user" class="form-control" value="<?php echo $usr->id_user ?>">
         	  <select name="level" class="form-control">
                <option <?php if($usr->level == "1") {echo "selected='selected'";} 
                echo $usr->level; ?> value="1">Admin</option>
                <option <?php if($usr->level == "2") {echo "selected='selected'";} 
                echo $usr->level; ?> value="2">Anggota</option>
                <option <?php if($usr->level == "3") {echo "selected='selected'";} 
                echo $usr->level; ?> value="3">Kepala</option>
         	  </select>
         		<?php echo form_error('level','<div class="text-small text-danger">','</div>') ?>
         	</div>

            <div class="for-group">
				<label>Nama User</label>
				<input type="text" name="nama" class="form-control" value="<?php echo $usr->nama ?>">
			</div>

			<div class="for-group">
				<label>Tempat Lahir</label>
				<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $usr->tempat_lahir ?>">
			</div>

			<div class="for-group">
				<label>Tanggal Lahir</label>
				<input type="hidden" name="id_user" class="form-control" value="<?php echo $usr->id_user ?>">
				<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $usr->tanggal_lahir ?>">
			</div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <br/>
                  <input type="hidden" name="id_user" class="form-control" value="<?php echo $usr->id_user ?>">
                  <input type="radio" name="jk" <?php if($usr->jk == 'Laki-Laki'){ echo 'checked';}?> value="Laki-Laki" required="required"> Laki-Laki
                   <input type="radio" name="jk" <?php if($usr->jk == 'Perempuan'){ echo 'checked';}?> value="Perempuan" required="required"> Perempuan
            </div>

            <div class="form-grup">
        		<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?php echo $usr->alamat ?>">
			</div>

            <div class="form-grup">
        		<label>Telepon</label>
			<input type="text" name="telp" class="form-control" value="<?php echo $usr->telp ?>">
			</div>

			<div class="form-group">
         	<label>Pas Foto</label>
         	<input type="file" name="foto" class="form-control" value="<?php echo $usr->foto ?>">
         	</div>

			<br>
			<button type="submit" class="btn btn-info btn">Simpan</button>
			<?php echo anchor('user/detail_user' , '<div class="btn btn_sm btn-danger">Kembali</div>')?>
		</form>

	<?php endforeach ; ?>
</div>