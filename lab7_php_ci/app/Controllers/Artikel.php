<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/index', compact('artikel', 'title'));
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
