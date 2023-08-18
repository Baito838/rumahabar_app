<?php

namespace App\Controllers;

use App\Models\Jadwal;

class Dashboard extends BaseController
{

    protected $jadwal;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->jadwal = new Jadwal();
    }
    public function index()
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
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
            "page" => "Jadwal"
        ];
        return view('/Dashboard/Jadwal', $data);
    }
}
