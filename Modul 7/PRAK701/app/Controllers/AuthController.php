<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function index()
    {
        if ($this->session->get('logged_in')){
            return redirect()->to('/buku');
        }

        return view('auth/login', [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ]);
    }

    public function login(){
        $rules = [
            'email'=> [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid, silahkan masukkan kembali!.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password harus memiliki minimal 6 karakter.'
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }
        
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])){
            $this->session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'logged_in' => true,
            ]);
            return redirect()->to('/buku');
        }
        return redirect()->back()->withInput()->with('error', 'Email atau Password salah. Periksa kembali!');
    }

    public function register(){
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'min_length' => 'Username minimal memliki 3 karekter.'
                ],
            ],
             'email'=> [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid, silahkan masukkan kembali!.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal memiliki 6 karakter.'
                ],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $dataGroup = [
            'username' -> $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        $this->userModel->insert($dataGroup);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login dengan .');
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('/login')->with('success', 'Anda berhasil logout.');
    }
}
