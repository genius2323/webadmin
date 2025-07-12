<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 'password', 'kode_ky', 'alamat', 'noktp', 'otoritas',
        'deleted_at', 'recovered_at', 'created_at', 'updated_at'
    ];
}
