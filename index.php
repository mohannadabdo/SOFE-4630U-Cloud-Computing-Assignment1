<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Mohannad Schedule </title>
</head>
<body style="background-color: lightblue;">

<h1>Soccer Schedule</h1>   
      
    <div class="header">
      <h2>Look up your favorite soccer team schedule</h2>
    </div>

    <br>
    <div class="container">
  <div class="row">
    <div class="col-sm">
    <h2>Register Your Account</h2>	
      <form id="registrationForm" action="registrationProcess.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  
  
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  
 </div>
 <div class="col-sm" align="center">
  <button type="submit" class="btn btn-primary" form="registrationForm" name="register" >Submit</button>
  </div>
</form>
    </div>


    <div class="col-sm">
     <h2>Check Scores,Fixtures and More</h2>
     <img src="http://freevector.co/wp-content/uploads/2014/08/45118-clock-circular-tool-shape-200x200.png" alt="clock" class="img-fluid">
    </div>
    <div class="col-sm">
     <h2>Login</h2>  
     <img src="http://janusport.com/wp-content/uploads/2017/04/premierleague.jpg" alt="premierleague logo" class="img-fluid">
      <form id="loginForm" action="loginProcess.php" method="post">
  <div class="form-group">
    <label for="loginEmail">Email address</label>
    <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="Enter email" name="emaillogin">
  
    <label for="loginPassword">Password</label>
    <input type="password" class="form-control" id="loginPassword1" placeholder="Password" name="passwordlogin">
  
 </div>
 <div class="col-sm" align="center">
  <button type="submit" class="btn btn-primary" form="loginForm" name="Login" >LogIn</button>
  </div>
</form>
     
    </div>
  </div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
