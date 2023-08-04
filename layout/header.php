<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../config/Session.php';
	Session::init();

?>

<?php
	if(isset($_GET['action']) && $_GET['action'] == "logout"){
		Session::destroy();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EMS</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
</head>
<body class="hold-transition layout-top-nav">
<!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                <span class="brand-text text-muted font-weight-bold text-navy" style="font-size: 30px;">Event Management System</span>
                </a>
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                                <?php
                                    $isLogin = Session::get("login");
                                    if (isset($isLogin) && $isLogin) {
                                ?>
                                        <a href="admin-dashboard.php" class="btn btn-success text-white">Dashboard</a>
                                        <a href="?action=logout" class="btn text-white" style="background: #da0aad;">Logout</a>
                                <?php
                                    } else {
                                ?>
                                        <a href="login.php" class="btn text-white" style="background: #da0aad;">Login</a>
                                <?php
                                    }
                                ?>
                    </li>
                </ul>
            </div>
        </nav>