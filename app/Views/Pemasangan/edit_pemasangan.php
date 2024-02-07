<?= $this->extend('header'); ?>
<?= $this->section('konten'); ?>
<h1><?= $judulHalaman; ?></h1>

<section class="myform">
  <form action="/pemasangan-update/<?= $detailPemasangan[0]['id_pemasangan']; ?>" method="POST" class="form-pemasangan">
    <div class="form-1">
      <div class="input">
        <!-- <label for="form-label">ID Pemasangan</label> -->
        <div>
          <input type="hidden" name="id_pemasangan" class="form-control" autocomplete="off" value="<?= $detailPemasangan[0]['id_pemasangan']; ?>" />
        </div>
      </div>
      <div class="input">
        <label for="form-label">Nama Petugas</label>
        <div>
          <select name="id_petugas" id="" class="form-select">
            <?php
            foreach ($listPetugas as $row) {
              $detailPemasangan[0]['id_petugas'] == $row['id_petugas'] ? $pilih = 'selected' : $pilih = null;
              echo '<option value="' . $row['id_petugas'] . '" ' . $pilih . '>' . $row['nama_petugas'] . '</option>';
          }
            ?>
          </select>
        </div>
      </div>
      <div class="input">
        <label for="form-label">ID Pelanggan</label>
        <div>
          <input type="text" name="id_pelanggan" id="" class="form-control" autocomplete="off" placeholder="Masukkan ID Pelanggan" value="<?= $detailPemasangan[0]['id_pelanggan']; ?>" />
        </div>
      </div>

      <div class="input">
        <label for="form-label">Nama Pelanggan</label>
        <div>
          <input type="text" name="nama_pelanggan" id="" class="form-control" autocomplete="off" placeholder="Masukkan Nama Pelanggan" value="<?= $detailPemasangan[0]['nama_pelanggan']; ?>" />
        </div>
      </div>
      <div class="input">
        <label for="form-label">Alamat</label>
        <div>
          <textarea type="text" name="alamat" id="" class="form-control" autocomplete="off" placeholder="Masukkan Alamat Pelanggan"><?= $detailPemasangan[0]['alamat']; ?></textarea>
        </div>
      </div>
    </div>
    <div class="form-2">
      <div class="input">
        <label for="form-label">No Telepon</label>
        <div>
          <input type="text" name="no_telp" id="" class="form-control" autocomplete="off" placeholder="Masukkan No Telepon Pelanggan" value="<?= $detailPemasangan[0]['no_telp']; ?>" />
        </div>
      </div>
      <div class="input">
        <label for="form-label">PKBA</label>
        <div>
          <input type="file" name="PKBA" id="" class="form-control" autocomplete="off" value="<?= $detailPemasangan[0]['PKBA']; ?>" />
        </div>
      </div>
      <div class="input">
        <label for="form-label">Status</label>
        <div class="radio">
          <input type="radio" name="status" id="belumSelesai" value="Belum Selesai" <?php echo ($detailPemasangan[0]['status'] == 'Belum Selesai') ? 'checked' : ''; ?> />
          Belum Selesai
          <br />
          <input type="radio" name="status" id="sudahSelesai" value="Selesai" <?php echo ($detailPemasangan[0]['status'] == 'Selesai') ? 'checked' : ''; ?> />
          Selesai
          <input type="radio" name="status" id="sudahSelesai" value="Selesai" <?php echo ($detailPemasangan[0]['status'] == 'Pending') ? 'checked' : ''; ?> />
          Pending
        </div>
      </div>
      <div class="input">
        <label for="form-label">Tanggal Pemasangan</label>
        <div>
          <input type="datetime-local" name="tgl_pemasangan" id="" class="form-control" autocomplete="off" value="<?= $detailPemasangan[0]['tgl_pemasangan']; ?>" />
        </div>
      </div>
      <br />
      <button type="submit" class="btn btn-primary">Edit</button>
    </div>
  </form>
</section>

<?= $this->endSection(); ?>