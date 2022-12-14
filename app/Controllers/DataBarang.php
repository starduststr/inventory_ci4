<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataBarangModel;

class DataBarang extends BaseController
{
    protected $DataBarangModel;


    function __construct()
    {
        $this->DataBarangModel      = new DataBarangModel();
    }

    public function insert()
    {
        $data  = ['nama_barang'     =>$this->request->getPost('nama_barang'),
                'status_barang'     =>$this->request->getPost('status_barang'),
                'kategori'          =>$this->request->getPost('kategori'),
                'stok'              =>$this->request->getPost('stok'),
                'rak'               =>$this->request->getPost('rak'), 
                'toko'              =>$this->request->getPost('toko')];
        // dd($this->request->getPost());
        if($this->DataBarangModel->insert($data)){
            return redirect()->back()->with('success', 'Data Barang Berhasil Diinput');
        }
        return redirect()->back()->with('failed', 'Data Barang Gagal Diinput');

    }

    public function update()
    {
        $data  = ['nama_barang'     =>$this->request->getPost('nama_barang'),
                'status_barang'     =>$this->request->getPost('status_barang'),
                'kategori'          =>$this->request->getPost('kategori'),
                'stok'              =>$this->request->getPost('stok'),
                'rak'               =>$this->request->getPost('rak'), 
                'toko'              =>$this->request->getPost('toko')];
        
        if($this->DataBarangModel->update($this->request->getPost('id_barang'),$data)){
            return redirect()->back()->with('success', 'Data Barang Berhasil Diupdate.');
        }

        return redirect()->back()->with('failed', 'Data Barang Gagal Diupdate');
    }

    public function delete()
    {
        $id = $this->request->getVar('id_barang');

        if($this->DataBarangModel->delete($id)){
            return redirect()->back()->with('success', 'Data Barang Berhasil Dihapus');
        }

        return redirect()->back()->with('failed', 'Data Barang Gagal Dihapus');
    }
}
