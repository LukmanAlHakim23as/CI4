<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <?php if(session()->get('f_foto') == null ) : ?>
              <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto') ?>/foto.jpeg" alt="User profile picture">
            <?php else : ?>
              <img class="profile-user-img img-fluid img-circle" src="<?= base_url('foto/' . session()->get('f_foto')) ?>" alt="User profile picture">
            <?php endif ?>
                        
                    </div>

                    <h3 class="profile-username text-center"><?= $anggota->f_nama ?></h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Data <?= $judul ?></h1>
                    <div class="card-tools">
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit-<?= $anggota->f_id; ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="150px">NIS</th>
                            <th width="50px">:</th>
                            <th><?= $anggota->f_nis ?></< /th>
                        </tr>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>:</th>
                            <th><?= $anggota->f_nama ?></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <th><?= $anggota->f_alamat ?></th>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <th>:</th>
                            <th><?= $anggota->f_tanggallahir ?></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-<?= $anggota->f_id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('Profile/editProfile') ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $anggota->f_id; ?>" name="id">
                    <div class="form-group">
                        <label for="nis">Profpic</label>
                        <input type="file" class="form-control" name="file">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input value="<?= $anggota->f_nis; ?>" type="number" class="form-control" name="nis">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input value="<?= $anggota->f_nama; ?>" type="text" class="form-control" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input value="<?= $anggota->f_username; ?>" type="text" class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input value="<?= $anggota->f_password; ?>" type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input value="<?= $anggota->f_alamat; ?>" type="text" class="form-control" name="alamat">
                    </div>

                    <div class="form-group">
                        <label for="tgllahir">Tanggal Lahir</label>
                        <input value="<?= $anggota->f_tanggallahir; ?>" type="date" class="form-control" name="tgllahir">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>