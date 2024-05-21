<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Analytics</strong> Pelanggan</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">AdminKit</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 table-responsive">
                <canvas id="produk" height="100"></canvas>


            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Pelanggan Member</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        echo form_open('Pemilik/cLaporan_Pelanggan/laporan') ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" class="form-control">
                                        <option value="">---Pilih Jenis Kelamin---</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-Laki</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Member / Non Member</label>
                                    <select name="member" class="form-control">
                                        <option value="">---Pilih Status Member---</option>
                                        <option value="1">Member</option>
                                        <option value="0">Non Member</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info mt-3"><i class="fa fa-print"></i> Cetak Laporan</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>