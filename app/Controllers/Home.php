<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class Home extends BaseController
{
    protected $transaksiModel;
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }
    public function index()
    {
        // return view('welcome_message');
        $keyword = $this->request->getGet('keyword');
        $date = $this->request->getGet('date');
    
        $query = $this->transaksiModel;
    
        if ($keyword) {
            $query = $query->like('keterangan', $keyword);
        }
    
        if ($date) {
            $query = $query->where('DATE(created_at)', $date);
        }
    
        $data['transaksi'] = $this->transaksiModel->paginate(10);
        $data['pager'] = $this->transaksiModel->pager;
        $data['saldo'] = $this->calculateSaldo();
      

    
        return view('main/layout', $data);
    }

    private function calculateSaldo()
{
    $transaksi = $this->transaksiModel->findAll();
    $saldo = 0;

    foreach ($transaksi as $item) {
        $saldo += $item['debet'] - $item['kredit'];
    }

    return $saldo;
}
}
