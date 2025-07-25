<?php
namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'description', 'deleted_at', 'recovered_at', 'created_at'
    ];
}
