<?php

namespace App\Models;

use CodeIgniter\Model;

class MNotifikasi extends Model
{
    protected $table            = 'notifikasi';
    protected $primaryKey       = 'id_notifikasi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_notifikasi',	'pengirim',	'pesan', 'tgl_notifikasi'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    
    public function getAllNotifikasi()
    {
        $notifikasi = new MNotifikasi;
        $queryNotifikasi = $notifikasi->query("SELECT * FROM notifikasi")->getResult();
        return $queryNotifikasi;
    }    

    public function getNumber($nama)
    {
        $petugas=NEW MPetugas;
        $queryNotifikasi = $notifikasi->query("SELECT no_telp FROM petugas WHERE nama_petugas = '".$nama."'")->getResult();
        return $queryNotifikasi;
    } 
}
