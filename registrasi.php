<?php
$hostname = "localhost";
$user = "root";
$password = "";  // Changed to an empty string if no password is intended.
$db_name = "db_registration";

$koneksi = mysqli_connect($hostname, $user, $password, $db_name) or die(mysqli_error($koneksi));

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
	$email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    // Check if passwords match
    if ($password1 != $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
                window.location = 'registrasi.php';
              </script>";
    } else {
        // Check if username already exists in the database
        $cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username ='$username'");
        $cek_login = mysqli_num_rows($cek_user);

        if ($cek_login > 0) {
            echo "<script>
                    alert('username telah terdaftar');
                    window.location = 'registrasi.php';
                  </script>";
        } else {
            mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama', '$username', '$email', '$password1')");
            echo "<script>
                    alert('Data berhasil dikirim');
                    window.location ='http://localhost/if3110-2023-01-11-tugas-besar-1-main/resources/views/page/login.view.php';
                  </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<link href="register.css" rel="stylesheet" type="text/css" media="all" />
<title>Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Daftar Sekarang</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="POST">
					<input class="text" type="text" name="nama" placeholder="Nama Lengkap" required>
					<input class="text email" type="text" name="username" placeholder="username" required>
					<input class="text email" type="text"name="email" placeholder="Masukan email anda" required>
					<input class="text" type="password" name="password1" placeholder="Password (maks. 8 karakter)" maxlength="8" required>
					<input class="text w3lpass" type="password" name="password2" placeholder="Confirm Password" maxlength="8" required>
					<div class="eye-area">
                            <div class="eye-box" onclick="myLogPassword()">
                                <i class="fa-regular fa-eye" id="eye"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                            </div>
                     </div>
					<input type="submit" value="SIGNUP" name="submit">
				</form>
				<p>Don't have an Account? <a href="http://localhost/if3110-2023-01-11-tugas-besar-1-main/resources/views/page/login.view.php"> Login Now!</a></p>
			</div>

	
</body>
</html>