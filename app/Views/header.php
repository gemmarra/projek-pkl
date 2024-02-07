<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="https://api.iconify.design/ant-design/thunderbolt-outlined.svg" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="<?= base_url("bootstrap/css/bootstrap.css") ?>">
  <link rel="stylesheet" href="<?= base_url("pln_view/Pemasangan/assets/css/style.css") ?>" />
  <title>PLN GERCEP</title>
</head>

<body>

  <!-- Modal PKBA -->
  <div class="modal fade" id="pkbaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">PKBA Pemasangan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Konfirmasi -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Bagaimana status pemasangan ini?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="pending-pemasangan" method="post">
            <div class="input">
              <label for="form-label">ID Pelanggan</label>
              <div>
                <input type="text" name="idPelangganU" id="" class="form-control" autocomplete="off" placeholder="Masukkan ID Pelanggan"
                />
              </div>
            </div>
            <div class="input">
              <label for="form-label">Keterangan</label>
              <div>
                <textarea type="text" name="keteranganU" id="" class="form-control" autocomplete="off" placeholder="Masukkan Alamat Pelanggan"></textarea>
              </div>
            </div>
            <br>
            <button type="submit" class="btn btn-secondary">Pending</button>
          </form>
        </div>
        <!-- <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div> -->
      </div>
    </div>
  </div>


  <!-- navbar desktop -->
  <nav class="navbar-desktop navbar navi bg-primary border-bottom border-body navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PLN GERCEP</a>
      <ul class="nav justify-content-center">
        <li class="nav-item nav-pemasangan">
          <a class="nav-link text-light" href="<?= site_url("tampil-pemasangan") ?>">Pemasangan</a>
        </li>
        <li class="nav-item nav-petugas">
          <a class="nav-link text-light" href="<?= site_url("tampil-petugas") ?>">Petugas Pemasangan</a>
        </li>
      </ul>
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link text-light" href="<?= site_url("tutorial") ?>">Tutorial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?= site_url("history-pemasangan") ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Cari">
            <i class="bi bi-search"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?= site_url("notifikasi") ?>"><i class="bi bi-bell"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Profile" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i class="bi bi-person-circle"></i> <?= session()->get('nama'); ?></a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- navbar-ponsel -->
  <nav class="navbar-ponsel bg-primary">
    <div class="container-fluid">
      <ul class="nav d-flex justify-content-evenly">
        <li class="nav-item">
          <a class="nav-link text-light" href="<?= site_url("tampil-pemasangan") ?>"><i class="bi bi-clipboard-check"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?= site_url("history-pemasangan") ?>"><i class="bi bi-search"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#offcanvasExample" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Profile" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i class="bi bi-person-circle"></i></a>
        </li>
      </ul>
    </div>
  </nav>

  <main>
    <?php
    if (isset($judulHalaman)) {
      echo $this->renderSection('konten');
    };
    ?>
  </main>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-bs-scroll="true" data-bs-backdrop="false">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Profil Pengguna</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="icon-profile">
        <img src="<?= base_url("assets/img/user.png") ?>" alt="">
      </div>
      <div class="nama-profile justify-content-center align-items-center">
        <h4><?= session()->get('nama'); ?></h4>
      </div> 
      <div class="status-profile">
        <h4><?= session()->get('level'); ?></h4>
      </div>
      <div class="other-profile ">
        <div class="online-offline">
          <a href="<?= site_url("status-online/");?>" class="btn btn-success">Online</a>
          <a href="<?= site_url("status-offline/");?>" class="btn btn-secondary">Offline</a>
        </div>
        <div class="notif"><button onclick="enableNotif()" class="btn btn-dark">Aktifkan Notifikasi</button></div>
        <a href="<?= site_url("/logout");?>" class="btn btn-danger">Log Out</a>
      </div>
    </div>
  </div>


  <!-- JS Notification -->
  <script>
        navigator.serviceWorker.register(sw.js);

        function enableNotif() {
            Notification.requestPermission().then((permission)=> {
                if (permission === 'granted') {
                    // get service worker
                    navigator.serviceWorker.ready.then((sw)=> {
                        // subscribe
                        sw.pushManager.subscribe({
                            userVisibleOnly: true,
                            applicationServerKey: "BLWKe9pIQa2mHgqh2eI4b_a-XgZFbFyvLqRA3-eUtKehdXtRGuqjIVKfkBmhm8ZtcMF_q0oEPKBVjZyqF9KzTdg"
                        }).then((subscription)=> {
                            console.log(JSON.stringify(subscription));
                        });
                    });
                }
            });
        }
    </script>

  <!-- JS for tooltip -->
  <script src="<?= base_url("bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>

  <!-- JS bootstrap -->
  <script src="<?= base_url("bootstrap/js/bootstrap.js") ?>"></script>

  <!-- JS button update-status-pemasangan -->
  <script>
    // Add JavaScript to confirm deletion and disable the button
    document.getElementById('deleteButton').addEventListener('click', function() {
      var confirmed = confirm('Are you sure you want to delete this row?');
      if (confirmed) {
        // If confirmed, disable the button
        this.disabled = true;
        // Additional logic to perform the delete operation using AJAX, form submission, etc.
      }
    });
  </script>

  <!-- Toast -->
  <script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')

    if (toastTrigger) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
      toastTrigger.addEventListener('click', () => {
        toastBootstrap.show()
      })
    }
  </script>

  <!-- Modal Konfirmasi -->
  <script>
    $(document).ready(function() {
      $('.edit-btn').click(function() {
        var idPemasangan = $(this).data('id');

        // Kirim AJAX request untuk mendapatkan konten modal
        $.ajax({
          url: '<?= site_url('get-edit-modal-content/'); ?>' + idPemasangan,
          method: 'GET',
          success: function(data) {
            // Masukkan konten ke dalam modal
            $('#editModal .modal-content').html(data);

            // Tampilkan modal
            $('#editModal').modal('show');
          }
        });
      });
    });
  </script>


</body>

</html>