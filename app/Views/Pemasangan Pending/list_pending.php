<?=$this->extend('header');?>
<?=$this->section('konten');?>
<h1><?=$judulHalaman;?></h1>

<section class="mytable">
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead class="table-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">ID Pemasangan</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
        if(isset($listPemasanganPending)) :
        $html =null;
        $no = null;
        foreach($listPemasanganPending as $baris) :
        $no++;
        $html .='<tr>';
        $html .='<td>'. $no.'</td>';
        $html .='<td>'. $baris->id_pelanggan.'</td>';
        $html .='<td>'. $baris->keterangan.'</td>';;
        $html .='<td align="center">
        <a href="'.site_url('hapus-pending/'.$baris->id_pending).'" class="btn btn-success btn-sm fw-bold"><i class="bi bi-check2-square"></i></a>
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
 <?=$this->endSection();?>