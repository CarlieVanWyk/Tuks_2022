// Carlie van wyk
function FactorialChecker() {}

FactorialChecker.prototype.printFactorial = function (num) {
  if (num > 0) {
    var result = 1;
    for (var i = 1; i <= num; i++) {
      result *= i;
    }
    // this.fillArray(result);
    return result;
  }
};

FactorialChecker.prototype.fillArray = function (fact) {
  //check if factorial number
  var anw = isFactorial(fact);
  if (anw == 0) {
    return "This is not a factorial";
  } else {
    var arr = [];
    for (var j = 1; j <= anw; j++) {
      arr.push(j);
    }
    return arr;
  }

  function isFactorial(n) {
    for (var i = 1; ; i++) {
      if (n % i == 0) {
        n = parseInt(n / i);
      } else {
        break;
      }
    }

    if (n == 1) {
      return i - 1;
    } else {
      return false;
    }
  }
};

var test = new FactorialChecker();

//________________________________________________________________________________Generate Factorial
document
  .getElementById("GenerateFactorial")
  .addEventListener("click", startFunction);

function startFunction() {
  var val = document.getElementById("FactorialValue").value;
  var result = test.printFactorial(val);
  document.getElementById("FactorialResult").innerHTML = result;
}

//______________________________________________________________________________Factorial List
document
  .getElementById("GenerateFactorialList")
  .addEventListener("click", startList);

function startList() {
  var val = document.getElementById("FactorialInput").value;
  var result = test.fillArray(val);
  document.getElementById("FactorialListResult").innerHTML = result;
}
