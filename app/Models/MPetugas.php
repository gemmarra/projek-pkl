<?php

namespace App\Models;

use CodeIgniter\Model;

class MPetugas extends Model
{
    protected $table            = 'petugas';
    protected $primaryKey       = 'id_petugas';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_petugas', 'nama_petugas', 'email', 'no_telepon', 'tim', 'keterangan'];

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

    public function getAllPetugas(){
        $petugas= NEW MPetugas;
        $queryPetugas=$petugas->query("CALL sp_select_petugas")->getResult();
        return $queryPetugas;
}

public function hapus($id){
    $petugas= NEW MPetugas;
    $petugas->query("CALL sp_delete_petugas ('".$id."')");
}

public function simpan($data){
    $petugas=NEW MPetugas;
    $idpetugas        = $data['id_petugas'];
    $namapetugas        = $data['nama_petugas'];
    $username        = $data['email'];
    $notelp        = $data['no_telepon'];
    $tim        = $data['tim'];
    $petugas->query("CALL sp_create_petugas ('".$idpetugas."','".$namapetugas."','".$username."','".$notelp."','".$tim."')");
}

public function edit($data){
    $petugas=NEW MPetugas;
    $idpetugas        = $data['id_petugas'];
    $namapetugas        = $data['nama_petugas'];
    $username        = $data['email'];
    $notelp        = $data['no_telepon'];
    $tim        = $data['tim'];
    $petugas->query("CALL sp_update_petugas ('".$idpetugas."','".$namapetugas."','".$username."','".$notelp."','".$tim."')");
}
}
