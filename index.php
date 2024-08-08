<?php include_once("templates/header.php")?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran via QRIS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="assets/img/qris.jpg" class="w-100" alt="image" loading="lazy" />
        <div class="alert alert-info mt-2" role="alert">
            <h4 class="alert-heading">
                <i class="fa-solid fa-circle-info"></i>
                <span>Informasi</span>
            </h4>
            <p>
                Kirim Bukti Transaksi di nomor bawah ini:
            </p>
            <hr>
            <p class="mb-0">
                <a class="btn btn-success px-4 py-2 ms-2 me-2"
                    href="https://wa.me/+6282133757289" target="_blank">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>082133757289</span>
                </a>
            </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Tutup
        </button>
      </div>
    </div>
  </div>
</div>
    <div class="container-fluid sticky-top bg-light p-2">
        <div class="container">
            <div class="row d-flex flex-row justify-content-start align-items-center">
                <div class="col">
                    <div class="d-flex flex-row align-items-center">
                        <img src="assets/img/logo/refie_logo.png" class="nav-img" alt="image">
                        <div class="d-flex flex-column ms-2">
                            <h4 class="kanit-medium m-0">REFIE</h4>
                            <span class="kamit-regular">Sport & Fashion</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex flex-row justify-content-end align-items-center">
                        <a class="btn btn-primary px-4 py-2 ms-2 me-2" href="/refie_warehouse/">
                            <i class="fa-solid fa-house"></i>
                            <span>Beranda</span>
                        </a>
                        <a class="btn btn-primary px-4 py-2 ms-2 me-2" href="index.php?katalog=katalog.php">
                            <i class="fa-solid fa-layer-group"></i>
                            <span>Katalog</span>
                        </a>
                        <button type="button" class="btn btn-primary px-4 py-2 ms-2 me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <span>Pembayaran</span>
                        </button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Link</a>
                                    </li>
                                </ul>
                                <form class="d-flex mt-3" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="landing-page">
        <div class="landing-page-content">
            <?php
                if(isset($_GET['katalog'])){
                    require_once "katalog.php";;
                }
                else{
                    require_once "home.php";    
                }
            ?>
        </div>
    </section>
<?php include_once("templates/footer.php")?>