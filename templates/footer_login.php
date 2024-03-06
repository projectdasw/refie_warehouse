        <script>
            var show_pass = document.getElementById("show-pass");
            show_pass.addEventListener("click", function(){
                var pass = document.getElementById("password");
                if (pass.type === "password") {
                    pass.type = "text";
                    show_pass.className = "fa-solid fa-eye-slash";
                } else {
                    pass.type = "password";
                    show_pass.className = "fa-solid fa-eye";
                }
            });
        </script>
    </body>
</html>