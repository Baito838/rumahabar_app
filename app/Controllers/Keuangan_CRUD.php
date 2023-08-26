<?php

namespace App\Controllers;

use App\Models\Keuangan;

class Keuangan_CRUD extends BaseController
{

    protected $keuangan;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->keuangan = new Keuangan();
    }
    public function Pemasukan()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "keuangan" => $this->keuangan->Pemasukan(),
            "page" => "Keuangan"
        ];
        return view('Dashboard/Keuangan', $data);
    }
    public function Pengeluaran()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "keuangan" => $this->keuangan->Pengeluaran(),
            "page" => "Keuangan"
        ];
        return view('Dashboard/Keuangan', $data);
    }

    public function Donasi()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "keuangan" => $this->keuangan->Donasi(),
            "page" => "Keuangan"
        ];
        return view('Dashboard/Keuangan', $data);
    }


    public function Create()
    {
        // dd($this->request->getVar());

        $db      = \Config\Database::connect();

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


        $nama = $this->request->getVar('nama');
        $telfon = $this->request->getVar('telfon');
        $jumlah = $this->request->getVar('jumlah');
        $keterangan = $this->request->getVar('keterangan');
        $foto = $this->request->getFile('foto_baru');
        $page = $this->request->getVar('page');

        if ($page == 'donasi') {
            $jenis = 'donasi';
        } else {
            $jenis = $this->request->getVar('jenis');
        }

        if ($page == 'donasi') {
            $kind = 0;
        } else if ($page == 'pemasukan') {
            $kind = 1;
        } else if ($page == 'pengeluaran') {
            $kind = 2;
        }


        if ($foto->getError() == 4) {
            session()->setFlashdata('warning', "Bukti Belom Diupload");
            return redirect()->to('dashboard');
        } else {

            $nama_foto = $foto->getRandomName();
            $foto->move('bukti/', $nama_foto);
            $db->query("INSERT INTO tab_keuangan(jenis, nama, telfon ,jumlah, keterangan, bukti, kind) VALUES ('$jenis','$nama', '$telfon','$jumlah','$keterangan','$nama_foto', '$kind')");

            if ($page == 'Donasi') {
                session()->setFlashdata('success', "Jangan lupa untuk ucapkan terimakasih kepada donatur 😊 ");
                return redirect()->to($page);
            } else {
                session()->setFlashdata('success', "Data Keuangan berhasil diupload");
                return redirect()->to($page);
            }
        }
    }
    public function Update()
    {
        // dd($this->request->getVar());

        $db      = \Config\Database::connect();

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


        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $telfon = $this->request->getVar('telfon');
        $jumlah = $this->request->getVar('jumlah');
        $keterangan = $this->request->getVar('keterangan');
        $foto = $this->request->getFile('foto_baru');
        $page = $this->request->getVar('page');
        $foto_lama = $this->request->getVar('foto_lama');

        if ($page == 'donasi') {
            $jenis = 'donasi';
        } else {
            $jenis = $this->request->getVar('jenis');
        }

        if ($page == 'donasi') {
            $kind = 0;
        } else if ($page == 'pemasukan') {
            $kind = 1;
        } else if ($page == 'pengeluaran') {
            $kind = 2;
        }


        if ($foto->getError() == 4) {
            $db->query("UPDATE tab_keuangan SET jenis = '$jenis', nama = '$nama', telfon = '$telfon', keterangan = '$keterangan', nama = '$nama', telfon = '$telfon' WHERE id = '$id'");

            session()->setFlashdata('success', "Data berhasil diubah");
            return redirect()->to($page);
        } else {

            // dd($foto_lama);

            if ($foto_lama != "") {
                unlink('bukti/' . $foto_lama);
            }

            $nama_foto = $foto->getRandomName();

            $foto->move('bukti', $nama_foto);

            $db->query("UPDATE tab_keuangan SET jenis = '$jenis', nama = '$nama', telfon = '$telfon', keterangan = '$keterangan', nama = '$nama', telfon = '$telfon', jenis = '$jenis', nama = '$nama', telfon = '$telfon', keterangan = '$keterangan', nama = '$nama', bukti = '$nama_foto' WHERE id = '$id'");

            session()->setFlashdata('success', "Data berhasil diubah");
            return redirect()->to($page);
        }
    }

    public function Delete()
    {
        $db      = \Config\Database::connect();

        $id = $this->request->getVar('id');
        $page = $this->request->getVar('page');
        $foto_lama = $this->request->getVar('foto_lama');
        unlink('bukti/' . $foto_lama);

        $db->query("DELETE FROM tab_keuangan WHERE id = '$id' ");

        session()->setFlashdata('success', "Data berhasil dihapus");
        return redirect()->to($page);
    }
}
