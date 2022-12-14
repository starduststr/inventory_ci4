<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataBarangModel;

class Superadmin extends BaseController
{
    protected $DataBarangModel;

    function __construct()
    {
        $this->DataBarangModel      = new DataBarangModel();
    }

    public function dashboard()
    {
        $data = ['title' => 'Dashboard'];

        return view('superadmin/dashboard', $data);
    }

    public function barangMasuk()
    {
        $barang = $this->DataBarangModel->where(['kategori'=>'masuk'])->orderBy('id_barang', 'DESC')->findAll();
        $data = ['title' => 'Data Barang Masuk',
                'barang' => $barang,
                'kategori' => 'masuk'];
        
        return view('superadmin/dataBarangMasuk', $data);
    }

    public function barangKeluar()
    {
        $barangMasuk = $this->DataBarangModel->where(['kategori'=>'masuk'])->findAll();
        $barang = $this->DataBarangModel->where(['kategori'=>'keluar'])->orderBy('id_barang', 'DESC')->findAll();
        $data = ['title' => 'Data Barang Keluar',
                'barang' => $barang,
                'kategori' => 'keluar',
                'barangMasuk' => $barangMasuk];
        
        return view('superadmin/dataBarangKeluar', $data);
    }
}
