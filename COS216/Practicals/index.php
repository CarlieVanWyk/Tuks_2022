<?php 

?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Carlie van wyk u21672823 -->
    <title>The Latest</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Carlie van wyk" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="COS216/stylesheet.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script> localStorage.setItem("theme", "day"); </script>
  </head>

  <body class="dayNight">
    <header id="header-home">
      <?php include_once "COS216/PA4/php_files/header.php"; ?>
    </header>

    <main id="main-home">
      <figure>
        <img src="COS216/PA3/images/Artboard 1b.png" alt="news website's logo" />
      </figure>
    </main>

    <div id="footer">
      <button id="dayNightBTN">Theme</button>
      <?php include_once "COS216/PA4/php_files/footer.php"; ?>
    </div>
    

    <script src="COS216/scriptIndex.js"></script>
  </body>
</html>
