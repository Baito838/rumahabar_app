<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Login"
        ];
        return view('/Admin/Login', $data);
    }

    public function auth()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tab_user');

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');


        $user = $builder->getWhere(['email' => $username])->getRowArray();

        if ($user) {
            if ($user['is_active'] == 1) {

                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session = \Config\Services::session();
                    $this->session->set($data);
                    
                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('warning', "Password Salah");
                    return redirect()->to('masuk');
                }
            } else {
                session()->setFlashdata('warning', "Email belum diaktivasi");
                return redirect()->to('masuk');
            }
        } else {
            session()->setFlashdata('warning', "Email salah");
            return redirect()->to('masuk');
        }
    }

    public function register()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Register"
        ];
        return view('/Admin/Register', $data);
    }

    public function daftar()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('tab_user');


        if (!$this->validate([
            'nama_depan' => [
                'label'  => 'nama_depan',
                'rules'  => 'trim'
            ],
            'nama_belakang' => [
                'label'  => 'nama_belakang',
                'rules'  => 'trim'
            ],
            'username' => [
                'label'  => 'Username',
                'rules'  => 'is_unique[tab_user.username]|trim',
                'errors' => [
                    'is_unique' => 'Username Telah Digunakan',
                ],
            ],
            'email' => [
                'label'  => 'email',
                'rules'  => 'is_unique[tab_user.email]|trim',
                'errors' => [
                    'is_unique' => 'email telah digunakan',
                ],
            ],
            'password_confirm' => [
                'label'  => 'password_confirm',
                'rules'  => 'matches[password]',
                'errors' => [
                    'matches' => 'Password Tidak Sesuai',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            if ($validation) {
                if ($validation->getError('username')) {
                    session()->setFlashdata('warning', $validation->getError('username'));
                    return redirect()->to('register');
                } else if ($validation->getError('email')) {
                    session()->setFlashdata('warning', $validation->getError('email'));
                    return redirect()->to('register');
                } else if ($validation->getError('password_confirm')) {
                    session()->setFlashdata('warning', $validation->getError('password_confirm'));
                    return redirect()->to('register');
                }
            }
        }

        $nama_depan = $this->request->getVar('nama_depan');
        $nama_belakang = $this->request->getVar('nama_belakang');
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $password = password_hash($password, PASSWORD_DEFAULT);

        // dd($password);

        $data = [
            'first_name' => $nama_depan,
            'last_name' => $nama_belakang,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'image' => "default.png",
            'role_id' => 5,
            'is_active' => 1
        ];

        $builder->insert($data);
        session()->setFlashdata('success', "Akun Berhasil didaftarkan");
        return redirect()->to('register');
    }


    public function logout(){

        $this->session->destroy();
        session()->setFlashdata('success', "Berhasil Logout");
        return redirect()->to('/');
    }
}
