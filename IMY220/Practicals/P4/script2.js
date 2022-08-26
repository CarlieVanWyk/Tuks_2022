class FactorialChecker {
  constructor() {}

  //arrow functions
  printFactorial = (num) => {
    if (num > 0) {
      let result = 1;
      for (let i = 1; i <= num; i++) {
        result *= i;
      }
      return result;
    }
  };

  fillArray = (fact) => {
    let anw = check(fact);
    if (anw == 0) {
      return `This is not a factorial`;
    } else {
      let arr = [];
      for (let j = 1; j <= anw; j++) {
        arr.push(j);
      }
      return `The values that make up the factorial ${fact}: ${arr}`;
    }

    function check(originalVal) {
      let i;
      for (i = 1; ; i++) {
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
}

const PigLatinEncrypt = (str) => {
  let originalVal = str;
  const vowelRegex = /^[aeiou]/gim;
  const consonantRegex = /^[^aeiou]/gim;
  const noVowelRegex = /\b[^aeiou]+\b/gim;

  if (vowelRegex.test(str[0])) {
    document.getElementById(
      "PigLatinResult"
    ).innerHTML = `The result when converting ${originalVal} to pig latin is: ${str}way`;
  }
  if (consonantRegex.test(str[0])) {
    document.getElementById(
      "PigLatinResult"
    ).innerHTML = `The result when converting ${originalVal} to pig latin is: ${str.substring(
      1
    )}${str.slice(0, 1)}ay`;
  }
  if (noVowelRegex.test(str)) {
    document.getElementById(
      "PigLatinResult"
    ).innerHTML = `The result when converting ${originalVal} to pig latin is: ${str}ay`;
  }
};

const test = new FactorialChecker();

//_______________________________________________________________Generate Factorial
document
  .getElementById("GenerateFactorial")
  .addEventListener("click", startFunction);

function startFunction() {
  let val = document.getElementById("FactorialValue").value;
  let result = test.printFactorial(val);
  document.getElementById(
    "FactorialResult"
  ).innerHTML = `The factorial value of ${val} is ${result}`;
}

//________________________________________________________________Factorial List
document
  .getElementById("GenerateFactorialList")
  .addEventListener("click", startList);

function startList() {
  let val = document.getElementById("FactorialInput").value;
  let result = test.fillArray(val);
  document.getElementById("FactorialListResult").innerHTML = result;
}

// __________________________________________________________________PigLatin
document
  .getElementById("PigLatinEncrypt")
  .addEventListener("click", startPigLatin);

function startPigLatin() {
  let val = document.getElementById("SentenceToConvert").value;
  PigLatinEncrypt(val);
}

// _____________________________________________________________________________________________________________Section 2
checkUniqueLetters = (str) => {
  let strArr = str.split("");

  //   take away all duplicate letters in array
  let unique = [...new Set(strArr)];

  //count letters in unique array using reduce array function
  let count = 1;
  unique.reduce((startVal = 0, curr) => {
    if (strArr.includes(curr)) {
      count++;
    }
  });

  return count;
};

document
  .getElementById("checkRecurringChars")
  .addEventListener("click", getUniqueChars);

function getUniqueChars() {
  let val = document.getElementById("charChecker").value;
  let result = checkUniqueLetters(val);
  document.getElementById(
    "recurringCharsResult"
  ).innerHTML = `The word ${val} has ${result} unique characters`;
}
