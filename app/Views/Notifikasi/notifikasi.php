<?=$this->extend('header');?>
<?=$this->section('konten');?>
<h1><?= $judulHalaman; ?></h1>

<?php
        if(isset($listNotifikasi)) :
            $html =null;
            $no = null;
            foreach($listNotifikasi as $baris) :
            $no++;
            $html .= '<p class="notifikasi-row"><span class="fw-bold">'. $baris->pengirim .'</span> mengkonfirmasi <span class="fw-bold'. (($baris->pesan == 'Selesai') ? 'text-success' : 'text-secondary') .'">'. $baris->pesan .'</span> pelanggan dengan ID <span class="fw-bold"> '. $baris->id_pelanggan .'</span><br/><span class="fw-light text-secondary">'. $baris->tgl_notifikasi .'</span>';
        endforeach;    
    endif;

    echo $html;
?>

<?=$this->endSection();?>

<p><span class="fw-bold"></span></p>