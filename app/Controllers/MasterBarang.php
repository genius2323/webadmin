<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MasterBarangModel;

class MasterBarang extends BaseController
{
    public function index()
    {
        $model = new MasterBarangModel();
        // Join ke master kategori, satuan, jenis, merk
        $products = $model
            ->select('products.*, categories.name as category_name, satuan.name as satuan_name, jenis.name as jenis_name, merk.name as merk_name, daya.name as daya_name, dimensi.name as dimensi_name, fiting.name as fiting_name, gondola.name as gondola_name, jumlah_mata.name as jumlah_mata_name, kaki.name as kaki_name, model.name as model_name, pelengkap.name as pelengkap_name, ukuran_barang.name as ukuran_barang_name, voltase.name as voltase_name, warna_bibir.name as warna_bibir_name, warna_body.name as warna_body_name, warna_sinar.name as warna_sinar_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->join('satuan', 'satuan.id = products.satuan_id', 'left')
            ->join('jenis', 'jenis.id = products.jenis_id', 'left')
            ->join('merk', 'merk.id = products.merk_id', 'left')
            ->join('daya', 'daya.id = products.daya_id', 'left')
            ->join('dimensi', 'dimensi.id = products.dimensi_id', 'left')
            ->join('fiting', 'fiting.id = products.fiting_id', 'left')
            ->join('gondola', 'gondola.id = products.gondola_id', 'left')
            ->join('jumlah_mata', 'jumlah_mata.id = products.jumlah_mata_id', 'left')
            ->join('kaki', 'kaki.id = products.kaki_id', 'left')
            ->join('model', 'model.id = products.model_id', 'left')
            ->join('pelengkap', 'pelengkap.id = products.pelengkap_id', 'left')
            ->join('ukuran_barang', 'ukuran_barang.id = products.ukuran_barang_id', 'left')
            ->join('voltase', 'voltase.id = products.voltase_id', 'left')
            ->join('warna_bibir', 'warna_bibir.id = products.warna_bibir_id', 'left')
            ->join('warna_body', 'warna_body.id = products.warna_body_id', 'left')
            ->join('warna_sinar', 'warna_sinar.id = products.warna_sinar_id', 'left')
            ->findAll();
        return view('masterbarang/index', [
            'products' => $products,
            'title' => 'Master Barang',
        ]);
    }
}
