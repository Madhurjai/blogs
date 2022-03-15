<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="http://localhost:8080/public/admin/signout">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.html">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Product</h1>
      </div>

      <form class="row g-3" method = "POST" action = "http://localhost:8080/public/admin/post_blog" enctype="multipart/form-data">
       <input type = 'hidden' name = 'blog_id' value = "<?php   echo $data['edit_data']->blog_id ; ?>">
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">blog category</label>
          <input type="text" class="form-control" id="inputPassword4" name = "category" value = "<?php if(isset($data['edit_data'])) { echo $data['edit_data']->blog_category ; }?>">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">title</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="" name = "title" value = "<?php if(isset($data['edit_data'])) { echo $data['edit_data']->blog_title ;}?>">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">blog_desc</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="" name = "product_desc" value = "<?php if(isset($data['edit_data'])) { echo $data['edit_data']->blog_desc ;}?>">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">image</label>
          <input type="file" class="form-control" id="inputCity" name = "image">
        </div>
       <?php if (isset($data['edit_data'])) {?>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" name = "update">update Product</button>
        </div>
        <?php } else {?>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" name = "submit">Add Product</button>
        </div>
        <?php }?>
      </form>      
    </main>
  </div>
</div>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>