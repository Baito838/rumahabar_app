<?php

namespace App\Models;

use CodeIgniter\Model;

class Artikel extends Model
{
    protected $table = 'tab_blog';

    public function Blog()
    {

        $db      = \Config\Database::connect();

        $query = $db->query("SELECT tb.csrf as csrf, tb.id as id, tb.status as status, tb.image AS blog_image, tb.tema as tema, tb.text_1 as text_1, tb.text_2 as text_2, tb.text_3 as text_3, tb.text_4 as text_4, tb.link_yt as link_yt, tb.tanggal as tanggal, tu.username as username, tu.image AS foto FROM tab_blog AS tb JOIN tab_user AS tu ON tb.user_create = tu.id ORDER BY id DESC");

        return $query->getResultArray();
    }

    public function Blog_Active()
    {

        $db      = \Config\Database::connect();

        $query = $db->query("SELECT tb.csrf as csrf, tb.id as id, tb.status as status, tb.image AS blog_image, tb.tema as tema, tb.text_1 as text_1, tb.text_2 as text_2, tb.text_3 as text_3, tb.text_4 as text_4, tb.link_yt as link_yt, tb.tanggal as tanggal, tu.username as username, tu.image AS foto FROM tab_blog AS tb JOIN tab_user AS tu ON tb.user_create = tu.id WHERE tb.status = 1 ORDER BY id DESC");

        return $query->getResultArray();
    }
}
