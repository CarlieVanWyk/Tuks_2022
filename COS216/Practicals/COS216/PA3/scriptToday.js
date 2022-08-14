// Carlie van wyk u21672823

//asyncronous calls: Using this the browser can still run as normal,
// and give a smooth and interactive user experience, this is because you receive a callback when the data has been received.
// This lets the browser continue to work as normal while your request is being handled.

//___________________________preloader
let loader = document.getElementById("preloader");
window.addEventListener("load", function () {
  loader.style.display = "none";
});

//__________________________________________________________________________________web API
const data = null;
var newsdata;

const xhr = new XMLHttpRequest();
xhr.withCredentials = true;

let TodayArticles;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === this.DONE) {
    newsdata = JSON.parse(xhr.response);
    newsdata = newsdata.value;
    console.log(newsdata);
    const TA = [
      {
        name: newsdata[0].name,
        description: newsdata[0].description,
        datePub: newsdata[0].datePublished,
        author: newsdata[0].provider[0].name,
        image: newsdata[0].image.thumbnail.contentUrl, //change to 0
        url: newsdata[0].url,
      },
      {
        name: newsdata[1].name,
        description: newsdata[1].description,
        datePub: newsdata[1].datePublished,
        author: newsdata[1].provider[0].name,
        image: newsdata[1].image.thumbnail.contentUrl,
        url: newsdata[1].url,
      },
      {
        name: newsdata[2].name,
        description: newsdata[2].description,
        datePub: newsdata[2].datePublished,
        author: newsdata[2].provider[0].name,
        image: newsdata[2].image.thumbnail.contentUrl,
        url: newsdata[2].url,
      },
      {
        name: newsdata[3].name,
        description: newsdata[3].description,
        datePub: newsdata[3].datePublished,
        author: newsdata[3].provider[0].name,
        image: newsdata[3].image.thumbnail.contentUrl,
        url: newsdata[3].url,
      },
      {
        name: newsdata[4].name,
        description: newsdata[4].description,
        datePub: newsdata[4].datePublished,
        author: newsdata[4].provider[0].name,
        image: newsdata[4].image.thumbnail.contentUrl,
        url: newsdata[4].url,
      },
    ];
    TodayArticles = TA;

    searchBar();
    setArticle1();
  }
});

xhr.open(
  "GET",
  "https://bing-news-search1.p.rapidapi.com/news?safeSearch=Off&textFormat=Raw&mkt=en-US"
);
xhr.setRequestHeader("X-BingApis-SDK", "true");
xhr.setRequestHeader("X-RapidAPI-Host", "bing-news-search1.p.rapidapi.com");
xhr.setRequestHeader(
  "X-RapidAPI-Key",
  "099b04efa9msh9ac16ade8f20a42p18145fjsna6ad3c87986f"
);

xhr.send(data);

//___________________________________________________________________________________today
//_____________________________________________________________search functionality
function searchBar() {
  document
    .querySelector("#search-container #articles #article1")
    .setAttribute("value", TodayArticles[0].name);

  document
    .querySelector("#search-container #articles #article2")
    .setAttribute("value", TodayArticles[1].name);

  document
    .querySelector("#search-container #articles #article3")
    .setAttribute("value", TodayArticles[2].name);

  document
    .querySelector("#search-container #articles #article4")
    .setAttribute("value", TodayArticles[3].name);

  document
    .querySelector("#search-container #articles #article5")
    .setAttribute("value", TodayArticles[4].name);
}

function filterToName() {
  filtering(TodayArticles, "Name");
}

function filterToDesc() {
  filtering(TodayArticles, "description");
}

function filtering(DS, manner) {
  if (manner == "Name") {
    DS.sort(function (a, b) {
      if (a.name.toLowerCase() < b.name.toLowerCase()) return -1;
      else if (a.name.toLowerCase() > b.name.toLowerCase()) return 1;
      else return 0;
    });
  } else if (manner == "description") {
    console.log("helloDesc");
    DS.sort(function (a, b) {
      if (a.description.toLowerCase() < b.description.toLowerCase()) return -1;
      else if (a.description.toLowerCase() > b.description.toLowerCase())
        return 1;
      else return 0;
    });
  }
  setArticle1();
}

//_____________________________________________________________articles populate
function setArticle1() {
  let article1 = document.getElementById("LOTR");
  article1.querySelector("h2").innerHTML = TodayArticles[0].name;
  article1.querySelector("h2 ~ p").innerHTML = TodayArticles[0].description;
  article1.querySelector(".datePub").innerHTML = TodayArticles[0].datePub;
  article1.querySelector(".author").innerHTML = TodayArticles[0].author;
  article1.querySelector("img").setAttribute("src", TodayArticles[0].image);
  document
    .getElementById("LOTR_link")
    .setAttribute("href", TodayArticles[0].url);
  setArticle2();
}
function setArticle2() {
  let article2 = document.getElementById("wonderwoman");
  article2.querySelector("h2").innerHTML = TodayArticles[1].name;
  article2.querySelector("h2 ~ p").innerHTML = TodayArticles[1].description;
  article2.querySelector(".dataPub").innerHTML = TodayArticles[1].datePub;
  article2.querySelector(".author").innerHTML = TodayArticles[1].author;
  article2.querySelector("img").setAttribute("src", TodayArticles[1].image);
  document
    .getElementById("Wonderwoman_link")
    .setAttribute("href", TodayArticles[1].url);
  setArticle3();
}
function setArticle3() {
  let article3 = document.getElementById("Avatar");
  article3.querySelector("h2").innerHTML = TodayArticles[2].name;
  article3.querySelector("h2 ~ p").innerHTML = TodayArticles[2].description;
  article3.querySelector(".dataPub").innerHTML = TodayArticles[2].datePub;
  article3.querySelector(".author").innerHTML = TodayArticles[2].author;
  article3.querySelector("img").setAttribute("src", TodayArticles[2].image);
  document
    .getElementById("Avatar_link")
    .setAttribute("href", TodayArticles[2].url);
  setArticle4();
}
function setArticle4() {
  let article4 = document.getElementById("Arcane");
  article4.querySelector("h2").innerHTML = TodayArticles[3].name;
  article4.querySelector("h2 ~ p").innerHTML = TodayArticles[3].description;
  article4.querySelector(".dataPub").innerHTML = TodayArticles[3].datePub;
  article4.querySelector(".author").innerHTML = TodayArticles[3].author;
  article4.querySelector("img").setAttribute("src", TodayArticles[3].image);
  document
    .getElementById("Arcane_link")
    .setAttribute("href", TodayArticles[3].url);
  setArticle5();
}
function setArticle5() {
  let article5 = document.getElementById("Batman");
  article5.querySelector("h2").innerHTML = TodayArticles[4].name;
  article5.querySelector("h2 ~ p").innerHTML = TodayArticles[4].description;
  article5.querySelector(".dataPub").innerHTML = TodayArticles[4].datePub;
  article5.querySelector(".author").innerHTML = TodayArticles[4].author;
  article5.querySelector("img").setAttribute("src", TodayArticles[4].image);
  document
    .getElementById("Batman_link")
    .setAttribute("href", TodayArticles[4].url);
}