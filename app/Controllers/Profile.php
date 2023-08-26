<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Profile"
        ];
        return view('/Dashboard/Profile', $data);
    }

    public function update()
    {
        // dd($this->request->getFile('foto_baru'));
        if (!$this->validate([
            'foto_baru' => [
                'label'  => 'foto_baru',
                'rules'  => 'ext_in[foto_baru,png,jpg,jpeg]|mime_in[foto_baru,image/png,image/jpeg]|max_size[foto_baru,2048]',
                'errors' => [
                    'mime_in' => 'File harus png, jpeg dan jpg',
                    'ext_in' => 'File Harus Berupa Foto',
                    'max_size' => 'Maksimal ukuran 2mb',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            if ($validation) {
                if ($validation->getError('foto_baru')) {
                    session()->setFlashdata('warning', $validation->getError('foto_baru'));
                    return redirect()->to('profile');
                }
            }
        }

        // dd($this->request->getVar());

        $db      = \Config\Database::connect();

        // dd($_FILES);

        $id = $this->request->getVar('id');
        $foto_lama = $this->request->getVar('foto_lama');
        $nama_depan = $this->request->getVar('nama_depan');
        $nama_belakang = $this->request->getVar('nama_belakang');
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');

        $foto = $this->request->getFile('foto_baru');


        if ($foto->getError() == 4) {
            $db->query("UPDATE tab_user set first_name = '$nama_depan', last_name = '$nama_belakang', email = '$email', username = '$username' WHERE id = '$id'");

            session()->setFlashdata('success', "Data berhasil diubah");
            return redirect()->to('profile');
        } else {

            // dd($foto_lama);

            if ($foto_lama != 'default.png' || $foto_lama != "" ) {
                unlink('login/profile/' . $foto_lama);
            }
            $nama_foto = $foto->getRandomName();
            $foto->move('login/profile/', $nama_foto);
            $db->query("UPDATE tab_user set first_name = '$nama_depan', last_name = '$nama_belakang', email = '$email', username = '$username', image = '$nama_foto' WHERE id = '$id'");

            session()->setFlashdata('success', "Data berhasil diubah");
            return redirect()->to('profile');
        }
    }

    public function update_password()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tab_user');

        $builder = $db->table('tab_user');

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $password_lama = $this->request->getVar('password_lama');

        $user = $builder->getWhere(['email' => $username])->getRowArray();

        if (password_verify($password_lama, $user['password'])) {
            if (!$this->validate([
                'password_confirm' => [
                    'label'  => 'password_confirm',
                    'rules'  => 'matches[password]',
                    'errors' => [
                        'matches' => 'Password baru Tidak Sesuai',
                    ],
                ],
            ])) {
                $validation = \Config\Services::validation();
                if ($validation) {
                    if ($validation->getError('password_confirm')) {
                        session()->setFlashdata('warning', $validation->getError('password_confirm'));
                        return redirect()->to('ganti_password');
                    }
                }
            }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $db->query("UPDATE tab_user set password = '$password' WHERE email = '$username'");

        session()->setFlashdata('success', "Password berhasil diubah");
        return redirect()->to('ganti_password');


        } else {
            session()->setFlashdata('warning', 'Password lama tidak sesuai');
            return redirect()->to('ganti_password');
        }
    }
}
