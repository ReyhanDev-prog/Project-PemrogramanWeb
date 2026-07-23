<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = md5($_POST['password'] ?? '');
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);
    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login SIAKAD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>body { background: #007bff; } .login-card { margin-top: 100px; }</style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center login-card">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white text-center"><h4>Login SIAKAD</h4></div>
                <div class="card-body">
                    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                    <form method="POST">
                        <div class="form-group"><label>Username</label><input type="text" name="username" class="form-control" required></div>
                        <div class="form-group"><label>Password</label><input type="password" name="password" class="form-control" required></div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <div class="mt-3 text-center"><small>Demo: admin/admin123, dosen1/dosen123, mahasiswa1/mhs123</small></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>