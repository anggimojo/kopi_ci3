<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(<?= base_url('asset/pato-master/') ?>images/bg-title-page-02.jpg);">
    <h2 class="tit6 t-center">
        Checkout
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
                        Checkout Take In
                    </h3>
                </div>
            </div>
            <div class="col-lg-8 p-b-30">
                <form action="<?= base_url('pelanggan/chome/checkout') ?>" method="POST" class="wrap-form-reservation size22 m-l-r-auto">
                    <input type="hidden" name="total" class="pembayaran">
                    <?php $id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
                    ?>
                    <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                    <?php
                    $i = 1;
                    foreach ($this->cart->contents() as $items) {
                        echo form_hidden('qty' . $i++, $items['qty']);
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Name -->
                            <span class="txt9">
                                Atas Nama
                            </span>
                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" value="<?= $pelanggan->nama_pelanggan ?>" type="text" placeholder="Name" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Name -->
                            <span class="txt9">
                                No Telepon
                            </span>

                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" value="<?= $pelanggan->no_hp ?>" type="text" placeholder="Name" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <!-- Name -->
                            <span class="txt9">
                                Pilih Metode Pembayaran
                            </span>
                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <select id="pembayaran" name="pembayaran" class="bo-rad-10 sizefull txt10 p-l-20">
                                    <option value="">---Metode Pembayaran---</option>
                                    <option data-pembayaran="<?= $this->cart->total() ?>" data-total="Rp. <?= $this->cart->format_number($this->cart->total()); ?>" data-diskon="-" value="1">Cash</option>
                                    <option data-pembayaran="<?= $this->cart->total() - (0.05 * $this->cart->total()) ?>" data-total="Rp. <?= $this->cart->format_number($this->cart->total() - (0.05 * $this->cart->total())); ?>" data-diskon="5%" value="2">Transfer Bank Cimb Niaga</option>
                                    <option data-pembayaran="<?= $this->cart->total() ?>" data-total="Rp. <?= $this->cart->format_number($this->cart->total()); ?>" data-diskon="-" value="3">Transfer Bank BRI</option>
                                </select>
                                <?= form_error('pembayaran', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                            Checkout
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <p>Dapatkan Diskon hingga 5% jika metode pembayaran kamu menggunakan transfer via bank <strong>Cimb Niaga</strong></p>
                <table class="table table-striped">
                    <tr>
                        <th>Cart</th>
                        <th>&nbsp;</th>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>
                            <h5>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>Diskon</td>
                        <td class="diskon"></td>
                    </tr>
                    <tr>
                        <td>Total Pembayaran</td>
                        <td>
                            <h4 class="total">
                            </h4>
                        </td>
                    </tr>

                </table>
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
<!-- Modal -->