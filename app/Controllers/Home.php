<?php

namespace App\Controllers;

use App\Models\Jadwal;
use App\Models\Artikel;


class Home extends BaseController
{

    protected $jadwal;
    protected $artikel;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->jadwal = new Jadwal();
        $this->artikel = new Artikel();
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
        $db      = \Config\Database::connect();
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "artikel" => $this->artikel->Blog_Active(),
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
            "program" => $this->jadwal->Unggulan(),
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

    public function learn(): string
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Belajar Online"
        ];
        return view('Learn', $data);
    }

    public function Detail($csrf)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tab_blog');

        $blog = $db->query("SELECT tb.csrf as csrf, tb.image AS blog_image, tb.tema as tema, tb.text_1 as text_1, tb.text_2 as text_2, tb.text_3 as text_3, tb.text_4 as text_4, tb.link_yt as link_yt, tb.tanggal as tanggal, tu.username as username, tu.image AS foto FROM tab_blog AS tb JOIN tab_user AS tu ON tb.user_create = tu.id WHERE tb.csrf = '$csrf' ")->getRowArray();

        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "artikel" => $blog,
            "page" => "Artikel"
        ];

        return view('/Artikel', $data);
    }
}
