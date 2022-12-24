<?php

use Core\Helpers\Helper; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- responsive meta tag to tell the browser to adjust the page automatic according to screen size -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New POS Stock</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
</head>

<body class="admin-view">

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">New Point of Sale(Pos)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>

    <div id="admin-area" class="row">
        <div class="col-2 admin-links">
            <ul class="list-group list-group-flush mt-3">
                <!--//noor ( this helper with permision will be chech noor display on screen  -->
            
              <ul class="list-group list-group-flush mt-3">
               <li class="list-group-transaction">
              <a href="/transactions">All Transactions</a>
              </li>
       <?php if (Helper::check_permission(['transaction:read'])) : ?>
          <li class="list-group-transaction">
              <a href="/transactions">All transactions</a>
          </li>
      <?php endif;
      if (Helper::check_permission(['transaction:create'])) :
      ?>
          <li class="list-group-transaction">
              <a href="/transactions/create">Create Transaction</a>
          </li>
      <?php endif;


                if (Helper::check_permission(['tag:read'])) : ?>
                    <li class="list-group-item">
                        <a href="/tags">All Tags</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['tag:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/tags/create">Create Tag</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['user:read'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users">All Users</a>
                    </li>
                <?php endif;
                if (Helper::check_permission(['user:create'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users/create">Create User</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-10 admin-area-content">
            <div class="container my-5">