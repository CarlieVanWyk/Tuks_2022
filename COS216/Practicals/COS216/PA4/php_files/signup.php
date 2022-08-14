<?php include_once "validate-signup.php"?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Carlie van wyk u21672823 -->
    <title>signup</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Carlie van wyk" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../stylesheetSignUp.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>

    <body class="dayNight">
        <div id="logo">
            <a href="../../../index.php">
            <figure>
                <img src="../images/Artboard_1.png" alt="news website's logo" />
            </figure>
            </a>
        </div>
        <h1>Sign up</h1>
        <form action="validate-signup.php" method="post">

            <?php include_once "errors.php"?>
 
                <div class="formField" id="formNameField">
					<label for="nameField">Name</label><br/>
					<img src="../images/cross.png" alt="cross icon" class="icon" id="nameImg"/>
					<input type="text" name="nameField" id="nameField" placeholder="John" required />
					<span id="nameMessage"></span>
                </div>

                <div class="formField" id="formSurnameField">
					<label for="surnameField">Surname</label><br/>
					<img src="../images/cross.png" alt="cross icon" class="icon" id="surnameImg"/>
					<input type="text" name="surnameField" id="surnameField" placeholder="Doe" required />
					<span id="surnameMessage"></span>
                </div>

                <div class="formField" id="formEmailField">
                    <label for="emailField">Email</label><br/>
					<img src="../images/cross.png" alt="cross icon" class="icon" id="emailImg"/>
					<input type="email" name="emailField" id="emailField" placeholder="john@tuks.co.za" required />
					<span id="emailMessage"></span>
                </div>
					
                <div class="formField" id="formPassw1Field">
					<label for="passField1">Password</label><br/>
					<img src="../images/cross.png" alt="cross icon" class="icon" id="pass1Img"/>
					<input type="password" name="passField1" id="passField1" placeholder="********" required />
					<span id="pass1Message"></span> 
                </div>

                <div class="formField" id="formPassw2Field">
					<label for="passField2">Confirm password</label><br/>
					<img src="../images/cross.png" alt="cross icon" class="icon" id="pass2Img"/>
					<input type="password" name="passField2" id="passField2" placeholder="********" required />
					<span id="pass2Message"></span> 
                </div>

                <!-- <button type="submit" name="signUp_user">Submit</button> -->
                <div id="formSubmitField">
					<input type="submit" id="formSubmit" name="signUp_user"/> 
					<span id="submitMessage"></span>
                </div>
        </form>

        <p>Already a user? <a href="login.php">Login in</a></p>
        <script type="text/javascript" src="../scriptSignUP.js"></script>

    </body>
</html>