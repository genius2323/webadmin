<?php
namespace App\Models;
use CodeIgniter\Model;

class SalesItemsModel extends Model
{
    protected $table = 'sales_items';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'sales_id', 'product_id', 'product_code', 'product_name', 'qty', 'unit', 'price', 'discount', 'total', 'created_at', 'updated_at', 'deleted_at'
    ];
}
