<?php

namespace App\Models;

use CodeIgniter\Model;

class Nilai extends Model
{

    protected $table = 'tab_nilai';

    public function Diniyah()
    {
        $db      = \Config\Database::connect();

        $query = $db->query("SELECT tn.id as id, ts.nama as santri, tp.nama as pengajar, tn.kegiatan as kegiatan, tn.keterangan keterangan,tn.surah as surah , waktu FROM tab_nilai as tn JOIN tab_bio as ts ON tn.santri = ts.id JOIN tab_bio as tp ON tn.pengajar = tp.id WHERE mapel = 0 ORDER BY id DESC");

        return $query->getResultArray();
    }
    public function Ziyadah()
    {
        $db      = \Config\Database::connect();

        $query = $db->query("SELECT tn.id as id, ts.nama as santri, tp.nama as pengajar, tn.kegiatan as kegiatan, tn.keterangan keterangan,tn.surah as surah , waktu FROM tab_nilai as tn JOIN tab_bio as ts ON tn.santri = ts.id JOIN tab_bio as tp ON tn.pengajar = tp.id WHERE mapel = 1 ORDER BY id DESC");

        return $query->getResultArray();
    }
    public function Bahasa_Arab()
    {
        $db      = \Config\Database::connect();

        $query = $db->query("SELECT tn.id as id, ts.nama as santri, tp.nama as pengajar, tn.kegiatan as kegiatan, tn.keterangan keterangan,tn.surah as surah , waktu FROM tab_nilai as tn JOIN tab_bio as ts ON tn.santri = ts.id JOIN tab_bio as tp ON tn.pengajar = tp.id WHERE mapel = 2 ORDER BY id DESC");

        return $query->getResultArray();
    }

    public function Absen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date_default_timezone_get();
        $date = date('Y-m-d', time());

        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_bio WHERE role_user = 3");

        return $query->getResultArray();
    }

    public function Absen_Santri()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date_default_timezone_get();
        $date = date('Y-m-d', time());

        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_bio WHERE role_user = 5");

        return $query->getResultArray();
    }

}
