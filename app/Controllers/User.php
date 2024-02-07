<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    // public function statusUser()
    // {
    //     $data['statusAnda'] = $this->user->tampilStatus();

    //     return view('header', $data);
    // }

    // public function login()
    // {

    //   $validasiForm=[
    //     'email'=>'required',
    //     'password'=>'required'
    //   ];
    //   if($this->validate($validasiForm)){
    //     $user=$this->request->getpost('email');
    //     $pass=md5($this->request->getpost('password'));

    //     $whereLogin=[
    //       'email'=> $user,
    //       'password'=> $pass
    //     ];
    //     $cekLogin=$this->user->where($whereLogin)->findAll();

    //     if(count($cekLogin)==1){
          
    //       return redirect()->to('/tampil-pemasangan');

    //     }else {
    //       return redirect()->to('/login')->with('pesan','<p class="text-danger fw-bold">Gagal Login</p>');
    //     }
    //   }

    //     return view('user/form-login');
    // }
    

    // public function logout(){
    //     return view('user/form-login');
    // }

    public function login()
    {
        $validasiForm=[
            'email'=>'required',
            'password'=>'required'
        ];

        if($this->validate($validasiForm)){
            $email=$this->request->getPost('email');
            $password=$this->request->getPost('password');

            $whereLogin=[
                'email'=>$email,
                'password'=>$password
            ];

            //select * from tbl_user where email='$email' and password='$password'
            $cekLogin = $this->user->where($whereLogin)->findAll();
      //      var_dump($cekLogin);    
           if (count($cekLogin)==1) {
                //jika ditemukan data
                // 1. buat session email, nama, level
                $dataSession = [
                    'email'=>$cekLogin[0]['email'],
                    'nama'=>$cekLogin[0]['nama'],
                    'password'=>$cekLogin[0]['password'],
                    'level'=>$cekLogin[0]['level'],
                    'status'=>$cekLogin[0]['status'],
                    'sudahkahLogin'=>true
                ];

                session()->set($dataSession);
                return redirect()->to('tampil-pemasangan');
                
            } else {
                //jika tidak ditemukan apapun
                return redirect()->to('/')->with('pesan', '<p class="text-danger text-center">
                Gagal Login! <br> Periksa email atau Password!</p>');
            }
        }

        return view('User/form-login');
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }

    public function registrasi(){
       return view('user/form-registrasi');
    }

    public function daftar(){
      $data=[
        'email'=>$this->request->getVar('email'),
        'nama'=>$this->request->getVar('nama'),
        'password'=>$this->request->getVar('password')
    ];
    $this->user->simpanUser($data);
    session()->setFlashdata('pesan','<p class="text-success text-center">
    Daftar Berhasil</p>');
    return redirect()->to('/');
    }

    public function statusOnline()
	{
        $data['nama'] = session()->get('nama');
		$this->user->editOnline($data);
		return redirect()->to('tampil-pemasangan');
	}

    public function statusOffline()
	{
        $data['nama'] = session()->get('nama');
        $this->user->editOffline($data);
        return redirect()->to('tampil-pemasangan');
	}
  
	public function tampilStatus()
	{
        $data['nama'] = session()->get('nama');

        $data = [
			'statusNow' => $this->user->tampilstatus($data)
		];
		
        return view ('Pemasangan/list_pemasangan', $data);
	}

    public function tutorialPakai(){
        if (session()->get('level')=='Admin'){
        $data = [
			'judulHalaman' => 'Cara Penggunaan'
		];
        return view('User/tutorial_admin', $data);
    } else{
        $data = [
			'judulHalaman' => 'Cara Penggunaan qqq'
		];
        return view('User/tutorial_petugas', $data);
    }
    }
}
