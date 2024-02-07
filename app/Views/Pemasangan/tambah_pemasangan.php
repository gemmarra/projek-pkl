<?=$this->extend('header');?>
<?=$this->section('konten');?>
<h1><?=$judulHalaman;?></h1>

<section class="myform">
      <form method="post" class="form-pemasangan" enctype="multipart/form-data" action="/simpan-pemasangan">
        <div class="form-1">
          <div class="input">
            <!-- <label for="form-label">ID Pemasangan</label> -->
            <div>
              <input
                type="hidden"
                name="idPemasangan"
                id="disabledInput"
                class="form-control"
                autocomplete="off"
                disabled
              />
            </div>
          </div>
          <div class="input">
            <label for="form-label">Nama Petugas</label>
            <div>
              <select name="idPetugas" id="" class="form-select">
              <?php
                foreach($listPetugas as $row){
                  echo '<option value="'.$row['id_petugas'].'">'.$row['nama_petugas'].'</option>';  
                }
              ?>
              </select>
            </div>
          </div>
          <div class="input">
            <label for="form-label">ID Pelanggan</label>
            <div>
              <input
                type="text"
                name="idPelanggan"
                id=""
                class="form-control
                <?=($validation->hasError('idPelanggan')) ? 'is-invalid' : ''; ?>"
                autocomplete="off"
                placeholder="Masukkan ID Pelanggan"
              />
            </div>
            <div class="invalid-feedback">
              <?= $validation->getError('idPelanggan'); ?>
            </div>
          </div>

          <div class="input">
            <label for="form-label">Nama Pelanggan</label>
            <div>
              <input
                type="text"
                name="namaPelanggan"
                id=""
                class="form-control"
                autocomplete="off"
                placeholder="Masukkan Nama Pelanggan"
              />
            </div>
          </div>
          <div class="input">
            <label for="form-label">Alamat</label>
            <div>
              <textarea
                type="text"
                name="alamatPelanggan"
                id=""
                class="form-control"
                autocomplete="off"
                placeholder="Masukkan Alamat Pelanggan"
              ></textarea>
            </div>
          </div>
        </div>
        <div class="form-2">
          <div class="input">
            <label for="form-label">No Telepon</label>
            <div>
              <input type="text" name="noTelepon" id="" class="form-control"
              autocomplete="off" placeholder="Masukkan No Telepon Pelanggan"/>
            </div>
          </div>
          <div class="input">
            <label for="form-label">PKBA</label>
            <div>
              <input
                type="file"
                name="pkbaPemasangan"
                id=""
                class="form-control <?=($validation->hasError('pkbaPemasangan')) ? 'is-invalid' : ''; ?>"
                autocomplete="off"
              />
            </div>
            <div class="invalid-feedback">
                <?= $validation->getError('idPelanggan'); ?>
              </div>
          </div>
          <div class="input">
            <label for="form-label">Status</label>
            <div class="radio">
              <input
              type="radio"
                name="statusPemasangan"
                id="belumSelesai"
                value="Belum Selesai"
                checked
              />
              Belum Selesai
              <br />
              <input
                type="radio"
                name="statusPemasangan"
                id="sudahSelesai"
                value="Selesai"
              />
              Selesai
              <br>
              <input
                type="radio"
                name="statusPemasangan"
                id="pending"
                value="Pending"
              />
              Pending
            </div>
          </div>
          <div class="input">
            <label for="form-label">Tanggal Pemasangan</label>
            <div>
              <input type="datetime-local" name="tglPemasangan" id="" class="form-control"
              autocomplete="off"/>
            </div>
          </div>
          <br />
          <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
        </div>
      </form>
    </section>

    <?=$this->endSection();?>