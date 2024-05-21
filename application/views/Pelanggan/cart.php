<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(<?= base_url('asset/pato-master/') ?>images/bg-title-page-02.jpg);">
    <h2 class="tit6 t-center">
        CART
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
                        Cart
                    </h3>
                </div>
            </div>
            <div class="col-lg-9 p-b-30">

                <?php echo form_open('pelanggan/chome/update_cart'); ?>
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $i = 1;
                        foreach ($this->cart->contents() as $key => $value) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img style="width: 150px;" class="rounded-circle" src="<?= base_url('asset/foto-produk/' . $value['picture']) ?>"></td>
                                <td><?= $value['name'] ?></td>
                                <td>
                                    <input name="<?= $i . '[qty]' ?>" min="1" max="<?= $value['stok'] ?>" type="number" value="<?= $value['qty'] ?>">
                                    <button type="submit" class="btn btn-success">+</button>
                                </td>
                                <td>Rp. <?= number_format($value['price'], 0)  ?></td>
                                <td>Rp. <?= number_format($value['price'] * $value["qty"])  ?></td>
                                <td><a href="<?= base_url('pelanggan/chome/delete/' . $value['rowid']) ?>">Hapus</a></td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <?php echo form_close(); ?>
            </div>
            <div class="col-lg-3">

                <table class="table table-striped">
                    <tr>
                        <th>Cart</th>
                        <th>&nbsp;</th>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>
                            <h5>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h5>
                        </td>
                    </tr>

                </table>
                <a href="<?= base_url('pelanggan/chome/pengiriman') ?>" class="btn btn-warning">Checkout</a>
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