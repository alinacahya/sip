<div class="container-fluid">

         <button class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#tambah_user"><i class="fas fa-plus fa-sm "></i> Tambah Data User</button>

        <?php echo $this->session->flashdata('pesan')?>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr>
                <th>No</th>
                <th>NRP</th>
                <th>Pas Foto</th>
                <th>Nama Pegawai</th>
                <th>Username</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Level</th>
                <th colspan="3">Aksi</th>
            </tr>

            <?php 
                     $no=1;
                     foreach ($user as $usr) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $usr->nrp ?></td>
                      <td>
                       <img width="60px" src="<?php echo base_url().'uploads/'.$usr->foto ?>">
                      </td>
                      <td><?php echo $usr->nama ?></td>
                      <td><?php echo $usr->username ?></td>
                      <td><?php echo $usr->telp ?></td>
                      <td><?php echo $usr->alamat ?></td>
                      <td><?php
                                if ($usr->level == "1"){
                                    echo "Admin";
                                }elseif ($usr->level == "2"){
                                    echo "Anggota";
                                }elseif ($usr->level == "3"){
                                    echo "Kepala";
                                }else{
                                    echo "0";
                                }
                      ?></td>
                      <td><?php echo anchor('admin/data_user/detail_user/' .$usr->id_user, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?>
                          <?php echo anchor('admin/data_user/update_user/' .$usr->id_user, '<div class="btn btn-info btn-sm"><i class="fas fa-edit"></i></div>') ?>
                          <?php echo anchor('admin/data_user/delete_user/' .$usr->id_user, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
                      </td>
                    </tr>
                 <?php endforeach; ?>
        </table>
    </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_user/tambah_user_aksi' ; ?>" method="post" enctype="multipart/form-data">
          <div class="form-grup">
            <label>NRP</label>
            <input type="text" name="nrp" class="form-control">
            <?php echo form_error('nrp', '<span class="text-small text-danger">','</span>') ?>
          </div>
          <div class="form-grup">
            <label>Nama User</label>
            <input type="text" name="nama" class="form-control">
            <?php echo form_error('tempat_lahir', '<span class="text-small text-danger">','</span>') ?>
          </div>
          <div class="form-group">
              <label>Level</label>
                <select name="level" class="form-control" required="required">
                <option value="">--</option>
                <option value="1">Admin</option>
                <option value="2">Anggota</option>
                <option value="3">Kepala</option>
                </select>
                <?php echo form_error('level','<div class="text-small text-danger">','</div>') ?>
           </div>
          <div class="form-grup">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control">
            <?php echo form_error('nama', '<span class="text-small text-danger">','</span>') ?>
          </div>
          <div class="form-grup">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
            <?php echo form_error('tanggal_lahir', '<span class="text-small text-danger">','</span>') ?>
          </div>
          <div class="form-grup">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
            <?php echo form_error('username', '<span class="text-small text-danger">','</span>') ?>
          </div>
          <div class="form-grup">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?php echo form_error('password', '<span class="text-small text-danger">','</span>') ?>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <label>Jenis Kelamin</label>
                <br/>
                <input type="radio" name="jk" value="Laki-Laki" required="required"> Laki-Laki
                <input type="radio" name="jk" value="Perempuan" required="required"> Perempuan
                <?php echo form_error('jk', '<span class="text-small text-danger">','</span>') ?>
          </div>
          <div class="form-grup">
            <label>Telepon</label>
            <input type="text" name="telp" class="form-control">
            <?php echo form_error('telp', '<span class="text-small text-danger">','</span>') ?>
          </div>
          <div class="form-grup">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
            <?php echo form_error('alamat', '<span class="text-small text-danger">','</span>') ?>
          </div>
          <div class="form-grup">
            <label>Pas Foto</label>
            <input type="file" name="foto" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save changes</button>
      </div>

      </form>
    </div>
  </div>
</div>