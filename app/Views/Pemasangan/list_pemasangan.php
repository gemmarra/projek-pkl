<?=$this->extend('header');?>
<?=$this->section('konten');?>
<h1><?=$judulHalaman;?></h1>

<section class="mytable">
<?php if (session()->getFlashdata('pesan') !== NULL) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
  <div class="aksi-status">
    <div>
      <a href="<?= site_url('tambah-pemasangan');?>" class="btn btn-primary btn-tambah"
        ><i class="bi bi-plus-lg"></i> Tambah</a
      >
      <a href="<?= site_url('tampil-pending');?>" class="btn btn-secondary"
        ><i class="bi bi-clock"></i> Pending</a
      >
      </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead class="table-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Petugas</th>
              <th scope="col">No. Telepon Petugas</th>
              <th scope="col">ID Pelanggan</th>
              <th scope="col">Nama Pelanggan</th>
              <th scope="col">Alamat</th>
              <th scope="col">No. Telepon Pelanggan</th>
              <th scope="col">PKBA</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal Pemasangan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(isset($listPemasangan)) :
        $html =null;
        $no = null;
        foreach($listPemasangan as $baris) : 
        $no++;
        $html .='<tr>';
        $html .='<td>'. $no.'</td>';
        $html .='<td>'. $baris->nama_petugas.'</td>';
        $html .='<td>'. $baris->no_telepon.'</td>';
        $html .='<td>'. $baris->id_pelanggan.'</td>';
        $html .='<td>'. $baris->nama_pelanggan.'</td>';
        $html .='<td>'. $baris->alamat.'</td>';
        $html .='<td>'. $baris->no_telp.'</td>';
        $html .='<td><a href="/uploads/'. $baris->PKBA.'" download="PKBA-'. $baris->id_pelanggan.'" class="btn btn-dark"><i class="bi bi-download"></i></a></td>';
        $html .='<td class="fw-bold '.(($baris->status === 'Belum Selesai') ? 'text-danger' : (($baris->status === 'Selesai') ? 'text-success' : 'text-secondary')).'">'. $baris->status.'</td>';
        $html .='<td>'. $baris->tgl_pemasangan.'</td>';
        $html .='<td align="center">
        <a href="'.site_url('/edit-pemasangan/'.$baris->id_pemasangan).'" class="btn btn-primary btn-sm fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
        data-bs-title="Edit"><i class="bi bi-pencil-square"></i></a>
        <a href="'.site_url('hapus-pemasangan/'.$baris->id_pemasangan).'" OnClick="return confirm(\'Apakah anda yakin akan menghapus ini?\')" class="btn btn-danger btn-sm fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
        data-bs-title="Hapus"><i class="bi bi-trash"></i></a>
        <a href=" https://wa.me/'. $baris->no_telepon.'?text='.$baris->nama_petugas.'%20segera%20buka%20PLN%20GERCEP%20untuk%20menyelesaikan%20pemasangan%20'.$baris->nama_pelanggan.'%20dengan%20ID%20Pelanggan%20'. $baris->id_pelanggan.'" class="btn btn-warning btn-sm fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
        data-bs-title="Peringati" target="_blank"><i class="bi bi-bell"></i></a>
        <a href="'.site_url('/update-status-pemasangan/'.$baris->id_pemasangan).'" class="btn btn-success btn-sm fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
        data-bs-title="Update Selesai"><i class="bi bi-check2-square"></i></a>
        <a href="'.site_url('tampil-idpel/'.$baris->id_pemasangan).'" class="btn btn-secondary btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
        data-bs-title="Update Pending"><i class="bi bi-clock"></i></a>
        </td>';
        $html .='</tr>';
        endforeach;    
        endif;
echo $html;
?>

          </tbody>
</table>

          </tbody>
        </table>
      </div>

      <div class="table-responsive-sm">
        <table class="table table-hover table-bordered">
          <thead class="table-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Petugas</th>
              <th scope="col">ID Pelanggan</th>
              <th scope="col">Nama Pelanggan</th>
              <th scope="col">PKBA</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(isset($listPemasangan)) :
        $html =null;
        $no = null;
        foreach($listPemasangan as $baris) :
        $no++;
        $html .='<tr>';
        $html .='<td>'. $no.'</td>';
        $html .='<td>'. $baris->nama_petugas.'</td>';
        $html .='<td>'. $baris->id_pelanggan.'</td>';
        $html .='<td>'. $baris->nama_pelanggan.'</td>';
        $html .='<td><a href="'.site_url('edit-pemasangan/'.$baris->PKBA).'" class="btn btn-dark btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#pkbaModal"><i class="bi bi-file-earmark-image"></i></a></td>';
        $html .='<td class="fw-bold '.(($baris->status === 'Belum Selesai') ? 'text-danger' : (($baris->status === 'Selesai') ? 'text-success' : 'text-secondary')).'">'. $baris->status.'</td>';
        $html .='<td align="center">
        <a href="'.site_url('/update-status-pemasangan/'.$baris->id_pemasangan).'" class="btn btn-success btn-sm fw-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
        data-bs-title="Update Selesai"><i class="bi bi-check2-square"></i></a>
        <a href="'.site_url('tampil-idpel/'.$baris->id_pemasangan).'" class="btn btn-secondary btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
        data-bs-title="Update Pending"><i class="bi bi-clock"></i></a>
        </td>';
        $html .='</tr>';
        endforeach;    
        endif;

echo $html;
?>
          </tbody>
        </table>
      </div>
    </section>

    <?=$this->endSection();?>