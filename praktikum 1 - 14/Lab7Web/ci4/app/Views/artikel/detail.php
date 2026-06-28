<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<article class="entry">
    <h2><?= $artikel['judul']; ?></h2>
    <p>Kategori: <?= $artikel['nama_kategori'] ?? 'Belum ada kategori' ?></p>
    <?php if(!empty($artikel['gambar'])): ?>
    <img src="<?= base_url('/gambar/' . $artikel['gambar']);?>" alt="<?= $artikel['judul']; ?>">
    <?php endif; ?>
    <p><?= $artikel['isi']; ?></p>
</article>
<?= $this->endSection() ?>
