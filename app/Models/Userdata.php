<?php

namespace App\Models;

use CodeIgniter\Model;

class Userdata extends Model
{
    protected $table = 'tab_user';

    public function Bio($role){
        $db      = \Config\Database::connect();

        $query = $db->query("SELECT * FROM tab_bio WHERE role_user = '$role' ORDER BY role_user ASC");

        return $query->getResultArray();
    }

    
}