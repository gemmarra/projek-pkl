<?php

namespace App\Models;

use CodeIgniter\Model;

class MPemasangan extends Model
{
    protected $table            = 'pemasangan';
    protected $primaryKey       = 'id_pemasangan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pemasangan', 'id_petugas', 'id_pelanggan', 'nama_pelanggan', 'alamat',    'no_telp', 'PKBA',    'status',    'tgl_pemasangan'];

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

    public function getAllPemasangan()
    {
        $pemasangan = new MPemasangan;
        $queryPemasangan = $pemasangan->query("CALL sp_select_pemasangan")->getResult();
        return $queryPemasangan;
    }

    public function getAllPemasanganPetugas($data)
    {
        $pemasangan = new MPemasangan;
        $nama= $data['nama'];
        $queryPemasangan = $pemasangan->query("CALL sp_select_pemasangan_petugas('".$nama."')")->getResult();
        return $queryPemasangan;
    }

    public function hapus($id)
    {
        $pemasangan = new MPemasangan;
        $pemasangan->query("CALL sp_delete_pemasangan ('" . $id . "')");
    }

    public function updateStatus($id)
    {
        $pemasangan = new MPemasangan;
        $pemasangan->query("CALL sp_update_status_pemasangan('" . $id . "')");
    }


    public function simpan($data)
    {
        $pemasangan = new MPemasangan;
        $idpetugas              = $data['id_petugas'];
        $idpelanggan            = $data['id_pelanggan'];
        $namapelanggan          = $data['nama_pelanggan'];
        $alamat                 = $data['alamat'];
        $notelp                 = $data['no_telp'];
        $pkba                   = $data['PKBA'];
        $status                 = $data['status'];
        $tglpemasangan          = $data['tgl_pemasangan'];
        $pemasangan->query("CALL sp_create_pemasangan (NULL,'" . $idpetugas . "','" . $idpelanggan . "','" . $namapelanggan . "','" . $alamat . "','" . $notelp . "','" . $pkba . "','" . $status . "','" . $tglpemasangan . "')");
    }

    public function editPemasangan($data)
    {
        $pemasangan = new MPemasangan;
        $idpemasangan           = $data['id_pemasangan'];
        $idpetugas              = $data['id_petugas'];
        $idpelanggan            = $data['id_pelanggan'];
        $namapelanggan          = $data['nama_pelanggan'];
        $alamat                 = $data['alamat'];
        $notelp                 = $data['no_telp'];
        $pkba                   = $data['PKBA'];
        $status                 = $data['status'];
        $tglpemasangan          = $data['tgl_pemasangan'];
        $pemasangan->query("CALL sp_update_pemasangan ('" . $idpemasangan . "','" . $idpetugas . "','" . $idpelanggan . "','" . $namapelanggan . "','" . $alamat . "','" . $notelp . "','" . $pkba . "','" . $status . "','" . $tglpemasangan . "')");
    }

    // public function editPemasangan($data){
    //     $pemasangan = NEW MPemasangan;
    //     $query = $pemasangan->query("CALL sp_update_pemasangan ('".$data['id_pemasangan']."','".$data['id_petugas']."','".$data['id_pelanggan']."','".$data['nama_pelanggan']."','".$data['alamat']."','".$data['no_telp']."','".$data['PKBA']."','".$data['status']."','".$data['tgl_pemasangan']."')");

    //     if ($query->getNumRows() > 0) {
    //         $result = $query->getResult();
    //         return $result;
    //     }
    //     return false;
    // }

    public function cariHistoryId($idpelanggan)
    {
        $pemasangan = new MPemasangan;
        $queryPemasangan = $pemasangan->query("CALL sp_cari_pemasangan_id('" . $idpelanggan . "')")->getResult();
        return $queryPemasangan;
    }

    public function cariHistoryTgl($tglpemasangan)
    {
        $pemasangan = new MPemasangan;
        $queryPemasangan = $pemasangan->query("CALL sp_cari_pemasangan_tgl('" . $tglpemasangan . "')")->getResult();
        return $queryPemasangan;
    }

    public function getNumber($nama)
    {
        $petugas=NEW MPetugas;
        $queryNotifikasi = $notifikasi->query("SELECT no_telp FROM petugas WHERE nama_petugas = '".$nama."'")->getResult();
        return $queryNotifikasi;
    } 
}
