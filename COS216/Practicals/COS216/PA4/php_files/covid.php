<!DOCTYPE html>
<html>
  <head>
    <!-- Carlie van wyk u21672823 -->
    <title>PA4 covid</title>
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

    <header id="header-PA2">
      <div id="logo">
        <a href="../../../index.php">
          <figure>
            <img src="../images/Artboard_1.png" alt="news website's logo" />
          </figure>
        </a>
      </div>
      <nav>
        <div><a href="today.php">Today </a></div>
        <div><a href="South_Africa.php">South Africa </a></div>
        <div class="current"><a href="covid.php"> Covid-19 </a></div>
        <div><a href="calendar.php">Calendar </a></div>
      </nav>
      <div id="login-signup">
        <div><a href="logout.php">Logout</a></div>
      </div>
    </header>

    <main id="covid-main">
      <br />
      <div id="covidStatsDiv">
        <canvas
          id="covidStatsChart"
          style="width: 100%; max-width: 600px"
        ></canvas>
      </div>

      <br />

      <!-- <figure
        id="covid-graph"
        title="https://corona.dnsforfamily.com/graph.png?c=ZA"
      >
        <img src="images/graph.png" />
      </figure> -->

      <article id="covid-SA-stats">
        <h2>South Africa Statistics</h2>
        <ul>
          <li>Overall COVID Cases: <b id="overallCases"></b></li>
          <li>Overall COVID Recoveries: <b id="overallRecoveries"></b></li>
          <li>Overall COVID Deaths: <b id="overallDeaths"></b></li>
          <li>
            Daily Cases Stats
            <ul>
              <li>Cases: <b id="DailyCaseStats"></b></li>
              <li>Confirmed: <b id="DailyConStats"></b></li>
              <li>Deaths: <b id="DailyDeathStats"></b></li>
            </ul>
          </li>
        </ul>
      </article>

      <br />

      <article id="covid-deductions">
        <h2>Deducitons</h2>
        <ul>
          <li>IFR - Infection Fatality Ratio: <b id="fatRate"></b></li>
          <li>CFR - Case Fatality Ratio: <b id="CFR"></b></li>
          <li>Mortality Rate: <b id="MR"></b></li>
          <li>Cases:Recoveries:Death <b id="C:R:D"></b></li>
        </ul>
      </article>

      <br />
    </main>
    <div id="loopTextDiv">
      <p class="rollingText" id="rollText">Updated Covid-19 Statistics</p>
    </div>

    <script src="../scriptCovPHP.js"></script>
  </body>
</html>
