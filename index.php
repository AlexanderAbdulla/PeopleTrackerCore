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
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
    <h1> People Tracker </h1>
    <?php if($_SESSION['loggedIn'] == true) {  ?>
        <p>logged in lets redirect you</p> 
    <?php } else { ?>
        <h3>Login:</h3>
        <form action="controllers/loginHandler.php" method="post">
            <input name="usernameLogin" id="usernameLoginInput">
            <input name="passwordLogin" id="passwordLoginInput">
            <input type="submit">
        </form>
        <h3>Sign Up: </h3>
        <form>
            <input name="usernameSignUp" id="usernameSignUpInput">
            <input name="passwordSignUp" id="passwordSignUpInput">    
        </form>
    <?php } ?>
    </div>
    <div class="col-sm-2">
    </div>
  </div>
</div>
</body>
</html>