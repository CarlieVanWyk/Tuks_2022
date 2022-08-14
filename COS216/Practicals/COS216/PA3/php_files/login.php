<!-- https://www.youtube.com/watch?v=qjwc8ScTHnY  watch video from 36:00 for login -->

<?php include_once "validate-login.php"?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Carlie van wyk u21672823 --> 
    <title>login</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Carlie van wyk" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../stylesheetLogin.css" rel="stylesheet" type="text/css" />
  </head>

    <body>
        <div id="logo">
            <a href="../../../index.php">
            <figure>
                <img src="../images/Artboard_1.png" alt="news website's logo" />
            </figure>
            </a>
        </div>
        <h1>Login</h1>
        <form action="validate-login.php" method="post">
                <div class="formField" id="formNameField">
                  <label for="nameField">Name</label><br/>
                  <img src="../images/cross.png" alt="cross icon" class="icon" id="nameImg"/>
                  <input type="text" name="nameField" id="nameField" placeholder="John" required />
                  <span id="nameMessage"></span>
                </div>

                <div class="formField" id="formPassw1Field">
                  <label for="passField1">Password</label><br/>
                  <img src="../images/cross.png" alt="cross icon" class="icon" id="pass1Img"/>
                  <input type="password" name="passField1" id="passField1" placeholder="********" required />
                  <span id="pass1Message"></span> 
                </div>

                <!-- <button type="submit" name="login_user">Login</button> -->
                <div id="formSubmitField">
              <input type="submit" id="formSubmit" value="login" name="login_user"/> 
              <span id="submitMessage"></span>
                </div>
				
        </form>

        <p>Not a user? <a href="signup.php">Signup</a></p>
        
        <script type="text/javascript" src="../scriptLogin.js"></script>
    </body>
</html>