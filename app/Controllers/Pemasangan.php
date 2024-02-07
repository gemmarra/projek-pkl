<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pemasangan extends BaseController
{
	public function listPemasangan()
	{
		if (session()->get('level')!='Admin') {
		$data['nama'] = session()->get('nama');
		$data = [
			'judulHalaman' => 'Data Pemasangan',
			'listPemasangan' => $this->pemasangan->getAllPemasanganPetugas($data)
		];
		return view('Pemasangan/list_pemasangan', $data);
	} else {
		$data = [
			'judulHalaman' => 'Data Pemasangan',
			'listPemasangan' => $this->pemasangan->getAllPemasangan()
		];
		return view('Pemasangan/list_pemasangan', $data);
	}
	}

	public function hapusPemasangan($id)
	{
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}

		$this->pemasangan->hapus($id);
		session()->setFlashdata('pesan','Data Berhasil Dihapus');
		return redirect()->to('tampil-pemasangan');
	}

	public function updateStatusPemasangan($id)
	{
		$this->pemasangan->updateStatus($id);
		return redirect()->to('tampil-pemasangan');
	}

	public function tambahPemasangan()
	{
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}

		$data = [
			'judulHalaman' => 'Penambahan Data Pemasangan',
			'validation' => \Config\Services::validation()
		];

		$data['listPetugas'] = $this->petugas->findAll();
		return view('Pemasangan/tambah_pemasangan', $data);
	}

	public function simpanPemasangan()
	{
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}

		if (!$this->validate([
			'idPelanggan' => [
				'rules' => 'numeric|max_length[12]|min_length[12]',
				'errors' => [
					'numeric' => 'Masukkan ID Pelanggan yang benar!',
					'max_length' => 'ID Pelanggan terlalu panjang!',
					'min_length' => 'ID Pelanggan terlalu pendek!'
				]
			],
			'pkbaPemasangan' => [
				'rules' => 'uploaded[pkbaPemasangan]|max_size[pkbaPemasangan,5000]|ext_in[pkbaPemasangan,png,jpg,jpeg,pdf]',
				'errors' =>[
					'uploaded' => 'Pilih gambar atau dokumen PKBA!',
					'max_size' => 'Gambar atau dokumen terlalu besar!',
					'ext_in' => 'Pilih gambar atau dokumen dengan format PNG, JPG, JPEG, atau PDF!'
				]
			]
		])){
			$validation = \Config\Services::validation();
			return redirect()->to('tambah-pemasangan')->withInput()->with('validation', $validation);
		}

		$filePKBA = $this->request->getFile('pkbaPemasangan');
		
		// pindahkan file
		$filePKBA->move('uploads');

		// ambilnama
		$namaPKBA = $filePKBA->getName();
		
		$dataPemasangan = [
			'id_pemasangan' => $this->request->getPost('idPemasangan'),
			'id_petugas' => $this->request->getPost('idPetugas'),
			'id_pelanggan' => $this->request->getPost('idPelanggan'),
			'nama_pelanggan' => $this->request->getPost('namaPelanggan'),
			'alamat' => $this->request->getPost('alamatPelanggan'),
			'no_telp' => $this->request->getPost('noTelepon'),
			'PKBA' => $namaPKBA,
			'status' => $this->request->getPost('statusPemasangan'),
			'tgl_pemasangan' => $this->request->getPost('tglPemasangan')
		];


		$this->pemasangan->simpan($dataPemasangan);
		session()->setFlashdata('pesan','Data Berhasil Disimpan');
		return redirect()->to('tampil-pemasangan');
	}

	public function editPemasangan($idPemasangan)
	{
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}
		
		$syarat=[
			'id_pemasangan'=>$idPemasangan
		];

		$data=[
			'listPetugas'=> $this->petugas->findAll(),
			'judulHalaman' => 'Perubahan Data Pemasangan',
	 		'detailPemasangan' => $this->pemasangan->where($syarat)->findAll()
		];
		
		return view('Pemasangan/edit_pemasangan', $data);
	}

	public function updatePemasangan($id_pemasangan)
{
    $this->pemasangan->save([
        'id_pemasangan' => $id_pemasangan,
        'id_petugas' => $this->request->getVar('id_petugas'),
        'id_pelanggan' => $this->request->getVar('id_pelanggan'),
        'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
        'alamat' => $this->request->getVar('alamat'),
        'no_telp' => $this->request->getVar('no_telp'),
        'PKBA' => $this->request->getVar('PKBA'),
        'status' => $this->request->getVar('status'),
        'tgl_pemasangan' => $this->request->getVar('tgl_pemasangan')
    ]) ;

	session()->setFlashdata('pesan','Data Berhasil Diubah');
    return redirect()->to('tampil-pemasangan');
}

	public function historyPemasangan()
	{
		$data = [
			'judulHalaman' => 'Pencarian Data Pemasangan',
			'listPemasangan' => $this->pemasangan->getAllPemasangan()
		];

		return view('Pemasangan/history', $data);
	}

	public function historyPemasanganId()
	{

		$validasiForm = [
			'idPelanggan' => 'required'
		];

		if ($validasiForm) {
			$idpelanggan = $this->request->getPost('idPelanggan');
			$data = [
				'judulHalaman' => 'Pencarian Data Pemasangan',
				'hasilCari' => $cekRecord = $this->pemasangan->cariHistoryId($idpelanggan)
			];
		}
		return view('Pemasangan/history', $data);
	}

	public function historyPemasanganTgl()
	{
		$validasiForm = [
			'tglPemasangan' => 'required'
		];

		if ($validasiForm) {
			$tglpemasangan = $this->request->getPost('tglPemasangan');
			$data = [
				'judulHalaman' => 'Pencarian Data Pemasangan',
				'hasilCari' => $cekRecord = $this->pemasangan->cariHistoryTgl($tglpemasangan)
			];
		}
		return view('Pemasangan/history', $data);
	}

	public function pkbapic(){
		if (session()->get('level')!='Admin') {
			$data['nama'] = session()->get('nama');
			$data = [
				'judulHalaman' => 'Data Pemasangan',
				'listPemasangan' => $this->pemasangan->getAllPemasanganPetugas($data)
			];
			return view('Pemasangan/list_pemasangan', $data);
		} else {
			$data = [
				'judulHalaman' => 'Data Pemasangan',
				'listPemasangan' => $this->pemasangan->getAllPemasangan()
			];
			return view('Pemasangan/list_pemasangan', $data);
		}

		return view('header', $data);
	}

	public function getnumber($nama){
		if(session()->get('level')!='Admin'){
			return redirect()->to('tampil-pemasangan');
			exit;		
		}

		$data = [
			'noPetugas' => $this->pemasangan->getNumber($nama)
		];
		return redirect()->to('sendnotifikasi')->withInput()->with('data', $data);
	}
}
