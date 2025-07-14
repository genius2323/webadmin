<?php
namespace App\Controllers;

use App\Models\MasterDayaModel;

class MasterDaya extends BaseController
{
    public function index()
    {
        $model = new MasterDayaModel();
        $data['data'] = $model->where('deleted_at', null)->findAll();
        return view('master_daya/index', $data);
    }

    public function create()
    {
        return view('master_daya/create');
    }

    public function store()
    {
        $model = new MasterDayaModel();
        $db2 = \Config\Database::connect('db2');
        $nama_ky = session()->get('user_nama');
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'otoritas' => null,
            'nama_ky' => $nama_ky,
        ];
        $model->insert($data);
        $id = $model->getInsertID();
        $dataDb2 = $data;
        $dataDb2['id'] = $id;
        $db2->table('daya')->insert($dataDb2);
        return redirect()->to('masterdaya')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new MasterDayaModel();
        $dataItem = $model->find($id);
        if (!$dataItem || $dataItem['deleted_at']) {
            return redirect()->to('masterdaya')->with('error', 'Data tidak ditemukan.');
        }
        return view('master_daya/edit', ['data' => $dataItem]);
    }

    public function update($id)
    {
        $model = new MasterDayaModel();
        $db2 = \Config\Database::connect('db2');
        $dataItem = $model->find($id);
        if (!$dataItem || $dataItem['deleted_at']) {
            return redirect()->to('masterdaya')->with('error', 'Data tidak ditemukan.');
        }
        $nama_ky = session()->get('user_nama');
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'otoritas' => null,
            'nama_ky' => $nama_ky,
        ];
        $model->update($id, $data);
        $dataDb2 = $data;
        $dataDb2['id'] = $id;
        $db2->table('daya')->where('id', $id)->update($dataDb2);
        return redirect()->to('masterdaya')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $model = new MasterDayaModel();
        $db2 = \Config\Database::connect('db2');
        $dataItem = $model->find($id);
        if (!$dataItem || $dataItem['deleted_at']) {
            return redirect()->to('masterdaya')->with('error', 'Data tidak ditemukan.');
        }
        $nama_ky = session()->get('user_nama');
        $model->update($id, [
            'deleted_at' => date('Y-m-d H:i:s'),
            'nama_ky' => $nama_ky
        ]);
        $db2->table('daya')->where('id', $id)->update([
            'deleted_at' => date('Y-m-d H:i:s'),
            'nama_ky' => $nama_ky
        ]);
        return redirect()->to('masterdaya')->with('success', 'Data berhasil dihapus (soft delete) di dua database');
    }
}
