<?php
    session_start();
    $_SESSION['loggedIn'] = false; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>People Tracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<?php
    if(isset($_SESSION['user'])) {
        header('Location: views/myPeople.php');
    }
?>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
    <h1 class="text-center"> People Tracker </h1>
    <?php if($_SESSION['loggedIn'] == true) {  ?>
        <p>logged in lets redirect you</p> 
    <?php } else { ?>
        <h2>Login:</h2>
        <form action="controllers/loginHandler.php" method="post">
            <div class="form-group">
                <label for="usernameLoginInput">Email</label>
                <input class="form-control"type="email" name="usernameLogin" id="usernameLoginInput">
                <label for="passwordLoginInput">Password</label>
                <input class="form-control"type="password" name="passwordLogin" id="passwordLoginInput">
            </div>
            <input type="submit" class="btn btn-primary" value="Login">
        </form>
        <br>
        <h2>Sign Up: </h2>
        <form action="controllers/signupHandler.php" method="post" class="form">
            <div class="form-group">
                <label for="usernameSignUpInput">Email</label>
                <input class="form-control" type="email" name="usernameSignup" id="usernameSignUpInput">
                <label for="passwordSignUpInput">Password</label>
                <input class="form-control" type="password" name="passwordSignup" id="passwordSignUpInput">
            </div>
            <input type="submit" class="btn btn-success" value="Sign Up">    
        </form>
    <?php } ?>
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div>
</body>
</html>