<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://localhost:8080/public/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container" style="display: flex; align-items: center; border: 2px solid black; width: 500px; justify-content: center; margin-top: 10%;">
    <main class="form-signin">
        <form method = "POST" action = "http://localhost:8080/public/admin/user_signup">
          <h1 class="h3 mb-3 fw-normal" name = "">Please sign up</h1>
      
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="username" name = "username" required>
            <label for="floatingInput">username</label>
          </div>
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name = "email" required>
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"name = "pass" required>
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="re Password" name = "re_pass" required>
            <label for="floatingPassword">re Password</label>
          </div>
      
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name = "signup">Sign up</button>
          <br>
             <a href="http://localhost:8080/public/admin/signin">login</a> 
          <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
      </main>
      
      

<!-- <h1 class="h3 mb-3 fw-normal">Please sign in</h1> -->
</p>  
</div>

</body>
</html>