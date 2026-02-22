<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    
    include 'inc/connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo/favicon.ico" type="image/x-icon">
        <!-- CSS CUSTOM -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- CSS CUSTOM -->

        <!-- CSS CORE -->
        <!-- BOOTSTRAP CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">
        <!-- BOOTSTRAP CSS -->

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.css"
            integrity="sha512-ESK1vT1m7NYUq7h7moDOb4+MwsXn/19LSt1AnIPjSWRdkS1gnF9IVg5v/KZHCMN6K6sapd0OkkcSpOeYlwABeQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/solid.css"
            integrity="sha512-1Yji5rHbPJjwaFFUCEE3uLVcIiElHUKsGJN7A6XA6AzfrNohu+7DhJ67J65ZdeXjuYTiL8cdCUAG2nNJDWk8KQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.css"
            integrity="sha512-/0+jCMeks7Sm7B2Jai6K8JDYQqiwWiY73tw+G6BQkisKhUC0fqKt9Sd8noZvHPHl5rm9/cJ5hcuzzONlFvLMQQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- FONT AWESOME -->

        <!-- SWIPER CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8.4.7/swiper-bundle.min.css"
            integrity="sha256-Mi0V2Z77eSyUGlIC+o/H7p6TKEcic4P/lgUWMzigjqw="
            crossorigin="anonymous">
        <!-- SWIPER CSS -->

        <!-- DATATABLE CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
        <!-- DATATABLE CSS -->

        <!-- JS CORE -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
            
        <!-- BOOTSTRAP JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <!-- BOOTSTRAP JS -->

        <!-- DATATABLE JS -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <!-- DATATABLE JS -->
         
        <?php
            if(isset($_GET['katalog'])){
                echo "
                    <title>Katalog - REFIE Sport & Fashion</title>
                ";
            }
            elseif(isset($_GET['detail-barang'])){
                echo "
                    <title>Detail Barang - REFIE Sport & Fashion</title>
                ";
            }
            else{
                echo "
                    <title>REFIE Sport & Fashion</title>
                ";
            }
        ?>
    </head>
    <body>
        <!-- Tampilan Pembayaran QRIS -->
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

        <!-- NAV MENU HOME -->
        <div class="container-fluid sticky-top bg-white">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3 d-flex flex-column justify-content-center">
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <img src="assets/img/logo/refie_logo.png" class="header-nav-img" alt="image">
                        <div class="d-flex flex-column ms-1">
                            <h5 class="m-0">REFIE Sport & Fashion</h5>
                            <h6 class="m-0">#refiesportfashion</h6>
                        </div>
                        <button class="btn border border-1 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <div>
                                I will not close if you click outside of me.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3 d-flex flex-column justify-content-center">
                    <div class="header-search-product input-group p-3 rounded-4">
                        <input type="text" class="form-control bg-transparent border-0" placeholder="Cari Produk" aria-label="Cari Produk" aria-describedby="button-addon2">
                        <button class="btn" type="button" id="button-addon2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2 d-flex flex-column justify-content-center">
                    <ul class="list-group list-group-horizontal">
                        <a href="/refie_warehouse/" class="list-group-item list-group-item-action border-0">
                            Beranda
                        </a>
                        <a href="index.php?katalog=katalog.php" class="list-group-item list-group-item-action border-0">
                            Katalog
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Pembayaran
                        </a>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 d-flex flex-row justify-content-center align-items-center">
                    <ul class="list-group list-group-horizontal">
                        <a href="#" class="list-group-item list-group-item-action border-0">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-store"></i>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
