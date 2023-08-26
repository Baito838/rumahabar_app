<?php

namespace App\Models;

use CodeIgniter\Model;

class Absensi extends Model
{
    protected $table = 'tab_absen';

    public function Absen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date_default_timezone_get();
        $date = date('Y-m-d', time());

        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_absen WHERE tanggal LIKE '%$date%' AND role_user = 1 ORDER BY id DESC");

        return $query->getResultArray();
    }

    public function Absen_Santri()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date_default_timezone_get();
        $date = date('Y-m-d', time());

        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_absen WHERE tanggal LIKE '%$date%' AND role_user = 0 ORDER BY id DESC");

        return $query->getResultArray();
    }

    public function Absen_Full()
    {
        date_default_timezone_set('Asia/Jakarta');
        $time = date_default_timezone_get();
        $date = date('Y-m-d', time());

        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_absen");

        return $query->getResultArray();
    }
}
