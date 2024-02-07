<?= $this->extend('header'); ?>
<?= $this->section('konten'); ?>
<h1><?= $judulHalaman ?></h1>

<div class="tutor">
    <div class="menu">
        <h3 class="fw-bold">Pemasangan</h3><br>
        <div class="content">
            <h5>1. Daftar Pemasangan</h5>
            <img src="<?= base_url('assets/img/list_Pemasangan.png');?>" alt="">
            <p>Halaman Daftar Pemasangan digunakan untuk menyimpan daftar data Pemasangan. Anda dapat mengelola data tersebut.</p>
            <ul>
            <li><span><a class="btn btn-primary btn-tambah"
            ><i class="bi bi-plus-lg"></i> Tambah</a
            ></span> <span class="desc">Menambahkan data Pemasangan.</span>
            </li>
            <li><span><a class="btn btn-secondary btn-tambah"
            ><i class="bi bi-clock"></i> Pending</a
            ></span> <span class="desc">Melihat daftar Pemasangan yang di-pending.</span>
            </li>
            <li><span><a class="btn btn-dark btn-tambah"
            ><i class="bi bi-file-earmark-image"></i></a
            ></span> <span class="desc">Melihat gambar PKBA yang telah diunggah sebelumnya.</span>
            </li>
            <li><span><a class="btn btn-primary btn-tambah"
            ><i class="bi bi-pencil-square"></i></a
            ></span> <span class="desc">Tombol "Edit" yang berfungsi untuk mengubah data Pemasangan.</span>
            </li>
            <li><span><a class="btn btn-danger btn-tambah"
            ><i class="bi bi-trash"></i></a
            ></span> <span class="desc">Tombol "Hapus" yang berfungsi untuk menghapus data Pemasangan.</span>
            </li>
            <li><span><a class="btn btn-warning btn-tambah"
            ><i class="bi bi-bell"></i></a
            ></span> <span class="desc">Ikon "Lonceng" berfungsi untuk memberi pemberitahuan pada petugas yang dengan nama yang tertera.</span>
            </li>
            <li><span><a class="btn btn-success btn-tambah"
            ><i class="bi bi-check2-square"></i></a
            ></span> <span class="desc">Ikon "Centang" berfungsi untuk mengubah status data Pemasangan menjadi "Selesai".</span>
            </li>
            <li><span><a class="btn btn-secondary btn-tambah"
            ><i class="bi bi-clock"></i></a
            ></span> <span class="desc">Ikon "Jam" digunakan untuk menyimpan data sebagai data "Pending".</span>
            </li>
            </ul>
        </div>
        <br>
        <div class="content">
            <h5>2. Penambahan Data Pemasangan</h5>
            <img src="<?= base_url('assets/img/tambah_Pemasangan.png');?>" alt="">
            <p>Pada halaman Penambahan Data Pemasangan Anda perlu memasukan data yang tertera seperti gambar diatas. Pastikan data tersebut sudah terisi dengan benar. <br><span class="fw-bold">Catatan:</span> Biarkan status terpilih "Belum Selesai" setiap kali menambahkan data baru.</p>
            <ul>
            <li><span><a class="btn btn-primary btn-tambah"
            >Simpan</a
            ></span> <span class="desc">Jika sudah formulir telah terisi semua tekan tombol "Simpan" untuk menyimpan data.</span>
            </li>
            </ul>
        </div>
        <br>
        
        <div class="content">
            <h5>3. Daftar Pemasangan Pending</h5>
            <img src="<?= base_url('assets/img/list_pending.png');?>" alt="">
            <p>Pada halaman Daftar Pending untuk melihat tugas yang di pending.</p>
            <ul>
            <li><span><a class="btn btn-success btn-tambah"
            ><i class="bi bi-check2-square"></i></a
            ></span> <span class="desc">Mengubah status pemasangan dari "Pending" menjadi "Selesai". </span>
            </li>
            </ul>
        </div>
        <br>
        <div class="content">
            <h5>4. Modal Pending</h5>
            <img src="<?= base_url('assets/img/modal pending.png');?>" alt="">
            <p>Pada bagian ini Anda dapat mengubah status pemasangan menjadi "Pending" dan disertakan alasannya.</p>
            <ul>
            <li><span><a class="btn btn-secondary btn-tambah"
            >Pending</a
            ></span> <span class="desc">Tekan tombol tersebut untuk mengubah status dan memasukkan data tersebut pada Daftar Pending.</span>
            </li>
            </ul>
        </div>
        <br>
        <div class="content">
            <h5>5. Pencarian Data Pemasangan</h5>
            <img src="<?= base_url('assets/img/pencarian_data.png');?>" alt="">
            <p>Untuk mencari data, Anda dapat mencarinya dengan menggunakan ID Pelanggan atau berdasarkan tanggal Pemasangan.</p>
        </div>
</div>
<br><br>
<div class="menu">
<h3 class="fw-bold">Petugas Pemasangan</h3><br>
        <div class="content">
            <h5>1. Penambahan Data Petugas</h5>
            <img src="<?= base_url('assets/img/tambah_petugas.png');?>" alt="">
            <p>Pada halaman Penambahan Data Petugas Anda perlu memasukan data yang tertera seperti gambar diatas, Pastikan data tersebut sudah terisi dengan benar.</p>
            <ul>
            <li><span><a class="btn btn-primary btn-tambah"
            >Simpan</a
            ></span> <span class="desc">Jika sudah memasukan data tekan tombol "Simpan" untuk menyimpan data.</span>
            </li>
            </ul>
        </div>
<br>
        <div class="content">
            <h5>2. Daftar Petugas</h5>
            <img src="<?= base_url('assets/img/list_petugas.png');?>" alt="">
            <p> Halaman Petugas, digunakan untuk menyimpan list data Pemasangan. Anda dapat melihat list yang sudah ditambahkan disini serta dapat mengelola data tersebut .</p>
        </div>
</div>

        <br>

        <br>
        <div class="content">
            <h5>8. Notifikasi</h5>
            <img src="<?= base_url('assets/img/notifikasi.png');?>" alt="">
            <p>Menampilkan notifikasi dari Data Pemasangan yang sudah selesai dikerjakan.</p>
        </div>

        <br>
        <div class="content">
            <h5>9. Login</h5>
            <img src="<?= base_url('assets/img/login.png');?>" alt="">
            <p>Tampilan sebelum Anda login, silahkan isi Email dan Password dengan benar lalu enter.</p>
        </div>

        <br>
        <div class="content">
            <h5>10. Registrasi</h5>
            <img src="<?= base_url('assets/img/register.png');?>" alt="">
            <p>Jika Anda belum memiliki akun, silahkan registrasi terlebih dahulu dan isi format tersebut.</p>
        </div>

        <br>
        <div class="content">
            <h5>11. Profil Pengguna</h5>
            <img class="pp" src="<?= base_url('assets/img/profil_pengguna.png');?>" alt="">
            <p>Menampilkan status Pengguna, mengaktifkan notifikasi serta dapat "Logout" dari Aplikasi PLN GERCEP.</p>
        </div>
<?= $this->endSection(); ?>