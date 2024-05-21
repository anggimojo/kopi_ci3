<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Create New Produk</h1>

		<div class="row">
			<div class="col-12 col-xl-8">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">New Produk</h5>
					</div>
					<div class="card-body">
						<?php echo form_open_multipart('admin/cproduk/create'); ?>
						<?php $id_produk = strtoupper(random_string('alnum', 4)); ?>
						<input type="hidden" name="id" value="<?= $id_produk ?>">
						<div class="form-group">
							<label class="form-label">Nama Produk</label>
							<input type="text" value="<?= set_value('nama') ?>" name="nama" class="form-control" placeholder="Masukkan Nama Produk">
							<?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label class="form-label">Harga Produk</label>
							<input type="number" value="<?= set_value('harga') ?>" name="harga" class="form-control" placeholder="Masukkan Harga Produk">
							<?= form_error('harga', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label class="form-label">Stok Produk</label>
							<input type="number" value="<?= set_value('stok') ?>" name="stok" class="form-control" placeholder="Masukkan Harga Produk">
							<?= form_error('stok', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label class="form-label">Deskripsi</label>
							<input id="x" name="deskripsi" type="hidden" name="content">
							<trix-editor input="x"><?= set_value('deskripsi') ?></trix-editor>
							<?= form_error('deskripsi', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label class="form-label w-100">Foto Produk</label>
							<input type="file" name="gambar" required>
						</div>
						<div class="form-group">
							<label class="form-label">Tipe Produk</label>
							<select class="form-control" name="tipe">
								<option value="">---Pilih Tipe Produk---</option>
								<option value="1">Produk Biasa</option>
								<option value="2">Produk Promo</option>
							</select>
							<?= form_error('tipe', '<small class="form-text text-danger">', '</small>'); ?>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="<?= base_url('admin/cproduk') ?>">Kembali</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
