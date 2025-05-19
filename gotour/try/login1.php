<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<div class="section1">

<div class="container-fluid" >
    
<form class="mx-auto" method="post" action="">
<h5 class="reg" >Log in</h5>

  <div class="form-group">
  <i class="fa-solid fa-envelope"></i>
<label for="email">Email</label>
<input type="email" name="email" placeholder="Enter Your Email Address" class="form-control">
  </div>

  <div class="form-group">
  <i class="fa-solid fa-lock"></i>
<label for="password">Password</label>
<input type="password" name="password" placeholder="Enter Your Password" class="form-control">
</div>
<div class="form-group mt-3">
            <!--Log in button -->
            <button class=" btn btn-info" class="reg">Log in</button>  
              <!--if u r not a member so go to for registration-->
            <p>Don't have account? <a href="registration.php">Registration First</a></p>
        </div>
</form>

</div>    
</div>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>