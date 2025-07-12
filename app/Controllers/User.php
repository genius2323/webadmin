<?php
namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->where('deleted_at', null)->findAll();
        return view('user/index', ['users' => $users]);
    }

    public function create()
    {
        // Ambil daftar departemen dari database utama
        $db = \Config\Database::connect();
        $departments = $db->table('departments')->where('deleted_at', null)->get()->getResultArray();
        return view('user/create', ['departments' => $departments]);
    }

    public function store()
    {
        $userModel = new UserModel();
        $userDepartmentModel = new \App\Models\UserDepartmentModel();
        $db2 = \Config\Database::connect('db2');

        $data = [
            'kode_ky' => $this->request->getPost('kode_ky'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'alamat' => $this->request->getPost('alamat'),
            'noktp' => $this->request->getPost('noktp'),
            'otoritas' => null,
        ];
        // Simpan user di database utama
        $userModel->insert($data);
        $userId = $userModel->getInsertID();

        // Simpan user di database kedua
        $db2->table('users')->insert($data);
        $userIdDb2 = $db2->insertID();

        // Simpan relasi user-departemen di kedua database
        $departments = $this->request->getPost('departments');
        foreach ($departments as $deptId) {
            $userDepartmentModel->insert([
                'user_id' => $userId,
                'department_id' => $deptId
            ]);
            $db2->table('user_departments')->insert([
                'user_id' => $userIdDb2,
                'department_id' => $deptId
            ]);
        }

        return redirect()->to('user')->with('success', 'User berhasil ditambahkan di dua database');
    }

    public function edit($id)
    {
        // Implementasi edit user
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userDepartmentModel = new \App\Models\UserDepartmentModel();

        $now = date('Y-m-d H:i:s');
        // Soft delete user di database utama
        $userModel->update($id, ['deleted_at' => $now]);
        // Soft delete relasi user_departments di database utama
        $userDepartmentModel->where('user_id', $id)->set(['deleted_at' => $now])->update();

        // Soft delete di database kedua (misal: db2)
        $db2 = \Config\Database::connect('db2');
        $db2->table('users')->where('id', $id)->update(['deleted_at' => $now]);
        $db2->table('user_departments')->where('user_id', $id)->update(['deleted_at' => $now]);

        return redirect()->to('user')->with('success', 'User berhasil dihapus (soft delete di dua database)');
    }
}
