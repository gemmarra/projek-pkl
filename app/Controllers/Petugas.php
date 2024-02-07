<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Petugas extends BaseController
{
    public function listPetugas()
    {
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}

        $data =[
            'judulHalaman' =>'Data Petugas',
            'listPetugas' => $this->petugas->getAllPetugas()
        ];
		
		return view('Petugas/list_petugas',$data);
    }

    public function simpanPetugas(){
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}
		
		$dataPetugas=[
			'id_petugas'=>$this->request->getPost('idPetugas'),
			'nama_petugas'=>$this->request->getPost('namaPetugas'),
			'email'=>$this->request->getPost('email'),
			'no_telepon'=>$this->request->getPost('noTelepon'),
			'tim'=>$this->request->getPost('timPetugas'),
			'keterangan'=>$this->request->getPost('keterangan'),
		];

		$this->petugas->simpan($dataPetugas);
		session()->setFlashdata('pesan','Data Berhasil Disimpan');
		return redirect()->to('tampil-petugas');
	}

    public function hapusPetugas($id){
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}

        $this->petugas->hapus($id);
        return redirect()->to('tampil-petugas');
    }

    public function tambahPetugas(){
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}


        $data =[
            'judulHalaman' =>'Penambahan Data Petugas',
        ] ;

        $data['listUser']=$this->user->findAll();
		return view('Petugas/tambah_petugas',$data);
	} 

    public function updatePetugas($id_petugas)
	{
		$this->petugas->save([
			'id_petugas'=>$id_petugas,
			'nama_petugas'=>$this->request->getVar('namaPetugas'),
			'email'=>$this->request->getVar('email'),
			'no_telepon'=>$this->request->getVar('noTelepon'),
			'tim'=>$this->request->getVar('timPetugas'),
		]);

		session()->setFlashdata('pesan','Data Berhasil Diubah');

		return redirect()->to('tampil-petugas');
	}

	public function editPetugas($idPetugas){
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}

		$syarat=[
			'id_petugas'=>$idPetugas
		];

		$data =[
			'judulHalaman' =>'Perubahan Data Petugas',
			'listUser'=> $this->user->findAll(),
			'detailPetugas' => $this->petugas->where($syarat)->findAll()
        ];
		
		return view('Petugas/edit_petugas',$data);
    }
}
