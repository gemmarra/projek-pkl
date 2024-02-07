<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PemasanganPending extends BaseController
{
    public function listPemasanganPending()
    {
        $data =[
            'judulHalaman' =>'Data Pemasangan Pending',
            'listPemasanganPending'=>$this->pending->getAllPemasanganPending(),
        ]; 
        return view('Pemasangan Pending/list_pending',$data);
    }
   
    public function hapusPemasanganPending($id){
        $this->pending->hapusPending($id);
        return redirect()->to('tampil-pending');
    }

    public function pendingPemasangan($idpemasangan)
	{
		$data = [
			'detailPemasangan' => $this->pemasangan->where('id_pemasangan', $idpemasangan)->findAll()
		];

		$data['listPetugas'] = $this->petugas->findAll();

		return view('header', $data);
	}

    public function editpendingPemasangan(){

		$dataPending=[
			'id_pelanggan'=>$this->request->getPost('idPelangganU'),
			'keterangan'=>$this->request->getPost('keteranganU')
		];

		$this->pending->pending($dataPending);
		return redirect()->to('tampil-pemasangan');
	}
}