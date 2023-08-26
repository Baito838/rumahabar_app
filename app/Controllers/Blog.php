<?php

namespace App\Controllers;

use App\Models\Artikel;

class Blog extends BaseController
{
    protected $blog;

    public function __construct()
    {
        $this->blog = new Artikel();
    }
    public function Tambah_Artikel()
    {
        // dd($this->request->getVar());
        $db      = \Config\Database::connect();

        if (!$this->validate([
            'foto_baru' => [
                'label'  => 'foto_baru',
                'rules'  => 'ext_in[foto_baru,png,jpg,jpeg]|mime_in[foto_baru,image/png,image/jpeg]|max_size[foto_baru,2048]',
                'errors' => [
                    'mime_in' => 'File harus png, jpeg dan jpg',
                    'ext_in' => 'File Harus Berupa Foto',
                    'max_size' => 'Maksimal ukuran 2mb',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            if ($validation) {
                if ($validation->getError('foto_baru')) {
                    session()->setFlashdata('warning', $validation->getError('foto_baru'));
                    return redirect()->to('profile');
                }
            }
        }

        $foto = $this->request->getFile('foto_baru');
        $kegiatan = $this->request->getVar('kegiatan');
        $text_1 = $this->request->getVar('teks_1');
        $text_2 = $this->request->getVar('teks_2');
        $text_3 = $this->request->getVar('teks_3');
        $text_4 = $this->request->getVar('teks_4');
        $link_yt = $this->request->getVar('link_yt');
        $user = $this->request->getVar('user');
        $csrf = $this->request->getVar('csrf_test_name');


        if ($foto->getError() == 4) {
            session()->setFlashdata('warning', "Artikel Gagal Diupload");
            return redirect()->to('dashboard');
        } else {

            $nama_foto = $foto->getRandomName();
            $foto->move('blog/', $nama_foto);
            $db->query("INSERT INTO tab_blog(image,tema,text_1,text_2,text_3,text_4,link_yt,csrf,user_create) VALUES ('$nama_foto','$kegiatan','$text_1','$text_2','$text_3','$text_4','$link_yt', '$csrf', '$user')");

            session()->setFlashdata('success', "Artikel berhasil diupload");
            return redirect()->to('dashboard');
        }
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

        return view('/Dashboard/Artikel', $data);
    }

    public function Artikel(): string
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "page" => "Blog"
        ];
        return view('Dashboard/Blog', $data);
    }

    public function Artikel_CRUD(): string
    {
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "blog" => $this->blog->Blog(),
            "page" => "Blog"
        ];
        return view('Dashboard/Blog', $data);
    }


    public function Artikel_Ubah()
    {
        // dd($_FILES);

        $db      = \Config\Database::connect();

        if (!$this->validate([
            'foto_baru' => [
                'label'  => 'foto_baru',
                'rules'  => 'ext_in[foto_baru,png,jpg,jpeg]|mime_in[foto_baru,image/png,image/jpeg]|max_size[foto_baru,2048]',
                'errors' => [
                    'mime_in' => 'File harus png, jpeg dan jpg',
                    'ext_in' => 'File Harus Berupa Foto',
                    'max_size' => 'Maksimal ukuran 2mb',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            if ($validation) {
                if ($validation->getError('foto_baru')) {
                    session()->setFlashdata('warning', $validation->getError('foto_baru'));
                    return redirect()->to('profile');
                }
            }
        }

        $id = $this->request->getVar('id');
        $foto = $this->request->getFile('foto_baru');
        $foto_lama = $this->request->getVar('foto_lama');
        $kegiatan = $this->request->getVar('kegiatan');
        $text_1 = $this->request->getVar('teks_1');
        $text_2 = $this->request->getVar('teks_2');
        $text_3 = $this->request->getVar('teks_3');
        $text_4 = $this->request->getVar('teks_4');
        $link_yt = $this->request->getVar('link_yt');
        $status = $this->request->getVar('status');

        // dd($foto_lama);

        if ($foto->getError() == 4) {
            $db->query("UPDATE tab_blog SET status = '$status',tema = '$kegiatan', text_1 = '$text_1', text_2 = '$text_2', text_3 = '$text_3', text_4 = '$text_4', link_yt = '$link_yt' WHERE id = '$id'");

            session()->setFlashdata('success', "Data berhasil diubah");
            return redirect()->to('blog_update');
        } else {

            // dd($foto_lama);

            if ($foto_lama != 'default.png' || $foto_lama != "") {
                unlink('blog/' . $foto_lama);
            }

            $nama_foto = $foto->getRandomName();

            $foto->move('blog', $nama_foto);

            $db->query("UPDATE tab_blog SET tema = '$kegiatan', text_1 = '$text_1', text_2 = '$text_2', text_3 = '$text_3', text_4 = '$text_4', link_yt = '$link_yt' , image = '$nama_foto' WHERE id = '$id'");

            session()->setFlashdata('success', "Data berhasil diubah");
            return redirect()->to('blog_update');
        }
    }

    public function Hapus()
    {
        // dd($this->request->getVar());

        $db      = \Config\Database::connect();

        $id = $this->request->getVar('id');
        $foto_lama = $this->request->getVar('foto_lama');
        unlink('blog/' . $foto_lama);

        $db->query("DELETE FROM tab_blog WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil dihapus");
        return redirect()->to('blog_update');
    }
}
