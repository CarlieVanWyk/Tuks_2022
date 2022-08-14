<!DOCTYPE html>
<html>
  <head>
    <!-- Carlie van wyk u21672823 -->
    <title>PA4 settings</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Carlie van wyk" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../stylesheet1.css" rel="stylesheet" type="text/css" />
    <link href="../stylesheet2.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>

  <body class="dayNight">
    <div id="preloader"></div>

    <header id="header-PA4">
      <div id="logo">
        <a href="../../../index.php">
          <figure>
            <img src="../images/Artboard_1.png" alt="news website's logo" />
          </figure>
        </a>
      </div>
      <nav>
        <div><a href="today.php"> <- Back </a></div>
      </nav>
    </header>

    <h1 id="settingsH1" style="text-align: center;">Settings</h1>
    <br/>
        <div id="filter-container">
            <label class="dropdown-label">Filter</label>

            <div class="dropdown-list">
                <label class="dropdown-option">
                <input
                    type="checkbox"
                    name="dropdown-group"
                    value="Name"
                    onclick="filterToName()"
                />
                Name
                </label>

                <label class="dropdown-option">
                <input
                    type="checkbox"
                    name="dropdown-group"
                    value="desription"
                    onclick="filterToDesc()"
                />
                Description
                </label>
            </div>
        </div>

    <script src="../scriptTodayPHP.js"></script>
    <script src="../scriptSettings.js"></script>
    
  </body>
</html>
