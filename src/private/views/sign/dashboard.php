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
      li{
        list-style: none;
        display: inline-block;
        margin: 5px;
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
            <a class="nav-link" href="http://localhost:8080/public/admin/blogs">
              <span data-feather="shopping-cart"></span>
              blog
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">username</th>
              <th scope="col">email</th>
              <th scope="col">pass</th>
              <th scope="col">role</th>
              <th scope="col">status</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr> -->
            <?php 
              $limit = 5 ;
              if(isset($_GET['page'])) {
                $page_no = $_GET['page'] ;
              } else {
                    $page_no = 1 ;
              }
                  $offset = ($page_no -1)*$limit ;

            
            $html = '' ;
            foreach($data['users'] as $key => $val) {
               $html .= '<tr><td>'.$val->username.'</td>
               <td>'.$val->email.'</td>
               <td>'.$val->pass.'</td>
               <td>'.$val->role.'</td>
               <td>'.$val->status.'</td> ' ;
               if ($val->status == 'approved') { 
                       $html .= '<td><form method = "POST" action = "http://localhost:8080/public/admin/status_change">
                        <input type = "hidden" name = "email" value = '.$val->email.'>
                        <input type = "submit" class = "btn btn-danger" name = "submit" value = "restrict"></form></td>'  ;
               } else {
                       $html .= '<td><form method = "POST" action = "http://localhost:8080/public/admin/status_change">
                        <input type = "hidden" name = "email" value = '.$val->email.'>
                        <input type = "submit" class = "btn btn-success" name = "submit" value = "approved"></form></td>'  ;
               }
                       $html .= '<td><a href = "http://localhost:8080/public/admin/del_user?email='.$val->email.'" class = "btn btn-success" name = "delete">delete</a></td></tr>' ;
              
            }
            echo $html ;
            if(isset($data['count'])) {
            $con = $data['count'] ;
            $no_page = ceil($con/$limit) ;
            
            $tab = '<ul>' ;
            for($i = 1 ; $i < $no_page ; $i++) {
                 $tab .= '<li><a href = "http://localhost:8080/public/admin/count?page='.$i.'" class = "btn btn-primary">'.$i.'</a></li>' ;
            }
             $tab .= '</ul>' ;
             echo $tab ;
          }
              ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>