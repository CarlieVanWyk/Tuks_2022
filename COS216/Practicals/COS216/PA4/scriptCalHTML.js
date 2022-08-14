// Carlie van wyk u21672823
//asyncronous calls: Using this the browser can still run as normal,
// and give a smooth and interactive user experience, this is because you receive a callback when the data has been received.
// This lets the browser continue to work as normal while your request is being handled.

//___________________________________________________________________________day night theme
$(document).ready(function () {
  if (localStorage.getItem("theme") == "day") {
    console.log("heyy");
    $(".dayNight");
  } else {
    $(".dayNight").toggleClass("change");
  }
});

//___________________________preloader
let loader = document.getElementById("preloader");
window.addEventListener("load", function () {
  loader.style.display = "none";
});

//__________________________________________________________________________________calendar
/* 
array for months
create divs of dates of each month in html  --> display grind in CSS
display only current month, rest display="none", 
if div.day == getDate() , highlight div
keep count, if count == something, make current month display="none" and next/prev display="inline"
click prev/next font awesome icon and goto 
*/
document.getElementById("jan").style.display = "none";
document.getElementById("feb").style.display = "none";
document.getElementById("mar").style.display = "none";
document.getElementById("apr").style.display = "";
document.getElementById("may").style.display = "none";
document.getElementById("jun").style.display = "none";
document.getElementById("jul").style.display = "none";
document.getElementById("aug").style.display = "none";
document.getElementById("sep").style.display = "none";
document.getElementById("oct").style.display = "none";
document.getElementById("nov").style.display = "none";
document.getElementById("dec").style.display = "none";

//___________________________________________________________prev and next
//______________________________jan
function nextMonJan() {
  document.getElementById("jan").style.display = "none";
  document.getElementById("feb").style.display = "inline";
}
//_____________________________feb
function prevMonFeb() {
  document.getElementById("jan").style.display = "inline";
  document.getElementById("feb").style.display = "none";
}
function nextMonFeb() {
  document.getElementById("mar").style.display = "inline";
  document.getElementById("feb").style.display = "none";
}
//__________________________mar
function prevMonMar() {
  document.getElementById("mar").style.display = "none";
  document.getElementById("feb").style.display = "inline";
}
function nextMonMar() {
  document.getElementById("mar").style.display = "none";
  document.getElementById("apr").style.display = "inline";
}
//__________________________apr
function prevMonApr() {
  document.getElementById("apr").style.display = "none";
  document.getElementById("mar").style.display = "inline";
}
function nextMonApr() {
  document.getElementById("apr").style.display = "none";
  document.getElementById("may").style.display = "inline";
}
//__________________________may
function prevMonMay() {
  document.getElementById("may").style.display = "none";
  document.getElementById("apr").style.display = "inline";
}
function nextMonMay() {
  document.getElementById("may").style.display = "none";
  document.getElementById("jun").style.display = "inline";
}
//__________________________jun
function prevMonJun() {
  document.getElementById("jun").style.display = "none";
  document.getElementById("may").style.display = "inline";
}
function nextMonJun() {
  document.getElementById("jun").style.display = "none";
  document.getElementById("jul").style.display = "inline";
}
//__________________________jul
function prevMonJul() {
  document.getElementById("jul").style.display = "none";
  document.getElementById("jun").style.display = "inline";
}
function nextMonJul() {
  document.getElementById("jul").style.display = "none";
  document.getElementById("aug").style.display = "inline";
}
//__________________________aug
function prevMonAug() {
  document.getElementById("aug").style.display = "none";
  document.getElementById("jul").style.display = "inline";
}
function nextMonAug() {
  document.getElementById("aug").style.display = "none";
  document.getElementById("sep").style.display = "inline";
}
//__________________________sep
function prevMonSep() {
  document.getElementById("sep").style.display = "none";
  document.getElementById("aug").style.display = "inline";
}
function nextMonSep() {
  document.getElementById("sep").style.display = "none";
  document.getElementById("oct").style.display = "inline";
}
//__________________________oct
function prevMonOct() {
  document.getElementById("oct").style.display = "none";
  document.getElementById("sep").style.display = "inline";
}
function nextMonOct() {
  document.getElementById("oct").style.display = "none";
  document.getElementById("nov").style.display = "inline";
}
//__________________________nov
function prevMonNov() {
  document.getElementById("nov").style.display = "none";
  document.getElementById("oct").style.display = "inline";
}
function nextMonNov() {
  document.getElementById("nov").style.display = "none";
  document.getElementById("dec").style.display = "inline";
}
//__________________________dec
function prevMonDec() {
  document.getElementById("dec").style.display = "none";
  document.getElementById("nov").style.display = "inline";
}

highlightCurrentDay();
function highlightCurrentDay() {
  let currentDayJan = document
    .getElementById("0")
    .getElementsByClassName("dayNumbersChild");
  let currentDayFeb = document
    .getElementById("1")
    .getElementsByClassName("dayNumbersChild");
  let currentDayMar = document
    .getElementById("2")
    .getElementsByClassName("dayNumbersChild");
  let currentDayApr = document
    .getElementById("3")
    .getElementsByClassName("dayNumbersChild");
  let currentDayMay = document
    .getElementById("4")
    .getElementsByClassName("dayNumbersChild");
  let currentDayJun = document
    .getElementById("5")
    .getElementsByClassName("dayNumbersChild");
  let currentDayJul = document
    .getElementById("6")
    .getElementsByClassName("dayNumbersChild");
  let currentDayAug = document
    .getElementById("7")
    .getElementsByClassName("dayNumbersChild");
  let currentDaySep = document
    .getElementById("8")
    .getElementsByClassName("dayNumbersChild");
  let currentDayOct = document
    .getElementById("9")
    .getElementsByClassName("dayNumbersChild");
  let currentDayNov = document
    .getElementById("10")
    .getElementsByClassName("dayNumbersChild");
  let currentDayDec = document
    .getElementById("11")
    .getElementsByClassName("dayNumbersChild");

  let currentMonJan = document.getElementById("0").id;
  let currentMonFeb = document.getElementById("1").id;
  let currentMonMar = document.getElementById("2").id;
  let currentMonApr = document.getElementById("3").id;
  let currentMonMay = document.getElementById("4").id;
  let currentMonJun = document.getElementById("5").id;
  let currentMonJul = document.getElementById("6").id;
  let currentMonAug = document.getElementById("7").id;
  let currentMonSep = document.getElementById("8").id;
  let currentMonOct = document.getElementById("9").id;
  let currentMonNov = document.getElementById("10").id;
  let currentMonDec = document.getElementById("11").id;

  let d = new Date();
  let day = d.getDate();
  let month = d.getMonth();

  if (currentMonJan == month) {
    for (let i = 0; i < currentDayJan.length; i++) {
      if (currentDayJan[i].innerHTML == day) {
        currentDayJan[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonFeb == month) {
    for (let i = 0; i < currentDayFeb.length; i++) {
      if (currentDayFeb[i].innerHTML == day) {
        currentDayFeb[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonMar == month) {
    for (let i = 0; i < currentDayMar.length; i++) {
      if (currentDayMar[i].innerHTML == day) {
        currentDayMar[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonApr == month) {
    for (let i = 0; i < currentDayApr.length; i++) {
      if (currentDayApr[i].innerHTML == day) {
        currentDayApr[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonMay == month) {
    for (let i = 0; i < currentDayMay.length; i++) {
      if (currentDayMay[i].innerHTML == day) {
        currentDayMay[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonJun == month) {
    for (let i = 0; i < currentDayJun.length; i++) {
      if (currentDayJun[i].innerHTML == day) {
        currentDayJun[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonJul == month) {
    for (let i = 0; i < currentDayJul.length; i++) {
      if (currentDayJul[i].innerHTML == day) {
        currentDayJul[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonAug == month) {
    for (let i = 0; i < currentDayAug.length; i++) {
      if (currentDayAug[i].innerHTML == day) {
        currentDayAug[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonSep == month) {
    for (let i = 0; i < currentDaySep.length; i++) {
      if (currentDaySep[i].innerHTML == day) {
        currentDaySep[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonOct == month) {
    for (let i = 0; i < currentDayOct.length; i++) {
      if (currentDayOct[i].innerHTML == day) {
        currentDayOct[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonNov == month) {
    for (let i = 0; i < currentDayNov.length; i++) {
      if (currentDayNov[i].innerHTML == day) {
        currentDayNov[i].style.backgroundColor = "white";
      }
    }
  } else if (currentMonDec == month) {
    for (let i = 0; i < currentDayDec.length; i++) {
      if (currentDayDec[i].innerHTML == day) {
        currentDayDec[i].style.backgroundColor = "white";
      }
    }
  } else {
  }

  console.log("month " + month); //starts at 0=jan
  console.log("currentMon " + currentMonApr);
  console.log("currentDay " + currentDayApr);
  console.log("day " + day);
}
