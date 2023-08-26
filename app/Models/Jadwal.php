<?php

namespace App\Models;

use CodeIgniter\Model;

class Jadwal extends Model
{
    protected $table = 'tab_kegiatan_harian';

    public function Harian(){
        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_kegiatan_harian");

        return $query->getResultArray();
    }
    public function Mingguan(){
        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_kegiatan_mingguan");

        return $query->getResultArray();
    }

    public function Unggulan(){
        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_unggulan");

        return $query->getResultArray();
    }

    
}