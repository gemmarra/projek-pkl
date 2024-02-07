<?= $this->extend('header'); ?>
<?= $this->section('konten'); ?>
<h1><?= $judulHalaman; ?></h1>

<section class="mytable">
  <div class="search-forms">
    <form method="post" action="history-pemasangan-id">
      <label for="">Menurut ID Pelanggan</label>
      <div class="search">
        <input type="text" name="idPelanggan" id="" class="form-control" autocomplete="off" placeholder="53321" />
        <button type="submit" class="btn btn-dark"><i class="bi bi-search"></i></button>
      </div>
    </form>
    <form method="post" action="history-pemasangan-tgl">
      <label for="">Menurut Tanggal Pemasangan</label>
      <div class="search">
        <input type="text" name="tglPemasangan" id="" placeholder="Tahun-Bulan-Tanggal" class="form-control" autocomplete="off">
        <button type="submit" class="btn btn-dark"><i class="bi bi-search"></i></button>
      </div>
    </form>
  </div>
  <?php
  if (isset($hasilCari)) : ?>
    <br>
    <!-- <a href="<?= site_url("history-pemasangan") ?>" class="btn btn-dark">Hari ini</a> -->
    <br>
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead class="table-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Petugas</th>
            <th scope="col">ID Pelanggan</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Alamat</th>
            <th scope="col">No. Telepon</th>
            <th scope="col">PKBA</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($hasilCari)) :
            $html = null;
            $no = null;
            foreach ($hasilCari as $baris) :
              $no++;
              $html .= '<tr>';
              $html .= '<td>' . $no . '</td>';
              $html .= '<td>' . $baris->nama_petugas . '</td>';
              $html .= '<td>' . $baris->id_pelanggan . '</td>';
              $html .= '<td>' . $baris->nama_pelanggan . '</td>';
              $html .= '<td>' . $baris->alamat . '</td>';
              $html .= '<td>' . $baris->no_telp . '</td>';
              $html .='<td><a href="/uploads/'. $baris->PKBA.'" download="PKBA-'. $baris->id_pelanggan.'" class="btn btn-dark"><i class="bi bi-download"></i></a></td>';
              $html .='<td class="fw-bold '.(($baris->status === 'Belum Selesai') ? 'text-danger' : (($baris->status === 'Selesai') ? 'text-success' : 'text-secondary')).'">'. $baris->status.'</td>';
              $html .= '</tr>';
            endforeach;
          endif;

          echo $html;
          ?>
        </tbody>
      </table>
    </div>
    </div>
    <div class="table-responsive-sm">
      <table class="table table-hover table-bordered">
        <thead class="table-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Petugas</th>
            <th scope="col">ID Pelanggan</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Alamat</th>
            <th scope="col">No. Telepon</th>
            <th scope="col">PKBA</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($hasilCari)) :
            $html = null;
            $no = null;
            foreach ($hasilCari as $baris) :
              $no++;
              $html .= '<tr>';
              $html .= '<td>' . $no . '</td>';
              $html .= '<td>' . $baris->nama_petugas . '</td>';
              $html .= '<td>' . $baris->id_pelanggan . '</td>';
              $html .= '<td>' . $baris->nama_pelanggan . '</td>';
              $html .= '<td>' . $baris->alamat . '</td>';
              $html .= '<td>' . $baris->no_telp . '</td>';
              $html .= '<td><a href="' . site_url('edit-pemasangan/' . $baris->PKBA) . '" class="btn btn-dark btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#pkbaModal"><i class="bi bi-file-earmark-image"></i></a></td>';
              $html .= '<td>' . $baris->status . '</td>';
              $html .= '</tr>';
            endforeach;
          endif;

          echo $html;
          ?>
        </tbody>
      </table>
    </div>
    </div>
</section>

<?php
  endif;
?>

<?= $this->endSection(); ?>