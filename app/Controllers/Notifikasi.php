<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Notifikasi extends BaseController
{
    public function index()
    {
        $data = [
			'judulHalaman' => 'Notifikasi',
			'listNotifikasi' => $this->notifikasi->getAllNotifikasi()
		];
		return view ('Pemasangan/notifikasi', $data);
    }

	public function getnumber($nama){
		$data['noPetugas'] = $this->notifikasi->getNumber($nama);
		return redirect()->to('sendnotifikasi')->withInput()->with('data', $data);
	}

	public function sendNotifikasi(){
		return view('Pemasangan/list_pemasangan', $data);
	}
}
