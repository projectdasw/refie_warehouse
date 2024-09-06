<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    
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
        
        <!-- SELECT2 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <!-- SELECT2 CSS -->

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

        <!-- SWEETALERT2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css">
        <!-- SWEETALERT2 -->

        <!-- JS CORE -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
            
        <!-- BOOTSTRAP JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <!-- BOOTSTRAP JS -->

        <!-- SELECT2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- SELECT2 JS -->

        <!-- DATATABLE JS -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <!-- DATATABLE JS -->

        <!-- SWEETALERT2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
        <!-- SWEETALERT2 -->
        <?php
            if(isset($_GET['barang'])){
                echo "<title>REFIE - Barang</title>";
            }
            elseif(isset($_GET['barang_masuk'])){
                echo "<title>REFIE - Barang Masuk</title>";
            }
            elseif(isset($_GET['barang_keluar'])){
                echo "<title>REFIE - Barang Keluar</title>";
            }
            elseif(isset($_GET['kategori'])){
                echo "<title>REFIE - Kategori</title>";
            }
            elseif(isset($_GET['kondisi'])){
                echo "<title>REFIE - Kondisi</title>";
            }
            elseif(isset($_GET['laporan'])){
                echo "<title>REFIE - Laporan</title>";
            }
            elseif(isset($_GET['aktivitas'])){
                echo "<title>REFIE - Aktivitas Toko</title>";
            }
            else{
                echo "<title>REFIE - Dashboard</title>";
            }
        ?>
    </head>
    <body>
        <?php
            require_once "inc/connect.php";
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
            {
        ?>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Silahkan Login terlebih dahulu",
                    confirmButtonColor: "#d33",
                    confirmButtonText: "OK",
                    backdrop: "rgb(0, 0, 0)"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.php';
                    }
                });
            </script>
        <?php } ?>

        <!-- Modal -->
        <div class="modal fade" id="modal_tambahakun" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_tambahakunLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal_tambahakunLabel">
                            Tambah Akun Baru
                        </h1>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="row g-3 needs-validation" action="inc/process.php" enctype="multipart/form-data"
                            autocomplete="off" novalidate>
                            <div class="col-12">
                                <label for="id_user" class="form-label">
                                    ID User
                                </label>
                                <?php
                                    $word = "LOG-";
                                    $number = random_int(100, 999);
                                    $auto_no = $word . sprintf("%03s", $number);
                                ?>
                                <input type="text" class="form-control bg-secondary-subtle" name="id_user" id="id_user"
                                    value="<?php echo $auto_no; ?>" readonly>
                            </div>
                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                                <div class="invalid-feedback">
                                    Username tidak boleh kosong
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" id="password" required>
                                <div class="invalid-feedback">
                                    Password tidak boleh kosong
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="level" class="form-label">
                                    Level
                                </label>
                                <select class="form-select" name="level" id="level_add"
                                    data-placeholder="Pilih Level" required>
                                    <option></option>
                                    <?php
                                        $query = "select * from level_login";
                                        $sql = mysqli_query($conn, $query);
                            
                                        while($result = mysqli_fetch_assoc($sql)){
                                            $nm_lvl = $result['level'];
                                    ?>
                                        <option value="<?php echo $nm_lvl?>">
                                            <?php echo $nm_lvl?>
                                        </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary" name="form_process" value="tambah_akun">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>Simpan Data</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_tambahkategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_tambahkategoriLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal_tambahkategoriLabel">
                            Tambah Kategori Baru
                        </h1>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="row g-3 needs-validation" action="inc/process.php" enctype="multipart/form-data"
                            autocomplete="off" novalidate>
                            <input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $id; ?>">
                            <div class="col-12">
                                <label for="id_kategori" class="form-label">
                                    ID Kategori
                                </label>
                                <?php
                                    $word = "CAT-";
                                    $number = random_int(100, 999);
                                    $auto_no = $word . sprintf("%03s", $number);
                                ?>
                                <input type="text" class="form-control bg-secondary-subtle" name="id_kategori" id="id_kategori"
                                    value="<?php echo $auto_no; ?>" readonly>
                            </div>
                            <div class="col-12">
                                <label for="nama_kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" required>
                                <div class="invalid-feedback">
                                    Harap masukkan nama kategori baru
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary" name="form_process" value="tambah_kategori">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>Simpan Data</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_tambahkondisi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_tambahkondisiLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal_tambahkondisiLabel">
                            Tambah Kondisi Baru
                        </h1>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="row g-3 needs-validation" action="inc/process.php" enctype="multipart/form-data"
                            autocomplete="off" novalidate>
                            <div class="col-12">
                                <label for="id_kondisi">ID Kondisi</label>
                                <?php
                                    $word = "KND-";
                                    $number = random_int(100, 999);
                                    $auto_no = $word . sprintf("%03s", $number);
                                ?>
                                <input type="text" class="form-control bg-secondary-subtle" name="id_kondisi" id="id_kondisi"
                                    value="<?php echo $auto_no; ?>" readonly>
                            </div>
                            <div class="col-12">
                                <label for="nama_kondisi" class="form-label">Kondisi</label>
                                <input type="text" class="form-control" name="nama_kondisi" id="nama_kondisi" required>
                                <div class="invalid-feedback">
                                    Harap masukkan nama kondisi baru
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary" name="form_process" value="tambah_kondisi">
                                    <i class="fa-solid fa-plus"></i>
                                    <span>Simpan Data</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <div class="container-fluid kanit-regular">
            <div class="row">
                <div class="col-2 d-flex flex-column p-0 sticky-top"
                    style="height: 100vh; background-color: #f7f7f7;">
                    <img src="assets/img/logo/refie_logo.png" class="img-fluid w-50 mx-auto mt-3 mb-3"
                        alt="image" loading="lazy" style="box-shadow: 0 0 10px 0px #e5e5e5; border-radius: 50%;">
                    <ul class="nav flex-column aside-menu">
                        <?php if($_SESSION['level'] === 'Super Admin'){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">
                                    <i class="fa-solid fa-chart-line me-2"></i>
                                    <span>Menu Utama</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?aktivitas=aktivitas.php">
                                    <i class="fa-solid fa-eye me-2"></i>
                                    <span>Aktivitas Toko</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?barang_masuk=barang_masuk.php">
                                    <i class="fa-solid fa-truck-arrow-right me-2"></i>
                                    <span>Barang Masuk</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?barang_keluar=barang_keluar.php">
                                    <i class="fa-solid fa-truck-arrow-right me-2"></i>
                                    <span>Barang Keluar</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?barang=barang.php">
                                    <i class="fa-solid fa-warehouse me-2"></i>
                                    <span>Barang</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?kategori=kategori.php">
                                    <i class="fa-solid fa-tags me-2"></i>
                                    <span>Kategori</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?kondisi=kondisi.php">
                                    <i class="fa-solid fa-temperature-empty me-2"></i>
                                    <span>Kondisi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?akun=akun.php">
                                    <i class="fa-solid fa-user-secret me-2"></i>
                                    <span>Akun</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php?laporan=laporan.php">
                                    <i class="fa-solid fa-box-archive me-2"></i>
                                    <span>Laporan</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if($_SESSION['level'] === 'Admin'){ ?>
                            <li>
                                <button onclick="location.href='dashboard.php?barang_masuk=barang_masuk.php'">
                                    <i class="fa-solid fa-truck-arrow-right"></i>
                                    <span>Barang Masuk</span>
                                </button>
                            </li>
                            <li>
                                <button onclick="location.href='dashboard.php?barang_keluar=barang_keluar.php'">
                                    <i class="fa-solid fa-truck-arrow-right" style="transform: scaleX(-1);"></i>
                                    <span>Barang Keluar</span>
                                </button>
                            </li>
                            <li>
                                <button onclick="location.href='dashboard.php?barang=barang.php'">
                                    <i class="fa-solid fa-warehouse"></i>
                                    <span>Barang</span>
                                </button>
                            </li>
                            <li>
                                <button onclick="location.href='dashboard.php?kategori=kategori.php'">
                                    <i class="fa-solid fa-tags"></i>
                                    <span>Kategori</span>
                                </button>
                            </li>
                            <li>
                                <button onclick="location.href='dashboard.php?kondisi=kondisi.php'">
                                    <i class="fa-solid fa-temperature-empty"></i>
                                    <span>Kondisi</span>
                                </button>
                            </li>
                            <li>
                                <button onclick="location.href='dashboard.php?laporan=laporan.php'">
                                    <i class="fa-solid fa-box-archive"></i>
                                    <span>Laporan</span>
                                </button>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-10">
                    <div class="container-fluid p-0">
                        <div class="row p-2 justify-content-between align-items-center sticky-top"
                            style="background-color: #f7f7f7;">
                            <div class="col-6 text-start">
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                    Menu
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
                                Hari/Tanggal : <?php echo strftime("%A, %d %B %Y"); ?>
                            </div>
                            <div class="col-6 text-end">
                                <div class="btn-group dropstart">
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-expanded="false"></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form action="inc/process.php" method="POST">
                                                <button class="w-100" name="form_process" value="logout">
                                                    <span>Logout</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary">
                                        Halo, <?php echo $_SESSION['username']; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-success mt-3" role="alert">
                            <?php
                                if(isset($_GET['aktivitas'])){
                                    echo "
                                        <h4 class='alert-heading m-0'>
                                            REFIE - Aktivitas Toko
                                        </h4>
                                    ";
                                }
                                elseif(isset($_GET['barang'])){
                                    echo "
                                        <h4 class='alert-heading m-0'>
                                            REFIE - Data Master Barang
                                        </h4>
                                        <p class='m-0'>
                                            Halaman ini berisi data master barang. Jika ingin
                                            menambahkan barang baru, Silahkan menuju halaman
                                            <a class='text-dark' href='dashboard.php?barang_masuk=barang_masuk.php'>
                                                <strong>Barang Masuk</strong>
                                            </a>, pilih <strong>Tambah Barang Masuk Baru</strong>.
                                        </p>
                                    ";
                                }
                                elseif(isset($_GET['edit-barang'])){
                                    echo "
                                        <div class='d-flex flex-row justify-content-between align-items-center'>
                                            <h4 class='alert-heading m-0'>
                                                REFIE - Edit Data Barang
                                            </h4>
                                            <a href='dashboard.php?barang=barang.php' class='btn btn-danger'>
                                                <i class='fa-solid fa-reply'></i>
                                                <span>Batal</span>
                                            </a>
                                        </div>
                                    ";
                                }
                                elseif(isset($_GET['barang_masuk'])){
                                    echo "
                                        <div class='d-flex flex-row justify-content-between align-items-center'>
                                            <h4 class='alert-heading m-0'>
                                                REFIE - Data Barang Masuk
                                            </h4>
                                            <div class='btn-group btn-group-sm' role='group'>
                                                <button class='btn btn-info'
                                                    onclick=location.href='dashboard.php?barang=barang.php'
                                                    style='width: max-content;'>
                                                    <i class='fa-solid fa-cloud'></i>
                                                    <span>Menuju Data Barang</span>
                                                </button>
                                                <button type='button' class='btn btn-success'
                                                    onclick=location.href='dashboard.php?form-barang-masuk=form-barang-masuk.php'>
                                                    <i class='fa-solid fa-circle-plus'></i>
                                                    <span>Tambah Barang Masuk Baru</span>
                                                </button>
                                                <button class='btn btn-primary'
                                                    onclick=location.href='dashboard.php?form-barang-masuk-sudah-ada=form-barang-masuk-sudah-ada.php'>
                                                    <i class='fa-solid fa-circle-plus'></i>
                                                    <span>Tambah Barang Masuk yang sudah ada</span>
                                                </button>
                                            </div>
                                        </div>
                                    ";
                                }
                                elseif(isset($_GET['form-barang-masuk'])){
                                    echo "
                                        <div class='d-flex flex-row justify-content-between align-items-center'>
                                            <h4 class='alert-heading m-0'>
                                                REFIE - Data Barang Masuk Baru
                                            </h4>
                                        </div>
                                    ";
                                }
                                elseif(isset($_GET['form-barang-masuk-sudah-ada'])){
                                    echo "
                                        <div class='d-flex flex-row justify-content-between align-items-center'>
                                            <h4 class='alert-heading m-0'>
                                                REFIE - Data Barang Masuk
                                            </h4>
                                        </div>
                                    ";
                                }
                                elseif(isset($_GET['barang_keluar'])){
                                    echo "
                                        <div class='d-flex flex-row justify-content-between align-items-center'>
                                            <h4 class='alert-heading m-0'>
                                                REFIE - Data Barang Keluar
                                            </h4>
                                            <button class='btn btn-sm btn-primary'
                                                onclick=location.href='dashboard.php?form-barang-keluar=form-barang-keluar.php'
                                                style='width: max-content;'>
                                                <i class='fa-solid fa-circle-plus'></i>
                                                <span>Tambah Data Barang Keluar</span>
                                            </button>
                                        </div>
                                    ";
                                }
                                elseif(isset($_GET['form-barang-keluar'])){
                                    echo "
                                        <div class='d-flex flex-row justify-content-between align-items-center'>
                                            <h4 class='alert-heading m-0'>
                                                REFIE - Data Barang Keluar
                                            </h4>
                                        </div>
                                    ";
                                }
                                elseif(isset($_GET['kategori'])){
                                    echo "
                                        <div class='d-flex flex-row justify-content-between align-items-center'>
                                            <h4 class='alert-heading m-0'>
                                                REFIE - Kategori
                                            </h4>
                                            <button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#modal_tambahkategori'>
                                                <i class='fa-solid fa-circle-plus'></i>
                                                <span>Tambah Data</span>
                                            </button>
                                        </div>
                                    ";
                                }
                                elseif(isset($_GET['kondisi'])){
                                    echo "
                                        <div class='d-flex flex-row justify-content-between align-items-center'>
                                            <h4 class='alert-heading m-0'>
                                                REFIE - Kondisi
                                            </h4>
                                            <button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#modal_tambahkondisi'>
                                                <i class='fa-solid fa-circle-plus'></i>
                                                <span>Tambah Data</span>
                                            </button>
                                        </div>
                                    ";
                                }
                                elseif(isset($_GET['form-barang'])){
                                    if(isset($_GET['ubah_barang'])){
                                        echo "
                                        <h3>REFIE - Edit Barang</h3>
                                        ";    
                                    }
                                    else{
                                        echo "
                                        <h3>REFIE - Tambah Barang</h3>
                                        ";
                                    }
                                }
                                elseif(isset($_GET['form-kategori'])){
                                    echo "
                                        <h3>REFIE - Tambah Kategori</h3>
                                    ";
                                }
                                elseif(isset($_GET['form-kondisi'])){
                                    echo "
                                        <h3>REFIE - Tambah Kondisi</h3>
                                    ";
                                }
                                elseif(isset($_GET['laporan'])){
                                    echo "
                                        <div class='d-flex flex-row justify-content-between align-items-center'>
                                            <h4 class='alert-heading m-0'>
                                                REFIE - Laporan Toko
                                            </h4>
                                            <div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>
                                                <a href='inc/report.php' target='_blank' class='btn btn-danger'>
                                                    <i class='fa-solid fa-print'></i>
                                                    <span>PDF</span>
                                                </a>
                                                <a href='inc/report.php' target='_blank' class='btn btn-success'>
                                                    <i class='fa-solid fa-file-excel'></i>
                                                    <span>Excel</span>
                                                </a>
                                            </div>
                                        </div>
                                    ";
                                }
                                elseif(isset($_GET['akun'])){
                                    if(isset($_GET['ubah_user'])){
                                        echo "
                                            <h3>REFIE - Akun</h3>
                                            <button class='btn btn-danger' onclick=location.href='dashboard.php?akun=akun.php'
                                            style='width: 30%;'>
                                                <i class='fa-solid fa-pencil'></i>
                                                <span>Batalkan Edit Data</span>
                                            </button>
                                        ";
                                    }
                                    else{
                                        echo "
                                            <div class='d-flex flex-row justify-content-between align-items-center'>
                                                <h4 class='alert-heading m-0'>
                                                    REFIE - Akun
                                                </h4>
                                                <!-- Button trigger modal -->
                                                <button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#modal_tambahakun'>
                                                    <i class='fa-solid fa-circle-plus'></i>
                                                    <span>Tambah Data</span>
                                                </button>
                                            </div>
                                        ";
                                    }
                                }
                                else{
                                    echo "
                                        <h4 class='alert-heading m-0'>
                                            REFIE - Dashboard
                                        </h4>
                                    ";
                                }
                            ?>
                        </div>
                        <?php
                            if(isset($_GET['aktivitas'])){
                                require_once "aktivitas.php";
                            }
                            elseif(isset($_GET['barang'])){
                                require_once "barang.php";
                            }
                            elseif(isset($_GET['edit-barang'])){
                                require_once "edit_barang.php";
                            }
                            elseif(isset($_GET['barang_masuk'])){
                                require_once "barang_masuk.php";
                            }
                            elseif(isset($_GET['barang_keluar'])){
                                require_once "barang_keluar.php";
                            }
                            elseif(isset($_GET['kategori'])){
                                require_once "kategori.php";
                            }
                            elseif(isset($_GET['kondisi'])){
                                require_once "kondisi.php";
                            }
                            elseif(isset($_GET['form-barang'])){
                                require_once "form-barang.php";
                            }
                            elseif(isset($_GET['form-barang-masuk'])){
                                require_once "form-barang-masuk.php";
                            }
                            elseif(isset($_GET['form-barang-masuk-sudah-ada'])){
                                require_once "form-barang-masuk-sudah-ada.php";
                            }
                            elseif(isset($_GET['form-barang-keluar'])){
                                require_once "form-barang-keluar.php";
                            }
                            elseif(isset($_GET['form-kategori'])){
                                require_once "form-kategori.php";
                            }
                            elseif(isset($_GET['form-kondisi'])){
                                require_once "form-kondisi.php";
                            }
                            elseif(isset($_GET['laporan'])){
                                require_once "laporan.php";
                            }
                            elseif(isset($_GET['akun'])){
                                require_once "akun.php";
                            }
                            elseif(isset($_GET['ubah_user'])){
                                require_once "edit_akun.php";
                            }
                            else{
                                require_once "main-menu.php";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="dashboard-container kanit-regular">
            <aside class="menu-aside">
                <div class="logo-img">
                    <img src="assets/img/logo/refie_logo.png" alt="REFIE Logo">
                </div>
                <ul class="nav-menu">
                    <li>
                        <button onclick="location.href='dashboard.php'">
                            <i class="fa-solid fa-chart-line"></i>
                            <span>Menu Utama</span>
                        </button>
                    </li>
                    <?php if($_SESSION['level'] === 'Super Admin'){ ?>                
                        <li>
                            <button onclick="location.href='dashboard.php?aktivitas=aktivitas.php'">
                                <i class="fa-solid fa-eye"></i>
                                <span>Aktivitas Toko</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?barang_masuk=barang_masuk.php'">
                                <i class="fa-solid fa-truck-arrow-right"></i>
                                <span>Barang Masuk</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?barang_keluar=barang_keluar.php'">
                                <i class="fa-solid fa-truck-arrow-right" style="transform: scaleX(-1);"></i>
                                <span>Barang Keluar</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?barang=barang.php'">
                                <i class="fa-solid fa-warehouse"></i>
                                <span>Barang</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?kategori=kategori.php'">
                                <i class="fa-solid fa-tags"></i>
                                <span>Kategori</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?kondisi=kondisi.php'">
                                <i class="fa-solid fa-temperature-empty"></i>
                                <span>Kondisi</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?laporan=laporan.php'">
                                <i class="fa-solid fa-box-archive"></i>
                                <span>Laporan</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?akun=akun.php'">
                            <i class="fa-solid fa-user-secret"></i>
                                <span>Akun</span>
                            </button>
                        </li>
                    <?php } ?>
                    <?php if($_SESSION['level'] === 'Admin'){ ?>
                        <li>
                            <button onclick="location.href='dashboard.php?barang_masuk=barang_masuk.php'">
                                <i class="fa-solid fa-truck-arrow-right"></i>
                                <span>Barang Masuk</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?barang_keluar=barang_keluar.php'">
                                <i class="fa-solid fa-truck-arrow-right" style="transform: scaleX(-1);"></i>
                                <span>Barang Keluar</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?barang=barang.php'">
                                <i class="fa-solid fa-warehouse"></i>
                                <span>Barang</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?kategori=kategori.php'">
                                <i class="fa-solid fa-tags"></i>
                                <span>Kategori</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?kondisi=kondisi.php'">
                                <i class="fa-solid fa-temperature-empty"></i>
                                <span>Kondisi</span>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='dashboard.php?laporan=laporan.php'">
                                <i class="fa-solid fa-box-archive"></i>
                                <span>Laporan</span>
                            </button>
                        </li>
                    <?php } ?>
                </ul>
            </aside>
            <section class="section-container">
                <div class="section-header">
                    <div class="title-w-button">
                        <?php
                            if(isset($_GET['aktivitas'])){
                                echo "
                                    <h3>REFIE - Aktivitas Toko</h3>
                                ";
                            }
                            elseif(isset($_GET['barang'])){
                                echo "
                                    <h3>REFIE - Barang</h3>
                                ";
                            }
                            elseif(isset($_GET['barang_masuk'])){
                                echo "
                                    <h3>REFIE - Data Barang Masuk</h3>
                                    <button class='btn btn-primary'
                                        onclick=location.href='dashboard.php?barang=barang.php'
                                        style='width: max-content;'>
                                        <i class='fa-solid fa-cloud'></i>
                                        <span>Menuju Data Barang</span>
                                    </button>
                                ";
                            }
                            elseif(isset($_GET['form-barang-masuk'])){
                                echo "
                                    <h3>REFIE - Data Barang Masuk Baru</h3>
                                ";
                            }
                            elseif(isset($_GET['form-barang-masuk-sudah-ada'])){
                                echo "
                                    <h3>REFIE - Data Barang Masuk</h3>
                                ";
                            }
                            elseif(isset($_GET['barang_keluar'])){
                                echo "
                                    <h3>REFIE - Data Barang Keluar</h3>
                                    <button class='btn btn-primary'
                                        onclick=location.href='dashboard.php?form-barang-keluar=form-barang-keluar.php'
                                        style='width: max-content;'>
                                        <i class='fa-solid fa-circle-plus'></i>
                                        <span>Tambah Data Barang Keluar</span>
                                    </button>
                                ";
                            }
                            elseif(isset($_GET['form-barang-keluar'])){
                                echo "
                                    <h3>REFIE - Data Barang Keluar</h3>
                                ";
                            }
                            elseif(isset($_GET['kategori'])){
                                echo "
                                    <h3>REFIE - Kategori</h3>
                                    <button class='btn btn-primary'
                                        onclick=location.href='dashboard.php?form-kategori=form-kategori.php'
                                        style='width: max-content;'>
                                        <i class='fa-solid fa-circle-plus'></i>
                                        <span>Tambah Data</span>
                                    </button>
                                ";
                            }
                            elseif(isset($_GET['kondisi'])){
                                echo "
                                    <h3>REFIE - Kondisi</h3>
                                    <button class='btn btn-primary'
                                        onclick=location.href='dashboard.php?form-kondisi=form-kondisi.php'
                                        style='width: max-content;'>
                                        <i class='fa-solid fa-circle-plus'></i>
                                        <span>Tambah Data</span>
                                    </button>
                                ";
                            }
                            elseif(isset($_GET['form-barang'])){
                                if(isset($_GET['ubah_barang'])){
                                    echo "
                                    <h3>REFIE - Edit Barang</h3>
                                    ";    
                                }
                                else{
                                    echo "
                                    <h3>REFIE - Tambah Barang</h3>
                                    ";
                                }
                            }
                            elseif(isset($_GET['form-kategori'])){
                                echo "
                                    <h3>REFIE - Tambah Kategori</h3>
                                ";
                            }
                            elseif(isset($_GET['form-kondisi'])){
                                echo "
                                    <h3>REFIE - Tambah Kondisi</h3>
                                ";
                            }
                            elseif(isset($_GET['laporan'])){
                                echo "
                                    <h3>REFIE - Laporan Toko</h3>
                                    <a href='inc/report.php' target='_blank' class='btn btn-danger'
                                        style='text-decoration: none; width: max-content;'>
                                        <i class='fa-solid fa-print'></i>
                                        <span>Cetak laporan (PDF)</span>
                                    </a>
                                ";
                            }
                            elseif(isset($_GET['akun'])){
                                if(isset($_GET['ubah_user'])){
                                    echo "
                                        <h3>REFIE - Akun</h3>
                                        <button class='btn btn-danger' onclick=location.href='dashboard.php?akun=akun.php'
                                        style='width: 30%;'>
                                            <i class='fa-solid fa-pencil'></i>
                                            <span>Batalkan Edit Data</span>
                                        </button>
                                    ";
                                }
                                else{
                                    echo "
                                        <h3>REFIE - Akun</h3>
                                    ";
                                }
                            }
                            else{
                                echo "<h3>REFIE - Dashboard</h3>";
                            }
                        ?>
                    </div>
                    <div class="admin-menu">
                        <h4>
                            Halo, <?php echo $_SESSION['username']; ?>
                        </h4>
                        <i id="admin-bars" class="fa-solid fa-bars-staggered"></i>
                        <div class="admin-setting" id="admin-list" style="display: none;">
                            <form action="inc/process.php" method="POST">
                                <button class="btn" name="form_process" value="logout"
                                    style="color: #000; width: 100%; background-color: transparent;">
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    <?php
                        if(isset($_GET['aktivitas'])){
                            require_once "aktivitas.php";
                        }
                        elseif(isset($_GET['barang'])){
                            require_once "barang.php";
                        }
                        elseif(isset($_GET['barang_masuk'])){
                            require_once "barang_masuk.php";
                        }
                        elseif(isset($_GET['barang_keluar'])){
                            require_once "barang_keluar.php";
                        }
                        elseif(isset($_GET['kategori'])){
                            require_once "kategori.php";
                        }
                        elseif(isset($_GET['kondisi'])){
                            require_once "kondisi.php";
                        }
                        elseif(isset($_GET['form-barang'])){
                            require_once "form-barang.php";
                        }
                        elseif(isset($_GET['form-barang-masuk'])){
                            require_once "form-barang-masuk.php";
                        }
                        elseif(isset($_GET['form-barang-masuk-sudah-ada'])){
                            require_once "form-barang-masuk-sudah-ada.php";
                        }
                        elseif(isset($_GET['form-barang-keluar'])){
                            require_once "form-barang-keluar.php";
                        }
                        elseif(isset($_GET['form-kategori'])){
                            require_once "form-kategori.php";
                        }
                        elseif(isset($_GET['form-kondisi'])){
                            require_once "form-kondisi.php";
                        }
                        elseif(isset($_GET['laporan'])){
                            require_once "laporan.php";
                        }
                        elseif(isset($_GET['akun'])){
                            require_once "akun.php";
                        }
                        else{
                            require_once "main-menu.php";
                        }
                    ?>
                </div>
            </section>
        </div> -->
        <script src="assets/js/script.js" type="text/javascript"></script>
    </body>
</html>