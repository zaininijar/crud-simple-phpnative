<?php

  require_once "config/connection.php";
  session_start();

  $request = $_SERVER['REQUEST_URI'];

  $sidebar_link = array([
      'home' => '',
      'dashboard' => '',
      'orders' => '',
      'products' => '',
      'users' => ''
    ]);

  function mustLogin(){
    if (empty($_SESSION['username'])) {
      header("Location: login");
    }
  }

  switch ($request) {
    case '/crud/' :
        mustLogin();
        $sidebar_link['home'] = 'active';
        require $dir . '/layouts/app/header.php';
        require $dir . '/views/index.php';
        require $dir . '/layouts/app/footer.php';
        break;
    //order
    case '/crud/orders' :
        mustLogin();
        $sidebar_link['orders'] = 'active';
        require $dir . '/layouts/app/header.php';
        require $dir . '/views/orders/index.php';
        require $dir . '/layouts/app/footer.php';
        break;
    case '/crud/orders/create' :
        mustLogin();
        $sidebar_link['orders'] = 'active';
        require $dir . '/layouts/app/header.php';
        require $dir . '/views/orders/create.php';
        require $dir . '/layouts/app/footer.php';
        break;
    case substr($request, 0, 21) === '/crud/orders/edit?id=' :
        mustLogin();
        $sidebar_link['orders'] = 'active';
        $id = $_GET['id'];
        require $dir . '/layouts/app/header.php';
        require $dir . '/views/orders/edit.php';
        require $dir . '/layouts/app/footer.php';
        break;
    case '/crud/orders/store' :
        mustLogin();
        require $dir . '/process/orders/store.php';
        break;
    case '/crud/orders/update' :
        mustLogin();
        require $dir . '/process/orders/update.php';
        break;
    case substr($request, 0, 23) === '/crud/orders/delete?id=' :
        mustLogin();
        $id = $_GET['id'];
        require $dir . '/process/orders/delete.php';
        break;
    //users
    case '/crud/users' :
        mustLogin();
        $sidebar_link['users'] = 'active';
        require $dir . '/layouts/app/header.php';
        require $dir . '/views/users/index.php';
        require $dir . '/layouts/app/footer.php';
        break;
    case '/crud/404' :
        http_response_code(404);
        require $dir . '/views/404.php';
        break;
    //auth
    case '/crud/login' :
        require $dir . '/layouts/guest/header.php';
        require $dir . '/views/auth/login.php';
        require $dir . '/layouts/guest/footer.php';
        break;
    case '/crud/logout' :
        mustLogin();
        require $dir . '/process/auth/logout.php';
        break;
    default:
        http_response_code(404);
        require $dir . '/views/404.php';
        break;
  }

?>
