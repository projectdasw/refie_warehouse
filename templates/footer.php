        <footer class="landing-page-footer">
            <div class="footer-content">
                <div class="footer-card">
                    <img class="footer-logo" src="assets/img/logo/refie_logo.png" alt="image">
                </div>
                <div class="footer-card">
                    <strong>Alamat Toko Kami</strong>
                    <address>
                    Jl. Bantaran IIIA No. 20<br />
                    Tulusrejo, Lowokwaru<br />
                    Kota Malang 65141<br />
                    Indonesia
                    </address>
                </div>
                <div class="footer-card">
                    <strong>Jam Buka</strong>
                    <table>
                        <tbody>
                            <tr>
                                <td>Senin - Sabtu</td>
                                <td>:</td>
                                <td>09.00 WIB - 20.00 WIB</td>
                            </tr>
                            <tr>
                                <td>Minggu</td>
                                <td>:</td>
                                <td>LIBUR</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="footer-copyright">
                Copyright &copy;<?php echo date("Y"); ?>.
                REFIE Sport Fashion All Right Reserved.
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8.4.7/swiper-bundle.min.js"
            integrity="sha256-9kWxLyfE6cEhDVclz6iUuGRkNy57G+y+RxJqX+gvmt4="
            crossorigin="anonymous"></script>
        <script src="assets/js/swiper.js" type="text/javascript"></script>
        <script type="text/javascript">
            function close_pop_up(){
                var pop_up = document.getElementById("pop-up");
                pop_up.style.transform = "translateY(-100%)";
                setTimeout(() => {
                    pop_up.style.display = "none";
                }, 1500);
            }
        </script>
    </body>
</html>