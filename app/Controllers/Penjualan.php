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
        // Membuat nomor nota unik, contoh: INV-20231027-ABCDE
        $nomor_nota = 'INV-' . date('Ymd') . '-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 5));

        $data = [
            'title' => 'Tambah Penjualan',
            'nomor_nota' => $nomor_nota,
        ];
        return view('penjualan/index', $data);
    }

    public function create()
    {
        // 1. Validasi Input
        $rules = [
            'tanggal_nota' => 'required',
            'nomor_nota'   => 'required|is_unique[penjualan.nomor_nota]',
            'customer'     => 'required|string|max_length[100]',
            'sales'        => 'required|string|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Konversi Format Tanggal (dari d/m/Y ke Y-m-d untuk database)
        try {
            $tanggal_nota_db = \DateTime::createFromFormat('d/m/Y', $this->request->getPost('tanggal_nota'))->format('Y-m-d');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->with('error', 'Format tanggal tidak valid.');
        }

        // 3. Siapkan data untuk disimpan
        $data = [
            'nomor_nota'   => $this->request->getPost('nomor_nota'),
            'tanggal_nota' => $tanggal_nota_db,
            'customer'     => $this->request->getPost('customer'),
            'sales'        => $this->request->getPost('sales'),
            'status'       => 'draft', // Status awal saat nota baru dibuat
            'total_harga'  => 0,
        ];

        // 4. Simpan data dan dapatkan ID nya
        $penjualanId = $this->penjualanModel->insert($data, true);

        if ($penjualanId) {
            session()->setFlashdata('success', 'Data penjualan berhasil dibuat. Silakan tambahkan rincian barang.');
            // 5. Redirect ke halaman detail untuk menambah item
            return redirect()->to('/penjualan/detail/' . $penjualanId);
        }

        session()->setFlashdata('error', 'Gagal menyimpan data penjualan.');
        return redirect()->back()->withInput();
    }

    /**
     * Halaman untuk menampilkan detail penjualan dan menambah item barang.
     */
    public function detail($id)
    {
        $penjualan = $this->penjualanModel->find($id);

        if (!$penjualan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data penjualan tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Penjualan: ' . $penjualan['nomor_nota'],
            'penjualan' => $penjualan,
            // Nanti di sini kita akan tambahkan data item/barang yang sudah ditambahkan
            // 'items' => $this->itemPenjualanModel->where('penjualan_id', $id)->findAll()
        ];

        // Tampilkan view untuk menambah item (akan kita buat selanjutnya)
        return view('penjualan/detail', $data);
    }
}