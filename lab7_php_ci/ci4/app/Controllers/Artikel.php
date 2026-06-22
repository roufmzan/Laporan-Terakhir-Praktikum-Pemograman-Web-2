<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Exceptions\PageNotFoundException;

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/index', compact('artikel', 'title'));
    }

    public function view($slug = null)
    {
        $model = new ArtikelModel();
        $artikel = $model->where(['slug' => $slug])->first();

        if (!$artikel) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $artikel['judul'],
            'artikel' => $artikel
        ];

        return view('artikel/detail', $data);
    }

    public function admin_index()
    {
        $title = 'Admin Portal Berita';
        $model = new ArtikelModel();

        try {
            $artikel = $model->findAll();
        } catch (DatabaseException $e) {
            $artikel = [];
        }

        return view('artikel/admin_index', compact('artikel', 'title'));
    }

    public function add()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel = new ArtikelModel();

            try {
                $artikel->insert([
                    'judul'  => $this->request->getPost('judul'),
                    'isi'    => $this->request->getPost('isi'),
                    'slug'   => url_title($this->request->getPost('judul'), '-', true),
                    'status' => 0,
                ]);
            } catch (DatabaseException $e) {
                // Jika database belum terset, tetap tampilkan form tanpa crash.
            }

            return redirect()->to('/admin/artikel');
        }

        $title = 'Tambah Artikel';
        return view('artikel/form_add', compact('title'));
    }

    public function edit($id)
    {
        $artikel = new ArtikelModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            try {
                $artikel->update($id, [
                    'judul' => $this->request->getPost('judul'),
                    'isi'   => $this->request->getPost('isi'),
                    'slug'  => url_title($this->request->getPost('judul'), '-', true),
                ]);
            } catch (DatabaseException $e) {
                // Jika database belum terset, tetap tampilkan form tanpa crash.
            }

            return redirect()->to('/admin/artikel');
        }

        try {
            $data = $artikel->where('id', $id)->first();
        } catch (DatabaseException $e) {
            $data = null;
        }

        $title = 'Edit Artikel';
        return view('artikel/form_edit', compact('title', 'data'));
    }

    public function delete($id)
    {
        $artikel = new ArtikelModel();

        try {
            $artikel->delete($id);
        } catch (DatabaseException $e) {
            // Jika database belum terset, tetap redirect tanpa crash.
        }

        return redirect()->to('/admin/artikel');
    }

    public function apiIndex()
    {
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return $this->response->setJSON(['artikel' => $artikel]);
    }

    public function apiCreate()
    {
        $model = new ArtikelModel();
        $data = $this->request->getJSON(true);
        $data['slug'] = url_title($data['judul'], '-', true);
        $model->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function apiUpdate($id)
    {
        $model = new ArtikelModel();
        $data = $this->request->getJSON(true);
        if (isset($data['judul'])) {
            $data['slug'] = url_title($data['judul'], '-', true);
        }
        $model->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function apiDelete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }

    public function apiLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Default credentials for demo
        $validUsername = 'admin';
        $validPassword = 'admin123';

        if ($username === $validUsername && $password === $validPassword) {
            return $this->response->setJSON([
                'status' => 200,
                'data' => [
                    'token' => 'demo-token-' . time(),
                    'username' => $username
                ]
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 401,
                'messages' => 'Username atau password salah'
            ], 401);
        }
    }
}
