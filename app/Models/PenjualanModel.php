<?php
namespace App\Models;
use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nomor_nota', 'tanggal_nota', 'customer', 'sales', 'position',
        'code', 'name', 'qty', 'unit', 'price', 'd1', 'd2', 'd3', 'd4', 'discount', 'total', 'co_no',
        'payment_system', 'picture', 'discount_total', 'tax', 'grand_total', 'down_payment', 'payment_a', 'payment_b', 'account_receivable'
    ];
}
