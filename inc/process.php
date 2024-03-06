<?php
    date_default_timezone_set('Asia/Jakarta');
    setlocale(LC_ALL, 'id-ID', 'id_ID');

    include 'connect.php';
    session_start();

    if(isset($_POST['form_process'])){
        // LOGIN PROCESS
            if($_POST['form_process'] == "login"){
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $query_log = "select * from login where username='$username' and password='$password'";
                $sql_log = mysqli_query($conn, $query_log);
                $cek = mysqli_num_rows($sql_log);
                $data = mysqli_fetch_array($sql_log);
                $name = $data['username'];
                $type = $data['level'];

                if($cek == true){
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['level'] = $type;
                    $_SESSION['logged_in'] = true;

                    $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                    $tgl_login = strftime("%A, %d %B %Y");
                    $jam = date('H:i:s');
                    $aktivitas = "<strong>$username</strong> telah melakukan aktivitas
                                <strong>Login</strong> pada hari $tgl_login pukul $jam";
                    
                    $query = "insert into aktivitas values('$tgl_akt', '$username','$aktivitas')";
                    $sql = mysqli_query($conn, $query);
                    
                    header("location: ../dashboard.php");
                }
                else{
                    $_SESSION['login-message'] = "Username/Password Salah";
                    header("location: ../login.php");
                }
            }
            else if($_POST['form_process'] == "logout"){
                session_start();

                $nama_user = $_SESSION['username'];
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl_logout = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            <strong>Logout</strong> pada hari $tgl_logout pukul $jam";
                
                $query = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql = mysqli_query($conn, $query);
                
                session_unset();
                header("location: ../login.php");
                session_destroy();
                exit();
            }
        // END OF LOGIN PROCESS

        // CRUD AKUN LOGIN
            else if($_POST['form_process'] == "tambah_akun"){
                $id_akun = htmlspecialchars($_POST['id_user']);
                $nm_akun = htmlspecialchars($_POST['username']);
                $pass_akun = htmlspecialchars($_POST['password']);
                $lvl = htmlspecialchars($_POST['level']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Tambah Akun Baru bernama <strong>$nm_akun</strong>
                            pada hari $tgl_akt pukul $jam";

                # FIRST INSERT - Tambah Data Akun
                $query = "insert into login values('$id_akun', '$nm_akun', '$pass_akun', '$lvl')";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                if($sql){
                    $_SESSION['sukses-tambah-akun'] = "Data berhasil ditambahkan";
                    header('location: ../dashboard.php?akun=akun.php');
                }
                else{
                    echo $query;
                }
            }
            else if($_POST['form_process'] == "update_akun"){
                $id_akun = htmlspecialchars($_POST['id_user']);
                $nm_akun = htmlspecialchars($_POST['username']);
                $pass_akun = htmlspecialchars($_POST['password']);
                $lvl = htmlspecialchars($_POST['level']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Edit Data Akun dengan ID Akun <strong>$id_akun</strong>
                            pada hari $tgl_akt pukul $jam";
                
                # FIRST INSERT - Edit Data Akun
                $query = "update login set username='$nm_akun',
                            password='$pass_akun', level='$lvl'
                            where id_user='$id_akun'";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                if($sql){
                    $_SESSION['sukses-ubah-akun'] = "Data berhasil di ubah";
                    header('location: ../dashboard.php?akun=akun.php');
                }
                else{
                    echo $query;
                }

            }
        // END OF CRUD AKUN LOGIN

        // CRUD BARANG
            else if($_POST['form_process'] == "tambah_barang"){
                $id_barang = htmlspecialchars($_POST['id_barang']);
                $nm_barang = htmlspecialchars($_POST['nama_barang']);
                $ft_barang = htmlspecialchars($_FILES['foto']['name']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $kondisi = htmlspecialchars($_POST['kondisi']);
                $jml = htmlspecialchars($_POST['jumlah']);
                $harga = htmlspecialchars($_POST['harga']);

                $dir_ft = "../gambar-barang/";
                $tmp = $_FILES['foto']['tmp_name'];
                move_uploaded_file($tmp, $dir_ft.$ft_barang);

                $query = "insert into barang values('$id_barang', '$nm_barang', '$ft_barang', '$kategori' , '$kondisi', '$jml', '$harga')";
                $sql = mysqli_query($conn, $query);
                if($sql){
                    $_SESSION['sukses-tambah-barang'] = "Data berhasil ditambahkan";
                    header('location: ../dashboard.php?barang=barang.php');
                }
                else{
                    echo $query;
                }
            }
            else if($_POST['form_process'] == "update_barang"){
                $id_barang = htmlspecialchars($_POST['id_barang']);
                $nm_barang = htmlspecialchars($_POST['nama_barang']);
                $ft_barang = htmlspecialchars($_FILES['foto']['name']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $kondisi = htmlspecialchars($_POST['kondisi']);
                $jml = htmlspecialchars($_POST['jumlah']);
                $harga = htmlspecialchars($_POST['harga']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Edit Data Barang dengan ID Barang <strong>$id_barang</strong>
                            pada hari $tgl_masuk pukul $jam";

                $query_ft = "select * from barang where id_barang = '$id_barang'";
                $sql_ft = mysqli_query($conn, $query_ft);
                $ft_result = mysqli_fetch_assoc($sql_ft);

                if($ft_barang == ""){
                    $ft_barang = $ft_result['foto'];
                }
                else{
                    // Photos Name
                    $split = explode('.', htmlspecialchars($_FILES['foto']['name']));
                    $extension = $split[count($split) - 1];            
                    // End of Photos Name

                    $dir_ft = "../gambar-barang/";
                    $ft_barang = $id_barang.'.'.$extension;
                    $tmp = $_FILES['foto']['tmp_name'];
                    unlink("../gambar-barang/" . $ft_result['foto']);
                    move_uploaded_file($tmp, $dir_ft.$ft_barang);
                }

                # FIRST INSERT - Edit Data Barang
                $query = "update barang set nama_barang='$nm_barang',
                    foto='$ft_barang', kategori='$kategori',
                    kondisi='$kondisi', jumlah='$jml', harga='$harga'
                    where id_barang='$id_barang'";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                if($sql){
                    $_SESSION['sukses-ubah-barang'] = "Data berhasil diperbarui";
                    header('location: ../dashboard.php?barang=barang.php');
                }
                else{
                    echo $query;
                }
            }
        // END OF CRUD BARANG

        // CRUD KATEGORI
            else if($_POST['form_process'] == "tambah_kategori"){
                $id_kategori = htmlspecialchars($_POST['id_kategori']);
                $nm_kategori = htmlspecialchars($_POST['nama_kategori']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Tambah Data Kategori Baru dengan nama kategori <strong>$nm_kategori</strong>
                            pada hari $tgl pukul $jam";

                # FIRST INSERT - Data Kategori Baru
                $query = "insert into kategori values('$id_kategori', '$nm_kategori')";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                if($sql){
                    $_SESSION['sukses-tambah-kategori'] = "Data berhasil ditambahkan";
                    header('location: ../dashboard.php?kategori=kategori.php');
                }
                else{
                    echo $query;
                }
            }
            else if($_POST['form_process'] == "update_kategori"){
                $id_kategori = htmlspecialchars($_POST['id_kategori']);
                $nm_kategori = htmlspecialchars($_POST['nama_kategori']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Edit Data Kategori dengan ID Kategori <strong>$id_kategori</strong>
                            telah mengganti nama kategori menjadi <strong>$nm_kategori</strong>
                            pada hari $tgl pukul $jam";

                # FIRST INSERT - Edit Data Kategori
                $query = "update kategori set nama_kategori='$nm_kategori' where id_kategori='$id_kategori'";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                if($sql){
                    $_SESSION['sukses-ubah-kategori'] = "Data berhasil diperbarui";
                    header('location: ../dashboard.php?kategori=kategori.php');
                }
                else{
                    echo $query;
                }
            }
        // END OF CRUD KATEGORI

        // CRUD KONDISI
            else if($_POST['form_process'] == "tambah_kondisi"){
                $id_kondisi = htmlspecialchars($_POST['id_kondisi']);
                $nm_kondisi = htmlspecialchars($_POST['nama_kondisi']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Tambah Data Kondisi Baru dengan nama kondisi <strong>$nm_kondisi</strong>
                            pada hari $tgl pukul $jam";

                # FIRST INSERT - Data Kondisi Baru
                $query = "insert into kondisi values('$id_kondisi', '$nm_kondisi')";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                if($sql){
                    $_SESSION['sukses-tambah-kondisi'] = "Data berhasil ditambahkan";
                    header('location: ../dashboard.php?kondisi=kondisi.php');
                }
                else{
                    echo $query;
                }
            }
            else if($_POST['form_process'] == "update_kondisi"){
                $id_kondisi = htmlspecialchars($_POST['id_kondisi']);
                $nm_kondisi = htmlspecialchars($_POST['nama_kondisi']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Edit Data Kondisi dengan ID Kondisi <strong>$id_kondisi</strong>
                            telah mengganti nama kondisi menjadi <strong>$nm_kondisi</strong>
                            pada hari $tgl pukul $jam";

                # FIRST INSERT - Edit Data Kondisi
                $query = "update kondisi set nama_kondisi='$nm_kondisi' where id_kondisi='$id_kondisi'";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                if($sql){
                    $_SESSION['sukses-ubah-kondisi'] = "Data berhasil diperbarui";
                    header('location: ../dashboard.php?kondisi=kondisi.php');
                }
                else{
                    echo $query;
                }
            }
        // END OF CRUD KONDISI

        // CRUD BARANG MASUK
            # BARANG MASUK BARU
            else if($_POST['form_process'] == "tambah_barang_masuk"){
                $tgl_masuk = htmlspecialchars($_POST['tanggal_masuk']);
                $id_barang = htmlspecialchars($_POST['id_barang']);
                $nm_barang = htmlspecialchars($_POST['nama_barang']);
                
                // Photos Name
                $split = explode('.', htmlspecialchars($_FILES['foto']['name']));
                $extension = $split[count($split) - 1];            
                $ft_barang = $id_barang.'.'.$extension;
                // End of Photos Name

                $kategori = htmlspecialchars($_POST['kategori']);
                $kondisi = htmlspecialchars($_POST['kondisi']);
                $hrg_beli = htmlspecialchars($_POST['harga_beli']);
                $hrg_jual = htmlspecialchars($_POST['harga_jual']);
                $jml_masuk = htmlspecialchars($_POST['jumlah_masuk']);
                $no_faktur = htmlspecialchars($_POST['no_faktur']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Tambah Data Barang Baru dengan nama barang <strong>$nm_barang</strong>
                            pada hari $tgl_masuk pukul $jam";

                $dir_ft = "../gambar-barang/";
                $tmp = $_FILES['foto']['tmp_name'];
                move_uploaded_file($tmp, $dir_ft.$ft_barang);

                # FIRST INSERT - Barang Masuk
                $query = "insert into barang_masuk values('$tgl_masuk', '$id_barang', '$nm_barang', '$kategori' , '$kondisi', '$hrg_beli', '$hrg_jual', '$jml_masuk')";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Laporan Barang Masuk Baru
                $query2 = "insert into laporan_barang_masuk_keluar values('$id_barang', '$nm_barang', '$kategori', '$jml_masuk', '0', '0', $jml_masuk)";
                $sql2 = mysqli_query($conn, $query2);

                # THIRD INSERT - Masuk Master Barang
                $query3 = "insert into barang values('$id_barang', '$nm_barang', '$ft_barang', '$kategori' , '$kondisi', '$jml_masuk', '$hrg_jual')";
                $sql3 = mysqli_query($conn, $query3);

                # FOURTH INSERT - Track Record Aktivitas
                $query4 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql4 = mysqli_query($conn, $query4);

                # FIFTH INSERT - Transaksi Barang
                $query5 = "insert into transaksi_barang values('$tgl_masuk', '$no_faktur', '$id_barang', '$nm_barang', '$kategori', '$jml_masuk')";
                $sql5 = mysqli_query($conn, $query5);

                if($sql){
                    $_SESSION['sukses-tambah-barang-masuk'] = "Barang Masuk Baru dengan ID <strong>$id_barang</strong> berhasil ditambahkan";
                    header('location: ../dashboard.php?barang_masuk=barang_masuk.php');
                }
                else{
                    echo $query;
                }
            }
            # END OF BARANG MASUK BARU

            # BARANG MASUK YANG SUDAH ADA
            else if($_POST['form_process'] == "tambah_barang_masuk_sudah_ada"){
                $tgl_masuk = htmlspecialchars($_POST['tanggal_masuk']);
                $id_barang = htmlspecialchars($_POST['id_barang']);
                $nm_barang = htmlspecialchars($_POST['nama_barang']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $kondisi = htmlspecialchars($_POST['kondisi']);
                $hrg_beli = htmlspecialchars($_POST['harga_beli']);
                $hrg_jual = htmlspecialchars($_POST['harga_jual']);
                $jml_masuk = htmlspecialchars($_POST['jumlah_masuk']);
                $no_faktur = htmlspecialchars($_POST['no_faktur']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Transaksi Barang Masuk dengan nama barang <strong>$nm_barang</strong>
                            dengan jumlah barang masuk sebesar $jml_masuk pada hari $tgl_masuk pukul $jam";

                # FIRST INSERT - Barang Masuk sudah ada
                $query = "insert into barang_masuk values('$tgl_masuk', '$id_barang', '$nm_barang', '$kategori' , '$kondisi', '$hrg_beli', '$hrg_jual', '$jml_masuk')";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                # THIRD INSERT - Transaksi Barang
                $query3 = "insert into transaksi_barang values('$tgl_masuk', '$no_faktur', '$id_barang', '$nm_barang', '$kategori', '$jml_masuk')";
                $sql3 = mysqli_query($conn, $query3);

                if($sql){
                    $_SESSION['sukses-tambah-barang-masuk-sudah-ada'] = "Barang Masuk Baru dengan nama <strong>$nm_barang</strong> berhasil ditambahkan";
                    header('location: ../dashboard.php?barang_masuk=barang_masuk.php');
                }
                else{
                    echo $query;
                }
            }
            # END OF BARANG MASUK YANG SUDAH ADA
        // END OF CRUD BARANG MASUK

        // CRUD BARANG KELUAR
            else if($_POST['form_process'] == "tambah_barang_keluar"){
                $tgl_keluar = htmlspecialchars($_POST['tanggal_keluar']);
                $id_barang = htmlspecialchars($_POST['id_barang']);
                $nm_barang = htmlspecialchars($_POST['nama_barang']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $hrg_jual = htmlspecialchars($_POST['harga_jual']);
                $jml_klr = htmlspecialchars($_POST['jumlah_keluar']);
                $no_faktur = htmlspecialchars($_POST['no_faktur']);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Transaksi Barang Keluar dengan nama barang <strong>$nm_barang</strong>
                            dengan jumlah barang keluar sebesar $jml_klr pada hari $tgl_keluar
                            pukul $jam";

                # FIRST INSERT - Barang Keluar
                $query = "insert into barang_keluar values('$tgl_keluar', '$id_barang', '$nm_barang', '$kategori', '$hrg_jual', '$jml_klr')";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                # THIRD INSERT - Laporan Barang Keluar
                $query3 = "insert into transaksi_barang values('$tgl_keluar', '$no_faktur', '$id_barang', '$nm_barang', '$kategori', '$jml_klr')";
                $sql3 = mysqli_query($conn, $query3);
                
                if($sql){
                    $_SESSION['sukses-tambah-barang-keluar'] = "Barang dengan ID <strong>$id_barang</strong> telah dikeluarkan berjumlah $jml_klr";
                    header('location: ../dashboard.php?barang_keluar=barang_keluar.php');
                }
                else{
                    echo $query;
                }
            }
        // END OF CRUD BARANG KELUAR
    }

    // DELETE DATA PROCESS
        // HAPUS DATA AKUN
            if(isset($_GET['hapus_user'])){
                $id_akun = $_GET['hapus_user'];
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Hapus Data Akun dengan ID Akun <strong>$id_akun</strong>
                            pada hari $tgl pukul $jam";

                # FIRST INSERT - Hapus Data Akun
                $query = "delete from login where id_user='$id_akun'";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                if($sql){
                    $_SESSION['sukses-hapus-akun'] = "Data berhasil dihapus";
                    header('location: ../dashboard.php?akun=akun.php');
                }
                else{
                    echo $sql;
                }
            }
        // END OF HAPUS DATA AKUN

        // HAPUS DATA BARANG
            if(isset($_GET['hapus_barang'])){
                $id_barang = $_GET['hapus_barang'];
                $query_ft = "select * from barang where id_barang = '$id_barang'";
                $sql_ft = mysqli_query($conn, $query_ft);
                $ft_result = mysqli_fetch_assoc($sql_ft);
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Hapus Data Barang dengan ID Barang <strong>$id_barang</strong>
                            pada hari $tgl pukul $jam";

                unlink("../gambar-barang/" . $ft_result['foto']);

                # FIRST INSERT - Hapus Data Barang
                $query = "delete from barang where id_barang='$id_barang'";
                $sql = mysqli_query($conn, $query);

                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);

                if($sql){
                    $_SESSION['sukses-hapus-barang'] = "Data berhasil dihapus";
                    header('location: ../dashboard.php?barang=barang.php');
                }
                else{
                    echo $sql;
                }
            }
        // END OF HAPUS DATA BARANG

        // HAPUS DATA KATEGORI
            if(isset($_GET['hapus_kategori'])){
                $id_kategori = $_GET['hapus_kategori'];
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Hapus Data Kategori dengan ID Kategori <strong>$id_kategori</strong>
                            pada hari $tgl pukul $jam";
        
                # FIRST INSERT - Hapus Data Kategori
                $query = "delete from kategori where id_kategori='$id_kategori'";
                $sql = mysqli_query($conn, $query);
        
                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);
        
                if($sql){
                    $_SESSION['sukses-hapus-kategori'] = "Data berhasil dihapus";
                    header('location: ../dashboard.php?kategori=kategori.php');
                }
                else{
                    echo $sql;
                }
            }
        // END OF HAPUS DATA KATEGORI

        // HAPUS DATA KONDISI
            if(isset($_GET['hapus_kondisi'])){
                $id_kondisi = $_GET['hapus_kondisi'];
                $tgl_akt = strftime("%A, %d %B %Y")." ".date('H:i:s');
                $tgl_login = strftime("%A, %d %B %Y");
                $jam = date('H:i:s');
                $nama_user = $_SESSION['username'];
                $aktivitas = "<strong>$nama_user</strong> telah melakukan aktivitas
                            Hapus Data Kondisi dengan ID Kondisi <strong>$id_kondisi</strong>
                            pada hari $tgl pukul $jam";
                
                # FIRST INSERT - Hapus Data Kondisi
                $query = "delete from kondisi where id_kondisi='$id_kondisi'";
                $sql = mysqli_query($conn, $query);
        
                # SECOND INSERT - Track Record Aktivitas
                $query2 = "insert into aktivitas values('$tgl_akt', '$nama_user','$aktivitas')";
                $sql2 = mysqli_query($conn, $query2);
        
                if($sql){
                    $_SESSION['sukses-hapus-kondisi'] = "Data berhasil dihapus";
                    header('location: ../dashboard.php?kondisi=kondisi.php');
                }
                else{
                    echo $sql;
                }
            }
        // END OF HAPUS DATA KONDISI
    // END OF DELETE DATA PROCESS
?>