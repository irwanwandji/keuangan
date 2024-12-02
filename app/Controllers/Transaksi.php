<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

// use App\Models\Transaksimodel;

class Transaksi extends BaseController
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
{
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
    return view('transaksi/index', $data);
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


    public function create()
    {
        return view('transaksi/create');
    }

    public function store()
{
    $rules = [
        'keterangan' => 'required|min_length[3]|max_length[255]',
        'debet' => 'permit_empty|decimal',
        'kredit' => 'permit_empty|decimal',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Ambil saldo terakhir
    $currentSaldo = $this->calculateCurrentSaldo();

    // Ambil input debet dan kredit
    $debet = $this->request->getPost('debet') ?: 0;
    $kredit = $this->request->getPost('kredit') ?: 0;

    // Hitung saldo baru
    $saldo = $currentSaldo + $debet - $kredit;

    // Simpan transaksi dengan saldo
    $this->transaksiModel->save([
        'keterangan' => $this->request->getPost('keterangan'),
        'debet' => $debet,
        'kredit' => $kredit,
        'saldo' => $saldo,
    ]);

    return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil ditambahkan.');
}

private function calculateCurrentSaldo()
{
    $lastTransaction = $this->transaksiModel->orderBy('id', 'DESC')->first();
    return $lastTransaction ? $lastTransaction['saldo'] : 0;
}


}
