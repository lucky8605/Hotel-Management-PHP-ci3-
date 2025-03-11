<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="<?=base_url()?>/assets/https://fonts.gstatic.com">
	<link rel="shortcut icon" href="<?=base_url()?>/assets/img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>Vikas Hotel</title>

	<link href="<?=base_url()?>/assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="<?=base_url()?>">
          <span class="align-middle" style="letter-spacing:3pxpx;">Hotel Vikas</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item active">
                <a class="sidebar-link" href="<?=base_url()?>">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
			<li class="sidebar-item ">
                <a class="sidebar-link" href="<?=base_url()?>hotel/orders">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Orders</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url()?>hotel/manage_table">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Manage Table</span>
                </a>
            </li>
			<li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url()?>hotel/category">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Category</span>
                </a>
            </li>
			<li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url()?>hotel/product">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Product</span>
                </a>
            </li>
			<li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url()?>hotel/product_list">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Product List</span>
                </a>
            </li>
        </ul>

				
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="<?=base_url()?>/assets/#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="<?=base_url()?>/assets/#" data-bs-toggle="dropdown">
                <img src="<?=base_url()?>/assets/img/avatars/profile.png" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> 
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?=base_url()?>/assets/pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=base_url()?>"><i class="align-middle me-1" data-feather="settings"></i>Change Password</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=base_url()?>/assets/#">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
                <div class="container-fluid p-0">