<?=$this->extend('header');?>
<?=$this->section('konten');?>
<h1><?=$judulHalaman;?></h1>

<section class="myform">
      <form action="/petugas-update/<?=$detailPetugas[0]['id_petugas'];?>" method="post" class="form-petugas">
        <div class="form-1">
          <div class="input">
            <label for="form-label">ID Petugas</label>
            <div>
              <input
                type="text"
                name="idPetugas"
                id="disabledInput"
                class="form-control"
                disabled
                value="<?=$detailPetugas[0]['id_petugas'];?>"
              />
            </div>
          </div>
          <div class="input">
            <label for="form-label">Nama Petugas</label>
            <div>
              <input
                type="text"
                name="namaPetugas"
                id=""
                class="form-control"
                placeholder="Masukkan Nama Petugas"
                value="<?=$detailPetugas[0]['nama_petugas'];?>"
              />
            </div>
          </div>
          <div class="input">
            <label for="form-label">Email</label>
            <div>
              <select name="email" id="" class="form-select">
              <?php
                foreach($listUser as $row){
                  if ($row['level'] == 'Petugas') {
                    echo '<option>' . $row['email'] . '</option>';  
                }
              }
              ?>
              </select>
            </div>
          </div>
          <div class="form-2">
          <div class="input">
            <label for="form-label">No Telepon</label>
            <div>
              <input type="text" name="noTelepon" id="" class="form-control" placeholder="Contoh: 62XXXXX"
              value="<?=$detailPetugas[0]['no_telepon'];?>"
              />
            </div>
          </div>
          <div class="input">
              <label for="form-label">Tim</label>
              <div class="radio">
                <input
                  type="radio"
                  name="timPetugas"
                  id="tim1"
                  value="Tim1"
                  <?php echo ($detailPetugas[0]['tim'] == 'Tim1') ? 'checked' : ''; ?>
                />
                Tim 1
                <br />
                <input
                  type="radio"
                  name="timPetugas"
                  id="tim2"
                  value="Tim2"
                  <?php echo ($detailPetugas[0]['tim'] == 'Tim2') ? 'checked' : ''; ?>
                />
                Tim 2
                <br />
                <input
                  type="radio"
                  name="timPetugas"
                  id="tim3"
                  value="Tim3"
                  <?php echo ($detailPetugas[0]['tim'] == 'Tim3') ? 'checked' : ''; ?>
                />
                Tim 3
                <br />
                <input
                  type="radio"
                  name="timPetugas"
                  id="tim4"
                  value="Tim4"
                  <?php echo ($detailPetugas[0]['tim'] == 'Tim4') ? 'checked' : ''; ?>
                />
                Tim 4
              </div>
            </div>
            <br />
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </section>

    <?=$this->endSection();?>