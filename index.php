<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<title>SeeSalary!</title>
</head>
<style type="text/css">
  li{
    margin-left: 40px;
  }

  .btn{
    width: 60%;
    padding: 1em;
  }
</style>
<body>


<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 pb-3">
  <div class="container">
    <a class="navbar-brand" href="">
      <h1>
        <b>See$alary!</b>
      </h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=""><h5>Home</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login/loginUser.php"><h5>Login Karyawan</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="login/loginAdmin.php"><h5>Admin</h5></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main -->
	<div class="container mt-5">
    <div class="row">
      <div class="col-sm-8 mb-3">

        <div class="mt-5 mb-3">
          <b>
            <h1>
              Selamat datang di <b>See$alary!</b>
            </h1>
          </b>
        </div>

        <div class="mt-4 mb-3">
          <p>
            <b>See$alary!</b> adalah website untuk mempermudah karyawan untuk <br>
            melihat gaji!
          </p>
        </div>

        <div class="mt-5 mb-3">
          <p>
            <b>
              Lihat gaji? Klik tombol dibawah ini!
            </b>
          </p>
        </div>

        <div class="btnDaftar mt-5 mb-3">
          <a href="loginUser.php" class="btn btn-primary"><b>Login Karyawan</b></a>
        </div>
    </div>
    
    <div class="col-sm-4 mb-3">
      <center><img class="deku" src="assets/img/school.png" width="75%"></center>
    </div>

  </div>
	</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>