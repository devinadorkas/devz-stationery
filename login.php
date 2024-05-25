<?php
// Session mulai
session_start();

// Mengecek form di submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi username dan password
    if ($username === 'devinadorkas' && $password === 'ellakeren') {
        // Variabel session
        $_SESSION['username'] = $username;

		// Cookie di set jika checkbox "remember me" diisi
        if (isset($_POST['remember'])) {
            $expire = time() + 3600 * 24 * 30; // Cookie hilang dalam 30 hari
            setcookie('username', $username, $expire);
        }

        // Ke halaman lain
        header('Location: admin.php');
        exit();
    } else {
        // Invalid atau error
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/logo.png" />
    <title>devz stationery : Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <center><img src="assets/logo.png" alt="logo"/></center>
        </div>
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="user-box">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <input type="submit" name="submit" value="Login">
            </form>
            <?php
            // Tampilan jika login gagal
            if (isset($error)) {
                echo '<div class="error">' . $error . '</div>';
            }
            ?>
            <div class="register-link">
                <p>Don't have an account?<a href="register.html">Register</a></p>
            </div>
        </div>
    </div>
</body>
</html>
