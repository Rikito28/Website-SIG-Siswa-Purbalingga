<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylelogin.css"/>
        <title>Login SIG</title>
    </head>
    <body>
        <div id="card">
            <div id="class-content">
            <div id="card-title">
                <h2>LOGIN</h2>
                <div class="underline-title"></div>
            </div>
            <form method="post" class="form">
                <label for="user-email" style="margin-left: 30px; padding-top: 13px;">&nbsp;Username</label>
                <input
                id="user-email" style="margin-left: 30px;"
                class="form-content"
                type="texts"
                name="email"
                autocomplete="on"
                required/>
                <div class="form-border"></div>

                <label for="user-password" style="margin-left: 30px; padding-top: 22px;">&nbsp;Password</label>
                <input
                id="user-password" style="margin-left: 30px;"
                class="form-content"
                type="password"
                name="password"
                autocomplete="on"
                required/>
                <div class="form-border"></div>

            <?php
                if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                //Username//
                $email_valid = 'admin';
                $password_valid = '123';

                // Cek Login
                if ($email == $email_valid && $password == $password_valid) {
                header('Location: admin/index.html');
                } else {
                // Jika tidak sesuai, tampilkan pesan kesalahan
                echo '<div id="error-message">Username atau password yang Anda masukkan salah</div>';
                // Hilangkan pesan kesalahan setelah 2 detik
                echo '<script>setTimeout(function() { document.getElementById("error-message").style.display = "none"; }, 2000);</script>';
                }}
            ?>
                <input id="submit-btn" type="submit" name="submit" value="LOGIN"/>
            </form>
            
        </div>
    </div>
    </body>
</html>


