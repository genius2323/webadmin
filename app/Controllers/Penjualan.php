<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenjualanModel;

class Penjualan extends BaseController
{
    protected $penjualanModel;

    public function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
    }

    public function index()
    {
        $nomor_nota = 'INV-' . date('Ymd') . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 5));
        $data = [
            'title' => 'Daftar Penjualan',
            'penjualan' => $this->penjualanModel->findAll(),
            'nomor_nota' => $nomor_nota,
        ];
        return view('penjualan/index', $data);
    }

    public function new()
    {
        $nomor_nota = 'INV-' . date('Ymd') . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 5));

        $data = [
            'title' => 'Tambah Penjualan',
            'nomor_nota' => $nomor_nota,
        ];
        return view('penjualan/form', $data);
    }

    public function create()
    {
        $rules = [
            'tanggal_nota' => 'required',
            'nomor_nota'   => 'required|is_unique[sales.nomor_nota]',
            'customer'     => 'required|string|max_length[100]',
            'sales'        => 'required|string|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $tanggal_nota_db = \DateTime::createFromFormat('d/m/Y', $this->request->getPost('tanggal_nota'))->format('Y-m-d');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', 'Format tanggal tidak valid.');
        }

        $data = [
            'nomor_nota'   => $this->request->getPost('nomor_nota'),
            'tanggal_nota' => $tanggal_nota_db,
            'customer'     => $this->request->getPost('customer'),
            'sales'        => $this->request->getPost('sales'),
            'status'       => 'draft',
            'grand_total'  => 0,
        ];

        $penjualanId = $this->penjualanModel->insert($data, true);

        if ($penjualanId) {
            // Simpan juga ke database kedua (db2)
            $db2 = \Config\Database::connect('db2');
            $dataDb2 = $data;
            $dataDb2['id'] = $penjualanId;
            $db2->table('sales')->insert($dataDb2);

            session()->setFlashdata('success', 'Data penjualan berhasil dibuat di dua database. Silakan tambahkan rincian barang.');
            return redirect()->to('/penjualan/detail/' . $penjualanId);
        }

        session()->setFlashdata('error', 'Gagal menyimpan data penjualan.');
        return redirect()->back()->withInput();
    }

    public function detail($id)
    {
        $penjualan = $this->penjualanModel->find($id);

        if (!$penjualan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data penjualan tidak ditemukan.');
        }

        $items = [];

        $data = [
            'title' => 'Detail Penjualan: ' . $penjualan['nomor_nota'],
            'penjualan' => $penjualan,
            'items' => $items,
        ];

        return view('penjualan/detail', $data);
    }



    public function finalize($penjualanId)
    {
        $penjualan = $this->penjualanModel->find($penjualanId);

        if ($penjualan && $penjualan['status'] === 'draft') {
            if ($this->penjualanModel->update($penjualanId, ['status' => 'completed'])) {
                session()->setFlashdata('success', 'Penjualan telah diselesaikan.');
            } else {
                session()->setFlashdata('error', 'Gagal menyelesaikan penjualan.');
            }
        } else {
            session()->setFlashdata('error', 'Penjualan tidak ditemukan atau sudah diselesaikan.');
        }

        return redirect()->to('/penjualan/detail/' . $penjualanId);
    }
}
