<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<div class="row mb-3">
    <div class="col-md-6">
        <form id="search-form" class="form-search" style="margin-bottom: 20px;">
            <input type="text" name="q" id="search-box" value="<?= $q; ?>" placeholder="Cari judul artikel" class="form-control" style="padding: 8px; width: 200px;">
            <select name="kategori_id" id="category-filter" class="form-control" style="padding: 8px;">
                <option value="">Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>><?= $k['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Cari" class="btn btn-primary" style="padding: 8px 15px;">
        </form>
    </div>
</div>

<div id="article-container">
    <!-- Tabel akan dirender di sini via AJAX -->
</div>
<div id="pagination-container" style="margin-top: 20px;">
    <!-- Pagination akan dirender di sini via AJAX -->
</div>

<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
<script>
$(document).ready(function() {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchForm = $('#search-form');
    const searchBox = $('#search-box');
    const categoryFilter = $('#category-filter');

    const fetchData = (url) => {
        // Tampilkan indikator loading (Tugas 3)
        articleContainer.html('<p>Loading data...</p>');
        paginationContainer.html('');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                renderArticles(data.artikel);
                renderPagination(data.pager, data.q, data.kategori_id);
            },
            error: function() {
                articleContainer.html('<p>Terjadi kesalahan saat memuat data.</p>');
            }
        });
    };

    const renderArticles = (articles) => {
        let html = '<table class="table">';
        html += '<thead><tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr></thead><tbody>';
        
        if (articles.length > 0) {
            articles.forEach(article => {
                let isiSingkat = article.isi ? article.isi.substring(0, 50) + '...' : '';
                let namaKategori = article.nama_kategori ? article.nama_kategori : 'Tidak ada';
                html += `
                <tr>
                    <td>${article.id}</td>
                    <td>
                        <b>${article.judul}</b>
                        <p><small>${isiSingkat}</small></p>
                    </td>
                    <td>${namaKategori}</td>
                    <td>${article.status}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="<?= base_url('/admin/artikel/edit/') ?>${article.id}">Ubah</a>
                        <a class="btn btn-sm btn-danger btn-delete" href="<?= base_url('/admin/artikel/delete/') ?>${article.id}" data-id="${article.id}">Hapus</a>
                    </td>
                </tr>
                `;
            });
        } else {
            html += '<tr><td colspan="5">Tidak ada data.</td></tr>';
        }
        
        html += '</tbody></table>';
        articleContainer.html(html);
    };

    const renderPagination = (pager, q, kategori_id) => {
        if (!pager || !pager.links || pager.links.length === 0) return;
        
        let html = '<nav><ul class="pagination" style="display:flex; list-style:none; padding:0;">';
        pager.links.forEach(link => {
            let url = link.url ? `${link.url}&q=${q}&kategori_id=${kategori_id}` : '#';
            let activeStyle = link.active ? 'background:#007bff; color:#fff;' : 'background:#eee; color:#333;';
            html += `<li class="page-item ${link.active ? 'active' : ''}" style="margin-right:5px;">
                        <a class="page-link" href="${url}" style="padding:5px 10px; text-decoration:none; border-radius:3px; ${activeStyle}">${link.title}</a>
                     </li>`;
        });
        html += '</ul></nav>';
        paginationContainer.html(html);
    };

    searchForm.on('submit', function(e) {
        e.preventDefault();
        const q = searchBox.val();
        const kategori_id = categoryFilter.val();
        fetchData(`<?= base_url('/admin/artikel') ?>?q=${q}&kategori_id=${kategori_id}`);
    });

    categoryFilter.on('change', function() {
        searchForm.trigger('submit');
    });

    // Menangani klik pada link pagination agar menggunakan AJAX
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        if (url && url !== '#') {
            fetchData(url);
        }
    });

    // Menangani klik delete dengan AJAX (menggunakan method delete dari Controller Praktikum 8)
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        if (confirm('Yakin menghapus data?')) {
            $.ajax({
                url: "<?= base_url('ajax/delete/') ?>" + id,
                method: "DELETE",
                success: function(data) {
                    searchForm.trigger('submit'); // Reload data
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting article.');
                }
            });
        }
    });

    // Initial load
    fetchData('<?= base_url('/admin/artikel') ?>');
});
</script>
<?= $this->include('template/admin_footer'); ?>
