<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(<?= base_url('asset/pato-master/') ?>images/bg-title-page-02.jpg);">
    <h2 class="tit6 t-center">
        Pesanan Saya
    </h2>
</section>


<!-- Reservation -->
<section class="section-reservation bg1-pattern p-t-100 p-b-113">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="t-center">
                    <span class="tit2 t-center">
                        SISI JALAN KOPI
                    </span>
                    <h3 class="tit3 t-center m-b-35 m-t-2">
                        Pesanan Saya
                    </h3>
                    <?php if ($this->session->userdata('success')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo $this->session->userdata('success');
                        echo '</div>';
                    } ?>
                </div>
            </div>
            <div class="col-lg-9 p-b-30">
                <h2 class="mb-3">Pesanan Take In</h2>
                <table class="view_detail table table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Transaksi</th>
                        <th class="text-center">Atas Nama</th>
                        <th class="text-center">Pembayaran</th>
                        <th class="text-center">View Detail Pesanan</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pesanan as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <p>Id Transaksi : <strong><?= $value->id_transaksi ?></strong></p>
                                    <p>Tgl Transaksi : <?= $value->tgl_transaksi ?></p>
                                    <?php
                                    if ($value->status_order == '0') {
                                        echo '<span class="badge badge-danger">Belum Bayar</span>';
                                    }
                                    if ($value->status_order == '1') {
                                        echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                    }
                                    if ($value->status_order == '2') {
                                        echo '<span class="badge badge-info">Pesanan Diproses</span>';
                                    }
                                    if ($value->status_order == '3') {
                                        echo ' <span class="badge badge-primary">Pesanan Dikirim</span>';
                                    }
                                    if ($value->status_order == '4') {
                                        echo '<span class="badge badge-success">Pesanan Selesai</span>';
                                    }
                                    ?>
                                    <br>
                                </td>
                                <td>
                                    <p><?= $value->nama_pelanggan ?></p>
                                    <p>No. Hp : <span class="badge badge-warning"> <?= $value->no_hp ?></span></p>
                                </td>
                                <td>
                                    <h4>Rp. <?= number_format($value->total_bayar, 0)  ?></h4><br>


                                    <?php if ($value->status_order == '0') {
                                        if ($value->pembayaran != '1') {
                                    ?>
                                            Pembayaran*
                                            <?php echo form_open_multipart('pelanggan/cpesanansaya/bayar/' . $value->id_transaksi); ?>
                                            <input type="file" name="bayar" class="form-control mb-2">
                                            <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">Upload</button>
                                            </form>
                                        <?php
                                        } ?>

                                    <?php } ?>


                                </td>
                                <td class="text-center"><button data-id="<?= $value->id_transaksi ?>" class="btn_detail btn btn-default"><i class="fa fa-bars"></i></button></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>

                <h2 class="mb-3">Pesanan Delivery</h2>
                <table class="view_detail table table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Transaksi</th>
                        <th class="text-center">Atas Nama</th>
                        <th class="text-center">Pembayaran</th>
                        <th class="text-center">View Detail Pesanan</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pesanan_deliv as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <p>Id Transaksi : <strong><?= $value->id_transaksi ?></strong></p>
                                    <p>Tgl Transaksi : <?= $value->tgl_transaksi ?></p>
                                    <p>Pengiriman : RT. <?= $value->rt ?> RW. <?= $value->rw ?> Alamat : <?= $value->alamat ?> Kota. <?= $value->kota ?></p>
                                    <?php
                                    if ($value->status_order == '0') {
                                        echo '<span class="badge badge-danger">Belum Bayar</span>';
                                    }
                                    if ($value->status_order == '1') {
                                        echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                    }
                                    if ($value->status_order == '2') {
                                        echo '<span class="badge badge-info">Pesanan Diproses</span>';
                                    }
                                    if ($value->status_order == '3') {
                                        echo ' <span class="badge badge-primary">Pesanan Dikirim</span>';
                                    }
                                    if ($value->status_order == '4') {
                                        echo '<span class="badge badge-success">Pesanan Selesai</span>';
                                    }
                                    ?>
                                    <br>
                                </td>
                                <td>
                                    <p><?= $value->nama_pelanggan ?></p>
                                    <p>No. Hp : <span class="badge badge-warning"> <?= $value->no_hp ?></span></p>
                                </td>
                                <td>
                                    <h4>Rp. <?= number_format($value->total_bayar + $value->ongkir, 0)  ?></h4><br>


                                    <?php if ($value->status_order == '0') {
                                        if ($value->pembayaran != '1') {
                                    ?>
                                            Pembayaran*
                                            <?php echo form_open_multipart('pelanggan/cpesanansaya/bayar/' . $value->id_transaksi); ?>
                                            <input type="file" name="bayar" class="form-control mb-2">
                                            <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">Upload</button>
                                            </form>
                                        <?php
                                        } ?>

                                    <?php } ?>
                                    <?php if ($value->status_order == '3') {
                                    ?>
                                        <a href="<?= base_url('pelanggan/cPesananSaya/pesanan_selesai/' . $value->id_transaksi) ?>" class="btn3 flex-c-m size13 txt11 trans-0-4">Pesanan Diterima</a>
                                    <?php
                                    } ?>
                                </td>
                                <td class="text-center"><button data-id="<?= $value->id_transaksi ?>" class="btn_detail btn btn-default"><i class="fa fa-bars"></i></button></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="detail_pesanan col-lg-3" style="display: none;">
                <h4>Detail Pesanan</h4>
                <table class=" table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Qty</th>
                            <th>Harga </th>
                        </tr>
                    </thead>
                    <tbody id="detail">

                    </tbody>
                </table>
                <button id="hide" class="btn btn-danger">Kembali</button>
            </div>
        </div>

        <div class="info-reservation flex-w p-t-80">
            <div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
                <h4 class="txt5 m-b-18">
                    Reserve by Phone
                </h4>

                <p class="size25">
                    Donec quis euismod purus. Donec feugiat ligula rhoncus, varius nisl sed, tincidunt lectus.
                    <span class="txt25">Nulla vulputate</span>
                    , lectus vel volutpat efficitur, orci
                    <span class="txt25">lacus sodales</span>
                    sem, sit amet quam:
                    <span class="txt24">(001) 345 6889</span>
                </p>
            </div>

            <div class="size24 w-full-md p-t-40">
                <h4 class="txt5 m-b-18">
                    For Event Booking
                </h4>

                <p class="size26">
                    Donec feugiat ligula rhoncus:
                    <span class="txt24">(001) 345 6889</span>
                    , varius nisl sed, tinci-dunt lectus sodales sem.
                </p>
            </div>

        </div>
    </div>
</section>