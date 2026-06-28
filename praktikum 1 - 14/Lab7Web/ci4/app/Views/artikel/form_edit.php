<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>
<form action="" method="post" enctype="multipart/form-data">
    <p>
        <label for="judul" style="display:block; margin-bottom:5px; font-weight:600;">Judul</label>
        <input type="text" name="judul" id="judul" value="<?= $artikel['judul']; ?>" required>
    </p>
    <p>
        <label for="isi" style="display:block; margin-bottom:5px; font-weight:600;">Isi</label>
        <textarea name="isi" id="isi" cols="50" rows="10" required><?= $artikel['isi']; ?></textarea>
    </p>
    <p>
        <label for="gambar" style="display:block; margin-bottom:5px; font-weight:600;">Gambar (Biarkan kosong jika tidak ingin mengubah)</label>
        <input type="file" name="gambar" id="gambar" class="form-control" style="margin-bottom: 15px;">
    </p>
    <p>
        <label for="id_kategori" style="display:block; margin-bottom:5px; font-weight:600;">Kategori</label>
        <select name="id_kategori" id="id_kategori" required class="form-control" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px; margin-bottom: 15px; font-family: inherit;">
            <option value="">Pilih Kategori</option>
            <?php if(isset($kategori)): foreach($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>" <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>><?= $k['nama_kategori']; ?></option>
            <?php endforeach; endif; ?>
        </select>
    </p>
    <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>

<?= $this->include('template/admin_footer'); ?>
