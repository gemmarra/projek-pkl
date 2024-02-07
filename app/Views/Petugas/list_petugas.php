<?= $this->extend('header'); ?>
<?= $this->section('konten'); ?>
<h1><?= $judulHalaman; ?></h1>

<section class="mytable">
  <a href="<?= site_url('tambah-petugas'); ?>" class="btn btn-primary btn-tambah"><i class="bi bi-plus-lg"></i> Tambah</a>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
      <thead class="table-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID Petugas</th>
          <th scope="col">Nama Petugas</th>
          <th scope="col">Email</th>
          <th scope="col">No.Telepon</th>
          <th scope="col">Tim</th>
          <th scope="col">Aksi</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($listPetugas)) :
          $html = null;
          $no = null;
          foreach ($listPetugas as $baris) :
            $no++;
            $html .= '<tr>';
            $html .= '<td>' . $no . '</td>';
            $html .= '<td>' . $baris->id_petugas . '</td>';
            $html .= '<td>' . $baris->nama_petugas . '</td>';
            $html .= '<td>' . $baris->email . '</td>';
            $html .= '<td>' . $baris->no_telepon . '</td>';
            $html .= '<td>' . $baris->tim . '</td>';
            $html .= '<td align="center">
            <a href="' . site_url('edit-petugas/' . $baris->id_petugas) . '" class="btn btn-primary btn-sm fw-bold"><i class="bi bi-pencil-square"></i></a>
            <a href="' . site_url('hapus-petugas/' . $baris->id_petugas) . '" OnClick="return confirm(\'Apakah anda yakin akan menghapus ini?\')" class="btn btn-danger btn-sm fw-bold"><i class="bi bi-trash"></i></a>
            </td>';
            $html .= '<td class="fw-bold ' . (($baris->status == 'Online') ? 'text-success' : 'text-secondary') . '">' . $baris->status . '</td>';
          endforeach;
        endif;

        echo $html;
        ?>
      </tbody>
    </table>

    <?= $this->endSection(); ?>