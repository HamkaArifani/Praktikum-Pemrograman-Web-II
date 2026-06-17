<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class BukuController extends BaseController
{
    protected $bukuModel;
    protected $session;

    public function __construct(){
        $this->bukuModel = new BukuModel();
        $this->session = session();
        helper(['form', 'url']);
    }

    public function index()
    {
        return view('buku/index', [
            'title' => 'Librazy - Welcome'
        ]);
    }

    public function table()
    {
        $semuaBuku = $this->bukuModel->findAll();

        $data = [
            'title' => 'Daftar Buku - Librazy',
            'Buku' => $semuaBuku,
            'success'=> $this->session->getFlashdata('success'),
            'error'=> $this->session->getFlashdata('error'),
        ];

        return view('buku/tabel_buku', $data);
    }

    public function create(){
        $validation = \Config\Services::validation();

        $errors = session()->getFlashdata('validation_errors');
        if ($errors) {
            foreach ($errors as $field => $error) {
                $validation->setError($field, $error);
            }
        }

        $data = [
            'title'      => 'Tambah Buku',
            'validation' => $validation,
        ];
        return view('buku/store', $data);
    }

    public function store() {
        $rules = [
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Judul buku harus diisi.',
                    'string' => 'Judul buku harus berupa teks.',
                    'max_length' => 'Judul buku maksimal memiliki 255 karakter.',
                ],
            ],
            'penulis' => [
                'label' => 'Penulis',
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Nama penulis buku harus diisi.',
                    'string' => 'Nama penulis buku harus berupa teks.',
                    'max_length' => 'Nama penulis buku maksimal memiliki 255 karakter.',
                ],
            ],
            'penerbit' => [
                'label' => 'Penerbit',
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Nama penerbit harus diisi.',
                    'string' => 'Nama penerbit harus berupa teks.',
                    'max_length' => 'Nama penerbit maksimal 255 karakter.',
                ],
            ],
            'tahun_terbit' => [
                'label' => 'Tahun Terbit',
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun terbit buku harus diisi.',
                    'numeric' => 'Tahun terbit buku harus berupa angka.',
                    'greater_than' => 'Tahun terbit buku harus lebih besar dari 1800',
                    'less_than' => 'Tahun terbit harus lebih kecil dari 2024.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/buku/create')->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        $dataBuku = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];

        $this->bukuModel->insert($dataBuku);

        return redirect()->to('/buku/table')->with('success', 'Data buku baru berhasil ditambahkan!');
    }

    public function edit($id){
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
        return redirect()->to('/buku/table')->with('error', 'Data buku tidak ditemukan.');
        }

        $validation = \Config\Services::validation();
        $errors = session()->getFlashdata('validation_errors');
        if ($errors) {
            foreach ($errors as $field => $error) {
                $validation->setError($field, $error);
            }
        }

        $data = [
            'title' => 'Edit Buku',
            'buku' => $buku,
            'validation' => $validation,
        ];

        return view('buku/update', $data);
    }

    public function update($id){
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
        return redirect()->to('/buku')->with('error', 'Data buku tidak ditemukan.');
        }

        $rules = [
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Judul buku harus diisi.',
                    'string' => 'Judul buku harus berupa teks.',
                    'max_length' => 'Judul buku maksimal memiliki 255 karakter.',
                ],
            ],
            'penulis' => [
                'label' => 'Penulis',
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Nama penulis buku harus diisi.',
                    'string' => 'Nama penulis buku harus berupa teks.',
                    'max_length' => 'Nama penulis buku maksimal memiliki 255 karakter.',
                ],
            ],
            'penerbit' => [
                'label' => 'Penerbit',
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Nama penerbit harus diisi.',
                    'string' => 'Nama penerbit harus berupa teks.',
                    'max_length' => 'Nama penerbit maksimal 255 karakter.',
                ],
            ],
            'tahun_terbit' => [
                'label' => 'Tahun Terbit',
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun terbit buku harus diisi.',
                    'numeric' => 'Tahun terbit buku harus berupa angka.',
                    'greater_than' => 'Tahun terbit buku harus lebih besar dari 1800',
                    'less_than' => 'Tahun terbit harus lebih kecil dari 2024.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/buku/edit/' . $id)->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        $dataBuku = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];

        $this->bukuModel->update($id, $dataBuku);

        return redirect()->to('/buku/table')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function delete($id){
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
        return redirect()->to('/buku')->with('error', 'Data buku tidak ditemukan.');
        }

        $this->bukuModel->delete($id);

        return redirect()->to('/buku/table')->with('success', 'Data buku berhasil dihapus!');
    }
}
