<?php

namespace App\Controllers;

use App\Models\Userdata;


class Biodata extends BaseController
{

    protected $userdata;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->userdata = new Userdata();
    }
    public function User()
    {
        if($this->page == 'santri'){
            $page = 5;
        } else if($this->page == 'wali'){
            $page = 4;
        } else if ($this->page == 'karyawan') {
            $page = 3;
        }
        $data = [
            "url" => $this->page,
            "user" => $this->session_login(),
            "santri" => $this->userdata->Bio($page),
            "page" => "Database"
        ];
        return view('Dashboard/Biodata', $data);
    }

    public function Create(){
        // dd($this->request->getVar());
        $page = $this->request->getVar('page');
        $nama = $this->request->getVar('nama');
        $nisn = $this->request->getVar('nisn');
        $nig = $this->request->getVar('nig');
        $wali = $this->request->getVar('wali');
        $ttl = $this->request->getVar('ttl');
        $telfon = $this->request->getVar('telfon');
        $ktp = $this->request->getVar('ktp');
        $alamat = $this->request->getVar('alamat');
        $role = $this->request->getVar('role');

        $db      = \Config\Database::connect();

        $db->query("INSERT INTO tab_bio(nama,nisn,nig,wali,ttl,telfon,ktp,alamat,role_user) VALUES ('$nama','$nisn','$nig','$wali','$ttl','$telfon','$ktp','$alamat','$role')");
        session()->setFlashdata('success', "Data berhasil ditambahkan");

        return redirect()->to($page);
    }
    public function Update(){
        // dd($this->request->getVar());

        $id = $this->request->getVar('id');
        $page = $this->request->getVar('page');
        $nama = $this->request->getVar('nama');
        $nisn = $this->request->getVar('nisn');
        $wali = $this->request->getVar('wali');
        $ttl = $this->request->getVar('ttl');
        $telfon = $this->request->getVar('telfon');
        $ktp = $this->request->getVar('ktp');
        $alamat = $this->request->getVar('alamat');
        $role = $this->request->getVar('role');

        $db      = \Config\Database::connect();

        $db->query("UPDATE tab_bio SET nama = '$nama' , nisn = '$nisn' , wali = '$wali' ,ttl = '$ttl', telfon = '$telfon', ktp = '$ktp' , alamat = '$alamat' WHERE id = '$id' ");
        session()->setFlashdata('success', "Data berhasil diubah");

        return redirect()->to($page);
    }
    public function Delete(){
        // dd($this->request->getVar());

        $id = $this->request->getVar('id');
        $page = $this->request->getVar('page');

        $db      = \Config\Database::connect();

        $db->query("DELETE FROM tab_bio WHERE id = '$id'");
        session()->setFlashdata('success', "Data berhasil dihapus");
        return redirect()->to($page);
    }
}
