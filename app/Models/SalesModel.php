<?php
namespace App\Models;
use CodeIgniter\Model;

class SalesModel extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nomor_nota', 'tanggal_nota', 'customer', 'sales', 'total', 'discount', 'tax', 'grand_total', 'payment_a', 'payment_b', 'account_receivable', 'payment_system', 'otoritas', 'batas_tanggal_sistem', 'mode_batas_tanggal', 'created_at', 'updated_at', 'deleted_at'
    ];
}
