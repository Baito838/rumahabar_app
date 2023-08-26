<?php

namespace App\Controllers;

use App\Models\Nilai;
use App\Models\Absensi;

class Laporan_nilai extends BaseController
{
    protected $nilai;
    protected $absen;

    public function __construct()
    {
        $this->nilai = new Nilai();
        $this->absen = new Absensi();
    }
    public function Diniyah()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "nilai" => $this->nilai->Diniyah(),
            "santri" => $this->nilai->Absen_Santri(),
            "pengajar" => $this->nilai->Absen(),
            "page" => "Nilai"
        ];
        return view('/Dashboard/Nilai', $data);
    }
    public function Ziyadah()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "nilai" => $this->nilai->Ziyadah(),
            "santri" => $this->nilai->Absen_Santri(),
            "pengajar" => $this->nilai->Absen(),
            "page" => "Nilai"
        ];
        return view('/Dashboard/Nilai', $data);
    }
    public function Bahasa()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "nilai" => $this->nilai->Bahasa_Arab(),
            "santri" => $this->nilai->Absen_Santri(),
            "pengajar" => $this->nilai->Absen(),
            "page" => "Nilai"
        ];
        return view('/Dashboard/Nilai', $data);
    }

    public function Ekskul()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Nilai"
        ];
        return view('/Dashboard/Nilai', $data);
    }

    public function Tambah()
    {
        // dd($this->request->getVar());
        $db      = \Config\Database::connect();

        $santri = $this->request->getVar('santri');
        $pengajar = $this->request->getVar('pengajar');
        $kegiatan = $this->request->getVar('kegiatan');
        $keterangan = $this->request->getVar('keterangan');
        $mapel = $this->request->getVar('mapel');

        $surah = $this->request->getVar('surah');



        if ($mapel == '1') {
            $surah = implode("|", $surah);
        }

        // dd($mapel);
        if ($mapel == '0') {
            $page = "diniyah";
        } else if ($mapel == '1') {
            $page = "ziyadah";
        } else if ($mapel == '2') {
            $page = "bahasa_arab";
        }


        $db->query("INSERT INTO tab_nilai(santri,pengajar, surah, kegiatan, keterangan, mapel) VALUES ('$santri','$pengajar', '$surah', '$kegiatan', '$keterangan', '$mapel')");
        session()->setFlashdata('success', "Data berhasil ditambah");
        return redirect()->to($page);
    }

    public function Ubah()
    {
        $db      = \Config\Database::connect();

        $santri = $this->request->getVar('santri');
        $pengajar = $this->request->getVar('pengajar');
        $kegiatan = $this->request->getVar('kegiatan');
        $keterangan = $this->request->getVar('keterangan');
        $mapel = $this->request->getVar('mapel');
        $id = $this->request->getVar('id');

        $surah = $this->request->getVar('surah');



        if ($mapel == '1') {
            $surah = implode("|", $surah);
        }

        // dd($mapel);
        if ($mapel == '0') {
            $page = "diniyah";
        } else if ($mapel == '1') {
            $page = "ziyadah";
        } else if ($mapel == '2') {
            $page = "bahasa_arab";
        }


        $db->query("UPDATE tab_nilai SET santri = '$santri',pengajar = '$pengajar', surah = '$surah', kegiatan = '$kegiatan', keterangan = '$keterangan', mapel = '$mapel' WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil diubah");
        return redirect()->to($page);
    }

    public function Hapus()
    {
        // dd($this->request->getVar());

        $db      = \Config\Database::connect();

        $mapel = $this->request->getVar('mapel');
        $id = $this->request->getVar('id');

        $surah = $this->request->getVar('surah');

        // dd($mapel);
        if ($mapel == '0') {
            $page = "diniyah";
        } else if ($mapel == '1') {
            $page = "ziyadah";
        } else if ($mapel == '2') {
            $page = "bahasa_arab";
        }


        $db->query("DELETE FROM tab_nilai WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil dihapus");
        return redirect()->to($page);
    }
}
