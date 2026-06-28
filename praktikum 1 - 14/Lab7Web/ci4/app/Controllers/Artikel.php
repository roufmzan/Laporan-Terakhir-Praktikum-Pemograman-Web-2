<?php
namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    public function index() 
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->getArtikelDenganKategori(); // Use the new method
        return view('artikel/index', compact('artikel', 'title'));
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $data['artikel'] = $model->select('artikel.*, kategori.nama_kategori')
                                 ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
                                 ->where('slug', $slug)->first();

        // Menampilkan error apabila data tidak ada.
        if (empty($data['artikel'])) 
        {
            throw PageNotFoundException::forPageNotFound('Cannot find the article.');
        }

        $data['title'] = $data['artikel']['judul'];
        return view('artikel/detail', $data);
    }

    public function admin_index() 
    {
        $title = 'Daftar Artikel (Admin)';
        $model = new ArtikelModel();
        
        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $page = $this->request->getVar('page') ?? 1;
        
        $builder = $model->table('artikel')
                         ->select('artikel.*, kategori.nama_kategori')
                         ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');
        
        if ($q != '') {
            $builder->like('artikel.judul', $q);
        }
        
        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }
        
        $artikel = $builder->paginate(10, 'default', $page);
        $pager = $model->pager;
        
        $data = [
            'title' => $title,
            'q' => $q,
            'kategori_id' => $kategori_id,
            'artikel' => $artikel,
            'pager' => $pager
        ];
        
        if ($this->request->isAJAX()) {
            return $this->response->setJSON($data);
        } else {
            $kategoriModel = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll();
            return view('artikel/admin_index', $data);
        }
    }

    public function add() 
    {
        if ($this->request->getMethod() === 'POST' && $this->validate([
            'judul' => 'required',
            'id_kategori' => 'required|integer' // Ensure id_kategori is required and an integer
        ])) {
            $file = $this->request->getFile('gambar');
            $nama_gambar = '';
            
            // Check if file is uploaded and valid
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $file->move(ROOTPATH . 'public/gambar');
                $nama_gambar = $file->getName();
            }
            
            $model = new ArtikelModel();
            $model->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'gambar' => $nama_gambar
            ]);
            return redirect()->to('/admin/artikel');
        } else {
            $kategoriModel = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll(); // Fetch categories for the form
            $data['title'] = "Tambah Artikel";
            return view('artikel/form_add', $data);
        }
    }

    public function edit($id) 
    {
        $model = new ArtikelModel();
        
        if ($this->request->getMethod() === 'POST' && $this->validate([
            'judul' => 'required',
            'id_kategori' => 'required|integer'
        ])) {
            $updateData = [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'id_kategori' => $this->request->getPost('id_kategori')
            ];
            
            $file = $this->request->getFile('gambar');
            // Check if file is uploaded and valid
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $file->move(ROOTPATH . 'public/gambar');
                $updateData['gambar'] = $file->getName();
            }

            $model->update($id, $updateData);
            return redirect()->to('/admin/artikel');
        } else {
            $data['artikel'] = $model->find($id);
            $kategoriModel = new KategoriModel();
            $data['kategori'] = $kategoriModel->findAll(); // Fetch categories for the form
            $data['title'] = "Edit Artikel";
            return view('artikel/form_edit', $data);
        }
    }

    public function delete($id) 
    {
        $model = new ArtikelModel();
        $model->delete($id);
        return redirect()->to('/admin/artikel');
    }
}
