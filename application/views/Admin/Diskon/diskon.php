<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Promo Produk</h1>
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
            <div class="col-6 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informasi Promo</h5>
                        <h6 class="card-subtitle text-muted">Using the most basic table markup, here’s how .table-based tables look in Bootstrap.</h6>
                    </div>
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Nama Promo</th>
                                <th>Promo</th>
                                <th>Tanggal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($promo as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $value->nama_produk ?></td>
                                    <td><?= $value->nama_promo ?> </td>
                                    <td><?= $value->besar ?> %</td>
                                    <td><?= $value->tgl_selesai ?></td>
                                    <td class="table-action">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $value->id_promo ?>"><i class="align-middle" data-feather="edit-2"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $value->id_promo ?>"><i class=" align-middle" data-feather="trash"></i></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create New Promo Produk</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/cdiskon') ?>" method="POST">
                            <div class="form-group">
                                <label class="form-label">Produk</label>
                                <select class="form-control" name="produk">
                                    <option value="">---Pilih Produk---</option>
                                    <?php
                                    foreach ($produk as $key => $value) {
                                    ?>
                                        <option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nama Promo</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Diskon ">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Besar Promo</label>
                                <input type="number" name="besar" class="form-control" placeholder="Masukkan Besar Diskon">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="text" value="<?= date('Y-m-d') ?>" name="tgl_mulai" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Selesai</label>
                                <input type="text" name="tgl_selesai" class="datepicker form-control" placeholder="Masukkan Tanggal Selesai">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
foreach ($promo as $key => $items) {
?>
    <div class="modal fade" id="edit<?= $items->id_promo ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Default modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/cdiskon/update/' . $items->id_produk) ?>" method="POST">
                    <div class="modal-body m-3">
                        <div class="form-group">
                            <label class="form-label">Produk</label>
                            <select class="form-control" name="produk" disabled>
                                <option value="">---Pilih Produk---</option>
                                <?php
                                foreach ($produk as $key => $value) {
                                ?>
                                    <option value="<?= $value->id_produk ?>" <?php if ($value->id_produk == $items->id_produk) {
                                                                                    echo 'selected';
                                                                                } ?>><?= $value->nama_produk ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Promo</label>
                            <input type="text" value="<?= $items->nama_promo ?>" name="nama" class="form-control" placeholder="Masukkan Nama Diskon ">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Besar Promo</label>
                            <input type="number" value="<?= $items->besar ?>" name="besar" class="form-control" placeholder="Masukkan Besar Diskon">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="text" value="<?= date('D-M-Y') ?>" name="tgl_mulai" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="text" value="<?= $items->tgl_selesai ?>" name="tgl_selesai" class="datepicker form-control" placeholder="Masukkan Tanggal Selesai">
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
foreach ($promo as $key => $value) {
?>
    <div class="modal fade" id="hapus<?= $value->id_promo ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('admin/cdiskon/delete/' . $value->id_produk) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Diskon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                        <p class="mb-0">Apakah Anda Yakin Menghapus Data Diskon?</p>
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