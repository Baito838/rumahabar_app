<?php

namespace App\Models;

use CodeIgniter\Model;

class Keuangan extends Model
{
    protected $table = 'tab_keuangan';

    public function Pemasukan()
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_keuangan WHERE kind = 1 ORDER BY id DESC");

        return $query->getResultArray();
    }

    public function Pengeluaran()
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_keuangan WHERE kind = 2 ORDER BY id DESC");

        return $query->getResultArray();
    }

    public function Donasi()
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_keuangan WHERE jenis = 'donasi' and kind = 0 ORDER BY id DESC ");

        return $query->getResultArray();
    }
}
