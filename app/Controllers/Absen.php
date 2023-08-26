<?php

namespace App\Controllers;

use App\Models\Absensi;

class Absen extends BaseController
{
    protected $absen;

    public function __construct()
    {
        $this->absen = new Absensi();
    }
    public function Santri()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Absen"
        ];
        return view('/Dashboard/Absen', $data);
    }
    public function Pengajar()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Absen"
        ];
        return view('/Dashboard/Absen', $data);
    }
    public function Absen_Full()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "laporan" => $this->absen->Absen_Full(),

            "page" => "Absen"
        ];
        return view('/Dashboard/Absen', $data);
    }
    public function Laporan()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "laporan" => $this->absen->Absen(),
            "page" => "Absen"
        ];
        return view('/Dashboard/Absen', $data);
    }

    public function Laporan_Santri()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "laporan" => $this->absen->Absen_Santri(),
            "page" => "Absen"
        ];
        return view('/Dashboard/Absen', $data);
    }


    public function Create_Absen()
    {
        $db      = \Config\Database::connect();

        // dd($this->request->getVar());

        if (!$this->validate([
            'foto_baru' => [
                'label'  => 'foto',
                'rules'  => 'ext_in[foto,png,jpg,jpeg]|mime_in[foto,image/png,image/jpeg]|max_size[foto,2048]',
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

        $page = $this->request->getVar('page');
        $role = $this->request->getVar('role');
        $nama = $this->request->getVar('nama');
        $foto = $this->request->getFile('foto');
        $nis = $this->request->getVar('nis');
        $nig = $this->request->getVar('nig');
        $kegiatan = $this->request->getVar('kegiatan');
        $keterangan = $this->request->getVar('keterangan');
        $latitude = $this->request->getVar('latitude');
        $longitude = $this->request->getVar('longitude');

        $nama_foto = $foto->getRandomName();
        if ($role == 1) {
            $foto->move('absen/guru', $nama_foto);
        } else {
            $foto->move('absen/santri', $nama_foto);
        }


        $db->query("INSERT INTO tab_absen(nama,nis,nig,kegiatan,keterangan,latitude,longitude,role_user,image) VALUES ('$nama','$nis','$nig','$kegiatan','$keterangan','$latitude','$longitude','$role', '$nama_foto')");
        session()->setFlashdata('success', "Absen Berhasil terkirim");
        return redirect()->to($page);
    }

    public function Truncate_Absen()
    {
        $db      = \Config\Database::connect();

        $page = $this->request->getVar('page');
        $dirname = 'absen/guru';
        array_map("unlink", glob("$dirname/*"));
        array_map("rmdir", glob("$dirname/*"));
        rmdir($dirname);
        
        $dirname = 'absen/santri';
        array_map("unlink", glob("$dirname/*"));
        array_map("rmdir", glob("$dirname/*"));
        rmdir($dirname);

        $db->query("TRUNCATE TABLE tab_absen");
        session()->setFlashdata('success', "Absen Berhasil diformat");
        return redirect()->to($page);
    }
}
