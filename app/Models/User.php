<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'tab_user';

    public function User(){
        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_user");

        return $query->getResultArray();
    }
    public function Role(){
        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_role");

        return $query->getResultArray();
    }

    
}