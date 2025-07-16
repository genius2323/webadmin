<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenjualanModel;
use App\Models\ItemPenjualanModel;

class Penjualan extends BaseController
{
    protected $penjualanModel;
    protected $itemPenjualanModel;

    public function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
        $this->itemPenjualanModel = new ItemPenjualanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Penjualan',
            'penjualan' => $this->penjualanModel->findAll(),
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
            'nomor_nota'   => 'required|is_unique[penjualan.nomor_nota]',
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
            'total_harga'  => 0,
        ];

        $penjualanId = $this->penjualanModel->insert($data, true);

        if ($penjualanId) {
            session()->setFlashdata('success', 'Data penjualan berhasil dibuat. Silakan tambahkan rincian barang.');
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

        $items = $this->itemPenjualanModel->where('penjualan_id', $id)->findAll();

        $data = [
            'title' => 'Detail Penjualan: ' . $penjualan['nomor_nota'],
            'penjualan' => $penjualan,
            'items' => $items,
        ];

        return view('penjualan/detail', $data);
    }

    public function addItem($penjualanId)
    {
        $rules = [
            'nama_barang'  => 'required|string|max_length[255]',
            'jumlah'       => 'required|integer|greater_than[0]',
            'harga_satuan' => 'required|numeric|greater_than_equal_to[0]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'penjualan_id' => $penjualanId,
            'nama_barang'  => $this->request->getPost('nama_barang'),
            'jumlah'       => $this->request->getPost('jumlah'),
            'harga_satuan' => $this->request->getPost('harga_satuan'),
        ];

        if ($this->itemPenjualanModel->insert($data)) {
            $totalHarga = $this->itemPenjualanModel->calculateTotal($penjualanId);
            $this->penjualanModel->update($penjualanId, ['total_harga' => $totalHarga]);
            session()->setFlashdata('success', 'Item berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan item.');
        }

        return redirect()->to('/penjualan/detail/' . $penjualanId);
    }

    public function deleteItem($itemId)
    {
        $item = $this->itemPenjualanModel->find($itemId);

        if ($item) {
            $penjualanId = $item['penjualan_id'];
            if ($this->itemPenjualanModel->delete($itemId)) {
                $totalHarga = $this->itemPenjualanModel->calculateTotal($penjualanId);
                $this->penjualanModel->update($penjualanId, ['total_harga' => $totalHarga]);
                session()->setFlashdata('success', 'Item berhasil dihapus.');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus item.');
            }
            return redirect()->to('/penjualan/detail/' . $penjualanId);
        }

        session()->setFlashdata('error', 'Item tidak ditemukan.');
        return redirect()->back();
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
