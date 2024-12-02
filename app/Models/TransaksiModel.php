<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['keterangan', 'debet', 'kredit', 'created_at', 'saldo'];
    protected $useTimestamps = false;
}
