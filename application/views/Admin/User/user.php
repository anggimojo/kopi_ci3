<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Admin</h1>
        <?php
        if ($this->session->userdata('success')) {
        ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="alert-icon">
                    <i class="far fa-fw fa-bell"></i>
                </div>
                <div class="alert-message">
                    <strong>Hello there!</strong> <?= $this->session->userdata('success') ?>
                </div>
            </div>
        <?php
        }
        ?>


        <div class="row">
            <div class="col-6 col-xl-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informasi Admin</h5>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Admin</th>
                                <th>Alamat</th>
                                <th>Akun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($user as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nama_admin ?><br><?= $value->no_hp ?></td>
                                    <td><?= $value->alamat ?></td>
                                    <td>Username: <?= $value->username ?><br>
                                        Password: <?= $value->password ?></td>
                                    <td class="table-action">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#edit<?= $value->id_admin ?>"><i class="align-middle" data-feather="edit-2"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $value->id_admin ?>"><i class="align-middle" data-feather="trash"></i></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-xl-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create New User</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/cuser') ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Nama Admin</label>
                                        <input type="text" value="<?= set_value('nama') ?>" name="nama" class="form-control" placeholder="Masukkan Nama User">
                                        <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" value="<?= set_value('alamat') ?>" name="alamat" class="form-control" placeholder="Masukkan Alamat User">
                                        <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">No Telepon</label>
                                        <input type="number" value="<?= set_value('no_hp') ?>" name="no_hp" class="form-control" placeholder="Masukkan No Telepon">
                                        <?= form_error('no_hp', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Level User</label>
                                        <select class="form-control" name="level">
                                            <option value="">---Pilih Level User---</option>
                                            <option value="1" <?php if (set_value('level') == '1') {
                                                                    echo 'selected';
                                                                } ?>>Admin</option>
                                            <option value="2" <?php if (set_value('level') == '2') {
                                                                    echo 'selected';
                                                                } ?>>Owner</option>
                                        </select>
                                        <?= form_error('level', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" value="<?= set_value('username') ?>" name="username" class="form-control" placeholder="Masukkan Username">
                                        <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="text" name="password" value="<?= set_value('password') ?>" class="form-control" placeholder="Masukkan Password">
                                        <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
foreach ($user as $key => $value) {
?>

    <div class="modal fade" id="edit<?= $value->id_admin ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('admin/cuser/update/' . $value->id_admin) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Default modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Nama User</label>
                                    <input type="text" value="<?= $value->nama_admin ?>" name="nama" class="form-control" placeholder="Masukkan Nama User" required>
                                    <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" value="<?= $value->alamat ?>" name="alamat" class="form-control" placeholder="Masukkan Alamat User" required>
                                    <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">No Telepon</label>
                                    <input type="number" value="<?= $value->no_hp ?>" name="no_hp" class="form-control" placeholder="Masukkan No Telepon" required>
                                    <?= form_error('no_hp', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Level User</label>
                                    <select class="form-control" name="level" required>
                                        <option value="">---Pilih Level User---</option>
                                        <option value="1" <?php if ($value->level_admin == '1') {
                                                                echo 'selected';
                                                            } ?>>Admin</option>
                                        <option value="2" <?php if ($value->level_admin == '2') {
                                                                echo 'selected';
                                                            } ?>>Owner</option>
                                    </select>
                                    <?= form_error('level', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" value="<?= $value->username ?>" name="username" class="form-control" placeholder="Masukkan Username" required>
                                    <?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Masukkan Password" required>
                                    <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
<?php
}
?>

<?php
foreach ($user as $key => $value) {
?>

    <div class="modal fade" id="hapus<?= $value->id_admin ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('admin/cuser/delete/' . $value->id_admin) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Default modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <p class="mb-0">Apakah Anda Yakin Untuk Menghapus?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>