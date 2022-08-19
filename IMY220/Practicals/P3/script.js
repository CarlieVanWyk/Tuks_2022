// _________________________________________________________________________________________________Section 1
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
  var anw = check(fact);
  if (anw == 0) {
    return "This is not a factorial";
  } else {
    var arr = [];
    for (var j = 1; j <= anw; j++) {
      arr.push(j);
    }
    return arr;
  }

  function check(originalVal) {
    for (var i = 1; ; i++) {
      if (originalVal % i == 0) {
        originalVal = parseInt(originalVal / i);
      } else {
        break;
      }
    }

    if (originalVal == 1) {
      return i - 1;
    } else {
      return false;
    }
  }
};

var test = new FactorialChecker();

//_______________________________________________________________Generate Factorial
document
  .getElementById("GenerateFactorial")
  .addEventListener("click", startFunction);

function startFunction() {
  var val = document.getElementById("FactorialValue").value;
  var result = test.printFactorial(val);
  document.getElementById("FactorialResult").innerHTML = result;
}

//________________________________________________________________Factorial List
document
  .getElementById("GenerateFactorialList")
  .addEventListener("click", startList);

function startList() {
  var val = document.getElementById("FactorialInput").value;
  var result = test.fillArray(val);
  document.getElementById("FactorialListResult").innerHTML = result;
}

// _________________________________________________________________________________________________Section 2
function PigLatinEncrypt(str) {
  const vowelRegex = /^[aeiou]/gim;
  const consonantRegex = /^[^aeiou]/gim;
  const noVowelRegex = /\b[^aeiou]+\b/gim;

  if (vowelRegex.test(str[0])) {
    document.getElementById("PigLatinResult").innerHTML = str + "way";
  }
  if (consonantRegex.test(str[0])) {
    document.getElementById("PigLatinResult").innerHTML =
      str.substring(1) + str.slice(0, 1) + "ay";
  }
  if (noVowelRegex.test(str)) {
    document.getElementById("PigLatinResult").innerHTML = str + "ay";
  }
}

document
  .getElementById("PigLatinEncrypt")
  .addEventListener("click", startPigLatin);

function startPigLatin() {
  var val = document.getElementById("SentenceToConvert").value;
  PigLatinEncrypt(val);
}
