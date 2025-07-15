<?php
namespace App\Controllers;
// use App\Models\BatasTanggalModel;
use CodeIgniter\Controller;

class BatasTanggal extends Controller
{
    public function index()
    {
        $model = new \App\Models\SystemDateLimitsModel();
        $data['batas'] = $model->orderBy('id', 'desc')->first();
        $data['title'] = 'Batas Tanggal Sistem';
        return view('batas_tanggal/index', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $batas_tanggal = $this->request->getPost('batas_tanggal');
        $mode_batas_tanggal = $this->request->getPost('mode');
        $menu = $this->request->getPost('menu');
        $data = [
            'batas_tanggal' => $batas_tanggal,
            'mode_batas_tanggal' => $mode_batas_tanggal,
            'menu' => $menu
        ];
        // Proses di database default
        $modelDefault = new \App\Models\SystemDateLimitsModel();
        $modelDefault->DBGroup = 'default';
        if ($id) {
            $modelDefault->update($id, $data);
        } else {
            $modelDefault->insert($data);
        }
        // Proses di database kedua (db2)
        $modelDb2 = new \App\Models\SystemDateLimitsModel();
        $modelDb2->DBGroup = 'db2';
        if ($id) {
            $modelDb2->update($id, $data);
        } else {
            $modelDb2->insert($data);
        }
        return redirect()->to('batas-tanggal')->with('success', 'Batas tanggal sistem berhasil diupdate di kedua database.');
    }
}
