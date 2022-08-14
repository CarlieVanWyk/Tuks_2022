// Carlie van wyk u21672823
//asyncronous calls: Using this the browser can still run as normal,
// and give a smooth and interactive user experience, this is because you receive a callback when the data has been received.
// This lets the browser continue to work as normal while your request is being handled.

//___________________________preloader
let loader = document.getElementById("preloader");
window.addEventListener("load", function () {
  loader.style.display = "none";
});

//_______________________________________________________________________web API 1
const data = null;

const xhr = new XMLHttpRequest();
xhr.withCredentials = true;

let covidStats;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === this.DONE) {
    let covidData = JSON.parse(xhr.response);
    covidData = covidData.data;
    console.log(covidData);
    const CS = [
      {
        active: covidData.active,
        deaths: covidData.deaths,
        confirmed: covidData.confirmed,
        recovered: covidData.recovered,
      },
      {
        activeDif: covidData.active_diff,
        deathsDif: covidData.deaths_diff,
        confirmedDif: covidData.confirmed_diff,
      },
      {
        fatRate: covidData.fatality_rate,
      },
    ];

    covidStats = CS;

    setGraph();
    setStats();
    setDeductions();
  }
});

xhr.open(
  "GET",
  "https://covid-19-statistics.p.rapidapi.com/reports/total?date=2020-04-07"
);
xhr.setRequestHeader("X-RapidAPI-Host", "covid-19-statistics.p.rapidapi.com");
xhr.setRequestHeader(
  "X-RapidAPI-Key",
  "099b04efa9msh9ac16ade8f20a42p18145fjsna6ad3c87986f"
);

xhr.send(data);

//______________________________________________________________________________________web API 2
const data2 = null;

const xhr2 = new XMLHttpRequest();
xhr2.withCredentials = true;

let covidDeductions;

xhr2.addEventListener("readystatechange", function () {
  if (this.readyState === this.DONE) {
    let covidData2 = JSON.parse(xhr2.response);
    covidData2 = covidData2.data;
    console.log(covidData2);
    const CD = [
      {
        recovered: covidData2.recovered,
        deaths: covidData2.deaths,
        confirmed: covidData2.confirmed,
      },
    ];

    covidDeductions = CD;

    setRatioDeduciton();
  }
});

xhr2.open(
  "GET",
  "https://covid-19-coronavirus-statistics.p.rapidapi.com/v1/total?country=US"
);
xhr2.setRequestHeader(
  "X-RapidAPI-Host",
  "covid-19-coronavirus-statistics.p.rapidapi.com"
);
xhr2.setRequestHeader(
  "X-RapidAPI-Key",
  "099b04efa9msh9ac16ade8f20a42p18145fjsna6ad3c87986f"
);

xhr2.send(data2);
//________________________________________________________________________statistics and graph
function setGraph() {
  let activeCases = covidStats[0].active;
  let deathCases = covidStats[0].deaths;
  let confirmedCases = covidStats[0].confirmed;
  let recoveredCases = covidStats[0].recovered;

  var xValues = ["Active", "Deaths", "Confirmed", "Recovered"];
  var yValues = [activeCases, deathCases, confirmedCases, recoveredCases];
  var barColors = ["#7d7abf", "#f27999", "#bf65a0", "#f28585"];

  new Chart("covidStatsChart", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [
        {
          backgroundColor: barColors,
          data: yValues,
        },
      ],
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: "World Covid Stats",
      },
    },
  });
}

function setStats() {
  let overallCovCases = document.getElementById("overallCases");
  overallCovCases.innerHTML = covidStats[0].active;
  let overallCovRec = document.getElementById("overallRecoveries");
  overallCovRec.innerHTML = covidStats[0].recovered;
  let overallCovDeath = document.getElementById("overallDeaths");
  overallCovDeath.innerHTML = covidStats[0].deaths;

  let dailyCaseStats = document.getElementById("DailyCaseStats");
  dailyCaseStats.innerHTML = covidStats[1].activeDif;
  let dailyConStats = document.getElementById("DailyConStats");
  dailyConStats.innerHTML = covidStats[1].confirmedDif;
  let dailyDeathStats = document.getElementById("DailyDeathStats");
  dailyDeathStats.innerHTML = covidStats[1].deathsDif;
}

/*_______________________________________________________________________________________-deductions */
function setDeductions() {
  document.getElementById("fatRate").innerHTML =
    covidStats[2].fatRate * 100 + "%";
  document.getElementById("CFR").innerHTML = calculateRatio(
    covidStats[0].confirmed,
    covidStats[1].confirmedDif
  );
  document.getElementById("MR").innerHTML = calculateRatio(
    covidStats[0].deaths,
    covidStats[1].deathsDif
  );
}

function setRatioDeduciton() {
  document.getElementById("C:R:D").innerHTML =
    covidDeductions[0].confirmed +
    ":" +
    covidDeductions[0].recovered +
    ":" +
    covidDeductions[0].deaths;
}

function calculateRatio(num_1, num_2) {
  let ratio = (num_2 / num_1) * 100;
  return ratio.toFixed(2) + "%";
}

/*________________________________________________________________________________JS animation */
const rollText = document.getElementById("rollText");

animate(rollText);

function animate(element) {
  let elementWidth = element.offsetWidth;
  let parentWidth = element.parentElement.offsetWidth;
  let flag = 0;

  setInterval(() => {
    element.style.marginLeft = --flag + "px";

    if (elementWidth == -flag) {
      flag = parentWidth;
    }
  }, 10);
}
