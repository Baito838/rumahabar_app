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
        return view('/Admin/Profile', $data);
    }

    public function update()
    {

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

            if($foto_lama != 'default.png' || $foto_lama != ""){
                unlink('login/profile/' . $foto_lama);
            }
            $nama_foto = $foto->getRandomName();
            $foto->move('login/profile/', $nama_foto);
            $db->query("UPDATE tab_user set first_name = '$nama_depan', last_name = '$nama_belakang', email = '$email', username = '$username', image = '$nama_foto' WHERE id = '$id'");

            session()->setFlashdata('success', "Data berhasil diubah");
            return redirect()->to('profile');
        }
    }
}
