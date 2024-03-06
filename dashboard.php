<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    
    session_start();
    require_once "inc/connect.php";
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        echo "<script type='text/javascript'>
        alert('SILAKAN LOGIN TERLEBIH DAHULU!')
        window.location='login.php';
        </script>";
    }
    else{
?>
<?php include_once("templates/header_dashboard.php")?>
    <div class="dashboard-container">
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
    </div>
    <?php } ?>
<?php include_once("templates/footer_dashboard.php")?>