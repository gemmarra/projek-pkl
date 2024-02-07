<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::login');

// User
$routes->get('profil-user', 'User::profilUser');
$routes->post('/login', 'User::login');
$routes->get('/daftar', 'User::registrasi');
$routes->post('/daftar', 'User::daftar');
$routes->get('/logout', 'User::logout');

$routes->get('status-online', 'User::statusOnline');
$routes->get('status-offline', 'User::statusOffline');
$routes->get('tutorial', 'User::tutorialPakai');

$routes->get('tampil-status', 'User::tampilStatus');

// Pemasangan
$routes->get('tampil-pemasangan', 'Pemasangan::listPemasangan', ['filter' => 'autentifikasi']);
$routes->get('pkba', 'Pemasangan::pkbapic', ['filter' => 'autentifikasi']);

$routes->get('hapus-pemasangan/(:num)', 'Pemasangan::hapusPemasangan/$1');
$routes->get('tambah-pemasangan', 'Pemasangan::tambahPemasangan');
$routes->post('/simpan-pemasangan', 'Pemasangan::simpanPemasangan');

$routes->get('/edit-pemasangan/(:num)', 'Pemasangan::editPemasangan/$1');
$routes->post('/pemasangan-update/(:num)', 'Pemasangan::updatePemasangan/$1');
$routes->get('/update-status-pemasangan/(:num)', 'Pemasangan::updateStatusPemasangan/$1');

$routes->get('history-pemasangan', 'Pemasangan::historyPemasangan');
$routes->post('history-pemasangan-id', 'Pemasangan::historyPemasanganId');
$routes->post('history-pemasangan-tgl', 'Pemasangan::historyPemasanganTgl');

$routes->get('idpel','Pemasangan::tampilIdpel');

//Notifikasi
$routes->get('notifikasi', 'Notifikasi::index');
$routes->post('notifikasiWA/(:num)', 'Notifikasi::getnumber/$1');
$routes->post('sendnotifikasi', 'Notifikasi::sendNotifikasi');


// Pemasangan Pending
$routes->get('tampil-pending', 'PemasanganPending::listPemasanganPending');
$routes->get('hapus-pending/(:num)', 'PemasanganPending::hapusPemasanganPending/$1');
$routes->post('pending-pemasangan', 'PemasanganPending::editpendingPemasangan');

// Petugas
$routes->get('tampil-petugas', 'Petugas::listPetugas');

$routes->get('hapus-petugas/(:num)', 'Petugas::hapusPetugas/$1');
$routes->get('tambah-petugas', 'Petugas::tambahPetugas');
$routes->post('tambah-petugas', 'Petugas::simpanPetugas');

$routes->get('edit-petugas/(:num)', 'Petugas::editPetugas/$1');
$routes->post('/petugas-update/(:num)', 'Petugas::updatePetugas/$1');
