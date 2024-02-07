<?php

namespace App\Models;

use CodeIgniter\Model;

class MUser extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'username';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username','nama','password','level'];

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


    public function getAllUser(){
        $user= NEW MUser;
        $queryUser=$user->query("SELECT * FROM user")->getResult();
        return $queryUser;
    }

    public function simpanUser($data){
        $user= NEW MUser;
        $email              = $data['email'];
        $namauser            = $data['nama'];
        $password          = $data['password'];
        $user->query("INSERT INTO `user`(`email`, `nama`, `password`, `level`) VALUES ('".$email."','".$namauser."','".$password."','Petugas')");
    }

    public function editOnline($data){
        $user= NEW MUser;
        $nama= $data['nama'];
        $user->query("UPDATE user SET status = 'Online' WHERE nama='".$nama."'");
    }

    public function editOffline($data){
        $user= NEW MUser;
        $nama= $data['nama'];
        $user->query("UPDATE user SET status = 'Offline' WHERE nama='".$nama."'");
    }

    public function tampilstatus($data){
        $user= NEW MUser;
        $nama= $data['nama'];
        $user->query("SELECT status FROM user WHERE nama='" . $nama . "'");
    }

    // public function tampilStatus()
    // {
    //     $user = new MUser;
    //     $nama = session()->get('nama');
    //     $result = $user->query("SELECT status FROM user WHERE nama='" . $nama . "'");
    //     return $result->getResultArray();
    // }
    

}