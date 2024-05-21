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
                        Checkout Delivery
                    </h3>
                </div>
            </div>
            <div class="col-lg-8 p-b-30">
                <form action="<?= base_url('pelanggan/chome/checkout_deliv') ?>" method="POST" class="wrap-form-reservation size22 m-l-r-auto">
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
                    <input type="hidden" name="ongkir">
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
                                    <option data-pembayaran="<?= $this->cart->total() - (0.05 * $this->cart->total()) ?>" data-total="Rp. <?= $this->cart->format_number($this->cart->total() - (0.05 * $this->cart->total())); ?>" data-diskon="5%" value="2">Transfer Bank Cimb Niaga</option>
                                    <option data-pembayaran="<?= $this->cart->total() ?>" data-total="Rp. <?= $this->cart->format_number($this->cart->total()); ?>" data-diskon="-" value="3">Transfer Bank BRI</option>
                                </select>
                                <?= form_error('pembayaran', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Name -->
                            <span class="txt9">
                                Kota/Kabupaten
                            </span>
                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <select name="kota" class="bo-rad-10 sizefull txt10 p-l-20">

                                </select>
                                <?= form_error('kota', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Name -->
                            <span class="txt9">
                                Alamat
                            </span>
                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" name="alamat" type="text" placeholder="Alamat">
                                <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <!-- Name -->
                            <span class="txt9">
                                RT
                            </span>
                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" name="rt" type="text" placeholder="RT">
                                <?= form_error('rt', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <!-- Name -->
                            <span class="txt9">
                                RW
                            </span>

                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" name="rw" type="text" placeholder="RW">
                                <?= form_error('rw', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <!-- Name -->
                            <span class="txt9">
                                Expedisi
                            </span>
                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <select name="expedisi" class="bo-rad-10 sizefull txt10 p-l-20">

                                </select>
                                <?= form_error('expedisi', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Name -->
                            <span class="txt9">
                                Paket
                            </span>
                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <select name="paket" class="bo-rad-10 sizefull txt10 p-l-20">

                                </select>
                                <?= form_error('paket', '<small class="form-text text-danger">', '</small>'); ?>
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
                        <td>Subtotal Diskon</td>
                        <td>
                            <h5 class="total"></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>Ongkir</td>
                        <td id="ongkir"></td>

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



<!-- Footer -->
<footer class="bg1">
    <div class="container p-t-40 p-b-70">
        <div class="row">
            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-33">
                    Contact Us
                </h4>

                <ul class="m-b-70">
                    <li class="txt14 m-b-14">
                        <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
                        8th floor, 379 Hudson St, New York, NY 10018
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
                        (+1) 96 716 6879
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
                        contact@site.com
                    </li>
                </ul>

                <!-- - -->
                <h4 class="txt13 m-b-32">
                    Opening Times
                </h4>

                <ul>
                    <li class="txt14">
                        09:30 AM – 11:00 PM
                    </li>

                    <li class="txt14">
                        Every Day
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-33">
                    Latest twitter
                </h4>

                <div class="m-b-25">
                    <span class="fs-13 color2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="txt15">
                        @colorlib
                    </a>

                    <p class="txt14 m-b-18">
                        Activello is a good option. It has a slider built into that displays the featured image in the slider.
                        <a href="#" class="txt15">
                            https://buff.ly/2zaSfAQ
                        </a>
                    </p>

                    <span class="txt16">
                        21 Dec 2017
                    </span>
                </div>

                <div>
                    <span class="fs-13 color2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="txt15">
                        @colorlib
                    </a>

                    <p class="txt14 m-b-18">
                        Activello is a good option. It has a slider built into that displays
                        <a href="#" class="txt15">
                            https://buff.ly/2zaSfAQ
                        </a>
                    </p>

                    <span class="txt16">
                        21 Dec 2017
                    </span>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-38">
                    Gallery
                </h4>

                <!-- Gallery footer -->
                <div class="wrap-gallery-footer flex-w">
                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-01.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-01.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-02.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-02.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-03.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-03.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-04.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-04.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-05.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-05.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-06.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-06.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-07.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-08.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-08.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-09.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-09.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-10.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-10.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-11.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-11.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-12.jpg" data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-12.jpg" alt="GALLERY">
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="end-footer bg2">
        <div class="container">
            <div class="flex-sb-m flex-w p-t-22 p-b-22">
                <div class="p-t-5 p-b-5">
                    <a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                    <a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                    <a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
                </div>

                <div class="txt17 p-r-20 p-t-5 p-b-5">
                    Copyright &copy; 2018 All rights reserved | This template is made with <i class="fa fa-heart"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<!-- Modal Video 01-->
<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog" role="document" data-dismiss="modal">
        <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

        <div class="wrap-video-mo-01">
            <div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
            <div class="video-mo-01">
                <iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>



<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/parallax100/parallax100.js"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url('asset/pato-master/') ?>js/main.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
<script>
    console.log = function() {}
    $("#pembayaran").on('change', function() {
        $(".diskon").html($(this).find(':selected').attr('data-diskon'));
        $(".diskon").val($(this).find(':selected').attr('data-diskon'));


        $(".total").html($(this).find(':selected').attr('data-total'));
        $(".total").val($(this).find(':selected').attr('data-total'));


        $(".pembayaran").html($(this).find(':selected').attr('data-pembayaran'));
        $(".pembayaran").val($(this).find(':selected').attr('data-pembayaran'));
    });
</script>

<script>
    $(document).ready(function() {

        $.ajax({
            type: "POST",
            url: "http://localhost/sisi-jalan/pelanggan/cOngkir/kota",
            success: function(hasil_kota) {
                //console.log(hasil_kota);
                $("select[name=kota]").html(hasil_kota);
            }
        });

        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "http://localhost/sisi-jalan/pelanggan/cOngkir/expedisi",
                success: function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });

        $("select[name=expedisi]").on("change", function() {
            //mendapatkan expedisi terpilih
            var expedisi_terpilih = $("select[name=expedisi]").val()

            //mendapatkan id kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //mengambil data ongkos kirim
            var total_berat = 500;
            //alert(total_berat);
            $.ajax({
                type: "POST",
                url: "http://localhost/sisi-jalan/pelanggan/cOngkir/paket",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });


        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            var reverse = dataongkir.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
            //alert(dataongkir);
            $("#ongkir").html("Rp. " + ribuan_ongkir)
            //menghitung total bayar
            var ongkir = $("option:selected", this).attr('ongkir');
            var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);

            var reverse2 = total_bayar.toString().split('').reverse().join(''),
                ribuan_total = reverse2.match(/\d{1,3}/g);
            ribuan_total = ribuan_total.join(',').split('').reverse().join('');
            $("#total_bayar").html("Rp. " + ribuan_total);
            $(".total_bayar").html("Rp. " + ribuan_total);

            //estimasi dan ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(total_bayar);
        });


    });
</script>