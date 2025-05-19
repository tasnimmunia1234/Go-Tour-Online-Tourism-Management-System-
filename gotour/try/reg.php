<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
</head>
<body>
    <div class="section1">
    <div  class="container-fluid">
        <form class="mx-auto" id="form" action="/">
            <h4>Registration</h4>
            <div class="input-control" class="form-group">
            <i class="fa-solid fa-user"></i>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Enter your Full name">
                <div class="error"></div>
            </div>
            <div class="input-control">
            <i class="fa-solid fa-envelope"></i>
                <label for="email">Email</label>
                <input id="email" name="email" type="text" placeholder="Enter your Email Address">
                <div class="error"></div>
            </div>
            <div class="input-control">
            <i class="fa-solid fa-lock"></i>
                <label for="password">Password</label>
                <input id="password"name="password" type="password" placeholder="Enter your Password">
                <div class="error"></div>
            </div>
            <div class="input-control">
            <i class="fa-solid fa-lock"></i>
                <label for="password2">Password again</label>
                <input id="password2"name="password2" type="password" placeholder="Comfirm Password">
                <div class="error"></div>
            </div>
            <button type="submit" class="btn btn-success">Sign Up</button>
        </form>
    </div>
</div>
<script defer src="user.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>