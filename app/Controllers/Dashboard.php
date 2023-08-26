<?php

namespace App\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use App\Models\Artikel;

class Dashboard extends BaseController
{

    protected $jadwal;
    protected $user;
    protected $artikel;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->jadwal = new Jadwal();
        $this->user = new User();
        $this->artikel = new Artikel();
    }
    public function index()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "artikel" => $this->artikel->Blog(),
            "page" => "Database"
        ];
        return view('/Dashboard/Home', $data);
    }

    public function Jadwal()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "harian" => $this->jadwal->Harian(),
            "mingguan" => $this->jadwal->Mingguan(),
            "program" => $this->jadwal->Unggulan(),
            "page" => "Kegiatan"
        ];
        return view('/Dashboard/Jadwal', $data);
    }

    public function Tambah_Unggulan()
    {
        $db      = \Config\Database::connect();
        // dd($this->request->getVar());

        $nama = $this->request->getVar('nama');

        $db->query("INSERT INTO tab_unggulan VALUES ('','$nama')");
        session()->setFlashdata('success', "Data berhasil ditambahkan");
        return redirect()->to('unggulan');
    }
    public function Ubah_Unggulan()
    {
        $db      = \Config\Database::connect();
        // dd($this->request->getVar());

        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');

        $db->query("UPDATE tab_unggulan SET nama = '$nama' WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil diubah");
        return redirect()->to('unggulan');
    }

    public function Hapus_Unggulan()
    {
        $db      = \Config\Database::connect();
        // dd($this->request->getVar());

        $id = $this->request->getVar('id');

        $db->query("DELETE FROM tab_unggulan WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil dihapus");
        return redirect()->to('unggulan');
    }

    public function Jadwal_Harian()
    {
        $db      = \Config\Database::connect();
        // dd($this->request->getVar());

        $id = $this->request->getVar('id');
        $kegiatan = $this->request->getVar('kegiatan');

        $db->query("UPDATE tab_kegiatan_harian SET Kegiatan = '$kegiatan' WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil diubah");
        return redirect()->to('jadwal_harian');
    }

    public function Tambah_Jadwal()
    {
        $db      = \Config\Database::connect();
        // dd($this->request->getVar());

        $hari = $this->request->getVar('hari');
        $waktu = $this->request->getVar('waktu');
        $kegiatan = $this->request->getVar('kegiatan');

        $db->query("INSERT INTO tab_kegiatan_mingguan VALUES ('','$hari','$waktu','$kegiatan')");
        session()->setFlashdata('success', "Data berhasil ditambahkan");
        return redirect()->to('jadwal_mingguan');
    }
    public function Jadwal_Mingguan()
    {
        $db      = \Config\Database::connect();
        // dd($this->request->getVar());

        $id = $this->request->getVar('id');
        $hari = $this->request->getVar('hari');
        $waktu = $this->request->getVar('waktu');
        $kegiatan = $this->request->getVar('kegiatan');

        $db->query("UPDATE tab_kegiatan_mingguan SET Hari = '$hari', Waktu = '$waktu', Kegiatan = '$kegiatan' WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil diubah");
        return redirect()->to('jadwal_mingguan');
    }

    public function Hapus_Jadwal_Mingguan()
    {
        $db      = \Config\Database::connect();
        // dd($this->request->getVar());

        $id = $this->request->getVar('id');

        $db->query("DELETE FROM tab_kegiatan_mingguan WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil dihapus");
        return redirect()->to('jadwal_mingguan');
    }



    // End Jadwal Table

    public function User()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "user_acc" => $this->user->User(),
            "role" => $this->user->Role(),
            "page" => "Database"
        ];
        return view('/Dashboard/User', $data);
    }
    public function User_Update()
    {
        // dd($this->request->getVar());
        $id = $this->request->getVar('id');
        $status = $this->request->getVar('status');
        $role = $this->request->getVar('role');

        $db      = \Config\Database::connect();

        $db->query("UPDATE tab_user SET role_id = '$role', is_active = '$status' WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil diubah");
        return redirect()->to('user');
    }
    public function User_Delete()
    {
        $id = $this->request->getVar('id');
        $image = $this->request->getVar('image');
        $db      = \Config\Database::connect();
        // dd($this->request->getVar());

        unlink('login/profile/' . $image);

        $db->query("DELETE FROM tab_user WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil dihapus");
        return redirect()->to('user');
    }

}
