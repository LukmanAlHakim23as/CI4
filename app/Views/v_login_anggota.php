<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('') ?>" class="h1">Anggota</a>
        </div>

        <?php
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <h4>Periksa Entry Form</h4>
                <ul>
                    <?php foreach ($errors as $key => $error) { ?>
                        <li><?= esc($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php 
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-danger" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
        }
        ?>

        <div class="card-body">
            <form action="<?php echo base_url('Auth/CekLoginAnggota')?>" method="POST">
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="username" id="username" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-success" href="<?= base_url('Auth') ?>">Back</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <a href="<?php echo base_url('Auth/register');?>" class="text-center mb-4">Buat Akun di sini</a>
        <!-- /.card-body -->
    </div>
</div>