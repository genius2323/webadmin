<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemPenjualanModel extends Model
{
    protected $table            = 'item_penjualan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['penjualan_id', 'nama_barang', 'jumlah', 'harga_satuan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'penjualan_id' => 'required|integer',
        'nama_barang'  => 'required|string|max_length[255]',
        'jumlah'       => 'required|integer',
        'harga_satuan' => 'required|decimal',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    /**
     * Menghitung total harga dari semua item untuk sebuah penjualan.
     *
     * @param int $penjualanId
     * @return float
     */
    public function calculateTotal(int $penjualanId): float
    {
        $items = $this->where('penjualan_id', $penjualanId)->findAll();
        $total = 0.0;
        foreach ($items as $item) {
            $total += $item['jumlah'] * $item['harga_satuan'];
        }
        return $total;
    }
}
