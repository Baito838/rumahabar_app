<?php

namespace App\Controllers;

use App\Models\Jadwal;


class Home extends BaseController
{

    protected $jadwal;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->jadwal = new Jadwal();
    }
    public function index(): string
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Abar Rumah Tahfidz"
        ];
        return view('Home', $data);
    }
    public function blog(): string
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Blog"
        ];
        return view('Blog', $data);
    }
    public function pendaftaran(): string
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "harian" => $this->jadwal->Harian(),
            "mingguan" => $this->jadwal->Mingguan(),
            "page" => "Pendaftaran"
        ];
        return view('Pendaftaran', $data);
    }
    public function about(): string
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Tentang Kami"
        ];
        return view('About', $data);
    }
}
