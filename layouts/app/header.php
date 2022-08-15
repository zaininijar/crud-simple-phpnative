<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD | Orders & Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/60d3d359ba.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  </head>
  <body style="font-family: sans-serif;">
      <div class="d-flex justify-content-between">
        <div style="min-height: 100vh; width: 20%;" class="d-flex flex-column flex-shrink-0 p-3 border">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <i class="fs-1 fa-brands fa-canadian-maple-leaf"></i>
            <span class="fs-5 ms-2">Sidebar</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="<?= $APP_URL ?>" class="nav-link link-dark <?= $sidebar_link['home'] ?>">
                <i class="fa-solid fa-house"></i>
                Home
              </a>
            </li>
            <li>
              <a href="#" class="nav-link link-dark <?= $sidebar_link['dashboard'] ?>">
                <i class="fa-solid fa-gauge"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a href="<?= $APP_URL . 'orders' ?>" class="nav-link link-dark <?= $sidebar_link['orders'] ?>">
                <i class="fa-solid fa-bag-shopping"></i>
                Orders
              </a>
            </li>
            <li>
              <a href="#" class="nav-link link-dark <?= $sidebar_link['products'] ?>">
                <i class="fa-solid fa-boxes-stacked"></i>
                Products
              </a>
            </li>
            <li>
              <a href="<?= $APP_URL . 'users' ?>" class="nav-link link-dark <?= $sidebar_link['users'] ?>">
                <i class="fa-solid fa-users"></i>
                Users
              </a>
            </li>
          </ul>
          <hr>
        </div>
        <div style="width: 80%;" class="d-flex flex-column justify-content-start">
          <header class="p-3 mb-3 border-bottom">
              <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                  <div class="toggle-side me-4">
                    <i class="fa-solid fa-bars-staggered"></i>
                  </div>
                  <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
                  </ul>

                  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                  </form>

                  <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="me-3"><?= $_SESSION['username'] ?></span> <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                      <li><a class="dropdown-item" href="#">New project...</a></li>
                      <li><a class="dropdown-item" href="#">Settings</a></li>
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="<?= $APP_URL . 'logout' ?>">Sign out</a></li>
                    </ul>
                  </div>
                </div>
              </div>
          </header>
          <div class="container px-5">
