<?php

namespace App\Models;

use CodeIgniter\Model;

class MPemasanganPending extends Model
{
    protected $table            = 'pemasangan_pending';
    protected $primaryKey       = 'id_pending';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pending', 'id_pemasangan', 'keterangan'];

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

    public function getAllPemasanganPending(){
        $pending= NEW MPemasanganPending;
        $queryPemasanganPending=$pending->query("CALL sp_select_pemasangan_pending")->getResult();
        return $queryPemasanganPending;
    }

    public function hapusPending($id){
        $pending= NEW MPemasanganPending;
        $pending->query("DELETE FROM pemasangan_pending WHERE id_pending='".$id."'");
    }

    
    public function pending($data){
        $pending= NEW MPemasanganPending;
        $idpelanggan           = $data['id_pelanggan'];
        $keterangan            = $data['keterangan'];
        $pending->query("CALL sp_create_pending('".$idpelanggan."','".$keterangan."')");
    }

    // public function simpan($data){
    //     $pemasangan=NEW MPemasangan;
    //     // $idpemasangan        = $data['id_pemasangan'];
    //     $idpetugas        = $data['id_petugas'];
    //     $idpelanggan        = $data['id_pelanggan'];
    //     $namapelanggan        = $data['nama_pelanggan'];
    //     $alamat        = $data['alamat'];
    //     $notelp        = $data['no_telp'];
    //     $pkba        = $data['PKBA'];
    //     $status        = $data['status'];
    //     $tglpemasangan        = $data['tgl_pemasangan'];
    //     $pemasangan->query("CALL sp_create_pemasangan (NULL,'".$idpetugas."','".$idpelanggan."','".$namapelanggan."','".$alamat."','".$notelp."','".$pkba."','".$status."','".$tglpemasangan."')");
    // } 
}
