<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Penjualan extends Controller
{
    public function add_item()
    {
        $sales_id = $this->request->getPost('sales_id');
        $product_code = $this->request->getPost('product_code');
        $product_name = $this->request->getPost('product_name');
        $qty = $this->request->getPost('qty');
        $unit = $this->request->getPost('unit');
        $price = $this->request->getPost('price');
        $discount = $this->request->getPost('discount');
        $total = $this->request->getPost('total');
        $salesItemsModel = new \App\Models\SalesItemsModel();
        $data = [
            'sales_id' => $sales_id,
            'product_code' => $product_code,
            'product_name' => $product_name,
            'qty' => $qty,
            'unit' => $unit,
            'price' => $price,
            'discount' => $discount,
            'total' => $total
        ];
        $item_id = $salesItemsModel->insert($data);
        return $this->response->setJSON([
            'success' => true,
            'item_id' => $item_id
        ]);
    }

    public function book_nota()
    {
        $nomor_nota = $this->request->getPost('nomor_nota');
        $tanggal_nota = $this->request->getPost('tanggal_nota');
        if (!$nomor_nota || !$tanggal_nota) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Nomor nota dan tanggal nota wajib diisi.'
            ]);
        }
        $salesModel = new \App\Models\SalesModel();
        $data = [
            'nomor_nota' => $nomor_nota,
            'tanggal_nota' => $tanggal_nota,
        ];
        $sales_id = $salesModel->insert($data);
        if (!$sales_id) {
            log_message('error', 'Gagal insert sales: ' . json_encode($data));
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menyimpan data ke database.'
            ]);
        }
        return $this->response->setJSON([
            'success' => true,
            'sales_id' => $sales_id
        ]);
    }
    // ...existing code...
    public function index()
    {
        $dateLimitModel = new \App\Models\SystemDateLimitsModel();
    // ...existing code...
        $limit = $dateLimitModel->where('menu', 'penjualan')->orderBy('id', 'desc')->first();
        $mode_batas_tanggal = $limit['mode_batas_tanggal'] ?? 'manual';
        $batas_tanggal_sistem = $limit['batas_tanggal'] ?? date('Y-m-d');
        $data = [
            'nomor_nota' => '',
            'tanggal_nota' => date('Y-m-d'),
            'customer' => '',
            'sales' => '',
            'position' => '',
            'mode_batas_tanggal' => $mode_batas_tanggal,
            'batas_tanggal_sistem' => $batas_tanggal_sistem,
        ];
        return view('penjualan/index', $data);
    }

    public function simpan()
    {
        // Proses simpan data penjualan
        // ...
        return redirect()->to('penjualan')->with('success', 'Transaksi penjualan berhasil disimpan.');
    }
}
